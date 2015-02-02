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
        
//        $id = $this->user->id;
//        $request = $this->getRequest();
//        if($request->isPost()){
//            // calling user-application model
//            $applicationObj = new Customer_Model_DbTable_PerformerApplication();
//            // making application
//            $applicationObj->makeApplication($id);
//            echo 'true';
//        }
    }
}

