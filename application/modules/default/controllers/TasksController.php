<?php

class TasksController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    
    public function indexAction(){
         $this->view->title = 'Задачи';  
      $this->view->headTitle('Задачи', 'APPEND');
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
        $role = $this->user->role;
        switch ($role) {
            case 'admin':
                $this->_redirect('admin');
                break;
            case 'customer': 
                $this->_redirect('customer/office');
                break;
            case 'performer':
                $this->_redirect('performer/user');
                break;
        }
        }  
        
        // get all non-taken tasks
        $tasksPgn = new Default_Model_TaskList();
        $tasks = $tasksPgn->listTask();
        
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($tasks));
        $paginator->setItemCountPerPage(12)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
        $this->view->paginator = $paginator;
    }
    
    public function viewAction(){
        // get task id from url
        $request = $this->getRequest();
        $taskId = $request->getParam('id');
        
        // call task model
        $taskObj = new Performer_Model_DbTable_TasksModel();
        $task = $taskObj->getTaskById($taskId);
        // get task's feedback from the performer
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        $feedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $task['performer_id']);
        $tasksFeedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $task['customer_id']);

        /// get all comments for the task
        $commentsObj = new Default_Model_Comments();
        $commentsList = $commentsObj->getCommentsByTaskId($taskId);
            //   pagination    
        $comments = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($commentsList));
        $comments->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
  
        if($tasksFeedback){
            $this->view->tasksFeedback = $tasksFeedback;
        }
        if($feedback){
            $this->view->feedback = $feedback;
        }
        $messagesObj = new Default_Model_DbTable_Messages();
        $taskMessages = $messagesObj->getTasksMessages($taskId);
        if($taskMessages){
            $this->view->taskMessages = $taskMessages;
        }

