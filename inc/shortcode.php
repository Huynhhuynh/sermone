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
    get_field( 'sermone_user_login_url', 'option' ), 
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
  ob_start();
  ?>
  <div class="sermone-favorite-container <?= $atts[ 'classes' ] ?>">
    <? if( ! empty( $atts[ 'heading_text' ] ) ) : ?>
    <h4 class="sermone-fav-heading"><?= $atts[ 'heading_text' ] ?> <sup>(<?= $query->post_count ?>)</sup></h4>
    <? endif; ?>
    <? if ( $query->have_posts() ) :
      $sermone_posts_classes = sermone_archive_posts_classes();
      echo '<div id="sermone-post-list" class="'. $sermone_posts_classes .'">';
      while ( $query->have_posts() ) : $query->the_post(); 
        /**
         * sermone_archive_post_item_loop hook.
         *
         * @see sermone_archive_post_item_loop - 20
         */
        do_action( 'sermone_shortcode_post_item_loop', get_the_ID() );
      endwhile;
      echo '</div>';
    endif; ?>
  </div> <!-- .sermone-favorite-container -->
  <?php
  return ob_get_clean();
}

add_shortcode( 'sermone_favorite', 'sermone_shortcode_user_favorite' );