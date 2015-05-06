<?php


class Default_Model_Feedback{
    
    public function getPerformersFeedbacks($performerId){
        $db = Zend_Db_Table::getDefaultAdapter();
        $feedback = new Zend_Db_Select($db);
        $feedback->from(array('f'=>'feedback'),
                        array('f.id',
                            'f.rating',
                            'f.task_id',
                            'f.user_from',
                            'f.user_to',
                            'f.kind',
                            'f.punctuality',
                            'f.politeness',
                            'f.quality',
                            'f.text',
                            'f.created'))
                ->where('f.user_to=?', $performerId)
                ->joinLeft(array('t'=>'tasks'),
                        'f.task_id = t.id',
                        array(
                            't.id as t_id',
                            't.title as t_title',
                            't.customer_id as t_customer_id',
                            't.performer_id as t_performer_id',
                            
                        ))
                ->joinLeft(array('u' => 'users'),
                'f.user_from = u.id',
                        array(
                            'u.username as u_username',
                            'u.surname as u_surname',
                            'u.id as u_id',
                            'u.image as u_image'));
        
            return $feedback;
    }
}


