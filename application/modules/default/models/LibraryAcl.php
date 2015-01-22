<?php
class Model_LibraryAcl extends Zend_Acl{
    public function __construct(){

      
       
       $this->add(new Zend_Acl_Resource('default')); 
       $this->add(new Zend_Acl_Resource('default:index'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:error'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:authentication'), 'default'); 
       
       $this->add(new Zend_Acl_Resource('admin'));
       $this->add(new Zend_Acl_Resource('admin:index'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:category'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:performers'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:customers'), 'admin');
       
       $this->add(new Zend_Acl_Resource('customer'));
       $this->add(new Zend_Acl_Resource('customer:index'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:messages'), 'customer');
       
       $this->add(new Zend_Acl_Resource('performer'));
       $this->add(new Zend_Acl_Resource('performer:index'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:messages'), 'performer');
       

       
       $this->addRole(new Zend_Acl_Role('guest'));
       
       $this->addRole(new Zend_Acl_Role('customer'));
       $this->addRole(new Zend_Acl_Role('performer'));
       $this->addRole(new Zend_Acl_Role('admin'));
       
       // allowing
       $this->allow('admin', 'admin:index', 'index');
       $this->allow('admin', 'admin:category', 'index');
       $this->allow('admin', 'admin:category', 'add-category');
       $this->allow('admin', 'admin:category', 'edit-category');
       $this->allow('admin', 'admin:category', 'remove-category');
       $this->allow('admin', 'default:authentication', 'log-out');
       
       $this->allow('admin', 'admin:performers', 'index');
       $this->allow('admin', 'admin:performers', 'add');
       $this->allow('admin', 'admin:performers', 'edit');
       $this->allow('admin', 'admin:performers', 'remove');
       $this->allow('admin', 'admin:performers', 'bann');
       $this->allow('admin', 'admin:performers', 'view');
       
       // customer
      $this->allow('customer', 'default:authentication', 'log-out');

       $this->deny('admin', 'customer:index', 'index');
    }
}