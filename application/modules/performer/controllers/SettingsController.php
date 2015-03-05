<?php

class Performer_SettingsController extends Zend_Controller_Action {

    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    
    public function addUserCategoryAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $userCatObj = new Performer_Model_DbTable_UserCategory();
            $catId = $request->getParam('catId');
            $userCatObj->addUsersCategory($this->user->id, $catId);
            echo 'true';exit;
        }
    }
    
    public function removeUsersCategoryAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $userCatObj = new Performer_Model_DbTable_UserCategory();
            $catId = $request->getParam('catId');
            $userCatObj->removeUsersCategory($this->user->id, $catId);
            echo 'true';exit;
        }
    }
}

