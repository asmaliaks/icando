<?php

class Customer_SafetyController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
public function indexAction(){
    $aboutObj = new Default_Model_DbTable_SafetyModel();
    $safety = $aboutObj->getSafety();
    $this->view->safety = $safety;
}
    
    
}