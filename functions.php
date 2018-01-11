<?php
/**
 * Twenty Fourteen Footbag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Fourteen Footbag
 */

/**
 * This enqueues the parent and child theme stylesheets.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */
function theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style )
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Enqueue fonts.
 *
 * @link http://www.wpbeginner.com/wp-themes/how-add-google-web-fonts-wordpress-themes/
 */
function footbag_fonts() {
    wp_enqueue_style( 'footbag_fonts', 'https://fonts.googleapis.com/css?family=Acme', false );
}
add_action('wp_enqueue_scripts', 'footbag_fonts');

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750;
}

/**
 * @desc Set posts per page for custom post types and taxonomies
 */
function twentyfourteen_custom_posts_per_page($query) {
    if (!$query->is_main_query())
        return $query;
    elseif ($query->is_post_type_archive('moves') || $query->is_tax('move_difficulty'))
        $query->set('posts_per_page', '100');
    elseif ($query->is_post_type_archive('moves') || $query->is_tax('move_type'))
        $query->set('posts_per_page', '100');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    return $query;
}
 
// Apply pre_get_posts filter - ensure this is not called when in admin
if (!is_admin()) {
    add_filter('pre_get_posts', 'twentyfourteen_custom_posts_per_page');
}