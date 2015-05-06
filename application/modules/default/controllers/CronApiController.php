<?php
class CronApiController extends Zend_Controller_Action {
    

    public function init(){

    }

    public function newTasksSendMailAction(){
        $usersObj = new Performer_Model_DbTable_UserCategory();
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $newTasks = $tasksObj->getTasksYoungerThanHour();
        foreach($newTasks as $task){
            $userList = $usersObj->getUsersByCategoryId($task['category_id']);
            foreach($userList as $user){
                $message = 'Пользователь '.$task['u_username'].' '.mb_substr($task['u_surname'], 0, 1,'utf-8')
                    . 'создал задачу <a href="http://helpyou.by/performer/task/view/id/'.$task['id'].'"> '.$task['title'].'</a> ';
                $message = 'Здравствуйте, в категории '
                        . ' '.$task['cat_title'].' было создано новое  задание <a href="http://helpyou.by/performer/task/view/id/'.$task['id'].'"> '.$task['title'].'</a>, Вы можете просмотреть его в списке Актуальных заданий';
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@helpyou.by';
                $smtpObj = new Default_Model_Smtp();
                $smtpObj->send($user['u_email'], 'Создана задача', $message, $headers);
               
            }
        }
    }
    
    public function unbannAction(){
        $usersObj = new Admin_Model_DbTable_Users();
        $usersObj->unbannUsers();
    }
    
    public function removeNonTakenTasksAction(){
        $tasksObj = new Performer_Model_DbTable_TasksModel();   
        $tasksObj->removeNonTakenTasks();
    }
    
    public function makeTasksClosedAction(){
        $balanceReserveObj  = new Default_Model_DbTable_BalanceReserve();
        // get taken tasks
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $feedbackObj = new Customer_Model_DbTable_FeedbackModel();
        $usersObj = new Admin_Model_DbTable_Users();
        
        $tasks = $tasksObj->getTasksForClosing();
        foreach($tasks as $task){
            // check if feedback from customer exists
            $customersFeedback = $feedbackObj->getTasksFeedbackByCustomer($task['id'], $task['customer_id']);
            if(!$customersFeedback || $customersFeedback['kind']=='positive'){
                $performersFeedback = $feedbackObj->getPerformersFeedbacks($task['id'], $task['performer_id']);
                if(!$performersFeedback || $performersFeedback['kind'] == 'positive' || $performersFeedback['kind'] == 'negative'){
                    //  get ballance from performer
                    $usersObj->getBalanceSmaller($task['performer_id'], $task['customers_price']);
                    // remove balance reserve
                    $balanceReserveObj->removeReserve($task['id'],$task['performer_id']);
                    // change task's status to closed 
                    $tasksObj->changeStatus($task['id'], 'closed');
                }
            }
            
        }
    }
}