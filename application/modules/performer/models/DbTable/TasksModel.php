<?php

class Performer_Model_DbTable_TasksModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'tasks';
    
    public function addTask($data){
        $this->insert($data);
    }
    
    public function getPerformersTasks($customerId){
        $row = $this->fetchAll($this->select()->where('performer_id = ?', $customerId));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    
    public function getAcceptedTasks($performerId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.performer_id = ?', $performerId)
                ->join(array('u'=>'users'),
                        't.customer_id = u.id',
                        array('u.username as u_username',
                              'u.surname as u_surname',
                              'u.id as u_id',
                            'u.sex as u_sex',
                            'u.city as u_city',
                            'u.birth_date as u_birth_date',
                            'u.vk as u_vk',
                            'u.ok as u_ok',
                            'u.fb as u_fb',
                            'u.image as u_image'
                            )
                        )->setIntegrityCheck(false);
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
    
    public function getCustomersTasks($userId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.customer_id=?',$userId)
                ->join(array('cat'=>'categories'),
                        't.category_id = cat.id',
                        array(
                            'cat.id as cat_id',
                            'cat.title as cat_title',
                            'cat.parent_id as cat_parent_id'
                            )
                        )->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function getTaskById($taskId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.id=?', $taskId)
                ->join(array('u'=>'users'),
                        't.customer_id = u.id',
                        array('u.username as u_username',
                              'u.surname as u_surname',
                              'u.id as u_id',
                            'u.sex as u_sex',
                            'u.city as u_city',
                            'u.birth_date as u_birth_date',
                            'u.vk as u_vk',
                            'u.ok as u_ok',
                            'u.fb as u_fb',
                            'u.image as u_image'
                            )
                        )->setIntegrityCheck(false);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function getTasksForPerformer($performerId, $catArray){
        
        $select = $this->select()
         ->from(array('t' => 'tasks'))
         ->where('t.status=?', 'non_taken')
         ->join(array('u' => 'users'),
                't.customer_id = u.id',
                 array('u.username as c_username', 'u.surname as c_surname'))->setIntegrityCheck(false);
                $n=0;
        foreach($catArray as $cat){
            if($n == 0){
               $select->where('t.category_id=?', $cat['category_id']); 
            }else{
               $select->orWhere('t.category_id=?', $cat['category_id']);  
            }
            $n++;
        }
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }


}
 


