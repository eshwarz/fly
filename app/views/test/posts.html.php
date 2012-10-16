<div class="fly_header">
	<?php image_tag('logo.png', array('width' => '50px', 'class' => 'fl ml10')); ?>
	<h2 class="fl ml20"><?php echo $title; ?></h2>
	<div class="clearfix"></div>
</div>
<?php

echo $content;

$fruits = array( 'apple', 'banana', 'orange', 'grapes', 'pine apple' );

foreach ($fruits as $key => $fruit) {
	View::render( array( 'partial' => 'fruit', 'locals' => array( 'fruit' => $fruit ) ) );
}
?>