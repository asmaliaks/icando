<?php

class TermsController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
public function indexAction(){
      $this->view->title = 'Условия';  
      $this->view->headTitle('Условия', 'APPEND');
}
    
    
}