<?php

class ContactsController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
public function indexAction(){
    $contactsObj = new Customer_Model_DbTable_ContactsModel();
    $contacts = $contactsObj->getContacts();
    $this->view->contacts = $contacts;
}
    
    
}