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
  return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
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

  $replace_data = [
    '%%SHARE_URL%%' => get_the_permalink( $post_id ),
    '%%TITLE%%' => get_the_title( $post_id ),
    '%%DESC%%' => get_the_excerpt( $post_id ),
  ];

  $share_data = [
    'twitter' => [
      'icon' => sermone_svg( 'twitter' ),
      'name' => __( 'Twitter', 'sermone' ),
      'link' => str_replace( array_keys( $replace_data ), array_values( $replace_data ), 'https://twitter.com/intent/tweet?url=%%SHARE_URL%%&text=%%TITLE%%' ),
    ],
    'linkedin' => [
      'icon' => sermone_svg( 'linkedin' ),
      'name' => __( 'Linkedin', 'sermone' ),
      'link' => str_replace( array_keys( $replace_data ), array_values( $replace_data ), 'https://www.linkedin.com/sharing/share-offsite/?url=%%SHARE_URL%%' ),
    ],
    'facebook' => [
      'icon' => sermone_svg( 'facebook' ),
      'name' => __( 'Facebook', 'sermone' ),
      'link' => str_replace( array_keys( $replace_data ), array_values( $replace_data ), 'https://www.facebook.com/sharer.php?u=%%SHARE_URL%%' ),
    ],
  ];

  set_query_var( 'share_data', apply_filters( 'sermone_hook_share_data', $share_data ) );
  load_template( sermone_template_path( 'share.php' ), false );
}

/**
 * Sermone in tax 
 * 
 * @param Int $post_id 
 * 
 * @return Html
 */
function sermone_post_in_tax_html( $post_id ) {
  $in = [];
  $separators = [ '', ', in ', ' & ' ];

  # Series
  $term_series = wp_get_post_terms( $post_id, 'sermone_series' );
  if( $term_series ) {
    array_push( $in, sprintf( 
      '%s %s', 
      __( 'This content is part of a series', 'sermone' ),
      implode( ', ', array_map( function( $item ) {
        return '<a href="" target="_blank">'. $item->name .'</a>';
      }, $term_series ) ) ) 
    );
  }

  # Topics
  $term_topics = wp_get_post_terms( $post_id, 'sermone_topics' );
  if( $term_topics ) {
    array_push( $in, sprintf( 
      '%s %s', 
      _n( 'topic', 'topics', count( $term_topics ), 'sermone' ),
      implode( ', ', array_map( function( $item ) {
        return '<a href="" target="_blank">'. $item->name .'</a>';
      }, $term_topics ) ) ) 
    );
  }

  # Books
  $term_books = wp_get_post_terms( $post_id, 'sermone_books' );
  if( $term_books ) {
    array_push( $in, sprintf( 
      '%s %s', 
      _n( 'book', 'books', count( $term_books ), 'sermone' ),
      implode( ', ', array_map( function( $item ) {
        return '<a href="" target="_blank">'. $item->name .'</a>';
      }, $term_books ) ) ) 
    );
  }

  echo implode( '', array_map( function( $item, $index ) use ( $separators ) {
    return $separators[ $index ] . $item;
  }, $in, array_keys( $in ) ) );
}

/**
 * Get sermone video 
 * 
 * @param Int $post_id
 * @return Array
 */
function sermone_get_video_item( $post_id ) {
  $sermone_video = get_field( 'sermone_video', $post_id );
  $source = $sermone_video[ 'video_source' ];
  $data = $sermone_video[ $source ];

  return [
    'source' => $source,
    'content' => $data
  ];
}

/**
 * Get sermone audio 
 * 
 * @param Int $post_id
 * @return Array
 */
function sermone_get_audio_item( $post_id ) {
  $sermone_audio = get_field( 'sermone_audio', $post_id );
  $source = $sermone_audio[ 'audio_source' ];
  $data = $sermone_audio[ $source ];

  return [
    'source' => $source,
    'content' => $data,
    'duration' => $sermone_audio[ 'mp3_duration' ]
  ];
}

/**
 * Media nav data
 */
function sermone_media_nav_data() {
  global $post; 

  $navs = [
    [
      'type' => 'tab',
      'id' => 'sermone-video',
      'name' => __( 'Watch video', 'sermone' ),
      'icon' => sermone_svg( 'play_button' ),
      'data' => sermone_get_video_item( $post->ID ),
    ],
    [
      'type' => 'tab',
      'id' => 'sermone-audio',
      'name' => __( 'Listen audio', 'sermone' ),
      'icon' => sermone_svg( 'audio' ),
      'data' => sermone_get_audio_item( $post->ID )
    ],
    [
      'type' => 'download',
      'id' => 'sermone-notes',
      'name' => __( 'Download notes', 'sermone' ),
      'icon' => sermone_svg( 'download' ),
      'data' => [
        'content' => get_field( 'sermone_notes', $post->ID ),
      ]
    ],
    [
      'type' => 'download',
      'id' => 'sermone-bulletin',
      'name' => __( 'Download bulletin', 'sermone' ),
      'icon' => sermone_svg( 'download' ),
      'data' => [
        'content' => get_field( 'sermone_bulletin', $post->ID ),
      ]
    ],
  ];

  return apply_filters( 'sermone_hook_media_nav_data', $navs );
}