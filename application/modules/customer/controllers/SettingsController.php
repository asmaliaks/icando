<?php

class Customer_SettingsController extends Zend_Controller_Action{
    
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
       }        
    }
    
    public function indexAction(){
        
    }
    
    public function personalDataEditAction(){
        $form = new Customer_Form_RegistrationForm();
        $this->view->form = $form;
        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $birthDay = $request->getParam('day_birth')+1;
                $birthMonth = $request->getParam('month_birth');
                $birthYear = $request->getParam('year_birth');
                $birthDate = $birthDay.'.'.$birthMonth.'.'.$birthYear;
                $birthDate = strtotime($birthDate);
                $passStr = $form->getValue('pass');
                if($passStr != ''){
                    $passHash = base64_encode($passStr);
                    $passHash = $passHash.SALT;
                    $data['pass'] = $passHash;
                }
                $data = array(
                    'email' => $form->getValue('email'),
                    'username'  => $form->getValue('username'),
                    'surname' => $form->getValue('surname'),
                    'sex' => $form->getValue('sex'),
                    'image' => $form->getValue('image'),
                    'phonenumber' => $form->getValue('phonenumber'),
                    'city' => $form->getValue('city'),
                    'birth_date' => $birthDate,
                );
                $usersModel = new Model_DbTable_Users();
                $usersModel->editUser($data, $this->user->id);
                $_SESSION['Zend_Auth']['storage']->city = $data['city']; 
                $_SESSION['Zend_Auth']['storage']->username = $data['username']; 
                $_SESSION['Zend_Auth']['storage']->surname = $data['surname']; 
                $_SESSION['Zend_Auth']['storage']->about = $data['about']; 
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
    }   
    public function socialAction(){
        
    }
}

