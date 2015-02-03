<?php

class Performer_FeedbackController extends Zend_Controller_Action{
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    
    public function leaveFeedbackAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
            $post = $request->getPost();
            if($post['kind']=='negative'){
                $data = array(
                    'kind' => 'negative',
                    'user_from' => $this->user->id,
                    'task_id' => $post['taskId'],
                    'user_to' => $post['custId'],
                    'text' => $post['feedbackText'],
                    'rating' => 0,
                );
                $feedbackObj->addFeedback($data);
                echo 'true';
            }else if($post['kind']=='positive'){
                $rating = ($post['quality']+$post['punctuality']+$post['politeness'])/3;
                $data = array(
                    'kind' => 'positive',
                    'user_from' => $this->user->id,
                    'task_id' => $post['taskId'],
                    'user_to' => $post['custId'],
                    'text' => $post['feedbackText'],
                    'rating' => $rating,
                );
                $feedbackObj->addFeedback($data);
                echo 'true';
            }
        }
    } 
}

