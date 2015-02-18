<?php
class Model_DbTable_Users extends Zend_Db_Table_Abstract{
    protected $_name = 'users';
    
    
    public function addNewUser($data){
        $this->insert($data);
        return true;
    }
      public function getUserById($userId){
       $select = $this->select()
               ->where('id=?',$userId);
       $result = $this->fetchRow($select);
       if($result){
           return $result->toArray();
       }else{
           return false;
       }
       
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
    public function checkMail($mail){
 
        $row = $this->fetchRow($this->select()->where('email = ?', $mail));
        if($row){
            return true;
        }else{
            return false;
        }
    }
    public function checkVkUser($userId){
        $row = $this->fetchRow($this->select()->where('vk = ?', $userId));
        
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    public function checkFbUser($userId){
        $row = $this->fetchRow($this->select()->where('fb = ?', $userId));
        
        if($row){
            return $row->toArray();
        }else{
            return false;
        }
    }
    public function checkOkUser($userId){
        $row = $this->fetchRow($this->select()->where('ok = ?', $userId));
        
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
