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
        $request = $this->getRequest();
        $categoryId = $request->getParam('categoryId');
        $performersObj = new Default_Model_Performers();
        $categoryObj = new Performer_Model_DbTable_Categories();
        $mainCategories = $categoryObj->getCategoryList();
        if(!$categoryId || $categoryId == 0){
            $performesList = $performersObj->listPerformers();
        }else{
            $performesList = $performersObj->listPerformers($categoryId);
            $this->view ->ctegoryId = $categoryId;
        }
        // get parent cats
            //   pagination    
        $performers = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($performesList));
        $performers->setItemCountPerPage(12)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
        if($this->user){
            $this->view->user = $this->user;
        }
        $this->view->categories = $mainCategories;
        $this->view->performers = $performers;
    }
    
    public function performerViewAction(){
        $request = $this->getRequest();
        $performerId = $request->getParam('id');
        $usersObj = new Model_DbTable_Users();
        $performer = $usersObj->getUserById($performerId);
        // count closed users tasks
        $tasksObj = new Customer_Model_DbTable_TasksModel();
        $closedTasks = $tasksObj->getPerformersTasksClosed($performerId);
        // get customer's tasks
        $tasksObjPer = new Performer_Model_DbTable_TasksModel();
        $customersTasks = $tasksObjPer->getCustomersTasks($performerId);
        // get user's categories
        $userCatObj = new Customer_Model_DbTable_UserCategory();
        $usersCategories = $userCatObj->getUsersCategories($performerId);
        // get all  feedback left for user
        $feedbackObj = new Default_Model_Feedback();
        $performersFeedbackList = $feedbackObj->getPerformersFeedbacks($performerId);
        
                    //   pagination    
        $feedbacks = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($performersFeedbackList));
        $feedbacks->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
        if($closedTasks){
            // get user's rating
            $feedbackObj = new Customer_Model_DbTable_FeedbackModel();
            $rating = $feedbackObj->countPerformersRating($performerId);
            $mainRating = $feedbackObj->countPerformersMarks($performerId);
            // count positive feedbacks
            $positiveAmount = $feedbackObj->positiveAmount($performerId);
            $negativeAmount = $feedbackObj->negativeAmount($performerId);
            
            $this->view->negativeAmount = $negativeAmount;
            $this->view->positiveAmount = $positiveAmount;
            $this->view->mainRating = $mainRating;
            $this->view->rating = floor($rating);
            $this->view->closedTasks = $closedTasks;
        }
        if($customersTasks){
            $this->view->customersTasks = $customersTasks;
        }
        
        $this->view->feedbacks = $feedbacks;
        $this->view->usersCategories = $usersCategories;
        $this->view->performer = $performer;
        $this->view->currentUserId = $performerId;
    }
    
    public function requestToBePerformerAction(){
        
        $id = $this->user->id;
        $request = $this->getRequest();
        if($request->isPost()){
            // calling user-application model
            $applicationObj = new Customer_Model_DbTable_PerformerApplication();
            // making application
            $applicationObj->makeApplication($id);
            
            // edit user
            $usersObj = new Performer_Model_DbTable_Users();
//            $about = array('about'=> $request->getParam('about'));
//            $usersObj->editUser($about, $id);
            
            // sending email to admin
            $smtpObj = new Default_Model_Smtp();
            $message = "Пользователь ".$this->user->username." ".$this->user->username." подал"
                    . " заявку \"стать исполнителем\".";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send(ADMIN_MAIL, 'Заявка на изменение статуса', $message, $headers);
            // sending mail to the customer
            $smtpObj = new Default_Model_Smtp();
            $message = "Ваша заявка в ближайшее время рассмотрится администратором";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@helpyou.by';
            $smtpObj->send($this->user->email, 'Заявка на изменение статуса', $message, $headers);
            echo 'true';
        }
    }
}

