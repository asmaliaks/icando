<?php

class Customer_CommentsController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }

    public function sendCommentAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $params = $request->getParams();
            $data = array(
                'task_id' => $params['taskId'],
                'user_from' => $params['userId'],
                'user_to' => 0,
                'parent_id' => 0,
                'text' => $params['comment'],
                'read' => 0,
                'created' => time(),
                'parent_id' => 0,
            );
            $commentsObj = new Default_Model_DbTable_Comments();
            $commentsObj->add($data);
            print_r('true');exit;
            
        }
    }
}