<?php
class Performer_Model_DbTable_TaskPrepositionModel extends Zend_Db_Table_Abstract{
    
    protected $_name = 'task_preposition';

    public function addPreposition($taskId, $performerId, $price){
        $data = array(
             'task_id' => $taskId,
             'performer_id' => $performerId,
             'performers_price' => $price,
            );
        $this->insert($data);
        return true;
    }
    
    public function ifPerformerSentPrep($performerId, $taskId){
        $select = $this->select()
                ->from(array('tp'=>'task_preposition'))
                ->where('tp.task_id=?', $taskId)
                ->where('tp.performer_id=?', $performerId);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    
    public function getTasksPrepositionis($taskId){
        $select = $this->select()
                ->from(array('tp'=>'task_preposition'))
                ->where('tp.task_id=?', $taskId)
                ->join(array('u'=>'users'),
                        'tp.performer_id = u.id',
                        array('u.username as u_username',
                              'u.surname as u_surname',
                            'u.sex as u_sex',
                            'u.city as u_city',
                            'u.birth_date as u_birth_date',
                            'u.vk as u_vk',
                            'u.ok as u_ok',
                            'u.fb as u_fb',
                            'u.image as u_image'
                            )
                        )->setIntegrityCheck(false);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
}