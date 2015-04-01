<?php

class Performer_AboutController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
public function indexAction(){
      $this->view->title = 'Как это работает';  
      $this->view->headTitle('Как это работает', 'APPEND');
    
    $aboutObj = new Customer_Model_DbTable_AboutModel();
    $about = $aboutObj->getAbout();
    $this->view->about = $about;
}
    
    
}