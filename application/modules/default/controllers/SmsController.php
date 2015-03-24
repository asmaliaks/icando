<?php

class SmsController extends Zend_Controller_Action{
    
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    

    
    public function phoneActivateAction(){
        $this->view->title = 'Верификация';  
        $this->view->headTitle('Верификация', 'APPEND');
    }
    
    public function phoneVerifyAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $smsCode = $this->makeSmsCode();
            $phonenumber = (int)$request->getParam('phoneNumber');
            $userId = $request->getParam('userId');
            // insert code in the database
            $phoneVerifObj = new Default_Model_DbTable_PhoneVerification();
            $smsData = array(
                'code' => $smsCode,
                'phone_number' => $phonenumber,
                'user_id' => $userId,
                'created' => time(),
            );//print_r($smsData);exit;
            // check if user has code, if yes -> rewrite the code

            
            
            $smsObj = new Default_Model_SmsModel();
            $smsText = 'Код верификации : '.$smsCode;
            $smsText = urlencode($smsText);
            $smsStatus = $smsObj->sendSmsAction($smsData['phone_number'], $smsText, $this->user->email);
            if($smsStatus >0){
                if($phoneVerifObj->checkIfUserHasCode($userId)){
                    $phoneVerifObj->rewriteUsersCode($userId, $phonenumber, $smsCode);
                }else{
                    $phoneVerifObj->addCode($smsData);
                    print_r('true');exit;
                }
            }else {
                print_r($smsStatus);exit;
            }
            
        }
    }
    
    private function makeSmsCode(){
    	$s = substr(str_shuffle(str_repeat("0123456789", 15)), 0, 6);
        $recoveryObj = new Default_Model_DbTable_PasswordRecovery();
        $hashExists = $recoveryObj->checkHash($s);
    	if(!$hashExists){
            return $s;
        }else{
            $this->makeHash();
        }
    }    
}

