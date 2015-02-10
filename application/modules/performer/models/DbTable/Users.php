<?php
class Performer_Model_DbTable_Users extends Zend_Db_Table_Abstract{
    protected $_name = 'users';
    
    
    public function addNewUser($data){
        $this->insert($data);
        return true;
    }
    public function editUser($data, $userId){
        $where = $this->getAdapter()->quoteInto('id = ?', $userId);
        $this->update($data, $where);
    }
//    public function getCustomerById($userId){
//      
////        $row = $this->fetchRow($this->select()->where('id = ?', $userId));
//        $select = $this->select()
//                ->from(array('u'=>'users'))
//                ->where('id=?',$userId)
//                ->join(array('t'=>'tasks'),
//                        'u.id = t.customer_id',
//                        array(
//                           't.id as t_id', 
//                           't.title as t_title', 
//                           't.customers_price as t_customers_price', 
//                           't.status as t_status', 
//                           't.final_date as t_final_date', 
//                           't.created_at as t_created_at', 
//                        ))->setIntegrityCheck(false);
//        if($row){
//            return $row->toArray();
//        }else{
//            return false;
//        }      
//   }

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
}
