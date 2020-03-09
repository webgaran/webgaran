<?php

/*
	
@package sunsettheme
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function sunset_load_admin_scripts( $hook ){
	// echo $hook;
	if( 'toplevel_page_alecaddd_sunset' == $hook ){ 
	
		wp_register_style( 'sunset_admin', get_template_directory_uri() . '/assets/admin/css/sunset.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'sunset_admin' );
		
		wp_enqueue_media();
		
		wp_register_script( 'sunset-admin-script', get_template_directory_uri() . '/assets/admin/js/sunset.admin.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'sunset-admin-script' );
	
	} else if ( 'sunset_page_alecaddd_sunset_css' == $hook ){
		
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/assets/admin/css/sunset.ace.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/assets/admin/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'sunset-custom-css-script', get_template_directory_uri() . '/assets/admin/js/sunset.custom_css.js', array('jquery'), '1.0.0', true );
	
	} else { return; }
	
}

add_action( 'admin_enqueue_scripts', 'sunset_load_admin_scripts' );







/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/
function awesome_script_enqueue() {
	//css
		wp_enqueue_style( 'fontawesome' , get_template_directory_uri() . '/assets/css/fontawesome.min.css');
    	wp_enqueue_style( 'flaticon' , get_template_directory_uri() . '/assets/css/flaticon.css');
    	wp_enqueue_style( 'fonts' , get_template_directory_uri() . '/assets/css/fonts.css');
    	wp_enqueue_style( 'webgaran-bootstrap' , get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    	wp_enqueue_style( 'webgaran', get_stylesheet_uri() );
    //js
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery' , get_template_directory_uri() . '/assets/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'webgaran-like-post-js', get_template_directory_uri() . '/assets/js/like-post.js', array(), '20142542', true );//https://github.com/daveyheuser/WP-ajax-like-button
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '20190401', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20190402', true );

}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

