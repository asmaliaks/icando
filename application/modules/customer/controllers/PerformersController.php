<?php

class Customer_PerformersController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    public function indexAction(){
        echo 'index';
    }
    
    public function requestToBePerformerAction(){
        
        $id = $this->user->id;
        $request = $this->getRequest();
        if($request->isPost()){
            // calling user-application model
            $applicationObj = new Customer_Model_DbTable_PerformerApplication();
            // making application
            $applicationObj->makeApplication($id);
            
            // sending email to admin
            $smtpObj = new Default_Model_Smtp();
            $message = "Пользователь ".$this->user->username." ".$this->user->username." подал"
                    . " заявку \"стать исполнителем\".";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send(ADMIN_MAIL, 'Заявка на изменение статуса', $message, $headers);
            // sending mail to the customer
            $smtpObj = new Default_Model_Smtp();
            $message = "Ваша заявка в ближайшее время рассмотрится администратором";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send($this->user->email, 'Заявка на изменение статуса', $message, $headers);
            echo 'true';
        }
    }
}

