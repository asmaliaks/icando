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




        $this->view->comments = $comments;
        $this->view->currentUser = $this->user;
        $this->view->task = $task;
    }
}