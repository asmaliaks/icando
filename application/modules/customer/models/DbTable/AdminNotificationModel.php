<?php

class Customer_Model_DbTable_AdminNotificationModel extends Zend_Db_Table_Abstract{
  
    protected $_name = 'admin_notification';
    
    public function addNotification($taskId, $userId, $subject){

            $data = array(
                'task_id'=>$taskId,
                'subject'=>$subject,
                'user_from' => $userId,
                'created'=> time(),
            );
            $this->insert($data);
            return true;

    }

    
    private function checkIfNotificationExisits($taskId){
        $row = $this->fetchRow($this->select()->where('task_id=?', $taskId));
        if($row){
            return true;
        }else{
            return false;
        }
    }
}

