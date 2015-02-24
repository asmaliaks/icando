<?php

class Default_Model_DbTable_Messages extends Zend_Db_Table_Abstract
{
   protected $_name = 'messages'; 
    
   public function addOne($data){
       $this->insert($data);
       return true;
   }
   
   public function getTasksMessages($taskId ){
        $select = $this->select()
                ->from(array('m'=>'messages'),
                        array('m.id',
                            'm.user_to',
                            'm.user_from',
                            'm.created',
                            'm.text'))
                ->where('m.task_id=?', $taskId)
                ->joinLeft(array('uf' => 'users'),
                'm.user_from = uf.id',
                        array(
                            'uf.username as uf_username',
                            'uf.surname as uf_surname',
                            'uf.image as uf_image'))
                ->order('created ASC')
                ->setIntegrityCheck(false);

        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
   }
   public function countUnreadMessages($taskId, $readerId ){
        $select = $this->select()
                ->from(array('m'=>'messages'),
                        array('m.id'))
                ->where('m.unread=?', 1)
                ->where('m.task_id=?', $taskId)
                ->where('m.user_to=?', $readerId);


        $result = $this->fetchAll($select);
        if($result){
             $result->toArray();
             return count($result);
        }else{
            return false;
        }
   }
   
    public function markMessagesRead($taskId, $readerId){
        $data = array('unread' => 0);
        $where = $this->getAdapter()->quoteInto('task_id =?',$taskId);
        
        $this->update($data, $where.' AND user_to= '.$readerId);
        return true;

    }  
    
    public function getUnreadMessages($taskId, $userToId){
        $select = $this->select()
                ->from(array('m'=>'messages'),
                        array('m.id',
                            'm.user_to',
                            'm.user_from',
                            'm.created',
                            'm.text'))
                ->where('m.task_id=?', $taskId)
                ->where('m.unread=?', 1)
                ->where('m.user_to=?', $userToId)
                ->joinLeft(array('uf' => 'users'),
                'm.user_from = uf.id',
                        array(
                            'uf.username as uf_username',
                            'uf.surname as uf_surname'))
                ->order('created ASC')
                ->setIntegrityCheck(false);

        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
}   

