<?php
class Default_Model_DbTable_TermsModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'terms';
    

    
    public function getTerms(){
        $terms = $this->fetchRow($this->select());
        $terms = $terms->toArray();
        return $terms;
    }    
}