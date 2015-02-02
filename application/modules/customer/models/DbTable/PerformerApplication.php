<?php

class Customer_Model_DbTable_PerformerApplication extends Zend_Db_Table_Abstract{
    protected $_name = 'performer_application';
    
    public function makeApplication($userId){
        $data = array('customer_id' => $userId,
            );
        $this->insert($data);
        return true;
    }
    public function getAppByUserId($id){
        $row = $this->fetchRow($this->select()->where('customer_id = ?', $id));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    
}    

