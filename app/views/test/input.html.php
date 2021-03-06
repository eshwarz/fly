<?php

echo content_tag('h2', 'View source code to understand - app/views/test/input.html.php', array('align' => 'center'));
echo content_tag('h3', 'Parmeters');

var_dump($params);
var_dump($id);
var_dump($fruit);


echo content_tag('h3', 'Session helpers');

set_session('u', 'eshwar');
set_session('vowels', 'a e i o u');

var_dump(session());
remove_session('vowels');
var_dump(session());


echo content_tag('h3', 'Cookie helpers');
set_cookie('my_cookie', 'my value here', 86400);
set_cookie('my_user', 123456, 86400);
remove_cookie('my_user');

var_dump(cookie('my_cookie'));
var_dump(cookie());

echo content_tag('h3', 'List of local variables');
var_dump($locals);

echo content_tag('h3', 'Displaying User Agent');
echo user_agent();
?>