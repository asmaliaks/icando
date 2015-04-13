<?php

class Performer_Model_DbTable_PaymentLog extends Zend_Db_Table_Abstract{
  
    protected $_name = 'payment_log';
    
    public function checkIfPaymentExixsts($userId, $orderNum, $transactionId, $signature){
        $select = $this->select()->where('user_id = ?', $userId)
                ->where('order_num = ?', $orderNum)
                ->where('wsb_signature = ?', $signature)
                ->where('transaction_id = ?', $transactionId);
        $row = $this->fetchRow($select);
        if (!$row) {
            return false;
        }else{
            return $row;
        } 
    }
    
    public function logPayment($data){
        $id = $this->insert($data);
        return $id;
    }
    
    public function getLogById($id){
        $select = $this->select()
        ->where('id = ?', $id);
        $row = $this->fetchRow($select);
        return $row;
    }
    
    public function getPaymentByTransactionId($transactionId){
        $select = $this->select()
        ->where('transaction_id = ?', $transactionId);
        $row = $this->fetchRow($select);
        return $row;
    }
}