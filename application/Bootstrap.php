<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload(){
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                        'namespace' => '',
                        'basePath' => APPLICATION_PATH.'/modules/default'));
        
		if(Zend_Auth::getInstance()->hasIdentity()) {
			Zend_Registry::set('role', Zend_Auth::getInstance()->getStorage()->read()->role);
		} else {
			Zend_Registry::set('role', 'guests');
		}
		
        $this->_acl = new Model_LibraryAcl;
        $this->_auth = Zend_Auth::getInstance();
        
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Plugin_AccessCheck($this->_acl, $this->_auth));
        
        return $modelLoader;

        // definding social networks constants
            // vk.com
        define("VK_CLIENT_ID", '4741291');
        define("VK_CLIENT_SECRET", 'uirEdl2WgSbr6fw8VKt7');
        define("VK_REDIRECT_URI", $_SERVER['SERVER_NAME'].'/s-auth/vk/');
            // facebook
        define("FB_CLIENT_ID", '783021221773947');
        define('FB_CLIENT_SECRET', 'd6fc08faf3ca501b6d94bd3b9202f8d7');
        define("FB_REDIRECT_URI",'http://ican.loc/s-auth/fb/');
        return $modelLoader;
    }

    function _initViewHelpers(){

        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
      

        $view->doctype('HTML4_STRICT');
        $view->headMeta()
             ->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');

        $view->headTitle()->setSeparator(' :: ');
        $view ->headTitle('IcanDo');
        
//		$navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml', 'nav' );
//		$navContainer = new Zend_Navigation($navContainerConfig);
//		
//		$view->navigation($navContainer);
        
    }
    
}

