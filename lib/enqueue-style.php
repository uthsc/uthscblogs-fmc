<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
if( ! function_exists( 'reverie_enqueue_style' ) ) {
	function reverie_enqueue_style()
	{
		// foundation stylesheet
		//wp_register_style( 'reverie-foundation-stylesheet', get_template_directory_uri() . '/css/app.css', array(), '' );

		// Register the main style
		//wp_register_style( 'reverie-stylesheet', get_template_directory_uri() . '/css/style.css', array(), '', 'all' );

        // Register the uthsc stylesheet
        wp_register_style( 'uthsc-stylesheet', get_template_directory_uri() . '/css/uthsc.css', array(), '', 'all' );

        // Register the uthsc stylesheet
        //wp_register_style( 'ie-stylesheet', get_template_directory_uri() . '/css/ie.css', array(), '', 'all' );

		//wp_enqueue_style( 'reverie-foundation-stylesheet' );
		wp_enqueue_style( 'reverie-stylesheet' );
        wp_enqueue_style( 'uthsc-stylesheet' );
        //wp_enqueue_style( 'ie-stylesheet' );
	}
}
add_action( 'wp_enqueue_scripts', 'reverie_enqueue_style' );