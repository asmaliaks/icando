<?php
class Customer_Model_DbTable_UserCategory extends Zend_Db_Table_Abstract{
    protected $_name = 'user_category';

    public function getUsersCategories($userId){
                    $select = $this->select()
                    ->from(array('uc'=>'user_category'),
                            array('uc.id'))
                    ->where('uc.user_id=?', $userId)
                    ->joinLeft(array('c' => 'categories'),
                    'uc.category_id = c.id',
                            array('c.id as c_id',
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
}