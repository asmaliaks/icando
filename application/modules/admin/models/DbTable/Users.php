<?php
class Admin_Model_DbTable_Users extends Zend_Db_Table_Abstract{
    protected $_name = 'users';
    
    
    public function addNewUser($data){
        $this->insert($data);
        return true;
    }
    
    public function getPerformers(){
        $select = $this->select('*')->where('role = ?', 'performer');
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    public function getCustomers(){
        $select = $this->select('*')->where('role = ?', 'customer');
        $result = $this->fetchAll($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
    }
    public function getUserById($id){
        $select = $this->select('*')->where('id = ?', $id);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
        
    }
    public function getUserByEmail($email){
        $select = $this->select('*')->where('email = ?', $email);
        $result = $this->fetchRow($select);
        if($result){
            return $result->toArray();
        }else{
            return false;
        }
        
    }
    
    public function removeUser($id){
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
        return true;
    }
    
    public function bannUser($id){
        $data = array('banned' => 1,);
       
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($data, $where);
    }
    public function editUser($data){
        $where = $this->getAdapter()->quoteInto('id = ?', $data['user_id']);
        $this->update($data, $where);
    }
    
    public function unbannUser($id){
        $data = array('banned' => 0,);
       
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($data, $where);
    }
    public function changeCustomerToPerformer($userId){
        $data = array('role' => 'performer',);
       
        $where = $this->getAdapter()->quoteInto('id = ?', $userId);
        $this->update($data, $where);
    }
    public function changePass($email, $pass){
        
        $data = array('pass' => $pass,);
       
        $where = $this->getAdapter()->quoteInto('email = ?', $email);
        $this->update($data, $where);
    }
}
