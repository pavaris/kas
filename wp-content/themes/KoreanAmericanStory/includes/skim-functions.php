<?php
/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        iKAS
 * @author         G Soul Inc 
 * @copyright      2015 G Soul Inc
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://GSoul.net
 * @since          available since Release 1.0
 */

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'featured_thumb', 600, 600, true ); //(cropped)
}

function iKAS_scripts() {

	// Adds all css file to the wp_enqueue_style
	wp_enqueue_style( 'iKAS-linea-arrows', get_template_directory_uri().'/css/linea-arrows.css', array());
	wp_enqueue_style( 'iKAS-linea-basic-elaboration', get_template_directory_uri().'/css/linea-basic-elaboration.css', array());
	wp_enqueue_style( 'iKAS-linea-basic', get_template_directory_uri().'/css/linea-basic.css', array());
	wp_enqueue_style( 'iKAS-linea-ecommerce', get_template_directory_uri().'/css/linea-ecommerce.css', array());
	wp_enqueue_style( 'iKAS-linea-music', get_template_directory_uri().'/css/linea-music.css', array());
	wp_enqueue_style( 'iKAS-linea-software', get_template_directory_uri().'/css/linea-software.css', array());
	wp_enqueue_style( 'iKAS-linea-weather', get_template_directory_uri().'/css/linea-weather.css', array());
	wp_enqueue_style( 'iKAS-magnific-popup', get_template_directory_uri().'/css/magnific-popup.css', array());
	wp_enqueue_style( 'iKAS-stylesheet', get_template_directory_uri().'/css/skim-style.css', array());
	wp_enqueue_style( 'iKAS-effects', get_template_directory_uri().'/css/skim-effects.min.css', array());

	// Adds all jQuery file to the wp_enqueue_scripts
	wp_enqueue_script( 'iKAS-magnific-popup',get_template_directory_uri().'/js/jquery.magnific-popup.min.js',array(),'1.1.0',true);
	wp_enqueue_script( 'iKAS-script',get_template_directory_uri().'/js/skim_script.js',array(),'1.0',true);

}
add_action( 'wp_enqueue_scripts', 'iKAS_scripts' );

?>