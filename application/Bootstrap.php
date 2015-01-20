<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload(){
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                                                 'namespace' => '',
                                                 'basePath' => APPLICATION_PATH));
        $acl = new Model_LibraryAcl();
        $auth = Zend_Auth::getInstance();
        
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Plugin_AccessCheck($acl, $auth));
       

        
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
        $view ->headTitle('CreoOFby');
        
//		$navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml', 'nav' );
//		$navContainer = new Zend_Navigation($navContainerConfig);
//		
//		$view->navigation($navContainer);
        
    }

}

