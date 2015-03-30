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
    }

    function _initViewHelpers(){

        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
      

        $view->doctype('HTML4_STRICT');
        $view->headMeta()
             ->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');

        $view->headTitle()->setSeparator(' :: ');
        $view ->headTitle('helpyou.by');
        
//		$navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml', 'nav' );
//		$navContainer = new Zend_Navigation($navContainerConfig);
//		
//		$view->navigation($navContainer);
        
    }
    
}

