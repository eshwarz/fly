<!DOCTYPE html>
<html>
	<head>
		<meta name="keywords" content="fly, fly with PHP, MVC for PHP" />
		<meta name="description" content="Eshwar's fly with PHP'" />
		
		<title><?php echo $title; ?></title>
		<?php 
		require_once ROOT . 'app/assets/stylesheets/css.php';
		require_once ROOT . 'app/assets/favicon/favicon.php';
		require_once ROOT . 'app/assets/javascripts/scripts.php';
		?>
		<style type="text/css">
		a {
			color: #FFF;
		}
		</style>
	</head>
	<body>
		<div class="container container_pad">

			<div class="paper" style="background: #333; color: #DDD; border: 1px solid #222;">

				<div class="p10">
					<?php render (array('partial' => 'test/header', 'locals' => array( 'title' => $title ))); ?>
					{{yield}}
				</div>	
			</div>
		</div>
	</body>
</html>