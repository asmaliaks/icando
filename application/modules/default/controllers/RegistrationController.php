<?php

class RegistrationController extends Zend_Controller_Action{
    
    public function _init(){
        
    }
    
    public function indexAction(){
       //calling form object
        $form = new Form_RegistrationForm();
        // push it to th eview
        $this->view->form = $form;
        // working with form's data
        $request = $this->getRequest();
                
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $birthDay = $request->getParam('day_birth');
                $birthMonth = $request->getParam('month_birth');
                $birthYear = $request->getParam('year_birth');
                $birthDate = $birthDay.'.'.$birthMonth.'.'.$birthYear;
                $birthDate = strtotime($birthDate);
                $passStr = $form->getValue('pass');
                $pass = base64_encode($passStr);
                $pass = $pass.SALT;
                $data = array(
                    'email' => $form->getValue('email'),
                    'username'  => $form->getValue('username'),
                    'surname' => $form->getValue('surname'),
                    'sex' => $form->getValue('sex'),
                    'phonenumber' => $form->getValue('phonenumber'),
                    'city' => $form->getValue('city'),
                    'pass' => $pass,
                    'birth_date' => $birthDate,
                );
                $usersModel = new Model_DbTable_Users();
                $usersModel->addNewUser($data);
                // makeing authorization
                $authAdapter = $this->getAuthAdapter();
        
                $email = $data['email'];
                $pass = $data['pass'];
                $authAdapter->setIdentity($email)
                    ->setCredential($pass);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
        
                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
            
                    $this->_redirect('index/index');
                }
                
            }else{
                $this->view->form = $form;
            }
        }
    }
    
    private function getAuthAdapter(){
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('pass');
        return $authAdapter;
    }
}
