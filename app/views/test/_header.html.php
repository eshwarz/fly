<div class="fly_header">
	<?php image_tag('logo_small.png', array('width' => '50px', 'class' => 'fl ml10')); ?>
	<h2 class="fl ml20"><?php echo $title; ?></h2>
	<?php
	if (Router::$_called_action != 'index') {
		link_to ( 'Back', test_path, array('class' => 'fr lh50 mr30') );
	}

	if (current_user()) {
		link_to ( 'Sign Out', user_sign_out_path, array('class' => 'fr lh50 mr30') );
	}
	
	?>
	<div class="clearfix"></div>
</div>