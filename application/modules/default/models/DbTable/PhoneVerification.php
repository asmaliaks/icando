<?php

class Default_Model_DbTable_PhoneVerification extends Zend_Db_Table_Abstract{
  
    protected $_name = 'phone_verification';
    
    public function addCode($data){
        if($this->checkIfNumberHasCode($data['phone_number'])){
            $this->rewriteSmsCode('+375'.$data['phone_number']);
        }
        $this->insert($data);
    }
 
    public function rewriteSmsCode($phonenumber){
        $where = $this->getAdapter()->quoteInto('phone_number = ?', $phonenumber);
        $code = $this->makeSmsCode();
         $data = array(
             'code' => $code
         );
         $this->update($data, $where);
    }
    
    public function checkIfNumberHasCode($phonenumber){
         $where = $this->select()->where('phone_number = ?', $phonenumber);
         $row = $this->fetchRow($where);
         if($row == null){
             return false;
         }else{
             return true;
         }
    }
    
    public function checkPhone($phonenumber){
         $where = $this->select()
                 ->where('phone_number = ?', $phonenumber);
         $row = $this->fetchRow($where);
         if($row == null){
             return false;
         }else{
             return true;
         }
    }
    public function checkCode($code){
         $where = $this->select()
                 ->where('code = ?', $code);
         $row = $this->fetchRow($where);
         if($row == null){
             return false;
         }else{
             return true;
         }
    }
    
    public function getUserIdByCodeAndPhone($code, $phone){
         $where = $this->select()
                 ->where('code = ?', $code)
                 ->where('phone_number = ?', $phone);
         $row = $this->fetchRow($where);
         if($row == null){
             return false;
         }else{
             return $row->toArray();
         }
    }
    
    public function removeNumber($userId){
        $where = $this->getAdapter()->quoteInto('user_id = ?', $userId);
        $this->delete($where);
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