// get additional images
        $additionalImgObj = new Default_Model_DbTable_TaskImages();
        $addImages = $additionalImgObj->getTaskImages($taskId);
        
        if($addImages){
            $this->view->addImages = $addImages;
        }


        $this->view->comments = $comments;
        $this->view->currentUser = $this->user;
        $this->view->task = $task;
    }
    
    public function fastTaskAction(){
        $this->view->title = 'Создание задачи';  
        $this->view->headTitle('Создание задачи', 'APPEND');        
        // get categories
        $categoryObj = new Customer_Model_DbTable_Categories();
        $mainCategories = $categoryObj->getCategoryList();
        // get sub categories
        $n=0;
        foreach($mainCategories as $mainCat){
            $subCats = $categoryObj->getSubCats($mainCat['id']);
            $categories[$n] = array(
                'title' => $mainCat['title'],
                'id'    => $mainCat['id'],
            );
            if($subCats){
               foreach($subCats as $subCat){
                   $categories[$n]['children'][] = array(
                       'id' => $subCat['id'],
                       'title' => $subCat['title'],
                       'parent_id' => $subCat['parent_id'],
                   ); 
               }
        }
            $n++;
        }
        
        $termsObj = new Default_Model_DbTable_TermsModel();
        $terms = $termsObj->getTerms();

        
        // sending data to the view
        $this->view->terms = $terms;
        $this->view->categories = $categories;
    }
    
    public function fastTaskCreateAction(){
        // registrate user
        $request = $this->getRequest();
        if($request->isPost()){
            $params = $request->getParams();
            // register new user

            $usersModel = new Model_DbTable_Users();
            $passStr = $this->makePass();
            $pass = base64_encode($passStr);
            $phone = '375'.$params['phone'];
            $pass = $pass.SALT;
            $userData = array(
                'email' => $params['email'],
                'username'  => $params['name'],
                'sex' => 'male',
                'phonenumber' => $phone,
                'phone_verified' => 1,
                'pass' => $pass,
                'birth_date' => time(),
            );

            $userId = $usersModel->addNewUser($userData);
            
            // create new task
             $finalDateUnix = strtotime($params['time'].':00 '.$params['final_date']);
            $expiryDate  = strtotime($params['expiry_time'].':00 '.$params['expiry_date']);
            $data = array(
                'title'=>$params['title'],
                'customer_id'=>$userId,
                'customers_price'=>$params['price'],
                'price'=>$params['price'],
                'category_id'=>$params['cat'],
                'description'=>$params['description'],
                'final_date'=>$finalDateUnix,
                'expiry_date'=>$expiryDate,
                'status'=>'non_taken',
                'created_at'=>time(),
                'docs' => $params['docs'],
                'propose_price' => $params['propose_price'],
            );
           if($params['propose_price'] == 1){
               $data['price'] = null;
               $data['customers_price'] = null;
           }
            // upload image
            if($_FILES['image']){
                $dir = (int)is_dir($_SERVER['DOCUMENT_ROOT']."/images/task_images/");
                if( !$dir ){					
                        //die($_SERVER['DOCUMENT_ROOT'].$file_path.'/');				
                        mkdir( $_SERVER['DOCUMENT_ROOT']."/images/task_images/" );
                        chmod( $_SERVER['DOCUMENT_ROOT']."/images/task_images/", 0777 );				
                }
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))
                {
                // get image type
                $type = $_FILES["image"]["name"];
                $typeArray = explode(".", $type);
                $imageType = $typeArray[1];
                
              $imageName = $this->makeHash();
                  copy($_FILES["image"]["tmp_name"], DOCUMENT_ROOT."/images/task_images/".$imageName.".".$imageType);
//                  copy($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/images/task_images/".$_FILES["image"]["name"]);
                  $data['task_image'] = $imageName.".".$imageType;
                }
            }
            $tasksObj = new Customer_Model_DbTable_TasksModel();
            $taskId = $tasksObj->addTask($data);
                if($_FILES['additionalImage']){
                
                    $dir = (int)is_dir($_SERVER['DOCUMENT_ROOT']."/images/task_images/additional_images/");
                    if( !$dir ){					
                            //die($_SERVER['DOCUMENT_ROOT'].$file_path.'/');				
                            mkdir( $_SERVER['DOCUMENT_ROOT']."/images/task_images/additional_images/" );
                            chmod( $_SERVER['DOCUMENT_ROOT']."/images/task_images/additional_images/", 0777 );				
                    }
                    $taskImagesObj = new Default_Model_DbTable_TaskImages();
                    $n=0;
                    foreach($_FILES["additionalImage"]["tmp_name"] as $tmpName){
                        if(is_uploaded_file($tmpName))
                            {
                                            // get image type
                            $type = $_FILES["additionalImage"]["name"][$n];
                            $typeArray = explode(".", $type);
                            $imageType = $typeArray[1];
                
                            $imageName = $this->makeHash();
                            copy($_FILES["additionalImage"]["tmp_name"][$n], DOCUMENT_ROOT."/images/task_images/additional_images/".$imageName.".".$imageType);

                              $dataAddImages = array(
                                  'image'=>$imageName.".".$imageType,
                                  'task_id'=>$taskId,
                                  'user_id'=>$userId,
                                  );
                            }
                            $taskImagesObj->addImages($dataAddImages);
                            $n++;
                    }
                }
                // send mail with password
                $smtpObj = new Default_Model_Smtp();
                $message = '<p>Уважаемый пользователь '.$userData['username'].' '
                        . 'Вы создали <a href="http://helpyou.by/customer/task/view/id/'.$taskId.'">задачу</a></p> '
                        .'на нашем сайте. Так же была создана учетная запись. Воспользуйтесь, указанным при создании задачи, Email-ом '
                        .'и паролем :"'.$passStr.'", вы можете изменить его в личном кабинете своего профиля. ';

                $message = wordwrap($message, 70);
                $headers = 'From: '.SMTP_FROM;
                $smtpObj->send($userData['email'], 'Создана задача', $message, $headers);
                // authorize the user
                $authAdapter = $this->getAuthAdapter();
        
                $username = $userData['email'];
                $mailPass = $passStr;
                $passHashed = base64_encode($mailPass);
                $passHashed = $passHashed.SALT;
                $authAdapter->setIdentity($username)
                    ->setCredential($passHashed);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
        
                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    $this->_redirect('/customer/task/view/id/'.$taskId);
      
        }
                
        }
    }
    
    private function makePass(){
        
    	$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 15)), 0, 7);
    	return $s;
    }
    private function makeHash(){
    	$quan1 = substr(str_shuffle(str_repeat("234", 15)), 0, 1);
    	$quan2 = substr(str_shuffle(str_repeat("123456780", 15)), 0, 1);
    	$quan = $quan1."". $quan2;
    	$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 15)), 0, $quan);
    	return $s;
    }
    private function getAuthAdapter(){
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('pass');
        return $authAdapter;
    }
}