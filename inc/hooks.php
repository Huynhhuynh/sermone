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

/**
 * Add bookmark
 */
function sermone_social_item_bookmark() {
  ob_start();
  ?>
  <li class="sermone--bookmark-item">
    <a href="#" title="<?= __( 'Bookmark', 'sermone' ) ?>">
      <span class="__icon"><?= sermone_svg( 'bookmark' ) ?></span>
    </a>
  </li>
  <?php 
  echo ob_get_clean();
}

add_action( 'sermone_social_item_end', 'sermone_social_item_bookmark' );

/**
 * Media nav
 * 
 */
function sermone_single_media_nav() {
  set_query_var( 'nav_data', sermone_media_nav_data() );
  load_template( sermone_template_path( 'media-nav.php' ), false );
}

add_action( 'sermone_single_before_content', 'sermone_single_media_nav' );