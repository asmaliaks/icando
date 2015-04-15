<?php
class Performer_Model_DbTable_TaskPrepositionModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'task_preposition';

    public function addPreposition($taskId, $performerId, $price){
        $data = array(
             'task_id' => $taskId,
             'performer_id' => $performerId,
             'performers_price' => $price,
            );
        $this->insert($data);
        return true;
    }
    public function getById($id){
        $select = $this->select()
                ->from(array('tp'=>'task_preposition'))
                ->where('tp.id=?', $id);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    public function ifPerformerSentPrep($performerId, $taskId){
        $select = $this->select()
                ->from(array('tp'=>'task_preposition'))
                ->where('tp.task_id=?', $taskId)
                ->where('tp.performer_id=?', $performerId);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function getTasksPrepositionis($taskId){
        $select = $this->select()
                ->from(array('tp'=>'task_preposition'))
                ->where('tp.task_id=?', $taskId)
                ->join(array('u'=>'users'),
                        'tp.performer_id = u.id',
                        array('u.username as u_username',
                              'u.surname as u_surname',
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
    
    public function getPerformersPrepositions($performerId){
        $select = $this->select()
                ->from(array('tp'=>'task_preposition'))
                
                ->joinLeft(array('t'=>'tasks'),
                        'tp.task_id = t.id',
                        array(
                            't.title as t_title',
                            't.customer_id as t_customer_id',
                            't.id as t_id',
                            't.created_at as t_created_at'
                            )
                        )
                ->joinLeft(array('u'=>'users'),
                        't.customer_id = u.id',
                        array(
                            'u.surname as cust_surname',
                            'u.username as cust_username',
                                )
                        )
                ->where('tp.performer_id=?', $performerId);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        } 
    }
    
    public function takePreposition($taskId){
        $where = $this->getAdapter()->quoteInto('task_id = ?', $taskId);
        $this->delete($where);
        return true;
    }    
    public function removePreposition($id){
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
        return true;
    }    
}