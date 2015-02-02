<?php

class ZC_Controller_Plugin_ApplicationSent extends Zend_Controller_Plugin_Abstract {
    protected $user;
    public function preDispatch() {
       $layout = Zend_Layout::getMvcInstance();
       $view = $layout->getView();
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          if($this->user->role == 'customer'){
              $appObj = new Customer_Model_DbTable_PerformerApplication();
              $application = $appObj->getAppByUserId($this->user->id);
              if($application){
                  $view->application = $application;
                  $view->userId = $this->user->id;
              }else{
                  $view->application = 0;
              }

          }else{
              $view->userId = $this->user->id;
          }
      }
          
       }

}
