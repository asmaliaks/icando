<?php
class Default_Model_DbTable_AboutModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'about';
    

    public function getAbout(){
        $about = $this->fetchRow($this->select());
        $about = $about->toArray();
        return $about;
    }
}
