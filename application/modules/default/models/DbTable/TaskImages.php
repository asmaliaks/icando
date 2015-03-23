<?php

class Default_Model_DbTable_TaskImages extends Zend_Db_Table_Abstract{
    
    protected $_name = 'task_images';

    public function addImages($data){
        $this->insert($data);
        return true;
    }
    
    public function getTaskImages($taskId){
        $row = $this->fetchAll($this->select('*')->where('task_id=?', $taskId));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
}