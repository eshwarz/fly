<?php
if (params('failed') == 1) {
	?>
	<center class="error">Invalid Email Address or Password!</center>
	<?php
}

if (params('success') == 1) {
	?>
	<center class="error">Succesfully Created New User!</center>
	<?php
}
?>

<h2 class="center">Sign In</h2>
<div style="width: 400px; margin: auto;">
	<?php
		$form = new Form('User');
		echo $form->form_tag( array( 'action' => 'create', 'method' => 'POST', 'validate' => 'true', 'stacked' => true ));
		echo $form->input( 'email', array( 'placeholder' => 'Email Address', 'validate' => 'true' ) );
		echo $form->input( 'password', array( 'as' => 'password', 'placeholder' => 'Password', 'validate' => 'true' ) );
		echo $form->input( 'remember', array( 'label' => '', 'as' => 'checkbox', 'collection' => array(array(' Keep me logged in!', '1')) ) );
		echo $form->format('', Form::submit(array( 'value' => 'Sign In' )));
		echo $form->end_form();
		
		render (array('partial' => 'shared/authentication_links'));
	?>
</div>

<script type="text/javascript">
$(document).ready(function(){
	setTimeout(function () {
		Fly.validate.check();
	}, 1000);
});
</script>