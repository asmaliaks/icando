<?php

class Default_Model_CronModel{
    
    public function newTasksSendMailAction(){
        $smtpObj = new Default_Model_Smtp();
        $usersObj = new Performer_Model_DbTable_UserCategory();
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $newTasks = $tasksObj->getTasksYoungerThanHour();
        foreach($newTasks as $task){
            $userList = $usersObj->getUsersByCategoryId($task['category_id']);
            foreach($userList as $user){
                $message = 'Пользователь '.$task['username'].' '
                    . 'создал задачу http://helpyou.by/performer/task/view/id/'.$task['id'].' '.$task['title'].' ';
                $message = 'Здравствуйте, в категории '
                        . ' '.$task['cat_title'].' было создано новое задание, Вы можете просмотреть его в списке Актуальных заданий';
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@helpyou.by';
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
}
