<?php
	$active_record = "<a target='_blank' href='http://www.phpactiverecord.org/projects/main/wiki'>PHP ActiveRecord</a>";
	$less_css = "<a target='_blank' href='http://www.lesscss.org/'>lesscss</a>";
	$jquery = "<a target='_blank' href='http://www.jquery.com/'>jQuery</a>";	
?>

<?php	echo $note; ?>

<div class="mt30">
	<h3>Step 1: Create Controller</h3>
	<p>Create the controller with a name followed by "_controller" inside "app/controllers" directory and the extension should be '.php'</p>
	<?= content_tag('pre', 'Example: '.b('app/controllers/home_controller.php'), array('style' => 'color: #0C0;')) ?>
</div>

<div class="mt30">
	<h3>Step 2: Create Views</h3>
	<p>Create a directory with the name of controller in views directory, then create view files with the extension '.html.php'</p>	
	<?= content_tag('pre', 'Example: '.b('app/views/home/index.html.php'), array('style' => 'color: #0C0;')) ?>
</div>

<div class="mt30">
	<h3>Step 3: Create Models</h3>
	<p>
		Fly PHP uses <?php echo $active_record; ?> for ORM. So there is lots of documentation on <?php echo $active_record; ?>. Visit <?php echo $active_record; ?> site. Its pretty simple and has many finder methods, validations, joinnings and lot more.
	</p>
</div>

<div class="mt30">
	<h3>Step 4: CSS</h3>
	<p>
		Fly PHP uses <?php echo $less_css; ?> for writing CSS faster. Have a look at <?php echo $less_css; ?> or write your own CSS. Save stylesheets in "app/assets/stylesheets/" and include the file in "app/assets/stylesheets/css.php".
	</p>
	<?= content_tag('pre', 'Example: '.b('app/assets/stylesheets/main.less'), array('style' => 'color: #0C0;')) ?>
</div>

<div class="mt30">
	<h3>Step 5: Javascripts</h3>
	<p>
		Fly PHP uses <?php echo $jquery; ?>. Save javascripts in "app/assets/javascripts/" and include the file in "app/assets/stylesheets/scripts.php".
	</p>
	<?= content_tag('pre', 'Example: '.b('app/assets/javascripts/home.js'), array('style' => 'color: #0C0;')) ?>
</div>

<div class="mt30">
	<h3>Some Test pages Created While Development</h3>
	<div class="h_pad_links">
		<?php
		echo link_to('Posts', test_posts_path);
		echo link_to('Forms', test_forms_path);
		echo link_to('Sign Up', new_user_path);
		echo link_to('Sign In', user_sign_in_path);
		echo link_to('Profile', test_profile_path);
		echo link_to('Usage of HTML Helpers', test_helpers_path);
		echo link_to('Usage of Input Helpers', test_input_path, array('params' => array('id' => 1234567890, 'fruit' => 'apple')));
		echo link_to('Arguments', test_arguments_ . 'show' . _ . 2 . _path);

		$script = "
			<script>
				alert('XSS succeeded! Here is your cookie');
				alert(document.cookie);
			</script>
		";
		echo link_to('XSS Testing', '/test/xss_test', array('params' => array('q' => $script)));

		echo content_tag('p', 'Paths to links can be given as mere constants and the convention is ' . b('controller') . ' followed by ' . b('_') . ' and ' . b('action') . ' followed by ' . b('_') . ' and ' . b('path'));
		echo content_tag('p', 'Action is defaulted to index action in case of no action is given');
		echo content_tag('pre', 'Syntax: '.b('controller_action_path'), array('style' => 'color: #00C;'));
		echo content_tag('pre',
			'Example: ' . b('test_forms_path') . content_tag('span', ' points to /test/forms.', array('style' => 'color: #333')),
			array('style' => 'color: #0C0;'));
		?>
	</div>
</div>