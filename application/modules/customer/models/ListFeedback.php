<?php

class Model_ListFeedback{
    
    public function listFeedback(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $selectServices = new Zend_Db_Select($db);
       $selectServices->from('feedback')->order('date');
       
       return $selectServices;
    }
}
