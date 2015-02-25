<?php
class Admin_Model_DbTable_FeedbackModel extends Zend_Db_Table_Abstract{
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
    
    public function getUsersFeedbacks($performerId){
        $select = $this->select()
                ->from(array('f'=>'feedback'),
                        array('f.id',
                            'f.rating',
                            'f.task_id',
                            'f.kind',
                            'f.text',
                            'f.created'))
                ->where('f.user_to=?', $performerId)
                ->joinLeft(array('u' => 'users'),
                'f.user_from = u.id',
                        array(
                            'u.username as u_username',
                            'u.surname as u_surname',
                            'u.image as u_image'))->setIntegrityCheck(false);

        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
}
