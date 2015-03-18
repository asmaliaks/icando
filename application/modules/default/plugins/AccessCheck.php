<?php
class Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract {
    
    private $_acl = null;
    private $_auth = null;
    
    public function __construct(Zend_Acl $acl, Zend_Auth $auth) {
        $this->_acl = $acl;
        $this->_auth = $auth;
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request) {

        $module = $request->getModuleName();
        $resource = $request->getControllerName();
        $action = $request->getActionName();
        
        $identity = $this->_auth->getStorage()->read();
        if(Zend_Auth::getInstance()->hasIdentity()){
            $role = $identity->role;
        }else{       
            $role = 'guest';
        }
        if(!$this->_acl->isAllowed($role, $module.':'.$resource, $action)){
//            print_r($module.':'.$resource);exit;
            if(!Zend_Auth::getInstance()->hasIdentity()){
                $request->setControllerName('index')
                    ->setActionName('index'); 

            }else{
               if($role == 'customer'){
                   $request->setModuleName($role)
                           ->setControllerName('index')
                    ->setActionName('index'); 
               }else if($role == 'performer'){
                   $request->setModuleName($role)
                           ->setControllerName('index')
                    ->setActionName('index'); 
               }else if($role == 'admin'){
                   $request->setModuleName($role)
                           ->setControllerName('tasks')
                    ->setActionName('index');
               }
            }   
        }
    }
}