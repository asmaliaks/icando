<?php
class Performer_Model_DbTable_FeedbackModel extends Zend_Db_Table_Abstract{
    protected $_name = 'feedback';
    
    public function addFeedback($data){

        $this->insert($data);
        return true;
    }
    public function removeFeedback($id){
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
    }
    public function getAllFeedback(){
        $feedback = $this->fetchAll($this->select()->order('date DESC'));
        $feedback->toArray();
        return $feedback;
    }
    
    public function getPerformersFeedbackByTaskId($taskId, $performerId){
        $select = $this->select('*')
                ->where('task_id=?', $taskId)
                ->where('user_from=?', $performerId);
        $row = $this->fetchRow($select);
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    
    public function checkIfCustomerLeftFeedback($taskId, $customerId){
        $select = $this->select('*')
                ->where('task_id=?', $taskId)
                ->where('user_from=?', $customerId);
        $row = $this->fetchRow($select);
        if($row){
            if($row->kind == 'positive'){
                return 'positive';
            }else if($row->kind == 'negative'){
                return 'negative';
            }
        }else{
            return false;
        }
    }    
}
