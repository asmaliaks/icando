<?php


class Default_Model_Feedback{
    
    public function getPerformersFeedbacks($performerId){
        $db = Zend_Db_Table::getDefaultAdapter();
        $feedback = new Zend_Db_Select($db);
        $feedback->from(array('f'=>'feedback'),
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
                            'u.id as u_id',
                            'u.image as u_image'));
        
            return $feedback;
    }
}


