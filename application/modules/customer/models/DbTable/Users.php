<?php
class Model_DbTable_Users extends Zend_Db_Table_Abstract{
    protected $_name = 'users';
    
    
    public function addNewUser($data){
        $this->insert($data);
        return true;
    }
    
    public function editUser($data, $userId){
        $where = $this->getAdapter()->quoteInto('id = ?', $userId);
        $this->update($data, $where);
    }
}
