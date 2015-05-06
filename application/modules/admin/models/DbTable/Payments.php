<?php

class Admin_Model_DbTable_Payments extends Zend_Db_Table_Abstract{
  
    protected $_name = 'payment_log';

    public function getList(){
        $select = $this->select()
                ->from(array('p' => 'payment_log'))
                ->joinLeft(array('u' => 'users'),
                       'p.user_id = u.id',
                        array(
                            'u.username as u_username',
                            'u.surname as u_surname',
                            'u.id as u_id',
                        ))
                ->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        return $result->toArray();
    }
    public function getUsersPayments($userId){
        $select = $this->select()
                ->from(array('p' => 'payment_log'))
                ->where('p.user_id=?', $userId)
                ->order(array("time DESC"));
        $result = $this->fetchAll($select);
        return $result->toArray();
    }
    
}