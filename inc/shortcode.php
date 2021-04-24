<?php 
/**
 * Shortcode 
 * 
 * @package sermone
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Shortcode [sermone_favorite]
 *
 * @param Array $atts 
 * @param String $content
 * 
 * @return Html
 */
function sermone_shortcode_user_favorite( $atts = [], $content = '' ) {
  $atts = shortcode_atts( [
    'heading_text' => __( 'My Favorite', 'sermone' ),
    'user' => get_current_user_id(),
    'classes' => '', 
  ], $atts );

  if( $atts[ 'user' ] == 0 ) return sprintf( 
    '<p>%s <a href="%s">%s</a></p>', 
    __( 'Please login to see your list favorite.', 'sermone' ),
    sermone_get_field( 'sermone_user_login_url', 'option' ), 
    __( 'Login here!' ) );
  
  $fav = sermone_get_favorite_by_user( $atts[ 'user' ] );
  if( count( $fav ) <= 0 ) return sprintf(
    '<p>%s <a href="%s">%s</a></p>',
    __( 'No items have been added to the your favorites list yet.', 'sermone' ),
    get_post_type_archive_link( 'sermone' ),
    __( 'All Sermons.' )
  );
  
  $fav_ids = array_map( function( $item ) { return $item[ 'item' ]->ID; }, $fav );
  $args = [
    'post_type' => 'sermone',
    'posts_per_page' => -1,
    'post__in' => $fav_ids,
  ];  

  $query = new WP_Query( $args );
  set_query_var( 'atts', $atts );
  set_query_var( 'query', $query );
  
  ob_start();
  load_template( sermone_template_path( 'shortcode/user-favorite.php' ), false );
  return ob_get_clean();
}

add_shortcode( 'sermone_favorite', 'sermone_shortcode_user_favorite' );

/**
 * Shortcode [sermone]
 * 
 * @param Array $atts 
 * @param String $content 
 * 
 * @return Html
 */
function sermone_shortcode_list_view( $atts = [] , $content = '' ) {
  $atts = shortcode_atts( [
    'heading_text' => __( 'My Sermons', 'sermone' ),
    'layout' => 'list', 
    'number' => 4,
    'preachers' => '',
    'series' => '',
    'topics' => '',
    'books' => '',
    'classes' => '', 
  ], $atts );

  $query = sermone_get_posts( [
    'number' => $atts[ 'number' ],
    'preachers' => $atts[ 'preachers' ],
    'series' => $atts[ 'series' ],
    'topics' => $atts[ 'topics' ],
    'books' => $atts[ 'books' ],
  ] );

  set_query_var( 'atts', $atts );
  set_query_var( 'query', $query );

  ob_start();
  load_template( sermone_template_path( 'shortcode/sermone-list.php' ), false );
  return ob_get_clean();
}

add_shortcode( 'sermone', 'sermone_shortcode_list_view' );