<?php

class Admin_Model_DbTable_PerformerApplication extends Zend_Db_Table_Abstract{
    protected $_name = 'performer_application';
    
    public function getAppList(){
        $select = $this->select()
         ->from(array('p' => 'performer_application'))
         ->join(array('u' => 'users'),
                'p.customer_id = u.id',
                 array('u.username as username', 'u.surname as surname', 'u.sex as sex',
                     'u.phonenumber as phonenumber', 'u.city as city', 'u.banned as banned', 
                     'u.birth_date as birth_date'))->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function removeApp($id){
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
    }
}

