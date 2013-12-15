<?php
if (HTTP_HOST == 'fly' || HTTP_HOST == 'local.fly.com'){
	define('ENV', 'development');
} else {
	define('ENV', 'production');
}
?>