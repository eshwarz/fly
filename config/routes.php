<?php
// Match can be used to match the routing to an action of a controller,
// where third argument creates a constant profile_path for the below example
// Router::match('profile', 'home#profile', 'profile');
	
// Define a site root.
// Router::root('home#index');

Router::root( 'home#index' );

{
	// home controller
	Router::match('about', 'home#about', 'about');
	Router::match('portfolio', 'home#portfolio', 'portfolio');
	Router::match('blog', 'posts#index', 'blog');
	Router::match('contact', 'home#contact', 'contact');
	// Router::match('users/sign_in', 'users#sign_in', 'sign_in');
}

{
	// posts controller
	Router::match('posts/_new', 'posts#_new', 'new_post');
}

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

{
	// test routes (these can be deleted along with test_controller and their corresp+oding views)
	Router::match('test_page', 'test#index', 'test');
	Router::match('test_posts', 'test#posts', 'test_posts');
	Router::match('test_form', 'test#forms', 'test_form');
	Router::match('test_profile', 'test#profile', 'test_profile');
}

?>