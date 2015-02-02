<?php

class AuthenticationController extends Zend_Controller_Action
{

    
    public function init(){
         
    }
    public function indexAction(){
        
    }
    public function logInAction(){

           
        $request = $this->getRequest();
        $form = new Form_LoginForm();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $authAdapter = $this->getAuthAdapter();
        
                $username = $form->getValue('username');
                $pass = $form->getValue('pass');
                $passHashed = base64_encode($pass);
                $passHashed = $passHashed.SALT;
                $authAdapter->setIdentity($username)
                    ->setCredential($passHashed);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
        
                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    // redirect user according to his role
                    if($identity->role == 'admin'){
                        $this->_redirect('admin/index');
                    }else if($identity->role == 'customer'){
                        $this->_redirect('customer/index');
                    }else if($identity->role == 'performer'){
                        $this->_redirect('performer/index');
                    }
                    
                    
                }else{
                  $this->view->errorMsg = 'Неправильный логин и/или пароль.';
        }
            }
        }
// form 
        
        $this->view->form = $form;
        
        
        
    }
    public function logOutAction(){

        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('index/index');
    }
    private function getAuthAdapter(){
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('pass');
        return $authAdapter;
    }
}
