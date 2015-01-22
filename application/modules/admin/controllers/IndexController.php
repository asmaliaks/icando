<?php

class Admin_IndexController extends Zend_Controller_Action{
    
    protected $user;
    
    public function _init(){
        $this->_helper->layout->setLayout('layout_admin');
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    public function indexAction(){
      $this->view->title = 'Админ панель';  
      $this->view->headTitle('Администрирование', 'APPEND');
    }
 
    
}
