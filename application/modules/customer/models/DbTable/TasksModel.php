<?php

class Customer_Model_DbTable_TasksModel extends Zend_Db_Table_Abstract{
    
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
    public function getPerformersTasks($customerId){
        $row = $this->fetchAll($this->select()->where('performer_id = ?', $customerId));
        if($row){
            return $row->toArray();
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
    public function getPerformersTasksClosed($performerId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.performer_id=?', $performerId)
                ->where('t.status=?','closed');
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    public function getCustomersTasksClosed($customerId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.customer_id=?', $customerId)
                ->where('t.status=?','closed');
        $result = $this->fetchAll($select);
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
 
