<?php
add_action( 'wp_enqueue_scripts', 'theme_style');
add_action( 'wp_footer', 'theme_scripts');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'widgets_init', 'register_my_widgets' );

function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => 'left_sidebar',
		'description'   => 'Description',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
	) );
	register_sidebar( array(
		'name'          => 'Top Sidebar',
		'id'            => 'top_sidebar',
		'description'   => 'Top Sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
	) );
}

function theme_register_nav_menu()
{
	register_nav_menu('top', 'Primary menu');
	register_nav_menu('footer', 'Footer menu');
}

function theme_style()
{
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('default', get_template_directory_uri().'/assets/css/default.css');
	wp_enqueue_style('layout', get_template_directory_uri().'/assets/css/layout.css');
	wp_enqueue_style('media-queries', get_template_directory_uri().'/assets/css/media-queries.css');
}
function theme_scripts()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('init', get_template_directory_uri(). '/assets/js/init.js', ['jquery'], null, true);	
	wp_enqueue_script('doubletaptogo', get_template_directory_uri(). '/assets/js/doubletaptogo.js', ['jquery'], null, true);	
	wp_enqueue_script('flexslider', get_template_directory_uri(). '/assets/js/jquery.flexslider.js', ['jquery'], null, true);	
	wp_enqueue_script('modernizr', get_template_directory_uri(). '/assets/js/modernizr.js', null, null, false);
}
?>