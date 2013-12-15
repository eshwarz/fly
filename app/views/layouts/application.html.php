<!DOCTYPE html>
<html>
	<head>
		<meta name="keywords" content="fly, fly with PHP, MVC for PHP" />
		<meta name="description" content="Eshwar's fly with PHP'" />
		
		<title><?php echo $title; ?></title>
		<?php 
		require_once ROOT . 'app/assets/stylesheets/css.php';
		require_once ROOT . 'app/assets/javascripts/scripts.php';
		require_once ROOT . 'app/assets/favicon/favicon.php';
		?>
	</head>
	<body>

		<div class="container container_pad">
			<div class="paper mb20">
				<div class="p10">
					<?php render (array('partial' => 'test/header', 'locals' => array( 'title' => $title ))); ?>
					{{yield}}
				</div>	
			</div>
		</div>

		<?php render (array('partial' => 'shared/footer')); ?>

	</body>
</html>