<?php

class Admin_Model_DbTable_MainBanner extends Zend_Db_Table_Abstract{
    protected $_name = 'main_banner';
    
    public function getSliderList(){
        $select = $this->select();
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function addSlide($data){
        $this->insert($data);
    }
    
    public function removeSlide($id){
        $where = array('id'=>$id);
        $this->delete($where);
        return true;
    }
    
}

