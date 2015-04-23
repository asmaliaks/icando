<?php

class Customer_TaskController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
    
    public function newTaskAction(){
        $this->view->title = 'Создание задачи';  
        $this->view->headTitle('Создание задачи', 'APPEND');        
        // get categories
        $categoryObj = new Customer_Model_DbTable_Categories();
        $mainCategories = $categoryObj->getCategoryList();
        $userId = $this->user->id;
        
        $usersObj = new Model_DbTable_Users();
        $user = $usersObj->getUserById($userId);
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
       
        $phoneVerifObj = new Default_Model_DbTable_PhoneVerification();
        if($user['phonenumber']){
            $hasCode = $phoneVerifObj->checkIfNumberHasCode($user['phonenumber']);
        }
        if($hasCode){
            $this->view->hasCode = $hasCode;
        }
        $termsObj = new Default_Model_DbTable_TermsModel();
        $terms = $termsObj->getTerms();
        // sending data to the view
        $this->view->terms = $terms;
        $this->view->user = $user;
        $this->view->categories = $categories;
    }
   public function getSubcatsAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('catId');
           $categoryObj = new Default_Model_DbTable_Categories();
           $categories = $categoryObj->getCategoriesByParentId($id);
           $n=0;
           foreach($categories as $cat){
               if($n==0){
                   $resultString = '<option value="0">Выберите...</option><option value="'.$cat['id'].'">'.$cat['title'].'</option>';
               }else{
                   $resultString = $resultString.'<option value="'.$cat['id'].'">'.$cat['title'].'</option>';
               }
               $n++;
           }
           print_r($resultString);exit;
       }
   } 
    public function addTaskAction(){
        
        $request = $this->getRequest();
        if($request->isPost()){
            $params = $request->getParams();
            $finalDateUnix = strtotime($params['time'].':00 '.$params['final_date']);
            $expiryDate  = strtotime($params['expiry_time'].':00 '.$params['expiry_date']);
            $data = array(
                'title'=>$params['title'],
                'customer_id'=>$this->user->id,
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
        //                    copy($_FILES["image"]["tmp_name"], DOCUMENT_ROOT."/images/task_images/additional_images/".$_FILES["image"]["name"]);
                              copy($tmpName, $_SERVER['DOCUMENT_ROOT']."/images/task_images/additional_images/".$_FILES["additional_image"]["name"][$n]);
                              $dataAddImages = array(
                                  'image'=>$_FILES['additionalImage']['name'][$n],
                                  'task_id'=>$taskId,
                                  'user_id'=>$this->user->id,
                                  );
                            }
                            $taskImagesObj->addImages($dataAddImages);
                            $n++;
                    }
                    
            }
            // send mail to admin
            $smtpObj = new Default_Model_Smtp();
            $message = '<p>Пользователь '.$this->user->username.' '.$this->user->surmname.' '
                    . 'создал  задачу <a href="http://helpyou.by/admin/tasks/view/id/'.$taskId.'">'.$data['title'].'</a></p> ';

            $message = wordwrap($message, 70);
            $headers = 'From: '.SMTP_FROM;
            $smtpObj->send(ADMIN_MAIL, 'Создана задача', $message, $headers);
            // send mail to customer
            $message = '<p>Вы успешно создали задачу  <a href="http://helpyou.by/customer/task/view/id/'.$taskId.'">'.$data['title'].'</a> </p>';
            $message = wordwrap($message, 70);
            $headers = 'From: '.SMTP_FROM;
            $smtpObj->send($this->user->email, 'Создана задача', $message, $headers);
            $this->_redirect('/customer/office/index');
        }

    }
    

    
    public function customersTasksAction(){
        
    }
    
    public function customersTaskViewAction(){
        echo 'customers task view'; 
    }
    
    public function removeTaskAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $id = $request->getParam('id');
            $tasksObj = new Customer_Model_DbTable_TasksModel();
            $result = $tasksObj->removeTask($id);
            if($result){
                echo "true";
            }
        }
    }
    
    public function viewAction(){

        
        $request = $this->getRequest();
        $taskId = $request->getParam('id');
        
        $usersObj = new Performer_Model_DbTable_Users();
        $user = $usersObj->getUserById($this->user->id);
        
        $taskObj = new Customer_Model_DbTable_TasksModel();
        $task = $taskObj->getTaskById($taskId);
        // get task's prepositions
        $taskPrepObj = new Customer_Model_DbTable_TaskPrepositionModel();
        $prepositions = $taskPrepObj->getTasksPrepositionis($taskId);
         // get task's feedback from the performer
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        $feedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $task['customer_id']);
        if($task['performer_id']){
            $tasksFeedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $task['performer_id']);
        }
        /// get all comments for the task
        $commentsObj = new Default_Model_Comments();
        $commentsList = $commentsObj->getCommentsByTaskId($taskId);
            //   pagination    
        $comments = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($commentsList));
        $comments->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
        if($prepositions){
        $n = 0;
        foreach($prepositions as $prep){
           
            // count performer's rating using his id
            $rating = $feedbackObj->countPerformersRating($prep['performer_id']);
            $prepositions[$n]['rating'] = $rating;
            $n++;
        }
        
        
            $this->view->prepositions = $prepositions;
        }
        $messagesObj = new Default_Model_DbTable_Messages();
        $taskMessages = $messagesObj->getTasksMessages($taskId);
        $unreadMessages = $messagesObj->countUnreadMessages($taskId, $this->user->id );
        if($unreadMessages){
            $this->view->unreadAmount = $unreadMessages;
        }
        if($taskMessages){
            $this->view->taskMessages = $taskMessages;
        }
        if($tasksFeedback){
            $this->view->tasksFeedback = $tasksFeedback;
        }
        if($feedback){
            $this->view->feedback = $feedback;  
        }
        // get additional images
        $additionalImgObj = new Default_Model_DbTable_TaskImages();
        $addImages = $additionalImgObj->getTaskImages($taskId);
        
        if($addImages){
            $this->view->addImages = $addImages;
        }
        
        $this->view->user = $user;
        $this->view->comments = $comments;
        $this->view->currentUser = $this->user;
        $this->view->task = $task;

    }
    
    public function acceptPropositionAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $performerId = $request->getParam('performerId');
            $taskId = $request->getParam('taskId');
            $taskObj = new Customer_Model_DbTable_TasksModel();
            // 
            $task = $taskObj->getTaskById($taskId);
            // delete all preposition with 'performer_id' == $performerId
            $prepObj = new Customer_Model_DbTable_TaskPrepositionModel();
            
            // if performers didn't propose his price
            if($task['customers_price']){
                // change task status
                $taskObj->acceptPreposition($performerId, $taskId);
            // if performer proposed his price
            }else{
                $prepositionId = $request->getParam('prepositionId');
                $preposition = $prepObj->getById($prepositionId);
                // change task status
                $taskObj->acceptPrepositionWithPerformersPrice($performerId, $taskId, $preposition['performers_price']);
            }
            // take the preposition
            $prepObj->takePreposition($taskId);
            
            $usersObj = new Admin_Model_DbTable_Users();
            $user = $usersObj->getUserById($performerId);
            // block peace of the performer's balance
            $balanceReserveObj = new Default_Model_DbTable_BalanceReserve();
            $blockedBalance = 10/$task['customers_price'];
            $blockedBalance = $blockedBalance*100;
            $blockBalance = array(
                'task_id'=>$task['id'],
                'user_id'=>$performerId,
                'amount' =>$blockedBalance,
                'created'=>time(),
            );
            
            $balanceReserveObj->blockBalance($blockBalance);
            $smtpObj = new Default_Model_Smtp();
            $message = "Заказчик ".$this->user->username." ".$this->user->surname." "
                    . "принял вашу заявку на выполнение задачи ".$task['title']." .Вы можете с ним связаться"
                    . " по телефону ".$this->user->phonenumber;
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send($user['email'], 'Принятие вашей кандидатуры', $message, $headers);
            
            $smsObj = new Default_Model_SmsModel();
            $customer = $usersObj->getUserById($this->user->id);
            $message = "Задание №".$task['id'].", ".$customer['phonenumber'].", заказчик ".$this->user->username;
            $message = urlencode($message);
            $smsObj->sendSmsAction($user['phonenumber'], $message);
            echo 'true';exit;
        }
    }
    
private function makeHash(){
    	$quan1 = substr(str_shuffle(str_repeat("234", 15)), 0, 1);
    	$quan2 = substr(str_shuffle(str_repeat("123456780", 15)), 0, 1);
    	$quan = $quan1."". $quan2;
    	$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 15)), 0, $quan);
    	return $s;
}    
}

