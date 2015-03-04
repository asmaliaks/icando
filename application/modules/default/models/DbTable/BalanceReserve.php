<?php

class Default_Model_DbTable_BalanceReserve extends Zend_Db_Table_Abstract{
  
    protected $_name = 'balance_reserve';
 
    public function blockBalance($data){
        $this->insert($data);
    }
    
    public function countUsersReserves($userId){
        $result = $this->fetchAll($this->select()->where('user_id = ?', $userId));
        if (!$result) {
            return 0;
        }else{
        //get array for fetching the data
            $result->toArray();
            $n=0;
            foreach($result as $row){
                if($n==0){
                    $amount = $row['amount'];
                }else{
                    $amount = $amount+$row['amount'];
                }
            }
            return $amount;
        } 
    }
    
    public function removeReserve($taskId,$userId){
        $where = $this->getAdapter()->quoteInto('task_id =?',$taskId);
        
        $this->delete($data, $where.' AND user_id= '.$userId);
        return true;
    }
}    

