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
        // getting id from url
        $request = $this->getRequest();
        $id = $request->getParam('id');
        // call users model
        $usersObj = new Admin_Model_DbTable_Users();
        // get user's tasks
        $tasksObj = new Admin_Model_DbTable_Tasks();
        $tasks = $tasksObj->getPerformersTasks($id);
        $user = $usersObj->getUserById($id);
        // age counting
        
        $currentTime = time();
        $unixAge = $currentTime-$user['birth_date'];
        $realAge = $unixAge/31556926;
        $realAge = floor($realAge);
        
        $birthDate = date('d.m.Y',$user['birth_date']);
        // send $user to the view
        $this->view->tasks = $tasks;
        $this->view->birthDate = $birthDate;
        $this->view->age = $realAge;
        $this->view->user = $user;
    }
    
    public function bannAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->bannUser($id);
           if($result){
               echo 'true';
           } 
       } 
    }
    public function unbannAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->unbannUser($id);
           if($result){
               echo 'true';
           } 
       } 
    }
    public function removeAction(){
       $request = $this->getRequest();
       if($request->isPost()){
           $id = $request->getParam('id');
           $usersObj = new Admin_Model_DbTable_Users();
           $result = $usersObj->removeUser($id);
           if($result){
               echo 'true';
           }
           
       }
        
    }
}

