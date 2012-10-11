<?php

require_once ROOT."db/connection.php";
require_once ROOT."vendor/php-activerecord/ActiveRecord.php";

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory(ROOT.'app/models');
$cfg->set_connections(
	array(
		'development' => $con['development'],
		// 'test' => $con['test'],
		// 'production' => $con['production']
	)
);
$cfg->set_default_connection($con['default']);

?>