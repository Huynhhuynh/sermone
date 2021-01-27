<?php 
/**
 * Hooks
 */

/**
 * ACF register page options
 *
 */
if( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page( [
    'page_title' => __( 'Sermone Settings', 'sermone' ),
		'menu_title' => __( 'Settings', 'sermone' ),
		'menu_slug' => 'sermone-settings',
		'capability' => 'edit_posts',
    'redirect' => false,
    'parent_slug' => 'edit.php?post_type=sermone',
  ] );
}

/**
 * Single override template
 * 
 */
function sermone_single_override_template( $single_template ) {
  global $post;
  $post_type = $post->post_type;
  if( $post_type !== 'sermone' ) return $single_template;
  return sermone_template_path( 'single.php' );
}

add_filter( 'single_template', 'sermone_single_override_template' );