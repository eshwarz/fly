<?php
function handle_errors () {
	// displaying the errors on other platforms except production
	
	// reporting all errors except notices
	error_reporting(E_ALL ^ E_NOTICE);
	// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	// turning off default error display
	ini_set('display_errors', '0');

	// custom error display in case of any errors
	if (ENV != 'production') {
		set_error_handler('error_handler');
		register_shutdown_function('shutdown');
	}
}