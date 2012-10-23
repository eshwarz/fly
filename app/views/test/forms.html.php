<?php
View::render( array( 'partial' => 'header', 'locals' => array( 'title' => $title ) ) );
?>

<h2 class="center">Test Form</h2>
<div style="margin:auto; width: 500px;">
	<?php
	$groups = array(array('CSE', 'cse'), array('ECE', 'ece'), array('IT', 'it', 'checked'), array('ICT', 'ict'), array('Vocational', 'voc'), array('Others', 'others'));
	$gender = array(array('Male', 'm'), array('Female', 'f'));
	$courses = array(array('C++', 'cpp'), array('Java', 'java', 'checked'), array('PHP', 'php'));

	Form::form_tag(array( 'url' => test_path, 'method' => 'post' ));
		Form::input('first_name', array( 'placeholder' => 'Fill First Name' ));
		Form::input('last_name', array( 'placeholder' => 'Fill Last Name' ));
		Form::input('about', array( 'as' => 'textarea', 'placeholder' => 'Fill Last Name', 'label' => 'About you' ));
		Form::input('gender', array( 'as' => 'select', 'prompt' => 'Select Gender', 'collection' => $gender ));
		Form::input('group', array( 'as' => 'radio', 'collection' => $groups ));
		Form::input('courses', array( 'as' => 'checkbox', 'collection' => $courses, 'stacked' => 'true' ));

		Form::format( Form::reset(array('value' => 'Refresh')), Form::submit(array('value' => 'Save', 'class' => 'btn')) );		
	Form::end_form();
	?>
</div>