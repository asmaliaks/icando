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
            $notificationObj = new Performer_Model_DbTable_AdminNotificationModel();
            $post = $request->getPost();
            if($post['kind']=='negative'){
                $data = array(
                    'kind' => 'negative',
                    'user_from' => $this->user->id,
                    'task_id' => $post['taskId'],
                    'user_to' => $post['custId'],
                    'text' => $post['feedbackText'],
                    'rating' => 0,
                    'created' => time(),
                );
                $feedbackObj->addFeedback($data);
                $notificationObj->addNotification($post['taskId'], $this->user->id, 'unhappy');
                echo 'true';
            }else if($post['kind']=='positive'){
                $sum = $post['quality']+$post['punctuality']+$post['politeness'];
                $rating = $sum/3;
                $data = array(
                    'kind' => 'positive',
                    'user_from' => $this->user->id,
                    'task_id' => $post['taskId'],
                    'user_to' => $post['custId'],
                    'text' => $post['feedbackText'],
                    'rating' => $rating,
                    'created' => time(),
                );
                $feedbackObj->addFeedback($data);
                $notificationObj->addNotification($post['taskId'], $this->user->id, 'satisfied');
                // if both feedbacks are positive change feedback status...
                // check if there is second feedback and and if it's positive
                $customarsFeedback = $feedbackObj->checkIfCustomerLeftFeedback($post['taskId'], $post['custId']);
                if($customarsFeedback){
                    // if performer left feedback
                    if($customarsFeedback == 'positive'){
                        // if feedback is positive change task's status to closed
                        $taskObj = new Customer_Model_DbTable_TasksModel();
                        $taskObj->changeStatus($post['taskId'], 'closed');
                        echo 'true';
                    }
                echo 'true';
            }
        }   
    } 
}
}

