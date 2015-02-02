<?php

class Performer_IndexController extends Zend_Controller_Action {
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
    
    public function indexAction(){
        
        // get users categories 
        $usersCatObj = new Performer_Model_DbTable_UserCategory();
        $usersCats = $usersCatObj->getUsersCategories($this->user->id);
        //  get list of the tasks which fit to the performer
        $taskObj = new Performer_Model_DbTable_TasksModel();
        $performersTasks =  $taskObj->getTasksForPerformer($this->user->id, $usersCats);
        $performersTasks['created_at'] = date("h:i d.m.Y", $performersTasks['created_at']);
        // put tasks to the view
        $this->view->tasks = $performersTasks;
        
    }
}

