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
    
    public function getCustomersFeedbacks($customerId){
        $select = $this->select()
                ->from(array('f' => 'feedback'),'*')
                ->joinLeft(array('u'=>'users'),
                        'f.user_from = u.id',
                        array(
                            'u.username as u_username',
                            'u.surname as u_surname',
                            'u.image as u_image',
                            'u.sex as u_sex',
                            'u.city as u_city',
                            'u.birth_date as u_birth_date'
                        ))
                ->joinLeft(array('t'=>'tasks'),
                        'f.task_id = t.id',
                        array(
                            't.title as t_title'
                        ))
                ->where('f.user_to=?', $customerId);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        } 
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
    public function getTasksFeedbackByCustomer($taskId, $performerId){
        $select = $this->select()
                ->from(array('f'=>'feedback'),
                        array('f.id',
                            'f.rating',
                            'f.task_id',
                            'f.kind',
                            'f.text',
                            'f.created'))
                ->where('f.user_to=?', $performerId)
                ->where('f.task_id=?', $taskId)
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
