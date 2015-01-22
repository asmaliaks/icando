<?php

class ZC_Controller_Plugin_Navigation extends Zend_Controller_Plugin_Abstract {
    
    public function preDispatch() {
$layout = Zend_Layout::getMvcInstance();
$view = $layout->getView();
        
$catObj = new Admin_Model_DbTable_Categories();
$cat = $catObj->fetchAll();
$cat->toArray();
$view->categories = $cat;
    }
}
