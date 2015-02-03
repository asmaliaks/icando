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
        
        // check if the performer sent preposition
        $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
        $sentPrep = $taskPrepObj->ifPerformerSentPrep($this->user->id, $taskId);
        // put to the view
        if($sentPrep){
            $this->view->sentPrep = $sentPrep;
        }
        if($feedback){
            $this->view->feedback = $feedback;
        }
        $this->view->task = $task;
        $this->view->userId = $this->user->id;
    }
    
    public function proposeTaskAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $post = $request->getPost();
            $taskPrepObj = new Performer_Model_DbTable_TaskPrepositionModel();
            if(!$post['perfPrice']){
                $taskPrepObj->addPreposition($post['taskId'], $this->user->id, null);
                echo 'true';
            }else{
                $taskPrepObj->addPreposition($post['taskId'], $this->user->id, $post['perfPrice']);
                echo 'true';
            }
            
        }
    }
}

