<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may want to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

/*
2. lib/enqueue-style.php
    - enqueue Foundation and Reverie CSS
*/
require_once('lib/enqueue-style.php');

/*
3. lib/foundation.php
	- add pagination
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*
5. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
 **********************/
if( ! function_exists( 'reverie_theme_support' ) ) {
    function reverie_theme_support() {
        // Add language supports.
        load_theme_textdomain('reverie', get_template_directory() . '/lang');

        // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(300, 300);
        add_image_size('fd-lrg', 1024, 99999);
        add_image_size('fd-med', 768, 99999);
        add_image_size('fd-sm', 320, 9999);

        // rss thingy
        add_theme_support('automatic-feed-links');

        // Add post formats support. http://codex.wordpress.org/Post_Formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'reverie'),
            'additional' => __('Additional Navigation', 'reverie'),
            'utility' => __('Utility Navigation', 'reverie'),
            'off-canvas' => __('Off Canvas Navigation', 'reverie')
        ));

        // Add custom background support
        add_theme_support( 'custom-background',
            array(
                'default-image' => '',  // background image default
                'default-color' => '', // background color default (dont add the #)
                'wp-head-callback' => '_custom_background_cb',
                'admin-head-callback' => '',
                'admin-preview-callback' => ''
            )
        );
    }
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Sidebar',
        'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Footer',
        'before_widget' => '<div class="large-4 columns"><article id="%1$s" class="widget %2$s">',
        'after_widget' => '</article></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4><hr>'
    ));
}

// return entry meta information for posts, used by multiple loops, you can override this function by defining them first in your child theme's functions.php file
if ( ! function_exists( 'reverie_entry_meta' ) ) {
    function reverie_entry_meta() {
        echo '<span class="byline author">'. __('Written by', 'reverie') .' <a href="'. 'mailto:' . get_the_author_meta( 'user_email', get_the_author_meta('ID') ) .'" rel="author" class="fn">'. get_the_author() .', </a></span>';
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('F jS, Y') .'</time>';
    }
};

/**
 * UTHSC Functions.
 */
function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '&hellip;&nbsp;<a class="read-more" href="'. get_permalink( get_the_ID() ) . '"><strong>' . __('Read&nbsp;More', 'uthsc') . '</strong></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//WPUFE Javascript
function wpufe_javascript() {
    if ( is_page('new-announcement') ) {
        ?>
        <script type="text/javascript">
            (function($) {
                function limitText(field, maxChar){
                    var ref = $(field),
                        val = ref.val();

                    if ( val.length >= maxChar ) {
                        ref.val(val.substr(0, maxChar));
                    }
                }
                $( "label[for=wpuf-post_excerpt]" ).append( '<span class="announcement-excerpt-tooltip" style="display: none;"><span style="font-size:.9em;">The message that will appear in the campus emails. Make sure to include any details you want to appear in the email. <strong>Don\'t repeat the title here or it will appear twice!</strong></span></div>')

                $('#post_excerpt').on('focus', function(event) {
                    $( ".announcement-excerpt-tooltip" ).show("fast");
                });
                $('#post_excerpt').on('focusout', function(event) {
                    $( '.announcement-excerpt-tooltip' ).hide("fast");
                });
                // Insert Limitations here
                $('#post_excerpt').on('keyup', function(event) {
                    limitText(this, 400);
                    $( ".excerpt-char-count" ).html( 400 - $(this).val().length );
                });
            })(jQuery);
        </script>
    <?php
    }
}
add_action( 'wp_footer', 'wpufe_javascript',20 );

// ==(begin)== backtrace function =========

function uthsc_call_stack($stacktrace = array()) {

    !$stacktrace && ($stacktrace = debug_backtrace()) && array_shift($stacktrace);

    print "<table class='stack small-text-center'>";
    print "<tr>";
    print "<th colspan='4' style='background: brown; color: #fff;'>Backtrace</th>";
    print "</tr>";
    print "<tr>";
    print "<th style='background: #555; color: #fff;'>Order</th>";
    print "<th style='background: #666; color: #fff;font-weight: 200;'>/path/<strong>filename.php</strong></th>";
    print "<th style='background: #555; color: #fff;width: 20%;'>Function</th>";
    print "<th style='background: #666; color: #fff;width: 5%;'>Line</th>";
    print "</tr>";

    $i = 1;
    foreach($stacktrace as $node) {
        print "<tr>
                    <td style='text-align: center;'>$i. </td>
                    <td style='text-align: right;'>".dirname($node['file'])."/<strong>".basename($node['file']) ."</strong></td>
                    <td style='text-align: center;'>" .$node['function'] . "</td>
                    <td style='text-align: center;'>" .$node['line']. "</td></tr>";
        $i++;
    }
    print "</table>";

}
// use uthsc_call_stack(); in header.php to execute

// ===(end)=== backtrace function =========
