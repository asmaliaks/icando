<?php
class Default_Model_DbTable_BecomePerformerModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'become_performer';
    

    public function editPage($data){       
        $this->update($data);        
    }
    
    public function getPage(){
        $content = $this->fetchRow($this->select());
        $content = $content->toArray();
        return $content;
    }
}