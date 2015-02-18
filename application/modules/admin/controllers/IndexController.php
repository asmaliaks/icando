<?php

class Admin_IndexController extends Zend_Controller_Action{
    
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    public function indexAction(){
        $role = $this->user->role;
        switch ($role) {
            case 'admin':
                $this->_redirect('admin/tasks');
                break;
            case 'customer': 
                $this->_redirect('customer/office');
                break;
            case 'performer':
                $this->_redirect('performer/user');
                break;
        }
    }
 
    
}
