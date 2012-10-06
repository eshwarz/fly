<?php
// constants defined here.
session_start();

define ('ROOT', dirname(realpath(__FILE__)) . '/');
define ('VIEW_PATH', dirname(realpath(__FILE__)) . '/app/views/');
define ('ASSET_PATH', dirname(realpath(__FILE__)) . '/app/assets/');
require_once 'config/fly.php';

// debug();
error_reporting(5);
$uri = $_SERVER['PATH_INFO'];
Registry::set('uri', $uri);

Router::dispatch();

?>