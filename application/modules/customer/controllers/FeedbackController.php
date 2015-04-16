<?php

class Customer_FeedbackController extends Zend_Controller_Action{
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
            $feedbackObj = new Customer_Model_DbTable_FeedbackModel();
            $notificationObj = new Customer_Model_DbTable_AdminNotificationModel();
            $post = $request->getPost();
            if($post['kind']=='negative'){
                $data = array(
                    'kind' => 'negative',
                    'user_from' => $this->user->id,
                    'task_id' => $post['taskId'],
                    'user_to' => $post['perfId'],
                    'punctuality'=>0,
                    'quality'=> 0,
                    'politeness'=>0,
                    'text' => $post['feedbackText'],
                    'rating' => 0,
                    'created' => time(),
                );
                $feedbackObj->addFeedback($data);
                // make a notification to ADMIN
                
                $notificationObj->addNotification($post['taskId'], $this->user->id, 'unhappy');
                
                $taskObj = new Customer_Model_DbTable_TasksModel();
                $task = $taskObj->getTaskById($data['task_id']);
                
                $usersObj = new Admin_Model_DbTable_Users();
                $performer = $usersObj->getUserById($post['perfId']);
                $smtpObj = new Default_Model_Smtp();
                $message = "Заказчик ".$this->user->username." ".mb_substr($this->user->surname, 0, 1, 'utf-8')." "
                        . "оставил отрицательный отзыв по задаче ".$task['title']." "
                        . " исполнителю ".$performer['username']." ".$performer['surname'];
                $headers = 'From: no_reply@helpyou.by';
                $smtpObj->send(ADMIN_MAIL, 'Отрицательный отзыв', $message, $headers);
                // make notification fot the performer
                $message = "Заказчик ".$this->user->username." ".mb_substr($this->user->surname, 0, 1, 'utf-8')." "
                        . "оставил отрицательный отзыв по задаче ".$task['title'];
                $smtpObj->send($performer['email'], 'Отрицательный отзыв', $message, $headers);
                echo 'true';
            }else if($post['kind']=='positive'){
                $sum = $post['quality']+$post['punctuality']+$post['politeness'];
                $rating = $sum/3;
                $data = array(
                    'kind' => 'positive',
                    'user_from' => $this->user->id,
                    'task_id' => $post['taskId'],
                    'user_to' => $post['perfId'],
                    'punctuality'=>$post['punctuality'],
                    'quality'=> $post['quality'],
                    'politeness'=>$post['politeness'],
                    'text' => $post['feedbackText'],
                    'rating' => $rating,
                    'created' => time(),
                );
                $feedbackObj->addFeedback($data);
                $notificationObj->addNotification($post['taskId'], $this->user->id, 'satisfied');
                // if both feedbacks are positive change feedback status...
                // check if there is second feedback and and if it's positive
                $performersFeedback = $feedbackObj->checkIfPerformerLeftFeedback($post['taskId'], $post['perfId']);
                $taskObj = new Customer_Model_DbTable_TasksModel();
                $task = $taskObj->getTaskById($data['task_id']);
                
                $usersObj = new Admin_Model_DbTable_Users();
                $performer = $usersObj->getUserById($post['perfId']);
                $smtpObj = new Default_Model_Smtp();
                $message = "Заказчик ".$this->user->username." ".mb_substr($this->user->surname, 0, 1, 'utf-8')." "
                        . "оставил Положительный отзыв по задаче ".$task['title']." "
                        . " исполнителю ".$performer['username']." ".$performer['surname'];
                $headers = 'From: no_reply@helpyou.by';
                $smtpObj->send($performer['email'], 'Положительный отзыв', $message, $headers);
                if($performersFeedback){
                    // if performer left feedback
                    if($performersFeedback == 'positive'){
                        // if feedback is positive change task's status to closed
                        $taskObj = new Customer_Model_DbTable_TasksModel();
                        $taskObj->changeStatus($post['taskId'], 'closed');
                        $message = "Статус задачи ".$task['title']." на \"Закрыта\"";
                        $headers = 'From: no_reply@helpyou.by';
                        $smtpObj->send($performer['email'], 'Статус задачи', $message, $headers);
                        
                        //  get ballance from performer
                        $usersObj->getBalanceSmaller($task['performer_id'], $task['customers_price']);
                        // remove balance reserve
                        $balanceReserveObj  = new Default_Model_DbTable_BalanceReserve();
                        $balanceReserveObj->removeReserve($task['id'],$task['performer_id']);
                        echo 'true';exit;
                    }
                }
                    
                echo 'true';exit;
            }
        }
    } 
}

