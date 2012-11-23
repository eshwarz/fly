<?php
	$active_record = "<a target='_blank' href='http://www.phpactiverecord.org/projects/main/wiki'>PHP ActiveRecord</a>";
	$less_css = "<a target='_blank' href='http://www.lesscss.org/'>lesscss</a>";
	$jquery = "<a target='_blank' href='http://www.jquery.com/'>jQuery</a>";
	
	View::render( array( 'partial' => 'header', 'locals' => array( 'title' => $title ) ) );
?>

<?php	echo $content; ?>

<div class="mt30">
	<h3>Step 1: Create Controller</h3>
	<p>Create the controller with a name followed by "_controller" inside "app/controllers" directory and the extension should be '.php'</p>
	<p class="">Example: app/controllers/home_controller.php</p>
</div>

<div class="mt30">
	<h3>Step 2: Create Views</h3>
	<p>Create a directory with the name of controller in views directory, then create view files with the extension '.html.php'</p>	
	<p class="">Example: app/views/home/index.html.php</p>
</div>

<div class="mt30">
	<h3>Step 3: Create Models</h3>
	<p>
		Fly PHP uses <?php echo $active_record; ?> for ORM. So there is lot of documentation on <?php echo $active_record; ?>. Visit <?php echo $active_record; ?> site. Its pretty simple and has many finder methods, validations, joinnings and lot more.
	</p>
</div>

<div class="mt30">
	<h3>Step 4: CSS</h3>
	<p>
		Fly PHP uses <?php echo $less_css; ?> for writing CSS faster. Have a look at <?php echo $less_css; ?> or write your own CSS. Save stylesheets in "app/assets/stylesheets/" and include the file in "app/assets/stylesheets/css.php".
	</p>
	<p class="">Example: app/assets/stylesheets/main.less</p>
</div>

<div class="mt30">
	<h3>Step 5: Javascripts</h3>
	<p>
		Fly PHP uses <?php echo $jquery; ?>. Save javascripts in "app/assets/javascripts/" and include the file in "app/assets/stylesheets/scripts.php".
	</p>
	<p class="">Example: app/assets/javascripts/home.js</p>
</div>

<div class="mt30">
	<h3>Some Test pages Created While Development</h3>
	<div class="h_pad_links">
		<?php
		echo link_to ('Posts', test_posts_path);
		echo link_to ('Forms', test_form_path);
		echo link_to ('Sign Up', new_user_path);
		echo link_to ('Sign In', user_sign_in_path);
		?>
	</div>
</div>