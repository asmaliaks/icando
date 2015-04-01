<?php

class Performer_TaskController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
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
        
        // check if the performer sent preposition
        $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
        $sentPrep = $taskPrepObj->ifPerformerSentPrep($this->user->id, $taskId);
        // put to the view
        if($sentPrep){
            $this->view->sentPrep = $sentPrep;
        }
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
        $unreadMessages = $messagesObj->countUnreadMessages($taskId, $this->user->id );
        if($unreadMessages){
            $this->view->unreadAmount = $unreadMessages;
        }
        $balanceResObj = new Default_Model_DbTable_BalanceReserve();
        $amountOfReserves = $balanceResObj->countUsersReserves($this->user->id);
        $usersObj = new Performer_Model_DbTable_Users();
        $user = $usersObj->getUserById($this->user->id);
        if(!$amountOfReserves){
            $amountOfReserves = 0;
        }
        $freePoints = $user['balance'] - $amountOfReserves;
        if($freePoints < 0){
            $this->view->freePoints = 0;
        }else{
            $this->view->freePoints = $freePoints;
        }
        
        // check if performer can propose himself to making the task
        $userCatObj = new Performer_Model_DbTable_UserCategory();
        $userHasCat = $userCatObj->checkUserForCategory($this->user->id, $task['c_id']);
        if($userHasCat){
            $this->view->userHasCat = $userHasCat;
        }
        $this->view->comments = $comments;
        $this->view->currentUser = $this->user;
        $this->view->task = $task;
        $this->view->userId = $this->user->id;
    }
    
    public function addAction(){
        $this->view->title = 'Выбор категории';  
        $this->view->headTitle('Выбор категории', 'APPEND');
      
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
    
    public function createTaskAction(){
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
                'status'=>'non_taken',
                'created_at'=>time(),
                'docs' => $params['docs'],
            );
           
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
              
                  copy($_FILES["image"]["tmp_name"], DOCUMENT_ROOT."/images/task_images/".$_FILES["image"]["name"]);
//                  copy($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/images/task_images/".$_FILES["image"]["name"]);
                  $data['task_image'] = $_FILES['image']['name'];
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
                    . 'создал задачу <a href="http://helpyou.by/admin/tasks/view/id/'.$taskId.'"> '.$data['title'].'</a></p> ';
            
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send(ADMIN_MAIL, 'Создана задача', $message, $headers);
            // send mail to customer
            $message = '<p>Вы успешно создали задачу <a href="http://helpyou.by/performer/task/view/id/'.$task['id'].'">'.$data['title'].'</a></p>';
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send($this->user->email, 'Создана задача', $message, $headers);
            $this->_redirect('/performer/user/index');
        }
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
    
    public function performersViewAction(){

        
        $request = $this->getRequest();
        $taskId = $request->getParam('id');
        
        $taskObj = new Performer_Model_DbTable_TasksModel();
        $task = $taskObj->getTaskById($taskId);
        // get task's prepositions
        $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
        $prepositions = $taskPrepObj->getTasksPrepositionis($taskId);
         // get task's feedback from the performer
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        $feedback = $feedbackObj->getCustomersFeedbackByTaskId($taskId, $this->user->id);
        $tasksFeedback = $feedbackObj->getTasksFeedbackByPerformer($taskId, $this->user->id);
        $n = 0;
        if($prepositions){
            foreach($prepositions as $prep){

                // count performer's rating using his id
                $rating = $feedbackObj->countPerformersRating($prep['performer_id']);
                $prepositions[$n]['rating'] = $rating;
                $n++;
            }


                $this->view->prepositions = $prepositions;
        }
        
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
        $unreadMessages = $messagesObj->countUnreadMessages($taskId, $this->user->id );
        if($unreadMessages){
            $this->view->unreadAmount = $unreadMessages;
        }
        
        $this->view->comments = $comments;
        $this->view->currentUser = $this->user;
        $this->view->task = $task;        
    }
    public function proposeTaskAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $post = $request->getPost();
            $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
            if(!$post['perfPrice']){
                $taskPrepObj->addPreposition($post['taskId'], $this->user->id, null);
                $taskObj = new Performer_Model_DbTable_TasksModel();
                $task = $taskObj->getTaskById($post['taskId']);
                // send email to the customer
                $smtpObj = new Default_Model_Smtp();
                $message = 'Пользователь '.$this->user->username.' '.mb_substr($this->user->surname, 0, 1, 'utf-8').' '
                        . 'готов выполнить задание '.$task['title'].' '
                        . 'за предложенную Вами сумму.';
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@helpyou.by';
                $smtpObj->send($task['u_email'], 'Предложение кандидатуры', $message, $headers);
                // send sms
                $smsObj = new Default_Model_SmsModel();
                $smsMessage = "На Ваше задание откликнулся исполнитель, ознакомьтесь в лич кабинете";
                $smsMessage = urlencode($smsMessage);
                $smsObj->sendSmsAction($task['u_phonenumber'], $smsMessage);
                
                echo 'true';
            }else{
//                $taskPrepObj->addPreposition($post['taskId'], $this->user->id, $post['perfPrice']);
//                // send email to the customer
//                $smtpObj = new Default_Model_Smtp();
//                $message = "Пользователь ".$this->user->username." ".mb_substr($this->user->surname, 0, 1, 'utf-8').". "
//                        . "предлагает ".$post['perfPrice']." рублей за выполнение задания ".$task['title'];
//                $headers = 'From: no_reply@helpyou.by';
//                $smtpObj->send($task['u_email'], 'Предложение кандидатуры', $message, $headers);
//                // send sms
//                $smsObj = new Default_Model_SmsModel();
//                $smsMessage = "На Ваше задание откликнулся исполнитель, ознакомьтесь в лич кабинете";
//                $smsMessage = urlencode($smsMessage);
//                $smsObj->sendSmsAction($this->user->phonenumber, $smsMessage);
//                
//                echo 'true';
            }
            
        }
    }
    public function removeTaskAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $id = $request->getParam('id');
            $tasksObj = new Performer_Model_DbTable_TasksModel();
            $result = $tasksObj->removeTask($id);
            if($result){
                echo "true";
            }
        }
    }
    
    public function acceptPropositionAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $performerId = $request->getParam('performerId');
            $taskId = $request->getParam('taskId');
            // delete all preposition with 'performer_id' == $performerId
            $prepObj = new Performer_Model_DbTable_TaskPrepositionModel();
            $prepObj->takePreposition($taskId);
            // change task status
            $taskObj = new Performer_Model_DbTable_TasksModel();
            $taskObj->acceptPreposition($performerId, $taskId);
            
            // send mail notification to the performer
            $task= $taskObj->getTaskById($taskId);
            $usersObj = new Admin_Model_DbTable_Users();
            $user = $usersObj->getUserById($performerId);
            $smtpObj = new Default_Model_Smtp();
            $message = '<p>Заказчик <a href="http://helpyou.by/performer/customer/view/id/'.$this->user->id.'">'.$this->user->username.' '.mb_substr($this->user->surname, 0, 1, 'utf-8').'</a> '
                    . 'принял вашу заявку на выполнение задачи <a href="http://helpyou.by/performer/task/view/id/'.$task['id'].'">'.$task['title'].'</a> '
                    . 'Вы можете с ним связаться'
                    . ' по телефону '.$this->user->phonenumber.'</p>';
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send($user['email'], 'Принятие вашей кандидатуры', $message, $headers);
            $smsObj = new Default_Model_SmsModel();
            $message = "Задание №".$task['id'].", ".$this->user->phonenumber.", заказчик ".$this->user->username;
            $message = urlencode($message);
            $smsObj->sendSmsAction($user['phonenumber'], $message);
            echo 'true';exit;
        }
    }    
}

