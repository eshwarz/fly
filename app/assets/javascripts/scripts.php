<?php
// Example for including javascripts
// require_js('home');

if (LESS_STYLE_ON_DEV == true && ENV == 'development') {
	require_js('less.config');
}
require_js('less');
require_js('jquery');
require_js('form_validation');