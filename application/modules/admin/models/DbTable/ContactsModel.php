<?php
class Admin_Model_DbTable_ContactsModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'contacts';
    
    public function editContacts($data){       
        $this->update($data);        
    }
    
    public function getContacts(){
        $contacts = $this->fetchRow($this->select());
        $contacts = $contacts->toArray();
        return $contacts;
    }    
}
