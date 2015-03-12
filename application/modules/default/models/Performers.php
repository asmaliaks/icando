<?php

class Default_Model_Performers{
    
    public function listPerformers(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $performers = new Zend_Db_Select($db);
       $performers->from(array('u'=>'users'))
               ->where('u.role=?', 'performer');

       return $performers;
    }
}

