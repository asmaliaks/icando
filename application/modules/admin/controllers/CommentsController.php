<?php

class Admin_CommentsController extends Zend_Controller_Action{
    public function _init(){
        
    }

    public function indexAction(){
                /// get all comments for the task
        $commentsObj = new Default_Model_Comments();
        $commentsList = $commentsObj->getCommentsList();
            //   pagination    
        $comments = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($commentsList));
        $comments->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
        $this->view->comments = $comments;
    }
    
    public function removeCommentAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $commentId = $request->getParam('id');
            $commentsObj = new Default_Model_DbTable_Comments();
            $commentsObj->removeComment($commentId);
            exit;
        }
    }
}