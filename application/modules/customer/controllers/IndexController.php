<?php

class Customer_IndexController extends Zend_Controller_Action
{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }   
    }
    
    public function indexAction(){
      $this->view->title = 'Главная';  
//print_r($_SESSION['Zend_Auth']['storage']);exit;
        // get tasks for the list
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $lastTasks = $tasksObj->getLastTasks();
        // get main categories  
        $categoryObj = new Default_Model_DbTable_Categories();
        $mainCats = $categoryObj->getMainCats();

        // get slides for main banner
        $mainBannerObj = new Admin_Model_DbTable_MainBanner();
        $slides = $mainBannerObj->getSliderList();

        $this->view->slides = $slides;
        $this->view->mainCats = $mainCats;
        $this->view->lastTasks = $lastTasks;
    }
    
    public function taskViewAction(){
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