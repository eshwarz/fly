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
	content_tag('p', 'Paragraph text here') . content_tag('span', 'Span text here'),
	array('style' => 'padding: 5px; background: #333; color: #FFF;')
);

?>