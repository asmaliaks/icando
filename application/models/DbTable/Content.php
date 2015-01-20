<?php

class Model_DbTable_Content extends Zend_Db_Table_Abstract{
    protected $_name = 'content';
    
    public function saveMainPage($text, $pageCategory){
        
        $data = array('content' => $text,
                      'page_category' => $pageCategory);
        $where = $this->getAdapter()->quoteInto('page_category = ?', $pageCategory);
        $this->update($data, $where);
    }
    public function getContentById($pageCategory){
        $row = $this->fetchRow($this->select()->where('page_category = ?', $pageCategory));
        
        if (!$row) {
            return null;
        }
        //get array for fetching the data
        $row->toArray();
        return $row;
    }
 }
