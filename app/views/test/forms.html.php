<h2 class="center">Test Form</h2>
<div style="margin:auto; width: 500px;">
	<?php
	$groups = array(array('CSE', 'cse'), array('ECE', 'ece'), array('IT', 'it', 'checked'), array('ICT', 'ict'), array('Vocational', 'voc'), array('Others', 'others'));
	$gender = array(array('Male', 'm'), array('Female', 'f'));
	$courses = array(array('C++', 'cpp'), array('Java', 'java', 'checked'), array('PHP', 'php'));

	$f = new Form('Model');

	echo $f->form_tag(array('url' => test_path));
		
		echo $f->input('first_name', array( 'placeholder' => 'Fill First Name' ));
		echo $f->input('last_name', array( 'placeholder' => 'Fill Last Name' ));
		echo $f->input('pass', array( 'as' => 'password', 'placeholder' => 'Password' ));
		echo $f->input('uid', array( 'as' => 'hidden', 'value' => '324368493' ));
		echo $f->input('about', array( 'as' => 'textarea', 'placeholder' => 'Fill Last Name', 'label' => 'About you' ));
		echo $f->input('gender', array( 'as' => 'select', 'prompt' => 'Select Gender', 'collection' => $gender ));
		echo $f->input('group', array( 'as' => 'radio', 'collection' => $groups ));
		echo $f->input('courses', array( 'as' => 'checkbox', 'collection' => $courses, 'stacked' => true ));

		echo $f->format(
			$f->reset(array('value' => 'Refresh')),
			$f->submit(array('value' => 'Save', 'class' => 'btn'))
		);

	echo $f->end_form();
	?>
</div>