<?php

class UserController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
    public function checkEmailForUniqueAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $email = $request->getParam('email');
            $usersObj = new Model_DbTable_Users();
            $mailTaken = $usersObj->checkMail( $email);
            if($mailTaken){
                print_r('taken');exit;
            }else{
                print_r('free');exit;
            }
        }
    }   
       
    
    }
       
