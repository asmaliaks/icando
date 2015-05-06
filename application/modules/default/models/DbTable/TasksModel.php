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
    

    
    public function getTasksForClosing(){
        $currentTime = time();
        $time = $currentTime-172800;
        $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->where('status=?', 'taken')
                ->where('final_date<?', $time);
//                ->joinLeft(array('fb_cust' => 'feedback'),
//                        't.customer_id = fb_cust.user_from',
//                        array(
//                            'fb_cust.kind as fb_cust_kind',
//                        ))
//                ->joinLeft(array('fb_perf'=>'feedback'),
//                        't.performer_id = fb_perf.user_from',
//                        array(
//                         'fb_perf.kind as fb_perf_kind'   
//                        ))
//                ->setIntegrityCheck(false);
                $result = $this->fetchAll($select);
                if($result){
                    return $result->toArray();
                }else{
                    return false;
                }
    }
    
    public function getLastTasks($amount = 20){
      $select = $this->select()
                ->from(array('t'=>'tasks'))
                ->order(array('created_at DESC'))
                ->where('status=?', 'closed')
              ->limit($amount)
              ->joinLeft(array('cat'=>'categories'),
                       't.category_id = cat.id',
                       array(
                           'cat.title as cat_title',
                           'cat.description as cat_description',
                           'cat.image as cat_image',
                           'cat.parent_id as cat_parent_id'
                       ))
               ->joinLeft(array('par_cat'=>'categories'),
                       'cat.parent_id = par_cat.id',
                       array(
                           'par_cat.title as par_cat_title',
                           'par_cat.description as par_cat_description',
                           'par_cat.image as par_cat_image',
                       ))
              ->setIntegrityCheck(false);
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
                                'u.surname as u_surname',
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
 
