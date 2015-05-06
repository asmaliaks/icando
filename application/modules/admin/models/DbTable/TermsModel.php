<?php
class Admin_Model_DbTable_TermsModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'terms';
    
    public function editTerms($data){       
        $this->update($data);        
    }
    
    public function getContacts(){
        $terms = $this->fetchRow($this->select());
        $terms = $terms->toArray();
        return $terms;
    }    
}
