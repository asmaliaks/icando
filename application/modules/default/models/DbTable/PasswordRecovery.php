<?php

class Default_Model_DbTable_PasswordRecovery extends Zend_Db_Table_Abstract
{
   protected $_name = 'password_recovery'; 
    
   
   public function addHash($data){
   
       $email = $this->checkEmail($data['user_email']);
       if($email){
          $where = $this->getAdapter()->quoteInto('user_email = ?', $email);
          $this->delete($where); 
       }
       $this->insert($data);
       return true;
   }
   
   public function checkHash($hash){
        $row = $this->fetchRow($this->select()->where('hash = ?', $hash));
        if ($row) {
            return $row->toArray();
        }else{
            return false;
        }  
   }
   public function getByHash($hash){
       $row = $this->fetchRow($this->select()->where('hash = ?', $hash));
        if ($row) {
            $result = $row->toArray();
            return $result['user_email'];
        }else{
            return false;
        }
   }
   
   public function removeHash($hash){
$where = $this->getAdapter()->quoteInto('hash = ?', $hash);
        $this->delete($where);  
        return true;
   }
   
   private function checkEmail($email){
       $row = $this->fetchRow($this->select()->where('user_email = ?', $email));
        if ($row) {
            $row = $row->toArray();
            return $row['user_email'];
        }else{
            return false;
        }
   }
}