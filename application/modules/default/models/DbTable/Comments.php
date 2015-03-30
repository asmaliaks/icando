<?php
class Default_Model_DbTable_Comments extends Zend_Db_Table_Abstract{
    protected $_name = 'comments';
    
    public function add($data){
        $id = $this->insert($data);
        return $id;
    }
    
    public function removeComment($id){
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
        
    }
    
    public function getCommentsByTaskId($taskId){
        
    }
    
    public function getChildrenComments($taskId, $parentId){
        
    }
}

