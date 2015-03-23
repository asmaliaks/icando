<?php

class Performer_Model_DbTable_TasksModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'tasks';
    
    public function addTask($data){
       $id = $this->insert($data);
       return $id;
    }
    
    public function getPerformersTasks($id){
        $result = $this->fetchAll($this->select()->where('performer_id = ?', $id));
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
    
    public function removeNonTkenTasks(){
        $currentDate = time();
        $where = $this->getAdapter()->quoteInto('expiry_date < ?', $currentDate);
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
    public function getTaskById($taskId){
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('t.id=?', $taskId)
                ->joinLeft(array('u'=>'users'),
                        't.customer_id = u.id',
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
    
    public function getTasksForPerformer($performerId, $catArray){
        $select = $this->select()
         ->from(array('t' => 'tasks'))
                ->where('t.status=?', 'non_taken')
                ->where('t.customer_id NOT LIKE ?', $performerId);
//        $select->where('t.category_id = 17 OR t.category_id = 18');
                     
        $n=0;
        foreach($catArray as $cat){
            if($n == 0){
               $catStr = 't.category_id = '.$cat['category_id'].' '; 
            }else{
                $catStr = $catStr.'OR t.category_id = '.$cat['category_id'].' ';  
            }
            $n++;
        }
        $select->where($catStr); 
        $select->join(array('u' => 'users'),
                't.customer_id = u.id',
                 array('u.username as c_username', 'u.surname as c_surname'));


 
        $select->setIntegrityCheck(false);        
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
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
 


