<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application/'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
//    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
// for uploading files

// SMTP constants definding
define('ADMIN_MAIL','asmaliaks@gmail.com');


define('SMTP_USERNAME','asmaliaks@gmail.com');
define('SMTP_HOST','ssl://smtp.gmail.com');

define('SMTP_PORT','465');
define('SMTP_DEBUG','true');

define('SMTP_PASS','asmalouski5233');
define('SMTP_CHARSET','UTF-8');
define('SMTP_FROM','no_reply@icando.by');

//define('SMTP_USERNAME','no_reply@eatpbank.ru');
//define('SMTP_HOST','ssl://mail.nic.ru');
//
//define('SMTP_PORT','465');
//define('SMTP_DEBUG','true');
//
//define('SMTP_PASS','M5yEdA73JZDQY');
//define('SMTP_CHARSET','UTF-8');
//define('SMTP_FROM','no_reply@eatpbank.ru');

define("SALT", "3Y7r0A6c");
define("DOCUMENT_ROOT", "/var/www/skilus/data/www/dev.skilus.biz/icando/public/");
        // definding social networks constants
            // vk.com
        define("VK_CLIENT_ID", '4741291');
        define("VK_CLIENT_SECRET", 'uirEdl2WgSbr6fw8VKt7');
        define("VK_REDIRECT_URI", 'http://icando.dev.skilus.biz/s-auth/vk-complete/');
           // vk.com attach account
        define("VK_ATTACH_CLIENT_ID", '4791731');
        define("VK_ATTACH_CLIENT_SECRET", 'GmghmK5ivL0OUti2jW2W');
        define("VK_ATTACH_REDIRECT_URI", 'http://icando.dev.skilus.biz/social-attach/vk-complete/');
            // facebook
        define("FB_CLIENT_ID", '783021221773947');
        define('FB_CLIENT_SECRET', 'd6fc08faf3ca501b6d94bd3b9202f8d7');
        define("FB_REDIRECT_URI",'http://icando.dev.skilus.biz/s-auth/fb-complete/');
           // facebook attach account
        define("FB_ATTACH_CLIENT_ID", '1593224424224258');
        define('FB_ATTACH_CLIENT_SECRET', '98e267c9a530262ecf87bea0544f39b0');
        define("FB_ATTACH_REDIRECT_URI",'http://icando.dev.skilus.biz/social-attach/fb-complete/');
            // ok.com
        define("OK_CLIENT_ID", '1123001088');
        define('OK_PUBLIC_KEY', 'CBAEKQODEBABABABA');
        define('OK_SECRET_KEY', '4156FCB4B32651F1C6FC0096');
        define("OK_REDIRECT_URI",'http://icando.dev.skilus.biz/s-auth/ok/');
            //
        define("OK_ATTACH_CLIENT_ID", '1124511488');
        define('OK_ATTACH_PUBLIC_KEY', 'CBAQKHAEEBABABABA');
        define('OK_ATTACH_SECRET_KEY', '09D7761682099DAE50FD6733');
        define("OK_ATTACH_REDIRECT_URI",'http://icando.dev.skilus.biz/social-attach/ok/');

$application->bootstrap()
            ->run();
