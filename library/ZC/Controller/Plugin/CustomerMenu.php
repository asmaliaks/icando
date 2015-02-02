<?php

class ZC_Controller_Plugin_CustomerMenu extends Zend_Controller_Plugin_Abstract {
    
    public function preDispatch() {
       $layout = Zend_Layout::getMvcInstance();
       $view = $layout->getView();
       $menu = array(
           '0' => array(
               "title" => "Привязка к соцсетям",
               "url"   => "/customer/settings/social",
           ),
           "1" => array(
               "title" => "Редактировать личную информацию",
               "url"   => "/customer/settings/personal-data-edit"
           ),
       );
       $view->menu = $menu;
          
       }

}