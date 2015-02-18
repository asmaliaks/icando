<?php
class Model_LibraryAcl extends Zend_Acl{
    public function __construct(){

      
       
       $this->add(new Zend_Acl_Resource('default')); 
       $this->add(new Zend_Acl_Resource('default:index'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:error'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:authentication'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:registration'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:s-auth'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:tasks'), 'default'); 
       
       $this->add(new Zend_Acl_Resource('admin'));
       $this->add(new Zend_Acl_Resource('admin:index'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:category'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:performers'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:customers'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:applications'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:tasks'), 'admin');
       
       $this->add(new Zend_Acl_Resource('customer'));
       $this->add(new Zend_Acl_Resource('customer:index'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:messages'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:performers'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:settings'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:office'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:task'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:feedback'), 'customer');
       
       $this->add(new Zend_Acl_Resource('performer'));
       $this->add(new Zend_Acl_Resource('performer:index'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:messages'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:user'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:settings'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:customer'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:task'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:feedback'), 'performer');
       

       
       $this->addRole(new Zend_Acl_Role('guest'));
       
       $this->addRole(new Zend_Acl_Role('customer'));
       $this->addRole(new Zend_Acl_Role('performer'));
       $this->addRole(new Zend_Acl_Role('admin'));
       
       // admin
       $this->allow('admin', 'default:error');
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
       $this->allow('admin', 'admin:performers', 'unbann');
       $this->allow('admin', 'admin:performers', 'view');
       
       $this->allow('admin', 'admin:tasks', 'index');
       $this->allow('admin', 'admin:tasks', 'view');
       
       $this->allow('admin', 'admin:customers', 'index');
       $this->allow('admin', 'admin:customers', 'remove');
       $this->allow('admin', 'admin:customers', 'bann');
       $this->allow('admin', 'admin:customers', 'unbann');
       $this->allow('admin', 'admin:customers', 'view');
       
       $this->allow('admin', 'admin:applications', 'index');
       $this->allow('admin', 'admin:applications', 'decline');
       $this->allow('admin', 'admin:applications', 'accept');
       
       // customer
       $this->allow('customer', 'default:authentication', 'log-out');
       $this->allow('customer', 'default:error');
       $this->allow('customer', 'customer:performers', 'request-to-be-performer');
       $this->allow('customer', 'customer:settings', 'personal-data-edit');
       $this->allow('customer', 'customer:settings', 'index');
       $this->allow('customer', 'customer:settings', 'social');
       $this->allow('customer', 'customer:office', 'index');
       $this->allow('customer', 'customer:task', 'new-task');
       $this->allow('customer', 'customer:task', 'select-category');
       $this->allow('customer', 'customer:task', 'add-task');
       $this->allow('customer', 'customer:task', 'task-add-complete');
       $this->allow('customer', 'customer:task', 'customers-tasks');
       $this->allow('customer', 'customer:task', 'customers-task-view');
       $this->allow('customer', 'customer:task', 'remove-task');
       $this->allow('customer', 'customer:task', 'view');
       $this->allow('customer', 'customer:task', 'accept-proposition');
       $this->allow('customer', 'customer:feedback', 'leave-feedback');
       $this->allow('customer', 'customer:performers', 'performer-view');
       $this->allow('customer', 'customer:performers', 'request-to-be-performer');
      
       // performer
       $this->allow('performer', 'default:authentication', 'log-out');
       $this->allow('performer', 'default:error');
       $this->allow('performer', 'performer:user', 'index');
       $this->allow('performer', 'performer:index', 'tasks');
       $this->allow('performer', 'performer:settings', 'add-user-category');
       $this->allow('performer', 'performer:settings', 'remove-users-category');
       $this->allow('performer', 'performer:customer', 'view');
       $this->allow('performer', 'performer:task', 'view');
       $this->allow('performer', 'performer:task', 'propose-task');
       $this->allow('performer', 'performer:feedback', 'leave-feedback');
       
       //guest
       $this->allow('guest', 'default:index', 'index');
       $this->allow('guest', 'default:s-auth', 'index');
       $this->allow('guest', 'default:s-auth', 'vk');
       $this->allow('guest', 'default:s-auth', 'vk-link');
       $this->allow('guest', 'default:s-auth', 'vk-complete');
       $this->allow('guest', 'default:s-auth', 'fb');
       $this->allow('guest', 'default:s-auth', 'fb-link');
       $this->allow('guest', 'default:s-auth', 'fb-complete');
       $this->allow('guest', 'default:s-auth', 'ok');
       $this->allow('guest', 'default:s-auth', 'ok-link');
       $this->allow('guest', 'default:s-auth', 'ok-complete');
       $this->allow('guest', 'default:registration', 'index');
       $this->allow('guest', 'default:registration', 'forgot-pass');
       $this->allow('guest', 'default:registration', 'check-email');
       $this->allow('guest', 'default:registration', 'send-pass-email');
       $this->allow('guest', 'default:registration', 'hash');
       $this->allow('guest', 'default:registration', 'pass-change');
       $this->allow('guest', 'default:tasks', 'index');
       $this->allow('guest', 'default:error');
    }
}