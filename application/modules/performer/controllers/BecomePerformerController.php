<?php

class Performer_BecomePerformerController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
public function indexAction(){
      $this->view->title = 'Как стать исполнителем';  
      $this->view->headTitle('Как стать исполнителем', 'APPEND');

    $becomePerfObj = new Default_Model_DbTable_BecomePerformerModel();
    $content = $becomePerfObj->getPage();
    $this->view->content = $content;
}
    
    
}

