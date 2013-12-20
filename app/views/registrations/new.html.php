<?php
if (params('email') == 'exists') {
	?>
	<center class="error">Email Address already exists!</center>
	<?php
}
?>

<h2 class="center">Sign Up</h2>

<div style="width: 400px; margin: auto;" class="stacked no_labels">
	<?php
		$f = new Form('User');
		echo $f->form_tag(array('action' => 'create', 'method' => 'POST', 'validate' => 'true', 'stacked' => true, 'autocomplete' => 'off'));
		echo $f->input('first_name', array( 'placeholder' => 'First Name', 'validate' => 'true'));
		echo $f->input('last_name', array( 'placeholder' => 'Last Name', 'validate' => 'true'));
		echo $f->input('email', array( 'placeholder' => 'Email Address', 'validate' => 'true', 'validate_flag' => 'email'));
		echo $f->input('password', array( 'as' => 'password', 'placeholder' => 'Password', 'validate' => 'true', 'validate_flag' => 'password'));
		echo $f->input('confirm_password', array( 'as' => 'password', 'placeholder' => 'Confirmation Password', 'validate' => 'true', 'validate_flag' => 'confirm_password'));
		echo $f->input('sex', array( 'as' => 'select', 'prompt' => 'Select Sex', 'collection' => User::genders(), 'validate' => 'true'));

		echo $f->format('', Form::submit(array( 'value' => 'Sign Up' )));
		echo $f->end_form();
	?>

	<?php
	render (array('partial' => 'shared/authentication_links'));
	?>
</div>

