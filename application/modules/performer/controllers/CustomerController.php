<?php
class Performer_CustomerController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
     
    }
    public function viewAction(){
        $this->view->title = 'Заказчик';  
        $this->view->headTitle('Заказчик', 'APPEND');
        // get id from URL
        $request = $this->getRequest();
        $customerId = $request->getParam('id');
        // call customer model
        $customerObj = new Performer_Model_DbTable_Users();
        $customer = $customerObj->getUserById($customerId);
        // get customer's tasks
        $tasksObj = new Performer_Model_DbTable_TasksModel();
        $customersTasks = $tasksObj->getCustomersTasks($customerId);
        // get customer's feedbacks
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        $feedbacks = $feedbackObj->getCustomersFeedbacks($customerId);
        $closedCustomersTasks = $tasksObj->getCustomersTasksClosed($customerId);
        if($closedCustomersTasks){
                $customersRating = $feedbackObj->countCustomersRating($customerId);
                $this->view->customersRating = floor($customersRating);
         }
        // put data to the view
        $this->view->feedbacks = $feedbacks;
        $this->view->tasks = $customersTasks;
        $this->view->user = $customer;
    }     
}    

