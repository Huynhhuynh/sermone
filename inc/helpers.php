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
function sermone_svg( $name ) {
  $icons = require( SERMONE_DIR . '/inc/svg.php' );
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
function sermone_template_path( $path ) {
  $root_template = SERMONE_DIR . '/templates/';
  $root_theme_template = get_template_directory() . '/sermone/';
  $root_childtheme_template = get_template_directory() . '/sermone/';

  # In child theme
  if( file_exists( $root_childtheme_template . $path ) ) {
    return $root_theme_template . $path;
  }

  # In parent theme
  if( file_exists( $root_theme_template . $path ) ) {
    return $root_theme_template . $path;
  }

  # In plugin
  if( file_exists( $root_template . $path ) ) {
    return $root_template . $path;
  }

  # Template not exits!
  return;
}

/**
 * Classes hook
 * use hook sermone_hook_classes_<hook_name>
 * 
 * @param String $classes 
 * @param String $hook_name 
 * 
 * @return String
 */
function sermone_classes_hook( $classes, $hook_name = '' ) {
  return apply_filters( 'sermone_hook_classes_' . $hook_name, $classes );
}

/**
 * Get thumbnaul of sermone 
 * 
 * @param Int $post_id 
 * @return Html
 */
function sermone_get_post_thumb_html( $post_id ) {
  $thumb_tag = get_the_post_thumbnail( $post_id, 'large', [ 'class' => 'sermone-post-thumbnail' ] );
  if( $thumb_tag ) { echo $thumb_tag; return; }

  $global_thumb_default = get_field( 'sermone_image_default', 'option' );
  $default = ! empty( $global_thumb_default ) ? $global_thumb_default[ 'sizes' ][ 'large' ] : '';
  echo '<img src="'. $default .'" alt="'. get_the_title( $post_id ) .'" class="sermone-post-thumbnail" />';
}

/**
 * Preacher avatar
 * 
 * @param Int $term_id
 * 
 * @return String
 */
function sermone_get_preacher_avatar( $term_id ) {
  $default = apply_filters( 'sermone_preacher_avatar_default', SERMONE_URI . '/images/no-avatar.jpg' );
  $preacher_avatar = get_field( 'preacher_avatar', 'sermone_preacher_' . $term_id );
  $size = apply_filters( 'sermone_preacher_avatar_size', 'thumbnail' );

  return $preacher_avatar ? $preacher_avatar[ 'sizes' ][ $size ] : $default;
}

/**
 * Preacher contact
 * 
 * @param Int $term_id
 * 
 * @return Array or Null
 */
function sermone_get_preacher_contact( $term_id ) {
  return get_field( 'preacher_contact', 'sermone_preacher_' . $term_id );
} 

/**
 * Get term preacher by sermone 
 * 
 * @param $post_id
 * 
 * @return WP_Term
 */
function sermone_get_preachers_by_sermone( $post_id ) {
  $result = wp_get_post_terms( $post_id, 'sermone_preacher' );
  if( ! $result || count( $result ) == 0 ) return; 

  return array_map( function( $item ) {
    $item->preacher_avatar = sermone_get_preacher_avatar( $item->term_id );
    $item->preacher_contact = sermone_get_preacher_contact( $item->term_id );
    return $item;
  }, $result );
}

/**
 * Get lis preacher 
 * 
 * @param Int $post_id
 * 
 * @return Html
 */
function sermone_get_list_preacher_html( $post_id ) {
  $preachers = sermone_get_preachers_by_sermone( $post_id );
  if( empty( $preachers ) ) return; 

  set_query_var( 'preachers', $preachers );
  load_template( sermone_template_path( 'list-preacher.php' ), false );
}

/**
 * Scripture
 */
function sermone_get_scripture_by_sirmone_html( $post_id ) {
  $scripture = get_field( 'sermone_main_bible_passage', get_the_ID() );
  if( empty( $scripture ) ) return; 

  $scripture_arr = array_map( function( $item ) {
    return sprintf( '<a href="#" data-bible="%1$s">%1$s</a>', trim( $item ) );
  }, explode( ',', $scripture ) );

  echo implode( ', ', $scripture_arr );
}

/**
 * Share 
 */
function sermone_share_post_html( $post_id ) {
  $share = get_field( 'single_sharing', 'option' );
  if( $share != true ) return;

  $share_data = [
    'twitter' => [
      'icon' => sermone_svg( 'twitter' ),
      'name' => __( 'Twitter', 'sermone' ),
      'link' => '#',
    ],
    'linkedin' => [
      'icon' => sermone_svg( 'linkedin' ),
      'name' => __( 'Linkedin', 'sermone' ),
      'link' => '#',
    ],
    'facebook' => [
      'icon' => sermone_svg( 'facebook' ),
      'name' => __( 'Facebook', 'sermone' ),
      'link' => '#'
    ],
  ];

  set_query_var( 'share_data', apply_filters( 'sermone_hook_share_data', $share_data ) );
  load_template( sermone_template_path( 'share.php' ), false );
}

/**
 * Sermone in series 
 * 
 * @param Int $post_id 
 * 
 * @return Html
 */
function sermone_post_in_series_html( $post_id ) {
  
}