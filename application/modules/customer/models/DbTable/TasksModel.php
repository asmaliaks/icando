<?php

class Customer_Model_DbTable_TasksModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'tasks';
    
    public function addTask($data){
        $id = $this->insert($data);
        return $id;
    }
    
    public function getCustomersTasks($customerId){
        $row = $this->fetchAll($this->select()->where('customer_id = ?', $customerId)->order('created_at DESC'));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    public function getCustomersTasksForOffice($customerId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->order('t.created_at DESC')
                ->where('customer_id='.$customerId.' AND status NOT LIKE ?', 'closed');
        $result= $this->fetchAll($select);
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

 
    public function removeTask($taskId){
        $where = $this->getAdapter()->quoteInto('id = ?', $taskId);
        $this->delete($where);
        return true;
    }
    
    public function getTaskById($taskId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.id=?', $taskId)
                ->joinLeft(array('u'=>'users'),
                        't.performer_id = u.id',
                        array('u.username as u_username',
                              'u.surname as u_surname',
                            'u.email as u_email',
                              'u.id as u_id',
                            'u.sex as u_sex',
                            'u.city as u_city',
                            'u.birth_date as u_birth_date',
                            'u.vk as u_vk',
                            'u.ok as u_ok',
                            'u.fb as u_fb',
                            'u.image as u_image'
                            )
                        )
                ->joinLeft(array('uc'=>'users'),
                        't.customer_id = uc.id',
                        array('uc.username as uc_username',
                              'uc.surname as uc_surname',
                            'uc.email as uc_email',
                              'uc.id as uc_id',
                            'uc.sex as uc_sex',
                            'uc.city as uc_city',
                            'uc.birth_date as uc_birth_date',
                            'uc.vk as uc_vk',
                            'uc.ok as uc_ok',
                            'uc.fb as uc_fb',
                            'uc.image as uc_image'
                            )
                        )
                ->joinLeft(array('c'=>'categories'),
                        't.category_id = c.id',
                        array(
                            'c.id as c_id',
                            'c.title as c_title',
                            'c.description as c_description',
                            'c.parent_id as c_parent_id',
                            'c.image as c_image'
                            )
                        )->setIntegrityCheck(false);
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
 
