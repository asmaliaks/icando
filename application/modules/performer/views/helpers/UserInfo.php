<?php

class Zend_View_Helper_UserInfo{
    function userInfo(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          return $auth->getIdentity();
          
       }
    }
}
