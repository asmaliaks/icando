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
      // get comments by task_id
      $commentsObj = new Default_Model_Comments();
      $commentList = $commentsObj->getCommentsByTaskId($taskId);
      
        $comments = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($commentList));
        $comments->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page', 1));
    
      $this->view->task = $task;
      $this->view->comments = $comments;
    }
    
}
