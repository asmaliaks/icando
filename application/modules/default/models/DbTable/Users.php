<?php
class Model_DbTable_Users extends Zend_Db_Table_Abstract{
    protected $_name = 'users';
    
    
    public function addNewUser($data){
        $this->insert($data);
        return true;
    }
    
    public function editUser($data, $userId){

        if($data['image'] == null){$image = $this->getImgById($userId);
                           $data['image'] = $image;
        }
        if($data['pass'] == null){
            $data['pass'] = $this->getPassById($userId);
        }
        $where = $this->getAdapter()->quoteInto('id = ?', $userId);
        $this->update($data, $where);        
    }
    
    public function getCustomerById($userId){
 
        $row = $this->fetchRow($this->select()->where('id = ?', $userId));
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    
    private function getImgById($userId){
        $row = $this->fetchRow($this->select()->where('id = ?', $userId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row['image'];
        }        
    }  
    private function getPassById($userId){
        $row = $this->fetchRow($this->select()->where('id = ?', $userId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row['pass'];
        }        
    }  
}
