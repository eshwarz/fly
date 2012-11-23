<?php
if ($_GET['failed'] == 1) {
	?>
	<center class="error">Invalid Email Address or Password!</center>
	<?php
}

if ($_GET['success'] == 1) {
	?>
	<center class="error">Succesfully Created New User!</center>
	<?php
}
?>

<?php
View::render( array( 'partial' => 'test/header', 'locals' => array( 'title' => $title ) ) );
?>

<h2 class="center">Sign In</h2>
<div style="width: 500px; margin: auto;">
	<?php
		$form = new Form('User');
		echo $form->form_tag( array( 'action' => 'create', 'method' => 'POST', 'validate' => 'true' ));
		echo $form->input( 'email', array( 'placeholder' => 'Email Address', 'validate' => 'true' ) );
		echo $form->input( 'password', array( 'as' => 'password', 'placeholder' => 'Password', 'validate' => 'true' ) );
		echo $form->input( 'remember', array( 'label' => '', 'as' => 'checkbox', 'collection' => array(array(' Remember', '1')) ) );
		echo $form->format('', Form::submit(array( 'value' => 'Sign Up' )));
		echo $form->end_form();

	?>

	<?php
	View::render(array('partial' => 'shared/authentication_links'));
	?>
</div>