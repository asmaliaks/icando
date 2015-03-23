<?php
class Performer_BalanceController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
     
    }
    
    public function fillAjaxAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $sum = $request->getParam('sum');
            $userId = $request->getParam('userId');
            $usersObj = new Performer_Model_DbTable_Users();
            $finalSum = $usersObj->fillBalance($userId, $sum);
            
            print_r($finalSum);exit;
        }
    }
}    