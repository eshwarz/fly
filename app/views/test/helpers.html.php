<?php
render ( array( 'partial' => 'header', 'locals' => array( 'title' => $title ) ) );
?>

<h3>Usage of Anchor Helpers</h3>

<?php
echo link_to('posts_path', posts_path);
echo nl2br("\n");
echo link_to('posts_test_path', posts_test_path);
echo nl2br("\n");
echo link_to('test_profile_path', test_profile_path);
echo nl2br("\n");
?>

<h3>Usage of Tag Helpers</h3>

<?php
echo content_tag('div',
	content_tag('pre', 'Paragraph text here', array('style' => 'margin: 0 0 10px 0;')) . content_tag('span', 'Span text here'),
	array('style' => 'padding: 10px; background: #333; color: #FA8F3B;', 'class' => 'shadow w200 rad5')
);
?>

<h3>Formatters</h3>

<?php
 echo hr();
 echo strong('This is strong tag!');
 echo br();
 echo b('This is b tag!', array('style' => 'color: #C00'));
 echo br();
 echo i('This is i tag!');
 echo br();
 echo u('This is u tag!');
 echo br();
 echo em('This is em tag!');
?>