<?php

class Customer_IndexController extends Zend_Controller_Action
{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }   
    }
    
    public function indexAction(){
      $this->view->title = 'Главная';  
      $this->view->headTitle('Главная', 'APPEND');

        // get tasks for the list
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $lastTasks = $tasksObj->getLastTasks();
        // get main categories  
        $categoryObj = new Default_Model_DbTable_Categories();
        $mainCats = $categoryObj->getMainCats();

        // get slides for main banner
        $mainBannerObj = new Admin_Model_DbTable_MainBanner();
        $slides = $mainBannerObj->getSliderList();

        $this->view->slides = $slides;
        $this->view->mainCats = $mainCats;
        $this->view->lastTasks = $lastTasks;
    }
    
}    