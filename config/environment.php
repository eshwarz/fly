<?php
if (HTTP_HOST == 'local.portfolio.com' || HTTP_HOST == 'local.pavsesh.com' || HTTP_HOST == 'portfolio' || HTTP_HOST == 'pavsesh'){
	define('ENV', 'development');
} else {
	define('ENV', 'production');
}
?>