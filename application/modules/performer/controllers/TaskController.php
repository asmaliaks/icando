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
        
        // put to the view
        $this->view->task = $task;
    }
}

