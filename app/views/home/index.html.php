<?php
echo $play;
echo $title;
echo "<hr/>";
echo $content;

$fruits = array( 'apple', 'banana', 'orange', 'grapes', 'pine apple' );

foreach ($fruits as $key => $fruit) {
	View::render( array( 'partial' => 'fruit', 'locals' => array( 'fruit' => $fruit ) ) );
}

foreach ($posts as $post) {
	echo '<div style="padding: 5px; border-bottom: 1px solid #777;">' . $post->message . '</div>';
}


?>