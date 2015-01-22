<?php

class Admin_PerformersController extends Zend_Controller_Action{
    
    public function init(){
        
    }
    
    public function indexAction(){
        // call users model
        $usersObj = new Admin_Model_DbTable_Users();
        // get perfomers list
        $performers = $usersObj->getPerformers();
                // sending perfomers to the view
        if($performers){
            $this->view->performers = $performers;
        }
        
        
    }
    
    public function viewAction(){
        
    }
    
    public function bannAction(){
        
        
    }
    public function removeAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $usersObj->removeUser($id);
       }
        
    }
}

