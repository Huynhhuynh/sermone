<?php 
/**
 * Sermone ajax 
 */

/**
 * Get Quickview template 
 * 
 */
function sermone_ajax_quickview_template() { 
  ob_start();
  $post_id = (int) $_POST[ 'post_id' ];

  sermone_quickview_html( $post_id );
  $content = ob_get_clean();
  
  wp_send_json( [
    'success' => true,
    'content' => $content,
    'meta_data' => [
      'post_id' => $post_id,
      'post_url' => get_the_permalink( $post_id ),
      'post_title' => get_the_title( $post_id )
    ]
  ] );
}

add_action( 'wp_ajax_sermone_ajax_quickview_template', 'sermone_ajax_quickview_template' );
add_action( 'wp_ajax_nopriv_sermone_ajax_quickview_template', 'sermone_ajax_quickview_template' );

/**
 * Add to favorite
 * 
 */
function sermone_ajax_add_to_favorite() {

  /**
   * User non login
   */
  if( ! is_user_logged_in() ) {
    wp_send_json( [
      'success' => true,
      'data' => [
        'message' => sprintf( 
          '%1$s <a href="%2$s">%3$s</a>', 
          __( 'Please login first to use this feature.', 'sermone' ),
          sermone_get_field( 'sermone_user_login_url', 'option' ),
          __( 'Login here.', 'sermone' ) ),
        'status' => false,
      ]
    ] );
  }

  /**
   * User logged in
   */
  $result = sermone_user_add_to_favorite( get_current_user_id(), (int) $_POST[ 'id' ] );
  wp_send_json( [
    'success' => true,
    'data' => [
      'message' => apply_filters( 'sermone_hook_updated_favorite_successful_text', __( 'Updated favorite successful.', 'sermone' ) ),
      'status' => true,
      'fav' => $result,
    ]
  ] );
}

add_action( 'wp_ajax_sermone_ajax_add_to_favorite', 'sermone_ajax_add_to_favorite' );
add_action( 'wp_ajax_nopriv_sermone_ajax_add_to_favorite', 'sermone_ajax_add_to_favorite' );