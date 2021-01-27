<?php 
/**
 * Helpers
 */

/**
 * Get icon svg 
 * 
 * @param String $name 
 * @return svg
 */
function sirmone_svg( $name ) {
  $icons = require( SIRMONE_DIR . '/inc/svg.php' );
  return $icons[ $name ] ? $icons[ $name ] : '';
}

/**
 * Template path 
 * 
 * @param String $path 
 * @param Boolean $require
 * 
 * @return String 
 */
function sermone_template_path( $path, $require = false ) {
  $root_template = SERMONE_DIR . '/templates/';
  $root_theme_template = get_template_directory() . '/sermone/';

  if( file_exists( $root_theme_template . $path ) ) {
    return $root_theme_template . $path;
  }

  if( file_exists( $root_template . $path ) ) {
    return $root_template . $path;
  }

  return;
}

/**
 * Classes hook
 * 
 * @param String $classes 
 * @param String $hook_name 
 * 
 * @return String
 */
function sermone_classes_hook( $classes, $hook_name = '' ) {
  return apply_filters( 'sermone_hook_classes_' . $hook_name, $classes );
}

function sermone_get_thumb( $post_id ) {
  $default = '';
  $thumb_tag = get_the_post_thumbnail( $post_id, 'large', [ 'class' => 'sermone-post-thumbnail' ] );

  if( $thumb_tag ) return $thumb_tag;

  return '<img src="'. $default .'" alt="'. get_the_title( $post_id ) .'" class="sermone-post-thumbnail" />';
}