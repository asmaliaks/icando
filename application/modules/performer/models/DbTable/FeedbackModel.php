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

    public function countPerformersRating($performerId){
        $feedback = $this->fetchAll($this->select()->where('user_to=?',$performerId));
        $feedback = $feedback->toArray();
        if(!empty($feedback)){
            $n = 0;
            foreach($feedback as $feed){
                if($n == 0){
                    $rating = $feed['rating'];
                }else{
                   $rating = $rating+$feed['rating'];
                }
            $n++;
        }
        $mark = $rating/$n;
        $mark = floor($mark);
        return $mark;
        }else{
            return 0;
        }
        
    } 
        public function countPerformersMarks($performerId){
        $feedback = $this->fetchAll($this->select()->where('user_to=?',$performerId));
        $feedback = $feedback->toArray();
        
            $n = 0;
            foreach($feedback as $feed){
                if($n == 0){
                    $quality = $feed['quality'];
                }else{
                   $quality = $quality+$feed['quality'];
                }
            $n++;
            }
            $quality = $quality/$n;
            $quality = floor($quality);
            
            $n = 0;
            foreach($feedback as $feed){
                if($n == 0){
                    $punctuality = $feed['punctuality'];
                }else{
                   $punctuality = $punctuality+$feed['punctuality'];
                }
            $n++;
            }
            $punctuality = $punctuality/$n;
            $punctuality = floor($punctuality);
            $n = 0;
            foreach($feedback as $feed){
                if($n == 0){
                    $politenes = $feed['politeness'];
                }else{
                   $politenes = $politenes+$feed['politeness'];
                }
            $n++;
            }
            $politenes = $politenes/$n;
            $politenes = floor($politenes);
        
            $mainRating = array(
                'quality'     => $quality,
                'punctuality' => $punctuality,
                'politeness'   => $politenes,
                
            );
            
            return $mainRating;
       
        
    }
        public function positiveAmount($performerId){
        $feedback = $this->fetchAll($this->select()->where('user_to=?',$performerId)->where('kind=?','positive'));
        $feedback = $feedback->toArray();
        if(!empty($feedback)){
            $amount = count($feedback);
            return $amount;
        }else{
            return 0;
        }
        
    }
    public function negativeAmount($performerId){
        $feedback = $this->fetchAll($this->select()->where('user_to=?',$performerId)->where('kind=?','negative'));
        $feedback = $feedback->toArray();
        if(!empty($feedback)){
            $amount = count($feedback);
            return $amount;
        }else{
            return 0;
        }
        
    }
    public function countCustomersRating($customerId){
        $feedback = $this->fetchAll($this->select()->where('user_to=?',$customerId));
        $feedback = $feedback->toArray();
        if(!empty($feedback)){
            $n = 0;
            foreach($feedback as $feed){
                if($n == 0){
                    $rating = $feed['rating'];
                }else{
                   $rating = $rating+$feed['rating'];
                }
            $n++;
        }
        $mark = $rating/$n;
        $mark = floor($mark);
        return $mark;
        }else{
            return 0;
        }
        
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
    
    public function getTasksFeedbackByPerformer($taskId, $customerId){
        $select = $this->select()
                ->from(array('f'=>'feedback'),
                        array('f.id',
                            'f.rating',
                            'f.task_id',
                            'f.kind',
                            'f.text',
                            'f.created'))
                ->where('f.user_to=?', $customerId)
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
    
    public function getTasksFeedbackByCustomer($taskId, $performerId){
        $select = $this->select()
                ->from(array('f'=>'feedback'),
                        array('f.id',
                            'f.rating',
                            'f.task_id',
                            'f.politeness',
                            'f.punctuality',
                            'f.quality',
                            'f.kind',
                            'f.text',
                            'f.created'))
                ->where('f.user_from=?', $performerId)
                ->where('f.task_id=?', $taskId)
                ->joinLeft(array('t'=>'tasks'),
                        'f.task_id = t.id',
                        array(
                            't.title as t_title',
                            't.id as t_id',
                            't.customer_id as t_customer_id',
                            't.performer_id as t_performer_id'
                        ))
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
    
    public function getUsersFeedbacks($id){
        $select = $this->select()
                ->from(array('f'=>'feedback'),
                        array('f.id',
                            'f.rating',
                            'f.task_id',
                            'f.kind',
                            'f.text',
                            'f.created'))
                ->where('f.user_to=?', $id)
                ->joinLeft(array('u' => 'users'),
                'f.user_from = u.id',
                        array(
                            'u.username as u_username',
                            'u.surname as u_surname',
                            'u.id as u_id',
                            'u.role as u_role',
                            'u.image as u_image'))->setIntegrityCheck(false);

        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
}
