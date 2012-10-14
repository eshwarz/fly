<?php
// constants defined here.
session_start();

// default emvironment is set to development
define ('ENV', 'development');
define ('SERVER_NAME', $_SERVER['SERVER_NAME']);
define ('SERVER_PATH', 'http://' . SERVER_NAME . '/fly/');
define ('ROOT', str_replace('\\', '/', dirname(realpath(__FILE__))) . '/');
define ('VIEW_PATH', dirname(realpath(__FILE__)) . '/app/views/');
define ('ASSET_PATH', dirname(realpath(__FILE__)) . '/app/assets/');
define ('CSS_PATH', SERVER_PATH.'app/assets/stylesheets/');
define ('JS_PATH', SERVER_PATH.'app/assets/javascripts/');
define ('VENDOR_CSS_PATH', SERVER_PATH.'app/assets/stylesheets/');
define ('VENDOR_JS_PATH', SERVER_PATH.'vendor/assets/javascripts/');
require_once 'config/fly.php';
debug();

$uri = $_SERVER['PATH_INFO'];
Registry::set('uri', $uri);

Router::dispatch();

?>