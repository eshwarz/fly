<?php
if (HTTP_HOST == 'local.fly.com'){
	define('ENV', 'development');
} else if (HTTP_HOST == 'fly') {
	define('ENV', 'production');
}
?>