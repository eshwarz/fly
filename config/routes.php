<?php
// Match can be used to match the routing to an action of a controller,
// where third argument creates a constant profile_path for the below example
// Router::match('profile', 'home#profile', 'profile');

// Define a site root.
// Router::root('home#index');

Router::root('test#index');
Router::match('test_page', 'test#index', 'test');
Router::match('test_posts', 'test#posts', 'test_posts');
Router::match('test_form', 'test#forms', 'test_form');

?>