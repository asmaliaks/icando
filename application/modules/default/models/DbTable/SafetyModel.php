<?php
class Default_Model_DbTable_SafetyModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'safety';
    

    public function getSafety(){
        $safety = $this->fetchRow($this->select());
        $safety = $safety->toArray();
        return $safety;
    }
}