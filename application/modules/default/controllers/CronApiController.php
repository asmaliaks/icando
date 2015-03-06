<?php
class CronApiController extends Zend_Controller_Action {
    

    public function init(){

    }

    public function newTasksSendMailAction(){
        $smtpObj = new Default_Model_Smtp();
        $usersObj = new Performer_Model_DbTable_UserCategory();
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $newTasks = $tasksObj->getTasksYoungerThanHour();
        foreach($newTasks as $task){
            $userList = $usersObj->getUsersByCategoryId($task['category_id']);
            foreach($userList as $user){
                $message = 'Пользователь '.$task['username'].' '
                    . 'создал задачу '.$_SERVER['HTTP_ORIGIN'].'/performer/task/view/id/'.$task['id'].' '.$task['title'].' ';
            
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@icando.by';
                $smtpObj->send($user['u_email'], 'Создана задача', $message, $headers);
               
            }
        }
    }
    
    public function unbannAction(){
        $usersObj = new Admin_Model_DbTable_Users();
        $usersObj->unbannUsers();
    }
}