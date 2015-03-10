<?php

class Performer_PerformersController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    public function indexAction(){
        /// get all comments for the task
        $performersObj = new Default_Model_Performers();
        $performesList = $performersObj->listPerformers();
            //   pagination    
        $performers = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($performesList));
        $performers->setItemCountPerPage(12)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
        if($this->user){
            $this->view->user = $this->user;
        }
        $this->view->performers = $performers;
    }
    
    public function performerViewAction(){
        $request = $this->getRequest();
        $performerId = $request->getParam('id');
        $usersObj = new Model_DbTable_Users();
        $performer = $usersObj->getUserById($performerId);
        // count closed users tasks
        $tasksObj = new Performer_Model_DbTable_TasksModel();
        $closedTasks = $tasksObj->getPerformersTasksClosed($performerId);
        // get user's categories
        $userCatObj = new Performer_Model_DbTable_UserCategory();
        $usersCategories = $userCatObj->getUsersCategories($performerId);
        
        if($closedTasks){
            // get user's rating
            $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
            $rating = $feedbackObj->countPerformersRating($performerId);
            $this->view->rating = $rating;
            $this->view->closedTasks = $closedTasks;
        }
        
        $this->view->usersCategories = $usersCategories;
        $this->view->performer = $performer;
    }
    

}

