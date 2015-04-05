<?php
class Admin_Model_DbTable_SafetyModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'safety';
    
    public function editSafety($data){       
        $this->update($data);        
    }
    
    public function getSafety(){
        $safety = $this->fetchRow($this->select());
        $safety = $safety->toArray();
        return $safety;
    }
}