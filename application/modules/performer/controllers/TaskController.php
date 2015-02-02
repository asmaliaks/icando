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
        // check if the performer sent preposition
        $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
        $sentPrep = $taskPrepObj->ifPerformerSentPrep($this->user->id, $taskId);
        // put to the view
        if($sentPrep){
            $this->view->sentPrep = $sentPrep;
        }
        $this->view->task = $task;
        $this->view->userId = $this->user->id;
    }
    
    public function proposeTaskAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $taskId = $request->getParam('taskId');
            $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
            $taskPrepObj->addPreposition($taskId, $this->user->id);
            echo 'true';
        }
    }
}

