<?php

class Admin_PaymentController extends Zend_Controller_Action{
    
    public function init(){
        
    }

    public function indexAction(){
      $this->view->title = 'Платежи';  
      $this->view->headTitle('Платежи', 'APPEND');
      
      $paymentsLogObj = new Admin_Model_DbTable_Payments();
      $payments = $paymentsLogObj->getList();
      
      $this->view->payments = $payments;
    }
    
    public function viewAction(){
      $this->view->title = 'Платеж';  
      $this->view->headTitle('Платеж', 'APPEND');
      
      
      
    }
}