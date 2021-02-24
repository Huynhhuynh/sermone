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
 * Tempalte path apply filter 
 * 
 * @param String $full_path 
 * @param String $path 
 * 
 * @return String
 */
function sermone_template_path_apply_filter( $full_path = '', $path = '' ) {
  return apply_filters( 'sermone_hook_template_path__' . $path, $full_path );
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
    return sermone_template_path_apply_filter( $root_childtheme_template . $path, $path );
  }

  # In parent theme
  if( file_exists( $root_theme_template . $path ) ) {
    return sermone_template_path_apply_filter( $root_theme_template . $path, $path );
  }

  # In plugin
  if( file_exists( $root_template . $path ) ) {
    return sermone_template_path_apply_filter( $root_template . $path, $path );
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
function sermone_get_post_thumb_html( $post_id, $size = 'large' ) {
  $thumb_tag = get_the_post_thumbnail( $post_id, $size, [ 'class' => 'sermone-post-thumbnail' ] );
  if( $thumb_tag ) { echo $thumb_tag; return; }

  $global_thumb_default = get_field( 'sermone_image_default', 'option' );
  $default = ! empty( $global_thumb_default ) ? $global_thumb_default[ 'sizes' ][ $size ] : SERMONE_URI . '/images/oh-no.jpg';
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

  $bible_root_url = 'https://www.biblegateway.com';

  $scripture_arr = array_map( function( $item ) use ( $bible_root_url ) {
    return sprintf( '<a href="%2$s/passage/?search=%1$s" data-bible="%1$s" target="_blank">%1$s</a>', trim( $item ), $bible_root_url );
  }, explode( ',', $scripture ) );

  echo implode( ', ', $scripture_arr );
}

/**
 * Share 
 */
function sermone_share_post_html( $post_id ) {
  $share = get_field( 'single_sharing', 'option' );
  $share = $share === null ? true : $share;
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
        return '<a href="'. get_term_link( $item ) .'" target="_blank">'. $item->name .'</a>';
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
        return '<a href="'. get_term_link( $item ) .'" target="_blank">'. $item->name .'</a>';
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
        return '<a href="'. get_term_link( $item ) .'" target="_blank">'. $item->name .'</a>';
      }, $term_books ) ) ) 
    );
  }

  if( count( $in ) ) array_push( $in, '.' );

  echo implode( '', array_map( function( $item, $index ) use ( $separators ) {
    return (isset( $separators[ $index ] ) ? $separators[ $index ] : '') . $item;
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
function sermone_media_nav_data( $post_id ) {

  $navs = [
    [
      'type' => 'tab',
      'id' => 'sermone-video',
      'name' => __( 'Watch video', 'sermone' ),
      'icon' => sermone_svg( 'play_button' ),
      'data' => sermone_get_video_item( $post_id ),
    ],
    [
      'type' => 'tab',
      'id' => 'sermone-audio',
      'name' => __( 'Listen audio', 'sermone' ),
      'icon' => sermone_svg( 'audio' ),
      'data' => sermone_get_audio_item( $post_id )
    ],
    [
      'type' => 'download',
      'id' => 'sermone-notes',
      'name' => __( 'Download notes', 'sermone' ),
      'icon' => sermone_svg( 'download' ),
      'data' => [
        'content' => get_field( 'sermone_notes', $post_id ),
      ]
    ],
    [
      'type' => 'download',
      'id' => 'sermone-bulletin',
      'name' => __( 'Download bulletin', 'sermone' ),
      'icon' => sermone_svg( 'download' ),
      'data' => [
        'content' => get_field( 'sermone_bulletin', $post_id ),
      ]
    ],
  ];

  if( $navs[0]['data']['content'] ) {
    $navs[0]['active'] = true;
  } else if( $navs[1]['data']['content'] ) {
    $navs[1]['active'] = true;
  }

  return apply_filters( 'sermone_hook_media_nav_data', $navs );
}

/**
 * Archive posts classes 
 * 
 */
function sermone_archive_posts_classes() {
  $sermone_archive_layout = get_field( 'sermone_archive_layout', 'option' );
  $sermone_archive_layout_class = empty( $sermone_archive_layout ) ? 'sermone-archive-style-list' : 'sermone-archive-style-' . $sermone_archive_layout;
  return apply_filters( 
    'sermone_archive_posts_classes', 
    implode( ' ', [ 'sermone-archive-posts', $sermone_archive_layout_class ] ) 
  );
}

/**
 * Load quickview template 
 * 
 * @param Int $post_id
 * @return Html
 */
function sermone_quickview_html( $post_id ) {
  set_query_var( 'post_id', $post_id );
  set_query_var( 'post', get_post( $post_id ) );

  load_template( sermone_template_path( 'quickview-detail.php' ), false );
}

/**
 * Media nav template 
 * 
 * @param Int $post_id
 * @return Html
 */
function sermone_single_media_nav_html( $post_id ) {
  set_query_var( 'nav_data', sermone_media_nav_data( $post_id ) );
  load_template( sermone_template_path( 'media-nav.php' ), false );
}

/**
 * List term options
 * 
 * @param String $taxonomy_slug
 * @return Array
 */
function sermone_list_term_options_filter_form( $taxonomy_slug = '', $default = [ '' => '...' ] ) {
  $options = $default;
  $terms = get_terms( $taxonomy_slug );
  if( empty( $terms ) ) return $options;

  foreach( $terms as $index => $term ) :
    $options[ $term->slug ] = $term->name;
  endforeach;

  return $options;
}

/**
 * Filter bar template 
 * 
 */
function sermone_filter_bar_html() {
  $filter_fields = [
    [
      'name' => 'keywords',
      'label' => __( 'Keywords', 'sermone' ),
      'field_type' => 'text',
      'placeholder' => __( '...' ),
      'classes' => 'item-field-keywords',
      'value' => isset( $_GET[ 'keywords' ] ) ? $_GET[ 'keywords' ] : '',
    ],
    [
      'name' => 'preachers',
      'label' => __( 'Select Preachers', 'sermone' ),
      'field_type' => 'select',
      'options' => sermone_list_term_options_filter_form( 'sermone_preacher', [ '' => __( 'All Preachers', 'sermone' ) ] ),
      'value' => isset( $_GET[ 'preachers' ] ) ? $_GET[ 'preachers' ] : '',
      'classes' => 'item-field-preachers',
    ],
    [
      'name' => 'series',
      'label' => __( 'Select Series', 'sermone' ),
      'field_type' => 'select',
      'options' => sermone_list_term_options_filter_form( 'sermone_series', [ '' => __( 'All Series', 'sermone' ) ] ),
      'value' => isset( $_GET[ 'series' ] ) ? $_GET[ 'series' ] : '',
      'classes' => 'item-field-series',
    ],
    [
      'name' => 'topics',
      'label' => __( 'Select Topics', 'sermone' ),
      'field_type' => 'select',
      'options' => sermone_list_term_options_filter_form( 'sermone_topics', [ '' => __( 'All Topics', 'sermone' ) ] ),
      'value' => isset( $_GET[ 'topics' ] ) ? $_GET[ 'topics' ] : '',
      'classes' => 'item-field-topics',
    ],
    [
      'name' => 'books',
      'label' => __( 'Select Books', 'sermone' ),
      'field_type' => 'select',
      'options' => sermone_list_term_options_filter_form( 'sermone_books', [ '' => __( 'All Books', 'sermone' ) ] ),
      'value' => isset( $_GET[ 'books' ] ) ? $_GET[ 'books' ] : '',
      'classes' => 'item-field-books',
    ],
  ]; 

  set_query_var( 'filter_fields', apply_filters( 'sermone_hook_filter_fields_data', $filter_fields ) );
  load_template( sermone_template_path( 'filter-bar.php' ), false );
}

/**
 * Form fields render 
 * 
 * @param Array $fields 
 * @return Html
 */
function sermone_form_fields_html( $fields = [] ) {
  if( count( $fields ) <= 0 ) return; 

  $output = '';
  $mockup_html = apply_filters( 'sermone_hook_fields_mockup', '
  <div class="sermone-field-container __%%FIELD_NAME%%-container">
    <label>
      <span class="__label">%%LABEL%%</span>
      <div class="field-item __field-%%FIELD_NAME%% __field-type-%%FIELD_TYPE%%">
        %%FIELD%%
      </div>
    </label>
  </div>' );

  foreach( $fields as $index => $field ) :
    ob_start();
    set_query_var( 'field_data', $field );
    load_template( sermone_template_path( 'form-fields/' . $field[ 'field_type' ] . '.php' ), false );
    $field_html = ob_get_clean();

    $replace_data = [
      '%%LABEL%%' => $field[ 'label' ],
      '%%FIELD%%' => $field_html,
      '%%FIELD_NAME%%' => $field[ 'name' ],
      '%%FIELD_TYPE%%' => $field[ 'field_type' ],
    ];

    $output .= str_replace( array_keys( $replace_data ), array_values( $replace_data ), $mockup_html );
  endforeach;

  echo $output;
}

/**
 * Get posts
 * 
 * @return WP_Query
 */
function sermone_get_posts() {
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

  $args = [
    'post_type' => 'sermone',
    'paged' => $paged,
  ];

  /**
   * sermone_hook_query_args hook.
   * 
   * @see sermone_query_args_by_keywords - 20
   * @see sermone_query_args_by_tax_preachers - 22
   * @see sermone_query_args_by_tax_series - 24
   * @see sermone_query_args_by_tax_topics - 26
   */
  $_args = apply_filters( 'sermone_hook_query_args', $args );

  return new WP_Query( $_args );
}

/**
 * Pagination 
 * 
 * @param WP_Query $query
 * @return Html
 */
function sermone_pagination_html( $query ) {
  $big = 999999999;
  $args = [
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var( 'paged' ) ),
    'total' => $query->max_num_pages,
    'prev_text' => __( 'Previous', 'sermone' ),
    'next_text' => __( 'Next', 'sermone' ),
  ];

  ?>
  <div class="sermone-pagination-container">
    <?= paginate_links( apply_filters( 'sermone_hook_paginate_args', $args, $query ) ) ?>
  </div> <!-- .sermone-pagination-container -->
  <?php 
}

/**
 * Get all sermone by series 
 * 
 * @param String $series_name
 * @return Array
 */
function sermone_get_all_post_by_series( $series_name = '' ) {
  return get_posts( [
    'post_type' => 'sermone',
    'numberposts' => -1,
    'post_status' => 'publish',
    'tax_query' => [
      [
        'taxonomy' => 'sermone_series',
        'field' => 'slug',
        'terms' => $series_name
      ]
    ]
  ] );
}

/**
 * Sermone in series 
 * 
 * @param Int $post_id
 * @return Html
 */
function sermone_post_in_series_html( $post_id ) {
  $term_series = wp_get_post_terms( $post_id, 'sermone_series' );
  if( empty( $term_series ) || count( $term_series ) == 0 ) return;

  $first_series = $term_series[ 0 ];
  $_posts = sermone_get_all_post_by_series( $first_series->slug );

  if( count( $_posts ) <= 0 ) return;

  set_query_var( 'series', $first_series );
  set_query_var( 'current_post_id', $post_id );
  set_query_var( '_posts', $_posts );
  load_template( sermone_template_path( 'post-in-series.php' ), false );
}

/**
 * Enable favorite
 */
function sermone_favorite_enable() {
  $fav_enable = get_field( 'sermone_add_to_favorite', 'option' );
  $fav_enable = $fav_enable == null ? false : $fav_enable;
  return apply_filters( 'sermone_hook_enable_favorite', $fav_enable );
}

/**
 * Get media player
 */
function sermone_media_player() {
  $player = get_field( 'sermone_audio_video_player', 'options' );
  return $player ? $player : 'plyr';
}

/**
 * User add to favorite 
 * 
 * @param Int $user_id 
 * @param Int $sermone_id 
 */
function sermone_user_add_to_favorite( $user_id = null, $sermone_id = null, $remove_if_exists = true ) {
  if( empty( $user_id ) || empty( $sermone_id ) ) return;

  
}