<?php
function debug ()
{
	ini_set('display_errors',1);
	error_reporting(E_ALL ^ E_NOTICE);
	// error_reporting(E_ALL);
}