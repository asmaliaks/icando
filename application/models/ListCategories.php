<?php

class Model_ListCategories{
    
    public function listCategories(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $selectCategories = new Zend_Db_Select($db);
       $selectCategories->from('categories');
       
       return $selectCategories;        
    }
}
