<?php

class Customer_AboutController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
public function indexAction(){
    $aboutObj = new Customer_Model_DbTable_AboutModel();
    $about = $aboutObj->getAbout();
    $this->view->about = $about;
}
    
    
}