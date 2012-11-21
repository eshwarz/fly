<?php
if ($_GET['failed'] == 1) {
	?>
	<center class="error">Invalid Email Address or Password!</center>
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
		$form->form_tag( array( 'action' => 'create', 'method' => 'POST', 'validate' => 'true' ));
		$form->input( 'email', array( 'placeholder' => 'Email Address', 'validate' => 'true' ) );
		$form->input( 'password', array( 'as' => 'password', 'placeholder' => 'Password', 'validate' => 'true' ) );
		$form->input( 'remember', array( 'label' => '', 'as' => 'checkbox', 'collection' => array(array(' Remember', '1')) ) );
		$form->format('', Form::submit(array( 'value' => 'Sign Up' )));
		$form->end_form();

	?>

	<?php
	View::render(array('partial' => 'shared/authentication_links'));
	?>
</div>