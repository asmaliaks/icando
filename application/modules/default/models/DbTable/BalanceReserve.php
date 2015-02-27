<?php

class Default_Model_DbTable_BalanceReserve extends Zend_Db_Table_Abstract{
  
    protected $_name = 'balance_reserve';
 
    public function blockBalance($data){
        $this->insert($data);
    }
    
    
}    

