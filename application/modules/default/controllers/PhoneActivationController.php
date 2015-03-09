<?php


class PhoneActivationController extends Zend_Controller_Action{
    
    public function _init(){
        
    }
    
    public function activateAccountAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $params = $request->getParams();
            // check code
            $phoneVerifObj = new Default_Model_DbTable_PhoneVerification();
            $checkPhone = $phoneVerifObj->checkPhone($params['phone']);
            $checkCode = $phoneVerifObj->checkCode($params['code']);
            if(!$checkPhone || !$checkCode){
                if(!$checkPhone){
                    $phoneForJson = array('phone' => 'false'); 
                }else{
                    $phoneForJson = array('phone' => '1'); 
                }
                if(!$checkCode){
                    $codeForJson = array('code'=>'false');
                }else{
                    $codeForJson = array('code'=>'1');
                }
            }else if($checkPhone && $checkCode){
                $user = $phoneVerifObj->getUserIdByCodeAndPhone($params['code'], $params['phone']);
                $codeForJson = array('code'=>'1');
                $phoneForJson = array('phone' => '1'); 
                if($user){
                    $userForJson = array('user_id'=> $user['user_id']);
                }
            }
            if(!$user){
                    $userForJson = array('user_id'=> '0');
            }
            $arrayForJson = array_merge($codeForJson,$phoneForJson, $userForJson);
            $jsonStr = json_encode($arrayForJson);
            print_r($jsonStr);exit;
        }
    }
    
}

