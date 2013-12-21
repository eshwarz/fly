<?php
if (View::$_rendered_layout == 'test') {
	$style = 'background: #666; border-bottom: 1px solid #222;';
}
?>

<div class="fly_header" style="<?= $style ?>">
	<?php echo image_tag('logo_small.png', array('width' => '50px', 'class' => 'fl ml10')); ?>
	<h2 class="fl ml20"><?php echo $title; ?></h2>
	<?php
	if (Router::$_called_controller != 'test' || Router::$_called_action != 'index') {
		echo link_to ('Back', test_path, array('class' => 'fr lh50 mr30'));
	}

	if (current_user()) {
		echo link_to ('Sign Out', user_sign_out_path, array('class' => 'fr lh50 mr30'));
	}
	
	?>
	<div class="clearfix"></div>
</div>