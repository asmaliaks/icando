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
        $tasksObj = new Admin_Model_DbTable_Tasks();
        $tasks = $tasksObj->getCustomersTasks($id);
        $user = $usersObj->getUserById($id);
        // age counting
        
        $currentTime = time();
        $unixAge = $currentTime-$user['birth_date'];
        $realAge = $unixAge/31556926;
        $realAge = floor($realAge);
        
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        
        if($closedCustomersTasks){
            $customersRating = $feedbackObj->countCustomersRating($id);
            $this->view->customersRating = floor($customersRating);
         }
        
        $birthDate = date('d.m.Y',$user['birth_date']);
        // send $user to the view
        $this->view->tasks = $tasks;
        $this->view->birthDate = $birthDate;
        $this->view->age = $realAge;
        // send $user to the view
        $this->view->user = $user; 
    }
    public function bannAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $date = $request->getParam('date');
           $date = strtotime($date);
           $data = array(
               'id' => $id,
               'date'=> $date,
           );
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->bannUser($data);
           if($result){
               echo 'true';exit;
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
               echo 'true';exit;
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

