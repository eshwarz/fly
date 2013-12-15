<?php
// Match can be used to match the routing to an action of a controller,
// where third argument creates a constant profile_path for the below example
// Router::match('profile', 'home#profile', 'profile');
	
// Define a site root.
// Router::root('home#index');

Router::root('test#index');

{
	// User creation routes.
	Router::match('sign_up', 'registrations#_new', 'new_user');
	Router::match('registrations/create', 'registrations#create', 'create_user');
}

{
	// user authentication routes.
	Router::match('sign_in', 'sessions#_new', 'user_sign_in');
	Router::match('sessions/create', 'sessions#create', 'create_user_session');
	Router::match('sign_out', 'sessions#destroy', 'user_sign_out');
}

?>