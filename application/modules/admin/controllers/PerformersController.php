<?php

class Admin_PerformersController extends Zend_Controller_Action{
    
    public function init(){
        
    }
    
    public function indexAction(){
        // call users model
        $usersObj = new Admin_Model_DbTable_Users();
        // get perfomers list
        $performers = $usersObj->getPerformers();
                // sending perfomers to the view
        if($performers){
            $this->view->performers = $performers;
        }
        
        
    }
    
    public function viewAction(){
        
        // getting id from url
        $request = $this->getRequest();
        $id = $request->getParam('id');
        // call users model
        $usersObj = new Admin_Model_DbTable_Users();
        // get user's tasks
        $tasksObj = new Admin_Model_DbTable_Tasks();
        $tasks = $tasksObj->getPerformersTasks($id);
        $user = $usersObj->getUserById($id);
        // get user's categories
        $userCatObj = new Customer_Model_DbTable_UserCategory();
        $usersCategories = $userCatObj->getUsersCategories($id);
        // get payments list
        $paymentsObj = new Admin_Model_DbTable_Payments();
        $payments = $paymentsObj->getUsersPayments($user['id']);

        // age countin
        $currentTime = time();
        $unixAge = $currentTime-$user['birth_date'];
        $realAge = $unixAge/31556926;
        $realAge = floor($realAge);
        
        $birthDate = date('d.m.Y',$user['birth_date']);
        
        //$taskObj = new Admin_Model_DbTable_TasksModel();
        $customersTasks = $tasksObj->getCustomersTasks($id);    
        $performesTasks = $tasksObj->getPerformersTasks($id);    
   
        $closedCustomersTasks = $tasksObj->getCustomersTasksClosed($id);
        $closedPeformersTasks = $tasksObj->getPerformersTasksClosed($id);
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        
        if($closedCustomersTasks){
            $customersRating = $feedbackObj->countCustomersRating($id);
            $this->view->customersRating = floor($customersRating);
         }
         if($closedPeformersTasks){
             $performersRating = $feedbackObj->countPerformersRating($id);
             
             $this->view->performersRating = floor($performersRating);
         }
    // get performer's feedbacks

         $feedbacks = $feedbackObj->getUsersFeedbacks($id);

        $this->view->feedbacks = $feedbacks;   
        $this->view->customersTasks = $customersTasks;          
        $this->view->payments = $payments;
        $this->view->performersTasks = $performesTasks;
        $this->view->birthDate = $birthDate;
        $this->view->age = $realAge;
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

