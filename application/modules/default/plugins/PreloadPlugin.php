<?php
class Plugin_PreloadPlugin extends Zend_Controller_Plugin_Abstract {
    
    public $user;
    
    public function __construct() {
        $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }

}