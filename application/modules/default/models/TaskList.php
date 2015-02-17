<?php


class Default_Model_TaskList{
    
    public function listTask(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $selectServices = new Zend_Db_Select($db);
       $selectServices->from('tasks')->where('status=?', 'non_taken')->order('created_at DESC');
       
       return $selectServices;
    }
}

