<?php

class Admin_CustomersController extends Zend_Controller_Action{
    
    public function init(){
        
    }
    
    public function indexAction(){
        // call users model
        $usersObj = new Admin_Model_DbTable_Users();
        // get perfomers list
        $customers = $usersObj->getCustomers();
                // sending perfomers to the view
        if($customers){
            $this->view->customers = $customers;
        }
    }
    public function viewAction(){
        // getting id from url
        $request = $this->getRequest();
        $id = $request->getParam('id');
        // call users model
        $usersObj = new Admin_Model_DbTable_Users();
        
        $user = $usersObj->getUserById($id);
        
        // send $user to the view
        $this->view->user = $user; 
    }
    public function bannAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->bannUser($id);
           if($result){
               echo 'true';
           } 
       }         
    }
    public function unbannAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->unbannUser($id);
           if($result){
               echo 'true';
           } 
       }         
    }
    public function removeAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->removeUser($id);
           if($result){
               echo 'true';
           }
           
       }        
    }
}

