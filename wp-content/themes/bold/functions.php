<?php
// Enqueuing custom javascript and stylesheets
function bd_loadFiles() {
	wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
	wp_enqueue_style( 'vjcss', get_template_directory_uri().'/vtourdata/lib/jquery-ui-1.11.1/jquery-ui.min.css' );
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );
	wp_enqueue_style( 'dcss', get_template_directory_uri().'/darren.css' );
	wp_enqueue_style( 'fonts-css', 'https://cloud.typography.com/7180776/6475772/css/fonts.css' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' ,array( 'jquery' ));
	wp_enqueue_script( 'tween-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js' ,array( 'jquery' ));
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',array( 'jquery' ));
	wp_enqueue_script( 'masonry-js', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js',array( 'jquery' ));
	wp_enqueue_script( 'imageloaded-js', 'https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js',array( 'jquery' ));
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js',array( 'jquery' ));
	wp_enqueue_script( 'ajax_script', get_template_directory_uri() . '/assets/js/ajax.js',array( 'jquery' ));
	wp_localize_script( 'ajax_script', 'ajax_events', array( 'ajax_url' => admin_url('admin-ajax.php') ) ); 	
}
add_action( 'wp_enqueue_scripts', 'bd_loadFiles' );

//theme support
add_theme_support('menus');



//ajax
// add_action( 'wp_ajax_set_header', 'hce_set_header' );
// add_action( 'wp_ajax_nopriv_set_header', 'hce_set_header' );

// function hce_set_header() {
// 	die();
// }




// acf theme options
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

show_admin_bar( false );

add_theme_support( 'post-thumbnails' ); 

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
