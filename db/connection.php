<?php
// Example: $con['environment'] = 'mysql://username:password@localhost/test_database_name';
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Windows') !== false) {
	// windows
	$con['development'] = 'mysql://root:@localhost/fly';
} else {
	// linux
	$con['development'] = 'mysql://root:eshwar123@localhost/fly';
}
// $con['test'] = 'mysql://username:password@localhost/test_database_name';
// $con['production'] = 'mysql://username:password@localhost/production_database_name';

$con['default'] = ENV;
?>
