<?php
echo $play;
echo $title;
echo "<hr/>";
echo $content;

$fruits = array( 'apple', 'banana', 'orange', 'grapes', 'pine apple' );

foreach ($fruits as $key => $fruit) {
	View::render( array( 'partial' => 'fruit', 'locals' => array( 'fruit' => $fruit ) ) );
}

?>