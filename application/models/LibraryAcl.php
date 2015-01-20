<?php
class Model_LibraryAcl extends Zend_Acl{
    public function __construct(){
       $this->add(new Zend_Acl_Resource('item'));       
       $this->add(new Zend_Acl_Resource('add'),'item');       
       $this->add(new Zend_Acl_Resource('edit'),'item');       
       $this->add(new Zend_Acl_Resource('remove'),'item'); 
       
        $this->add(new Zend_Acl_Resource('error'));
       // $this->add(new Zend_Acl_Resource('error'),'error');
       
       $this->add(new Zend_Acl_Resource('index'));
       $this->add(new Zend_Acl_Resource('contacts'), 'index');
       
       $this->add(new Zend_Acl_Resource('feedback'));
       $this->add(new Zend_Acl_Resource('feedback-list'), 'feedback');
       $this->add(new Zend_Acl_Resource('new-feedback'), 'feedback');
       $this->add(new Zend_Acl_Resource('remove-feedback'), 'feedback');
       
       $this->add(new Zend_Acl_Resource('items'));
       $this->add(new Zend_Acl_Resource('gallery-items'),'items');
       $this->add(new Zend_Acl_Resource('edit-gallery-item'),'items');
       $this->add(new Zend_Acl_Resource('remove-gallery-item'),'items');
       $this->add(new Zend_Acl_Resource('add-gallery-item'),'items');
       
       $this->add(new Zend_Acl_Resource('service'));
       $this->add(new Zend_Acl_Resource('list-of-services'), 'service');
       $this->add(new Zend_Acl_Resource('edit-service'), 'service');
       $this->add(new Zend_Acl_Resource('add-service'), 'service');
       $this->add(new Zend_Acl_Resource('description'), 'service');
       $this->add(new Zend_Acl_Resource('category-list'), 'service');
       $this->add(new Zend_Acl_Resource('service-list-by-category'), 'service');
       $this->add(new Zend_Acl_Resource('edit-category'), 'service');
       $this->add(new Zend_Acl_Resource('remove-category'), 'service');
       $this->add(new Zend_Acl_Resource('add-category'), 'service');
       
       $this->add(new Zend_Acl_Resource('registration'));
       
       $this->add(new Zend_Acl_Resource('authentication'));
       $this->add(new Zend_Acl_Resource('log-in'), 'authentication');
       $this->add(new Zend_Acl_Resource('log-out'), 'authentication');
       
       $this->addRole(new Zend_Acl_Role('guest'));
       
       $this->addRole(new Zend_Acl_Role('customer'),'guest');
       $this->addRole(new Zend_Acl_Role('perfomer'),'guest');
       $this->addRole(new Zend_Acl_Role('admin'),'guest');
       
       $this->allow('guest', 'items', 'gallery-items');
       $this->allow('guest', 'service');
       $this->allow('guest', 'service', 'list-of-services');
       $this->allow('guest', 'service', 'description');
       $this->allow('guest', 'service', 'category-list');
       $this->allow('guest', 'service', 'service-list-by-category');
       $this->allow('guest', 'index');
       $this->allow('guest', 'index', 'contacts');
       $this->allow('guest', 'error');
       $this->allow('guest', 'error', 'error');
       $this->allow('guest', 'feedback');
       $this->allow('guest', 'feedback', 'new-feedback');
       $this->allow('guest', 'feedback', 'feedback-list');
      // $this->allow('guest', 'authentication', 'log-out');
       $this->allow('guest', 'authentication', 'log-in');
       $this->allow('guest', 'registration');

//       $this->allow('user', 'error', 'error');
       $this->allow('admin', 'service', 'add-service');
       $this->allow('admin', 'service', 'edit-service');
       $this->allow('admin', 'service', 'remove-service');
       $this->allow('admin', 'service', 'edit-category');
       $this->allow('admin', 'service', 'remove-category');
       $this->allow('admin', 'service', 'add-category');
       
       $this->allow('admin', 'items', 'add-gallery-item');
       $this->allow('admin', 'items', 'remove-gallery-item');
       $this->allow('admin', 'items', 'edit-gallery-item');
       
       $this->allow('admin', 'authentication', 'log-out');
       $this->allow('guest', 'feedback', 'remove-feedback');
       //$this->allow('admin', 'items', 'list-items');
    }
}