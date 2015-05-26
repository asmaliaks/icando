<?php

class TempPhoneVerifController extends Zend_Controller_Action{
    
//    protected $user;
//    public function init(){
//       $auth = Zend_Auth::getInstance();
//       if($auth->hasIdentity()){
//          $this->user = $auth->getIdentity();
//          
//       } 
//    }
    public function checkPhoneVerifiedAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $phone = $request->getParam('phone');
            $verifModel = new Default_Model_DbTable_TmpPhoneVerification();
            $phoneVerificated = $verifModel->checkPhoneVerified($phone);
            if($phoneVerificated){
                if($phoneVerificated == 'verified'){
                    print_r('verified');exit;
                }else if($phoneVerificated == 'not_verified'){
                    print_r('not_verified');exit;
                }
            }else{
                print_r('false');exit;
            }
        }
    }   
    
    public function makeTmpPhoneAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $phone = $request->getParam('phone');
            $smsCode = $this->makeHash();
            $tmpPhoneVerObj = new Default_Model_DbTable_TmpPhoneVerification();
            $data = array(
                'code'=>$smsCode,
                'phone' => '375'.$phone,
            );
            $tmpPhoneVerObj->add($data);
            // send sms
            $smsObj = new Default_Model_SmsModel();
            $smsText = 'Код верификации : '.$smsCode;
            $smsText = urlencode($smsText);
            $smsStatus = $smsObj->sendSmsAction($data['phone'], $smsText);
            if($smsStatus > 0){
                print_r('true');exit;
            }else{
                print_r('false');false;
            }
        }
    }
 
    public function checkPhoneCodeAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $code = $request->getParam('code');
            $phone = $request->getParam('phone');
            $tmpPhoneObj = new Default_Model_DbTable_TmpPhoneVerification();
            $res = $tmpPhoneObj->verifyPhone($phone, $code);
            if($res){
                print_r('true');exit;
            }else{
                print_r('false');exit;
            }
        }
    }
    

    
    private function makeHash(){
    
    	$quan = 6;
    	$s = substr(str_shuffle(str_repeat("0123456789", 15)), 0, $quan);
    	return $s;
}
    
    }
       
