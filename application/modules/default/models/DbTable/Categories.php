<?php

class Default_Model_DbTable_Categories extends Zend_Db_Table_Abstract{
  
    protected $_name = 'categories';
    
    public function addCategory($title, $image){
        $data = array('title' => $title,
                      'category_image' => $image);
        
        $this->insert($data);
        
    }
    public function getCategoryById($categoryId){
        
        $row = $this->fetchRow($this->select()->where('id = ?', $categoryId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row;
        }        
    }

    
    public function getCategoryList(){
        
        $result = $this->fetchAll($this->select('*'));
        $result->toArray();
        return $result;
              
    }
    public function editCategory($categoryId, $title, $image){
        
     if($image == null){
        $image = $this->getImageById($categoryId); 
        
     }   
        $data = array('title' => $title,
                      'category_image' => $image);
        $where = $this->getAdapter()->quoteInto('id = ?', $categoryId);
        $this->update($data, $where);
    }
    public function removeCategoty($categoryId){
        $where = $this->getAdapter()->quoteInto('id = ?', $categoryId);
        $this->delete($where);        
    }
    
    private function getImageById($categoryId){
        $row = $this->fetchRow($this->select()->where('id = ?', $categoryId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row['category_image'];
        }             
    }
    

    
}
