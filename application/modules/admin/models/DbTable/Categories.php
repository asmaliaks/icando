<?php

class Admin_Model_DbTable_Categories extends Zend_Db_Table_Abstract{
  
    protected $_name = 'categories';
    
    public function addCategory($title, $parentId, $image, $description){
        $data = array(
            'title' => $title,
            'parent_id' => $parentId,
            'image' => $image,
            'description' => $description,
            );
        
        $this->insert($data);
        
    }
    public function getList(){
        $select = $this->select('*');
        $result = $this->fetchAll($select);
        return $result->toArray();
    }
    
    public function getCategoryById($categoryId){
        
        $row = $this->fetchRow($this->select()->where('id = ?', $categoryId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        return $row->toArray();
         
        }        
    }
    public function editCategory($id, $title, $parentId, $image, $description){
  
        $data = array('title' => $title,
                      'parent_id' => $parentId,
                      'description' => $description,
                      );
        if($image){
            $data['image'] = $image;
        }
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($data, $where);
        return true;
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
