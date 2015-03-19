<?php

class Default_Model_Performers{
    
    public function listPerformers($category = null){
       $db = Zend_Db_Table::getDefaultAdapter();
       $performers = new Zend_Db_Select($db);
       $performers->from(array('c'=>'categories'))
               ->where('c.parent_id=?', 0)
               ->joinLeft(array('cc'=>'categories'),
                       'c.id = cc.parent_id',
                       array(
                           'cc.id as cc_id',
                           'cc.title as cc_title',
                           'cc.description as cc_description',
                           'cc.parent_id as cc_parent_id',
                           'cc.image as cc_image'
                       ))
               ->joinLeft(array('uc'=>'user_category'),
                       'cc.id = uc.category_id',
                       array(
                           'uc.id as uc_id',
                           'uc.user_id as uc_user_id',
                           'uc.category_id as uc_category_id'
                       ))
               
               ->joinRight(array('u'=>'users'),
                       'uc.user_id = u.id',
                       array(
                           'u.id as u_id',
                           'u.surname as u_surname',
                           'u.username as u_username',
                           'u.sex as u_sex',
                           'u.role as u_role',
                           'u.image as u_image',
                           'u.phonenumber as u_phonenumber',
                           'u.about as u_about',
                           'u.city as u_city',
                           'u.balance as u_balance'
                           
                       ))
               ->where('role=?', 'performer')
               ->group('u.id');
       if($category){
           $performers->where('c.id=?', $category);
       }

       return $performers;
    }
}

