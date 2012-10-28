<?php
View::render( array( 'partial' => 'test/header', 'locals' => array( 'title' => $title ) ) );
?>

<h2 class="center">Sign Up</h2>

<div style="width: 500px; margin: auto;">
	<?php
		$form = new Form('User');
		$form->form_tag( array( 'action' => 'create', 'method' => 'POST', 'validate' => 'true' ));
		$form->input( 'first_name', array( 'placeholder' => 'First Name', 'validate' => 'true' ) );
		$form->input( 'last_name', array( 'placeholder' => 'Last Name', 'validate' => 'true' ) );
		$form->input( 'email', array( 'placeholder' => 'Email Address', 'validate' => 'true', 'validate_flag' => 'email' ) );
		$form->input( 'password', array( 'as' => 'password', 'placeholder' => 'Password', 'validate' => 'true', 'validate_flag' => 'password' ) );
		$form->input( 'confirm_password', array( 'as' => 'password', 'placeholder' => 'Confirmation Password', 'validate' => 'true', 'validate_flag' => 'confirm_password' ) );
		$form->input( 'sex', array( 'as' => 'select', 'prompt' => 'Select Sex', 'collection' => User::genders(), 'validate' => 'true' ) );

		$form->format('', Form::submit(array( 'value' => 'Sign Up' )));
		$form->end_form();
	?>

	<?php
	View::render(array('partial' => 'shared/authentication_links'));
	?>
</div>

