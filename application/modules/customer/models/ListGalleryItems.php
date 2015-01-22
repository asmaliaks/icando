<?php

class Model_ListGalleryItems{
    
    public function listGalleryItems(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $selectServices = new Zend_Db_Select($db);
       $selectServices->from('gallery');
       
       return $selectServices;
    }
}