<?php

class Default_Model_DbTable_TasksModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'tasks';
    
    public function addTask($data){
        $this->insert($data);
    }
    
    public function getCustomersTasks($customerId){
        $row = $this->fetchAll($this->select()->where('customer_id = ?', $customerId));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    public function getLastTasks($amount){
      $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->order(array('created_at DESC'))
                ->where('status=?', 'non_taken')
               ->limit($amount);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    public function removeTask($taskId){
        $where = $this->getAdapter()->quoteInto('id = ?', $taskId);
        $this->delete($where);
        return true;
    }
    
    public function getTaskById($taskId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.id=?', $taskId);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function acceptPreposition($performerId, $taskId){
        $data = array(
            'performer_id'=>$performerId,
            'status'=>'taken',
        );
        $where = $this->getAdapter()->quoteInto('id = ?', $taskId);
        $this->update($data, $where);
    }
    public function changeStatus($taskId, $status){
        $data = array(
            'status'=> $status,
        );
        $where = $this->getAdapter()->quoteInto('id = ?', $taskId);
        $this->update($data, $where);
        return true;
    }
}
 
