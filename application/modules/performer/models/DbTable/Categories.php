<?php

class Performer_Model_DbTable_Categories extends Zend_Db_Table_Abstract{
  
    protected $_name = 'categories';
    
    public function getCategoryList($userId = null){
        if(!$userId){
            $row = $this->fetchAll($this->select('*')->where('parent_id=?', 0));
            return $row->toArray();
        }else{
            $select = $this->select()
                    ->from(array('c'=>'categories'))
                    ->where('uc.user_id=?', $userId)
                    ->join(array('uc'=>'user_category'),
                            'c.id = uc.category_id',
                            array(
                                'c.title as title',
                                'c.parent_id as parent_id',
                                'uc.user_id as user_id',
                            ))->setIntegrityCheck(false);
            $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
        }
    }
    
    public function getCategoryListForSettings($userId){
        
    }
    
    public function getSubCats($parentId, $userId = null){
        if(!$userId){
            $row = $this->fetchAll($this->select('*')->where('parent_id=?', $parentId));
            if($row){
                return $row->toArray();
            }else{
                return false;
            }
        }else{
            $select = $this->select()
                    ->from(array('c'=>'categories'),
                            array('id','title','parent_id'))
                    ->where('c.parent_id=?', $parentId)
                    ->joinLeft(array('uc' => 'user_category'),
                    'c.id = uc.category_id AND uc.user_id='.$userId,
                            array('c.id as id','uc.user_id as user_id'))->setIntegrityCheck(false);

            $result = $this->fetchAll($select);
            if($result){
                return $result->toArray();
            }else{
                return false;
            }
        }
        }
    
    
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
