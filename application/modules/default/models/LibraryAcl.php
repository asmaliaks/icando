<?php
class Model_LibraryAcl extends Zend_Acl{
    public function __construct(){

      
       
       $this->add(new Zend_Acl_Resource('default')); 
       $this->add(new Zend_Acl_Resource('default:index'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:error'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:authentication'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:registration'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:s-auth'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:social-attach'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:tasks'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:cron-api'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:sms'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:phone-activation'), 'default'); 
       $this->add(new Zend_Acl_Resource('default:performers'), 'default'); 
       
       $this->add(new Zend_Acl_Resource('admin'));
       $this->add(new Zend_Acl_Resource('admin:index'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:category'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:performers'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:customers'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:applications'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:tasks'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:messages'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:comments'), 'admin');
       $this->add(new Zend_Acl_Resource('admin:settings'), 'admin');
       
       $this->add(new Zend_Acl_Resource('customer'));
       $this->add(new Zend_Acl_Resource('customer:index'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:messages'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:performers'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:settings'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:office'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:task'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:feedback'), 'customer');
       $this->add(new Zend_Acl_Resource('customer:comments'), 'customer');
       
       $this->add(new Zend_Acl_Resource('performer'));
       $this->add(new Zend_Acl_Resource('performer:index'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:messages'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:user'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:settings'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:customer'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:task'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:feedback'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:performers'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:balance'), 'performer');
       $this->add(new Zend_Acl_Resource('performer:comments'), 'performer');
       

       
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
       $this->allow('admin', 'admin:messages', 'index');
       $this->allow('admin', 'admin:messages', 'remove');
       $this->allow('admin', 'admin:messages', 'get-unread-messages-for-admin');
       $this->allow('admin', 'admin:messages', 'mark-admin-read');
       $this->allow('admin', 'admin:comments', 'index');
       $this->allow('admin', 'admin:settings', 'edit-about');
       $this->allow('admin', 'admin:settings', 'edit-contacts');
       
       // customer
       $this->allow('customer', 'default:authentication', 'log-out');
       $this->allow('customer', 'default:error');
       $this->allow('customer', 'customer:performers', 'request-to-be-performer');
       $this->allow('customer', 'default:registration', 'activate-account-by-phone');
       $this->allow('customer', 'customer:settings', 'personal-data-edit');
       $this->allow('customer', 'customer:settings', 'index');
       $this->allow('customer', 'customer:settings', 'social');
       $this->allow('customer', 'customer:office', 'index');
       $this->allow('customer', 'customer:office', 'application');
       $this->allow('customer', 'customer:office', 'add-user-category');
       $this->allow('customer', 'customer:office', 'remove-users-category');
       $this->allow('customer', 'customer:task', 'new-task');
       $this->allow('customer', 'customer:task', 'select-category');
       $this->allow('customer', 'customer:task', 'add-task');
       $this->allow('customer', 'customer:task', 'task-add-complete');
       $this->allow('customer', 'customer:task', 'customers-tasks');
       $this->allow('customer', 'customer:task', 'customers-task-view');
       $this->allow('customer', 'customer:task', 'remove-task');
       $this->allow('customer', 'customer:task', 'view');
       $this->allow('customer', 'customer:task', 'get-subcats');
       $this->allow('customer', 'customer:task', 'accept-proposition');
       $this->allow('customer', 'customer:feedback', 'leave-feedback');
       $this->allow('customer', 'customer:performers', 'performer-view');
       $this->allow('customer', 'customer:performers', 'index');
       $this->allow('customer', 'customer:performers', 'request-to-be-performer');
       $this->allow('customer', 'default:social-attach', 'vk');
       $this->allow('customer', 'default:social-attach', 'vk-link');
       $this->allow('customer', 'default:social-attach', 'vk-complete');
       $this->allow('customer', 'default:social-attach', 'ok');
       $this->allow('customer', 'default:social-attach', 'ok-link');
       $this->allow('customer', 'default:social-attach', 'ok-complete');
       $this->allow('customer', 'default:social-attach', 'fb');
       $this->allow('customer', 'default:social-attach', 'fb-link');
       $this->allow('customer', 'default:social-attach', 'fb-complete');
       $this->allow('customer', 'default:performers', 'index');
       $this->allow('customer', 'default:performers', 'view');
       $this->allow('customer', 'default:sms', 'phone-activate');
       $this->allow('customer', 'default:sms', 'phone-verify');
       $this->allow('customer', 'default:phone-activation', 'activate-account');
       $this->allow('customer', 'customer:messages', 'send-message');
       $this->allow('customer', 'customer:messages', 'mark-read');
       $this->allow('customer', 'customer:messages', 'get-unread-messages');
       $this->allow('customer', 'customer:comments', 'send-comment');
      
       // performer
       $this->allow('performer', 'default:authentication', 'log-out');
       $this->allow('performer', 'default:error');
       $this->allow('performer', 'performer:user', 'index');
       $this->allow('performer', 'performer:index', 'tasks');
       $this->allow('performer', 'default:registration', 'activate-account-by-phone');
       $this->allow('performer', 'performer:settings', 'add-user-category');
       $this->allow('performer', 'performer:settings', 'remove-users-category');
       $this->allow('performer', 'performer:customer', 'view');
       $this->allow('performer', 'performer:task', 'view');
       $this->allow('performer', 'performer:task', 'propose-task');
       $this->allow('performer', 'performer:task', 'create-task');
       $this->allow('performer', 'performer:task', 'remove-task');
       $this->allow('performer', 'performer:task', 'accept-proposition');
       $this->allow('performer', 'performer:task', 'get-subcats');
       $this->allow('performer', 'performer:task', 'performers-view');
       $this->allow('performer', 'performer:task', 'add');
       $this->allow('performer', 'performer:feedback', 'leave-feedback');
       $this->allow('performer', 'performer:feedback', 'leave-feedback-as-customer');
       $this->allow('performer', 'performer:performers', 'performer-view');
       $this->allow('performer', 'default:social-attach', 'vk');
       $this->allow('performer', 'default:social-attach', 'vk-link');
       $this->allow('performer', 'default:social-attach', 'vk-complete');
       $this->allow('performer', 'default:social-attach', 'ok');
       $this->allow('performer', 'default:social-attach', 'ok-link');
       $this->allow('performer', 'default:social-attach', 'ok-complete');
       $this->allow('performer', 'default:social-attach', 'fb');
       $this->allow('performer', 'default:social-attach', 'fb-link');
       $this->allow('performer', 'default:social-attach', 'fb-complete');
       $this->allow('performer', 'default:phone-activation', 'activate-account');
       $this->allow('performer', 'default:sms', 'phone-activate');
       $this->allow('performer', 'default:sms', 'phone-verify');
       $this->allow('performer', 'performer:messages', 'send-message');
       $this->allow('performer', 'performer:messages', 'mark-read');
       $this->allow('performer', 'performer:messages', 'get-unread-messages');
       $this->allow('performer', 'performer:balance', 'fill-ajax');
       $this->allow('performer', 'performer:comments', 'send-comment');
       $this->allow('performer', 'customer:comments', 'send-comment');
       
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
       $this->allow('guest', 'default:registration', 'activate-account-by-phone');
       $this->allow('guest', 'default:phone-activation', 'activate-account');
       $this->allow('guest', 'default:tasks', 'index');
       $this->allow('guest', 'default:error');
       $this->allow('guest', 'default:cron-api', 'new-tasks-send-mail');
       $this->allow('guest', 'default:cron-api', 'unbann');
       $this->allow('guest', 'default:sms', 'phone-activate');
       $this->allow('guest', 'default:performers', 'index');
       $this->allow('guest', 'default:performers', 'view');
    }
}