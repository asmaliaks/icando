<?php

class Model_DbTable_Service extends Zend_Db_Table_Abstract{
    protected $_name = 'service';
    
    public function editService($title, $imageIcon, $image, $category, $desc, $serviceId){
        if($imageIcon == null){$imageIconArray = $this->getItemById ($serviceId); 
                               $imageIcon = $imageIconArray['image_icon'];}
        if($image == null){$imageArray = $this->getItemById ($serviceId);
                           $image = $imageArray['image'];
        }
        $data = array('title' => $title,
                     // 'price' => $price,
                      'category_id' => $category,
                      'image_icon' => $imageIcon,
                      'image' => $image,
                      'description' => $desc);
       
        $where = $this->getAdapter()->quoteInto('id = ?', $serviceId);
        $this->update($data, $where);
    }
    public function getServiceById($serviceId){
        $row = $this->fetchRow($this->select()->where('id = ?', $serviceId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row;
        }
    }
    public function getCategoryByServiceId($serviceId){
        $array = $this->fetchRow($this->select()->where('id = ?', $serviceId));
        $category = $array['category_id'];
        return $category;
    }
    public function getCategoryService($categoryId){
        $row = $this->fetchRow($this->select()->where('category_id = ?', $categoryId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row;
        }      
    }
    public function addService($title, $imageIcon, $image, $category, $desc){
        if($imageIcon == null){
            $imageIcon = 0;
        }        
        if($image == null){
            $image = 0;
        }
        $data = array('title' => $title,
                     // 'price' => $price,
                      'image_icon' => $imageIcon,
                      'image' => $image,
                      'description' => $desc,
                      'category_id' => $category
            );
        $this->insert($data);
    }
    public function removeService($serviceId)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $serviceId);
        $this->delete($where);
    }
    private function getItemById($serviceId){
        $row = $this->fetchRow($this->select()->where('id = ?', $serviceId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row;
        }        
    }
}