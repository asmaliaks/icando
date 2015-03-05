<?php


class Default_Model_Comments{
    
    public function getCommentsByTaskId($taskId){
       $db = Zend_Db_Table::getDefaultAdapter();
       $comments = new Zend_Db_Select($db);
       $comments->from(
               array('c'=>'comments'),
               array(
                   'c.id',
                   'c.task_id',
                   'c.user_from',
                   'c.user_to',
                   'c.parent_id',
                   'c.text',
                   'c.created',
                   'c.read')
               )
               ->where('c.task_id=?', $taskId)
               ->joinLeft(array('u'=> 'users'),
                       'u.id = c.user_from',
                       array(
                           'u.username as u_username',
                           'u.surname as u_surname',
                           'u.image as u_image',
                           'u.id as u_id',
                       )
                       )
               ->order('created ASC');
       
       return $comments;
    }
    public function getCommentsList(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $comments = new Zend_Db_Select($db);
       $comments->from(
               array('c'=>'comments'),
               array(
                   'c.id',
                   'c.task_id',
                   'c.user_from',
                   'c.user_to',
                   'c.parent_id',
                   'c.text',
                   'c.created',
                   'c.read')
               )->joinLeft(array('t'=>'tasks'),
                       't.id = c.task_id',
                       array(
                           't.title as t_title'
                       ))
               ->joinLeft(array('u'=> 'users'),
                       'u.id = c.user_from',
                       array(
                           'u.username as u_username',
                           'u.surname as u_surname',
                           'u.image as u_image',
                           'u.id as u_id',
                           'u.role as u_role',
                       )
                       )
               ->order('created DESC');
       
       return $comments;
    }
}


