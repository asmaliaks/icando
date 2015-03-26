<?php

class Performer_PaymentController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    
    public function indexAction(){
       // $usersObj = new 
        $webPayObj = new Default_Model_WebPay();
        
        
        $this->view->wsb_order_num = "ORDER-".$webPayObj->makeId();
        $this->view->wsb_storied = WSB_STORIED;
        $this->view->wsb_store = WSB_STORE;
        $this->view->wsb_seed = time();
        $this->view->wsb_return_url = WSB_RETURN_URL;
        $this->view->wsb_cancel_return_url = WSB_CANCEL_RETURN_URL;
    }
    public function successAction(){
        
    }
    public function unsuccessAction(){
        
    }
    public function notifyAction(){
        
    }
}

