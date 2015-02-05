<?php
class Customer_Model_DbTable_FeedbackModel extends Zend_Db_Table_Abstract{
    protected $_name = 'feedback';
    
    public function addFeedback($data){

        $this->insert($data);
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
    
    public function getCustomersFeedbackByTaskId($taskId, $performerId){
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
    public function checkIfPerformerLeftFeedback($taskId, $performerId){
        $select = $this->select('*')
                ->where('task_id=?', $taskId)
                ->where('user_from=?', $performerId);
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