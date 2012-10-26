<h2 class="center">Sign Up</h2>

<div style="width: 500px; margin: auto;">
	<?php
		$form = new Form('User');
		$form->form_tag( array( 'url' => create_user_path, 'method' => 'POST' ));
		$form->input( 'first_name', array( 'placeholder' => 'First Name' ) );
		$form->input( 'last_name', array( 'placeholder' => 'Last Name' ) );
		$form->input( 'email', array( 'placeholder' => 'Email Address' ) );
		$form->input( 'password', array( 'as' => 'password', 'placeholder' => 'Password' ) );
		$form->input( 'confirm_password', array( 'as' => 'password', 'placeholder' => 'Confirmation Password' ) );
		$form->input( 'sex', array( 'as' => 'select', 'prompt' => 'Select Sex', 'collection' => User::genders() ) );
		$form->format('', Form::submit(array( 'value' => 'Sign Up' )));
		$form->end_form();
	?>
</div>