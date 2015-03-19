<?php

class Performer_Model_DbTable_UserCategory extends Zend_Db_Table_Abstract{
    protected $_name = 'user_category';
    
    public function addUsersCategory($userId, $categoryId){
        $data = array('user_id' => $userId,
                      'category_id' => $categoryId);
        
        $this->insert($data);
        return true;
    }
    
    public function removeCategotySettings($userId){
        $db = $this->getAdapter();
    
        $where = $db->quoteInto('user_id = ?', $userId);

        $db->delete($this->_name, $where);
    }
    
    public function removeUsersCategory($userId, $categoryId){
        $db = $this->getAdapter();
        $where = array();
        $where[] = $db->quoteInto('user_id = ?', $userId);
        $where[] = $db->quoteInto('category_id = ?', $categoryId);
        $db->delete($this->_name, $where);
    }
    
    public function getUsersByCategoryId($catId){
            $select = $this->select()
                    ->from(array('uc'=>'user_category'),
                            array('uc.id as uc_id',
                            'uc.user_id as uc_user_id',
                                'uc.category_id as category_id'))
                    ->where('uc.category_id=?', $catId)
                    ->where('u.banned=?', NUll)
                    ->joinLeft(array('u' => 'u'),
                    'uc.user_id = u.id',
                            array(
                                'u.surname as u_surname',
                                'u.username as u_username',
                                'u.email as u_email'))->setIntegrityCheck(false);

            $result = $this->fetchAll($select);
            if($result){
                return $result->toArray();
            }else{
                return false;
            }
    }
    
    public function getUsersCategories($userId){
                    $select = $this->select()
                    ->from(array('uc'=>'user_category'),
                            array('uc.id as uc_id',
                                'uc.category_id as category_id'))
                    ->where('uc.user_id=?', $userId)
                    ->joinLeft(array('c' => 'categories'),
                    'uc.category_id = c.id',
                            array(
                                'c.title as c_title',
                                'c.parent_id as c_parent_id',
                                'c.image as c_image'))->setIntegrityCheck(false);

            $result = $this->fetchAll($select);
            if($result){
                return $result->toArray();
            }else{
                return false;
            }
    }
    
    public function checkUserForCategory($userId, $catId){
        $select = $this->select()
                    ->where('user_id=?', $userId)
                    ->where('category_id=?', $catId);
        $result = $this->fetchRow($select);
        if($result){
                return $result->toArray();
        }else{
            return false;
        }
    }
}

