<?php

class Default_Model_DbTable_PasswordRecovery extends Zend_Db_Table_Abstract
{
   protected $_name = 'password_recovery'; 
    
   
   public function addHash($data){
   
       $this->insert($data);
       return true;
   }
}