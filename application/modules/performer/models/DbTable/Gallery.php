<?php

class Model_DbTable_Gallery extends Zend_Db_Table_Abstract{
    
     protected $_name = 'gallery';
     
     public function removeGalleryItem($id){
         $where = $this->getAdapter()->quoteInto('id = ?', $id);
         $this->delete($where);
         
     }
     public function editGalleryItem($id, $title, $image){
         if($image == null){$image = $this->getImageById($id);}
         $where = $this->getAdapter()->quoteInto('id = ?', $id);
         $data = array(
             'title' => $title,
             'image' => $image
         );
         $this->update($data, $where);
     }
     
     public function addGalleryItem($title, $image){
         $data = array(
             'title' => $title,
             'image' => $image
         );
         $this->insert($data);
     }
     public function getGalleryItemById($id){
         $where = $this->select()->where('id = ?', $id);
         $row = $this->fetchRow($where);
         if($row == null){
             return null;
         }else{
             $row->toArray();
             return $row;
         }
     }
     private function getImageById($id){
          $where = $this->select()->where('id = ?', $id);
         $row = $this->fetchRow($where);
         if($row == null){
             return null;
         }else{
             $row->toArray();
             return $row['image'];
         }        
     }

}
