<?php

class Admin_Model_DbTable_Tasks extends Zend_Db_Table_Abstract{
    protected $_name = 'tasks';

    public function getTasksList(){
        $select = $this->select()
         ->from(array('t' => 'tasks'))
         ->where('t.status=?','taken')      
         ->orWhere('t.status=?','non_taken')   
                ->joinLeft(array('cust' => 'users'),
                't.customer_id = cust.id',
                        array(
                            'cust.username as cust_username',
                            'cust.surname as cust_surname',
                            'cust.image as cust_image'))
                ->joinLeft(array('per' => 'users'),
                't.performer_id = per.id',
                        array(
                            'per.username as per_username',
                            'per.surname as per_surname',
                            'per.image as per_image'))
         ->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function getTaskById($taskId){
        $select = $this->select()
         ->from(array('t' => 'tasks'))
         ->where('t.id=?',$taskId)      
         ->orWhere('t.status=?','non_taken')   
                ->joinLeft(array('cust' => 'users'),
                't.customer_id = cust.id',
                        array(
                            'cust.username as cust_username',
                            'cust.surname as cust_surname',
                            'cust.image as cust_image'))
                ->joinLeft(array('per' => 'users'),
                't.performer_id = per.id',
                        array(
                            'per.username as per_username',
                            'per.surname as per_surname',
                            'per.image as per_image'))
                ->joinLeft(array('fp' => 'feedback'),
                't.id = fp.task_id AND t.performer_id = fp.user_from',
                        array(
                            'fp.created as fp_created',
                            'fp.text as fp_text',
                            'fp.kind as fp_kind',
                            'fp.rating as fp_rating'))
                ->joinLeft(array('fc' => 'feedback'),
                't.id = fc.task_id AND t.customer_id = fc.user_from',
                        array(
                            'fc.created as fc_created',
                            'fc.text as fc_text',
                            'fc.kind as fc_kind',
                            'fc.rating as fc_rating'))
         ->setIntegrityCheck(false);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }  
    }
}    
