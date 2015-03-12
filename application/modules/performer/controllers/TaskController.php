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
        $feedback = $feedbackObj->getPerformersFeedbackByTaskId($taskId, $this->user->id);
        $tasksFeedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $this->user->id);

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
        $usersObj = new Performer_Model_DbTable_Users();
        $user = $usersObj->getUserById($this->user->id);
        $freePoints = $user['balance'] - $amountOfReserves;
        if($freePoints < 0){
            $this->view->freePoints = 0;
        }else{
            $this->view->freePoints = $freePoints;
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

        // sending data to the view
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
                'expiry_date'=>$expiryDate,
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
            // send mail to admin
            $smtpObj = new Default_Model_Smtp();
            $message = 'Пользователь '.$this->user->username.' '.$this->user->surmname.' '
                    . 'создал задачу '.$_SERVER['HTTP_ORIGIN'].'/admin/tasks/view/id/'.$taskId.' '.$data['title'].' ';
            
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send(ADMIN_MAIL, 'Создана задача', $message, $headers);
            // send mail to customer
            $message = 'Вы успешно создали задачу '.$_SERVER['HTTP_ORIGIN'].'/customer/task/view/id/'.$taskId.' '.$data['title'].' ';
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send($this->user->email, 'Создана задача', $message, $headers);
            $this->_redirect('/customer/office/index');
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
                $message = "Пользователь ".$this->user->username." ".$this->user->surname." "
                        . "готов выполнить задание ".$task['title']." "
                        . "за предложенную Вами сумму.";
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@icando.by';
                $smtpObj->send($task['u_email'], 'Предложение кандидатуры', $message, $headers);
                echo 'true';
            }else{
                $taskPrepObj->addPreposition($post['taskId'], $this->user->id, $post['perfPrice']);
                // send email to the customer
                $smtpObj = new Default_Model_Smtp();
                $message = "Пользователь ".$this->user->username." ".$this->user->surname." "
                        . "предлагает ".$post['perfPrice']." рублей за выполнение задания ".$task['title'];
                $headers = 'From: no_reply@icando.by';
                $smtpObj->send($task['u_email'], 'Предложение кандидатуры', $message, $headers);
                echo 'true';
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
            $message = "Заказчик ".$this->user->username." ".$this->user->surname." "
                    . "принял вашу заявку на выполнение задачи ".$task['title'];
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send($user['email'], 'Принятие вашей кандидатуры', $message, $headers);
            echo 'true';exit;
        }
    }    
}

