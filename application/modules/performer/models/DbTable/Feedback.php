<?php
class Model_DbTable_Feedback extends Zend_Db_Table_Abstract{
    protected $_name = 'feedback';
    
    public function addFeedback($name, $feedback, $currentDate){
        $data = array('name' => $name,
                       'title' => $feedback,
                        'date' => $currentDate);
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
}
