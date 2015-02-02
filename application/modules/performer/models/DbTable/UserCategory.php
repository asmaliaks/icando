<?php

class Performer_Model_DbTable_UserCategory extends Zend_Db_Table_Abstract{
    protected $_name = 'user_category';
    
    public function addUsersCategory($userId, $categoryId){
        $data = array('user_id' => $userId,
                      'category_id' => $categoryId);
        
        $this->insert($data);
        return true;
    }
    

    
    public function removeUsersCategory($userId, $categoryId){
        $db = $this->getAdapter();
        $where = array();
        $where[] = $db->quoteInto('user_id = ?', $userId);
        $where[] = $db->quoteInto('category_id = ?', $categoryId);
        $db->delete($this->_name, $where);
    }
    
    public function getUsersCategories($userId){
$select = $this->select()
         ->from(array('uc' => 'user_category'))
         ->join(array('c' => 'categories'),
                'uc.category_id = c.id',
                 array( 'c.id as category_id',
                     'c.title as title', 'c.parent_id as parent_id'))->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
}

