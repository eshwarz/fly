<?php
View::render( array( 'partial' => 'header', 'locals' => array( 'title' => $title ) ) );

echo $content;

$fruits = array( 'apple', 'banana', 'orange', 'grapes', 'pine apple' );

foreach ($fruits as $key => $fruit) {
	View::render( array( 'partial' => 'fruit', 'locals' => array( 'fruit' => $fruit ) ) );
}

link_to('Test Page', test_path, array( 'class' => 'new_link', 'title' => 'Test Page' ));
?>