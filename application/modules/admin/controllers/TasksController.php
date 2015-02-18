<?php
class Admin_TasksController extends Zend_Controller_Action{
    public function init(){
        
    }
    public function indexAction(){
      $this->view->title = 'Задачи';  
      $this->view->headTitle('Задачи', 'APPEND');
        
      $tasksObj = new Admin_Model_DbTable_Tasks();
      $taskList = $tasksObj->getTasksList();
      
      $this->view->taskList = $taskList;
        
    }
    
    public function viewAction(){
      $this->view->title = 'Задачи';  
      $this->view->headTitle('Задачи', 'APPEND');
      
      $request = $this->getRequest();
      $taskId = $request->getParam('id');
      
      $taskObj = new Admin_Model_DbTable_Tasks();
      $task = $taskObj->getTaskById($taskId);
      
      $this->view->task = $task;
    }
    
}
