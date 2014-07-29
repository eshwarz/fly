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
define('SERVER_NAME', $_SERVER['SERVER_NAME']);
define('SERVER_PATH', 'http://' . SERVER_NAME . '/');
define('ROOT', str_replace('\\', '/', dirname(realpath(__FILE__))) . '/');
define('VIEW_PATH', dirname(realpath(__FILE__)) . '/app/views/');
define('ASSET_PATH', dirname(realpath(__FILE__)) . '/app/assets/');
define('CSS_PATH', '/app/assets/stylesheets/');
define('JS_PATH', '/app/assets/javascripts/');
define('VENDOR_CSS_PATH', '/vendor/assets/stylesheets/');
define('VENDOR_JS_PATH', '/vendor/assets/javascripts/');

require_once 'config/constants.php';
require_once 'config/environment.php';
require_once 'config/lessc.php';
require_once 'config/fly.php';
require_once 'config/initializers/fly_functions.php';
require_all('config/initializers/');
require_once 'db/database.php';
require_all('app/models/');
require_once 'config/routes.php';
require_all('app/helpers/');

debug();
set_error_handler('error_handler');
register_shutdown_function('shutdown');


$redirect_url = server('REDIRECT_URL');
if (!empty($redirect_url)) {
	$uri = $redirect_url;
} else {
	$uri = server('REQUEST_URI');
}

Registry::set('uri', $uri);

Router::dispatch();


// change 1
// change 2