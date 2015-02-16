<?php

class RegistrationController extends Zend_Controller_Action{
    
    public function _init(){
        
    }
    
    public function indexAction(){


        // working with form's data
        $request = $this->getRequest();
                
        if($request->isPost()){

            if($request->getParam('username') == ''){
                print_r('username empty');exit;
            }else if($request->getParam('surname') == ''){
                print_r('surname empty');exit;
            }else if($request->getParam('sex') == ''){
                print_r('sex empty');exit;
            }else if($request->getParam('phonenumber') == ''){
                print_r('phone empty');exit;
            }else if($request->getParam('city') == ''){
                print_r('city empty');exit;
            }else if($request->getParam('birthday') == ''){
                print_r('birthday empty');exit;
            }
            $email = $request->getParam('email');
            // check if mail exists
            $usersModel = new Model_DbTable_Users();
            if($usersModel->checkMail($email)){
               print_r('mail taken');exit;
            }
            $validator = new Zend_Validate_EmailAddress();
            if (!$validator->isValid($email)) {
                print_r('invalid mail');exit;
            }
            $birthDate = $request->getParam('birthday');
            $birthDate = strtotime($birthDate);
            $passStr = $request->getParam('pass');
            $pass = base64_encode($passStr);
            $pass = $pass.SALT;
            $data = array(
                'email' => $email,
                'username'  => $request->getParam('username'),
                'surname' => $request->getParam('surname'),
                'sex' => $request->getParam('sex'),
                'phonenumber' => $request->getParam('phonenumber'),
                'city' => $request->getParam('city'),
                'pass' => $pass,
                'birth_date' => $birthDate,
            );

            $usersModel->addNewUser($data);
                // makeing authorization
                $authAdapter = $this->getAuthAdapter();
        
                $email = $data['email'];
                $pass = $data['pass'];
                $authAdapter->setIdentity($email)
                    ->setCredential($pass);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
              
                $mailObj = new Default_Model_Smtp();
                $message = "Уважаемый ".$data['username']." Вы зарегестрировались на нашем сайте. "
                        ."Используйте свой email в качестве логина";
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@icando.by';
                $mailObj->send($data['email'], 'Регистрация', $message, $headers);
                if($result->isValid()){
                    
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
            
                    print_r('true');exit;
                }

        }
    }
    
    public function forgotPassAction(){
        
    }
    
    public function checkEmailAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $email = $request->getParam('email');
            $usersObj = new Admin_Model_DbTable_Users();
            $user = $usersObj->getUserByEmail($email);
            if($user){
                echo 'true';
            }else{
                echo 'false';exit;
            }
        }
    }
    
    public function sendPassEmailAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $email = $request->getParam('email');
            
            // get user by email
            $usersObj = new Admin_Model_DbTable_Users();
            $user = $usersObj->getUserByEmail($email);

            // make a hash
            $hash = $this->makeHash();
            // add in data base
            $recoveryObj = new Default_Model_DbTable_PasswordRecovery();
            $data = array(
                'user_email' => $email,
                'hash' => $hash,
            );
            
            $recoveryObj->addHash($data);
            
            $smtpObj = new Default_Model_Smtp();
            $message = "Уважаемый ".$user['username']." ".$user['surname'].", для восстановления пароля пожалуйста "
                    . "перейдите по этой ссылке http://".$_SERVER['SERVER_NAME']."/registration/hash/hash/".$hash." . Если вы не отправляли заявку на восстановление пароля, "
                    . "то просто проигнорируйте данное письмо.";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send($data['email'], 'Восстановление пароля', $message, $headers);
            echo 'true';exit;
        }
    }
    
    public function hashAction(){
        $request = $this->getRequest();
        $hash = $request->getParam('hash');
        
        $recoveryObj = new Default_Model_DbTable_PasswordRecovery();
        
        $hashExists = $recoveryObj->checkHash($hash);
        if(!$hashExists){
            $this->view->error = 'Попробуйте пройти восстановление пароля еще раз.';
        }else{
            $this->view->hash = $hash;
        }
    }
    
    public function passChangeAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $pass = $request->getParam('pass');
            $hash = $request->getParam('hash');
            $passRecoveryObj = new Default_Model_DbTable_PasswordRecovery();
            $userEmail = $passRecoveryObj->getByHash($hash);
            $usersObj = new Admin_Model_DbTable_Users();
            $salt = SALT;
            $pass = base64_encode($pass);
            $pass = $pass.SALT;
            $usersObj->changePass($userEmail, $pass);
            // remove the hash
            $passRecoveryObj->removeHash($hash);
            // makeing authorization
                $authAdapter = $this->getAuthAdapter();
        
                $authAdapter->setIdentity($userEmail)
                    ->setCredential($pass);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
            if($result->isValid()){
                    
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
            
                    $this->_redirect('/');
                }
        }
    }
    
    private function makeHash(){
	$quan1 = substr(str_shuffle(str_repeat("123", 15)), 0, 1);
    	$quan2 = substr(str_shuffle(str_repeat("123456780", 15)), 0, 1);
    	$quan = $quan1."". $quan2;
    	$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 15)), 0, $quan);
        $recoveryObj = new Default_Model_DbTable_PasswordRecovery();
        $hashExists = $recoveryObj->checkHash($s);
    	if(!$hashExists){
            return $s;
        }else{
            $this->makeHash();
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
