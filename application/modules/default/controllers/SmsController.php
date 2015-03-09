<?php

class SmsController extends Zend_Controller_Action{
    
    public function _init(){
        
    }
    

    
    public function phoneActivateAction(){
        $this->view->title = 'Верификация';  
        $this->view->headTitle('Верификация', 'APPEND');
    }
    
    public function phoneVerifyAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $smsCode = $this->makeSmsCode();
            $phonenumber = $request->getParam('phoneNumber');
            $userId = $request->getParam('userId');
            // insert code in the database
            $phoneVerifObj = new Default_Model_DbTable_PhoneVerification();
            $smsData = array(
                'code' => $smsCode,
                'phone_number' => '+375'.$phonenumber,
                'user_id' => $userId,
            );
            $phoneVerifObj->addCode($smsData);

            $smsObj = new Default_Model_SmsModel();
            $smsText = 'Код для верификации '.$smsCode;
            $smsObj->sendSmsAction($smsData['phone_number'], $smsText);
            print_r('true');exit;
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

