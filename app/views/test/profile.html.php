<h2 class="center">Test Profile page</h2>

<h3>Welcome <?= $user->first_name ?>!</h3>

<?= beautify_params('Name', $user->first_name . ' ' . $user->last_name) ?>
<?= beautify_params('Email', $user->email) ?>
<?= beautify_params('Gender', User::getGender($user->sex)) ?>