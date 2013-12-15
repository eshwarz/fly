<?php
echo $content;

$fruits = array( 'apple', 'banana', 'orange', 'grapes', 'pine apple' );

foreach ($fruits as $key => $fruit) {
	render ( array( 'partial' => 'fruit', 'locals' => array( 'fruit' => $fruit ) ) );
}

echo link_to('Test Page', test_path, array( 'class' => 'new_link', 'title' => 'Test Page' ));
?>