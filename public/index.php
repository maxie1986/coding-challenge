<?php

use Framework\Base\Framework;

defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));


define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(dirname(__FILE__)));
defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT . DS . 'vendor');

$url = isset($_GET['url']) ? $_GET['url'] : null;

if (APPLICATION_ENV === 'development') {
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    ini_set("display_errors", 1);
}

require_once VENDOR_PATH . DS . 'autoload.php';

Framework::run();
