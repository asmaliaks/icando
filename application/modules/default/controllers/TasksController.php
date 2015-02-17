<?php

class TasksController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    
    public function indexAction(){
         $this->view->title = 'Задачи';  
      $this->view->headTitle('Задачи', 'APPEND');
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
        $role = $this->user->role;
        switch ($role) {
            case 'admin':
                $this->_redirect('admin');
                break;
            case 'customer': 
                $this->_redirect('customer/office');
                break;
            case 'performer':
                $this->_redirect('performer/user');
                break;
        }
        }  
        
        // get all non-taken tasks
        $tasksPgn = new Default_Model_TaskList();
        $tasks = $tasksPgn->listTask();
        
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($tasks));
        $paginator->setItemCountPerPage(12)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
        $this->view->paginator = $paginator;
    }
}