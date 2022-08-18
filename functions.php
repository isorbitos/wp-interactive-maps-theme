<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.1
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.1' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=key', NULL, '1.0', true);
	wp_enqueue_script('main-astra-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


function astra_bonus_post_types(){
	register_post_type('address', array(
		'show_in_rest' => true,
		'supports' => array('title', 'excerpt', 'editor'),
		'rewrite' => array('slug' => 'addresses'),
		'public' => true,
		'has_archive' => true,
		'labels' => array(
			'name' => 'Adresai',
			'add_new_item' => 'Pridėkite Adresą',
			'edit_item' => 'Redaguoti Adresą',
			'all_items' => 'Visi Adresai',
			'singular_name' => 'Adresas'
		),
		'menu_icon' => 'dashicons-admin-site-alt',
		'show_in_rest' => true
	));
}

function astraMapKey ($api){
	$api['key'] = 'key';
	return $api;
  }

function map_function($atts){
	get_template_part('template-parts/shortMap');
}

add_action('init', 'astra_bonus_post_types');
add_filter('acf/fields/google_map/api', 'astraMapKey');
add_shortcode('googleMapDiv', 'map_function');