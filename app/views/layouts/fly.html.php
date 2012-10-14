<!DOCTYPE html>
<html>
	<head>
		<meta name="keywords" content="fly, fly with PHP, MVC for PHP" />
		<meta name="description" content="Eshwar's fly with PHP'" />
		
		<title><?php echo "Fly PHP"; ?></title>
		<?php 
		require_once ROOT . 'app/assets/stylesheets/css.php';
		require_once ROOT . 'app/assets/favicon/favicon.php';
		require_once ROOT . 'app/assets/javascripts/scripts.php';
		?>
	</head>
	<body class="container">
		{{yield}}
		<?php View::render( array('partial' => 'shared/footer') ); ?>
	</body>
</html>