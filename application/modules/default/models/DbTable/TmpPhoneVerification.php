<?php

class Default_Model_DbTable_TmpPhoneVerification extends Zend_Db_Table_Abstract{
    
    protected $_name = 'tmp_phone_verefication';

public function checkPhoneVerified($phone){
    $phone = '375'.$phone;
    $row = $this->fetchRow($this->select()->where('phone = ?', $phone));
        if($row){
           $row = $row->toArray();
           if($row['verified'] == 1){
               return "verified";
           }else if($row['verified'] == 0){
               return "not_verified";
           }
        }else{
            return false;
        }
} 

public function add($data){
    $where = $this->getAdapter()->quoteInto('phone = ?', $data['phone']);
        $this->delete($where);
    $this->insert($data);
}
public function verifyPhone($phone, $code){
    $phone = '375'.$phone;
    //check if phone and code exists
    $row = $this->fetchRow($this->select()->where('phone = ?', $phone)->where('code=?', $code));
    if(!$row){
        return false;
    }else{
        // if YES verify the phone 
        $data = array('verified'=>1);
        $where = $this->getAdapter()->quoteInto('phone =?',$phone);
        $this->update($data, $where.' AND code= '.$code);
        return true;
    }
    
}
}