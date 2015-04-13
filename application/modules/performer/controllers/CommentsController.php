<?php

class Performer_CommentsController extends Zend_Controller_Action{
    
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
            
            $usersObj = new Performer_Model_DbTable_Users();
            $customer = $usersObj->getUserById($params['customerId']);
            // send email
            $smtpObj = new Default_Model_Smtp();
            $message = '<p>Пользователь '.$this->user->username.' '.mb_substr($this->user->username, 0, 1, 'utf-8').'. '
                    . 'оставил комментарий к <a href="http://helpyou.by/admin/tasks/view/id/'.$params['taskId'].'">задаче  </a></p> ';
            
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send($customer['email'], 'Оставлен комментарий', $message, $headers);
            
            print_r('true');exit;
            
        }
    }
}
