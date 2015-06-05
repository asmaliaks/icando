<?php

class Performer_PerformersController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
public function indexAction(){
    
}    
    
public function addAction(){
    
}

public function editAction(){
    
}

public function removeAction(){
    
}
}