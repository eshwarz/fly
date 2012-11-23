<?php
if ($_GET['email'] == 'exists') {
	?>
	<center class="error">Email Address already exists!</center>
	<?php
}

View::render( array( 'partial' => 'test/header', 'locals' => array( 'title' => $title ) ) );
?>

<h2 class="center">Sign Up</h2>

<div style="width: 500px; margin: auto;">
	<?php
		$form = new Form('User');
		echo $form->form_tag( array( 'action' => 'create', 'method' => 'POST', 'validate' => 'true' ));
		echo $form->input( 'first_name', array( 'placeholder' => 'First Name', 'validate' => 'true' ) );
		echo $form->input( 'last_name', array( 'placeholder' => 'Last Name', 'validate' => 'true' ) );
		echo $form->input( 'email', array( 'placeholder' => 'Email Address', 'validate' => 'true', 'validate_flag' => 'email' ) );
		echo $form->input( 'password', array( 'as' => 'password', 'placeholder' => 'Password', 'validate' => 'true', 'validate_flag' => 'password' ) );
		echo $form->input( 'confirm_password', array( 'as' => 'password', 'placeholder' => 'Confirmation Password', 'validate' => 'true', 'validate_flag' => 'confirm_password' ) );
		echo $form->input( 'sex', array( 'as' => 'select', 'prompt' => 'Select Sex', 'collection' => User::genders(), 'validate' => 'true' ) );

		echo $form->format('', Form::submit(array( 'value' => 'Sign Up' )));
		echo $form->end_form();
	?>

	<?php
	View::render(array('partial' => 'shared/authentication_links'));
	?>
</div>

