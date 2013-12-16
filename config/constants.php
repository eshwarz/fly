<?php
// constants define here.

defined('HTTP_HOST') or define('HTTP_HOST', $_SERVER['HTTP_HOST']);

// session controller releated constants
define('USER_SESSION_KEY', 'fly_user');
define('USER_TIMEZONE_KEY', 'fly_timezone');
define('AFTER_SIGN_IN_PATH', 'test_path');

// less stylesheets are included on development environment, this can be set to true to enable less.watch() mode
// can be set to false if less takes lots of time to compile
defined('LESS_STYLE_ON_DEV') or define('LESS_STYLE_ON_DEV', true);

// cookie constants
define('COOKIE_PATH', '/');
define('COOKIE_DOMAIN', 'fly');
define('REMEMBER_ME_EXPIRE_TIME', 60*60*24*30);
