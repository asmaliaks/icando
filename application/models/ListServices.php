<?php

class Model_ListServices {
    
    public function listServices(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $selectServices = new Zend_Db_Select($db);
       $selectServices->from('service')->order('id');
       
       return $selectServices;
    }
    public function getServiceByCategory($categoryId){
        $db = Zend_Db_Table::getDefaultAdapter();
        $selectCategoryServices = new Zend_Db_Select($db);
        $selectCategoryServices->from('service')->where('category_id = ?', $categoryId)->order('id DESC');
        
        return $selectCategoryServices;
    }    
}