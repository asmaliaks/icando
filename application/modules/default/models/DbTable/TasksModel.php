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
    public function getLastTasks($amount = 20){
      $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->order(array('created_at DESC'))
                ->where('status=?', 'closed')
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
    

    
    public function getPerformersTasks($customerId){
        $row = $this->fetchAll($this->select()->where('performer_id = ?', $customerId));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }    
    
    public function getTasksYoungerThanHour(){
        $currentDate = time();
        $curTimeMinusHour = $currentDate - 3600;
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('status=?', 'non_taken')
                ->where('created_at > ?', $curTimeMinusHour)
                ->joinLeft(array('u' => 'users'),
                    't.customer_id = u.id',
                            array(
                                'u.id as u_id',
                                'u.username as u_username',
                                'u.email as u_email'))
                ->joinLeft(array('cat' => 'categories'),
                        't.category_id = cat.id',
                        array(
                            'cat.id as cat_id',
                            'cat.title as cat_title',
                            'cat.parent_id as cat_parent_id',
                            'cat.image as cat_image'
                        ))
                ->setIntegrityCheck(false);
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
 
