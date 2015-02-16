<?php

class AuthenticationController extends Zend_Controller_Action
{

    
    public function init(){
         
    }
    public function indexAction(){
        
    }
    public function logInAction(){

           
        $request = $this->getRequest();
        if($request->isPost()){
           
                $authAdapter = $this->getAuthAdapter();
        
                $username = $request->getParam('login');
                $pass = $request->getParam('pass');
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
                        echo 'admin';exit;
                    }else if($identity->role == 'customer'){
                        echo 'customer';exit;
                    }else if($identity->role == 'performer'){
                        echo 'performer';exit;
                    }
      
        }else{
            echo 'false';exit;
        }
        }  
    }
    
    public function sLoginAction($login, $pass){
        
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
