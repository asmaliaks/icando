<?php

class Customer_OfficeController extends Zend_Controller_Action{
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    
    public function indexAction(){
        $this->view->title = 'Личный кабинет';  
        $this->view->headTitle('Личный кабинет', 'APPEND');
        $usersModel = new Model_DbTable_Users();
        $form = new Customer_Form_RegistrationForm();
//        $user = $usersModel->getCustomerById($this->user->id);
        // get customer's tasks
        $tasksObj = new Customer_Model_DbTable_TasksModel();
        $customersTasks = $tasksObj->getCustomersTasks($this->user->id);
        
        $request = $this->getRequest();
             // user data form   
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $birthDay = $request->getParam('day_birth')+1;
                $birthMonth = $request->getParam('month_birth');
                $birthYear = $request->getParam('year_birth');
                $birthDate = $birthDay.'.'.$birthMonth.'.'.$birthYear;
                $birthDate = strtotime($birthDate);
                $passStr = $form->getValue('pass');
                
                $data = array(
                    'email' => $form->getValue('email'),
                    'username'  => $form->getValue('username'),
                    'surname' => $form->getValue('surname'),
                    'sex' => $form->getValue('sex'),
                    'phonenumber' => $form->getValue('phonenumber'),
                    'city' => $form->getValue('city'),
                    'birth_date' => $birthDate,
                );
                $image = $form->getValue('image');
                if($image){
                    $data['image'] = $image;
                }
                if($passStr != ''){
                    $passHash = base64_encode($passStr);
                    $passHash = $passHash.SALT;
                    $data['pass'] = $passHash;
                }
                $usersModel = new Model_DbTable_Users();
                $usersModel->editUser($data, $this->user->id);
                $this->_redirect("/customer/office/index");
            }else{
                $this->view->form = $form;
            }
    }else{
        // if request is not post

        $usersModel = new Model_DbTable_Users();
        $user = $usersModel->getUserById($this->user->id);
        $birthStr = gmdate("d.m.Y", $user['birth_date']);
        $birthAr = explode(".", $birthStr);
        
        $form->getElement('email')->setValue($user['email']);
        $form->getElement('username')->setValue($user['username']);
        $form->getElement('surname')->setValue($user['surname']);
        $form->getElement('year_birth')->setValue($birthAr[2]);
        $form->getElement('month_birth')->setValue($birthAr[1]);
        $form->getElement('day_birth')->setValue($birthAr[0]);
        $form->getElement('sex')->setValue($user['sex']);
        $form->getElement('image')->setValue($user['image']);
        $form->getElement('phonenumber')->setValue($user['phonenumber']);
        $form->getElement('city')->setValue($user['city']);
        $this->view->form = $form;
    }

    $closedTasks = $tasksObj->getCustomersTasksClosed($this->user->id);
    if($closedTasks){
            // get user's rating
            $feedbackObj = new Customer_Model_DbTable_FeedbackModel();
            $rating = $feedbackObj->countCustomersRating($this->user->id);
            $this->view->rating = $rating;
            $this->view->closedTasks = $closedTasks;
        }
    
        $this->view->customersTasks = $customersTasks;
        $this->view->form = $form;
        $this->view->user = $user;
    }
}

