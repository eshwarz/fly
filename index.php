<?php
/**
 * FlyPHP
 *
 * @author Eshwar Chandra Y K <eshwarcc@gmail.com>; <mail@eshwar.me>
 * @link http://www.pavsesh.com/
 * @copyright 2008-2013 FlyPHP
 * @license http://www.pavsesh.com/license/
 * @package system
 * @since 1.0
 */

// constants defined here.
session_start();

// environment file

define ('SERVER_NAME', $_SERVER['SERVER_NAME']);
define ('SERVER_PATH', 'http://' . SERVER_NAME . '/');
define ('ROOT', str_replace('\\', '/', dirname(realpath(__FILE__))) . '/');
define ('VIEW_PATH', dirname(realpath(__FILE__)) . '/app/views/');
define ('ASSET_PATH', dirname(realpath(__FILE__)) . '/app/assets/');
define ('CSS_PATH', SERVER_PATH.'app/assets/stylesheets/');
define ('JS_PATH', SERVER_PATH.'app/assets/javascripts/');
define ('VENDOR_CSS_PATH', SERVER_PATH.'vendor/assets/stylesheets/');
define ('VENDOR_JS_PATH', SERVER_PATH.'vendor/assets/javascripts/');

require_once 'config/constants.php';
require_once 'config/environment.php';
require_once 'config/fly.php';

debug();

$uri = $_SERVER['REDIRECT_URL'];
Registry::set('uri', $uri);

Router::dispatch();