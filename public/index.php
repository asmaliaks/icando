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
define("SALT", "3Y7r0A6c");
define("DOCUMENT_ROOT", "/var/www/skilus/data/www/dev.skilus.biz/icando/public/");
        // definding social networks constants
            // vk.com
        define("VK_CLIENT_ID", '4741291');
        define("VK_CLIENT_SECRET", 'uirEdl2WgSbr6fw8VKt7');
        define("VK_REDIRECT_URI", $_SERVER['SERVER_NAME'].'/s-auth/vk/');
        
            // facebook
        define("FB_CLIENT_ID", '783021221773947');
        define('FB_CLIENT_SECRET', 'd6fc08faf3ca501b6d94bd3b9202f8d7');
        define("FB_REDIRECT_URI",'http://ican.loc/s-auth/fb/');

$application->bootstrap()
            ->run();
