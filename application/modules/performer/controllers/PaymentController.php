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
        $this->view->title = 'Пополнение баланса';  
        $this->view->headTitle('Пополнение баланса', 'APPEND');
       // $usersObj = new 
        
        $webPayObj = new Default_Model_WebPay();
        $orderNum = $webPayObj->makeId();
        
        $this->view->wsb_order_num = "ORDER-".$orderNum;
        $this->view->wsb_storied = WSB_STORIED;
        $this->view->wsb_store = WSB_STORE;
        $this->view->wsb_seed = time();
        $this->view->wsb_signature = $this->makeSignature($orderNum);
        $this->view->wsb_return_url = WSB_RETURN_URL;
        $this->view->wsb_cancel_return_url = WSB_CANCEL_RETURN_URL;
    }
    public function successAction(){
        
    }
    public function unsuccessAction(){
        
    }
    public function notifyAction(){
        
    }
    
    protected function makeSignature($orderNum){
        $webPayObj = new Default_Model_WebPay();
        
        $wsb_seed = time();
        $wsb_storeid = WSB_STORIED;
        $wsb_order_num = "ORDER-".$orderNum;
        $wsb_test = 1;
        $wsb_currency_id = "BYR";
        $wsb_total = 21950;
        $SecretKey = WSB_SECRET_KEY;
        //Значение объединенной строки: 124264917411111111ORDER-123456781BYR2195012345678901234567890
        // для версии протокола 2 (wsb_version = 2)
        $wsb_signature = sha1($wsb_seed.$wsb_storeid.$wsb_order_num.$wsb_test.$wsb_currency_id.$wsb_total.$SecretKey); // 7a0142975bc660d219b793c650346af7ffce2473

        return $wsb_signature;

    }
}

