<?php


class Default_Model_TaskList{
    
    public function listTask($order = 'created_at DESC', $category = 0){
       $db = Zend_Db_Table::getDefaultAdapter();
       $tasks = new Zend_Db_Select($db);
       $tasks->from(array('t'=>'tasks'))
                ->where('t.status = ?', 'non_taken')
                ->where('t.final_date > ?', time())
               ->order($order)
                ->joinLeft(array('u'=>'users'),
                        't.customer_id = u.id',
                        array('u.username as u_username',
                              'u.surname as u_surname',
                              'u.id as u_id',
                            'u.sex as u_sex',
                            'u.city as u_city',
                            'u.birth_date as u_birth_date',
                            'u.vk as u_vk',
                            'u.ok as u_ok',
                            'u.fb as u_fb',
                            'u.image as u_image'
                            )
                        );
       if($category != 0){
           $tasks->where('category_id=?', $category);
       }
       return $tasks;
    }
}

