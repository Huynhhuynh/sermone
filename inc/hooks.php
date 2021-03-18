<?php 
/**
 * Hooks
 */

/**
 * Single override template
 * 
 * @param String $single_template
 */
function sermone_single_override_template( $single_template ) {
  global $post;
  $post_type = $post->post_type;
  if( $post_type !== 'sermone' ) return $single_template;

  return sermone_template_path( 'single.php' );
}

add_filter( 'single_template', 'sermone_single_override_template' );

/**
 * Archive archive template
 * 
 * @param String $archive_template
 */
function sermone_archive_override_template( $archive_template ) {
  global $post;
  if ( ! is_post_type_archive ( 'sermone' ) ) return $archive_template;

  return sermone_template_path( 'archive.php' );
}

add_filter( 'archive_template', 'sermone_archive_override_template' ) ;

/**
 * Media nav
 * 
 */
function sermone_single_media_nav() {
  global $post;
  sermone_single_media_nav_html( $post->ID );
}

add_action( 'sermone_single_before_content', 'sermone_single_media_nav', 20 );

/**
 * Sermone post item loop
 * 
 */
function sermone_archive_post_item_loop() {
  load_template( sermone_template_path( 'preview.php' ), false );
}

add_action( 'sermone_archive_post_item_loop', 'sermone_archive_post_item_loop', 20 );
add_action( 'sermone_shortcode_post_item_loop', 'sermone_archive_post_item_loop', 20 );

/**
 * Sermone modal template
 */
function sermone_quickview_modal_template() {
  load_template( sermone_template_path( 'quickview-modal.php' ), false );
}

add_action( 'wp_footer', 'sermone_quickview_modal_template' );

/**
 * Archive page heading template 
 * 
 */
function sermone_archive_heading_template() {
  load_template( sermone_template_path( 'archive-heading.php' ), false );
}

add_action( 'sermone_archive_top', 'sermone_archive_heading_template', 16 );

/**
 * Sermone filter bar 
 */
function sermone_filter_bar() {
  $sermone_archive_filtering = sermone_get_field( 'sermone_archive_filtering', 'option' ); 
  $sermone_archive_filtering = $sermone_archive_filtering === null ? true : $sermone_archive_filtering;
  $filter_enable = apply_filters( 'sermone_hook_archive_filter_enable', $sermone_archive_filtering );

  if( true != $filter_enable ) return;
  sermone_filter_bar_html();
}

add_action( 'sermone_archive_top', 'sermone_filter_bar', 20 );

/**
 * Custom query by keywords
 */
function sermone_query_args_by_keywords( $args = [] ) {

  if( isset( $_GET[ 'keywords' ] ) && ! empty( $_GET[ 'keywords' ] ) ) {
    $args[ 's' ] = sanitize_text_field( $_GET[ 'keywords' ] );
  }

  return $args;
}

add_filter( 'sermone_hook_query_args_archive', 'sermone_query_args_by_keywords', 20 );

/**
 * Custom query by tax preachers
 * 
 */
function sermone_query_args_by_tax_preachers( $args = [] ) {

  $tax_query = isset( $args[ 'tax_query' ] ) ? $args[ 'tax_query' ] : [];

  if( isset( $_GET[ 'preachers' ] ) && ! empty( $_GET[ 'preachers' ] ) ) {
    array_push( $tax_query, [
      'taxonomy' => 'sermone_preacher',
      'field' => 'slug',
      'terms' => sanitize_text_field( $_GET[ 'preachers' ] ),
    ] );
    $args[ 'tax_query' ] = $tax_query;
  }

  return $args;
}

add_filter( 'sermone_hook_query_args_archive', 'sermone_query_args_by_tax_preachers', 22 );

/**
 * Custom query by tax series 
 * 
 */
function sermone_query_args_by_tax_series( $args = [] ) {

  $tax_query = isset( $args[ 'tax_query' ] ) ? $args[ 'tax_query' ] : [];

  if( isset( $_GET[ 'series' ] ) && ! empty( $_GET[ 'series' ] ) ) {
    array_push( $tax_query, [
      'taxonomy' => 'sermone_series',
      'field' => 'slug',
      'terms' => sanitize_text_field( $_GET[ 'series' ] ),
    ] );
    $args[ 'tax_query' ] = $tax_query;
  }

  return $args;
}

add_filter( 'sermone_hook_query_args_archive', 'sermone_query_args_by_tax_series', 24 );

/**
 * Custom query by tax topics 
 * 
 */
function sermone_query_args_by_tax_topics( $args = [] ) {

  $tax_query = isset( $args[ 'tax_query' ] ) ? $args[ 'tax_query' ] : [];

  if( isset( $_GET[ 'topics' ] ) && ! empty( $_GET[ 'topics' ] ) ) {
    array_push( $tax_query, [
      'taxonomy' => 'sermone_topics',
      'field' => 'slug',
      'terms' => sanitize_text_field( $_GET[ 'topics' ] ),
    ] );
    $args[ 'tax_query' ] = $tax_query;
  }

  return $args;
}

add_filter( 'sermone_hook_query_args_archive', 'sermone_query_args_by_tax_topics', 26 );

/**
 * Custom query by tax books 
 * 
 */
function sermone_query_args_by_tax_books( $args = [] ) {

  $tax_query = isset( $args[ 'tax_query' ] ) ? $args[ 'tax_query' ] : [];

  if( isset( $_GET[ 'books' ] ) && ! empty( $_GET[ 'books' ] ) ) {
    array_push( $tax_query, [
      'taxonomy' => 'sermone_books',
      'field' => 'slug',
      'terms' => sanitize_text_field( $_GET[ 'books' ] ),
    ] );
    $args[ 'tax_query' ] = $tax_query;
  }

  return $args;
}

add_filter( 'sermone_hook_query_args_archive', 'sermone_query_args_by_tax_books', 26 );

/**
 * Archive pagination
 */
function sermone_archive_pagination( $query ) {
  sermone_pagination_html( $query );
}

add_action( 'sermone_archive_post_list_after', 'sermone_archive_pagination' );

/**
 * Single post nav link
 */
function sermone_single_post_nav_html() {
  $icon = sprintf( '<span class="__icon">%s</span>', sermone_svg( 'diagonal_arrow_up_right' ) );
  ?>
  <div class="sermone-single-post-nav-link">
    <ul>
      <li><?php previous_post_link( '%link', 'Previous: %title ' . $icon ) ?></li>
      <li><?php next_post_link( '%link', __( 'Next: %title ' . $icon ) ) ?></li>
    </ul>
  </div>
  <?php 
}

add_action( 'sermone_single_after_content', 'sermone_single_post_nav_html', 20 );

/**
 * Post in series 
 */
function sermone_post_in_series() {
  global $post;
  sermone_post_in_series_html( $post->ID );
}

add_action( 'sermone_single_after_content', 'sermone_post_in_series', 22 );

/**
 * Check sermone custom tax redirect page
 */
function sermone_check_tax_redirect_page() {
  if( is_admin() ) return;

  $root_archive_link = get_post_type_archive_link( 'sermone' );

  if( is_tax( 'sermone_preacher' ) ) {
    $term = get_queried_object();
    $direct_url = sprintf( '%s?preachers=%s', $root_archive_link, $term->slug );
    wp_redirect( $direct_url );
    exit();
  }

  if( is_tax( 'sermone_series' ) ) {
    $term = get_queried_object();
    $direct_url = sprintf( '%s?series=%s', $root_archive_link, $term->slug );
    wp_redirect( $direct_url );
    exit();
  }

  if( is_tax( 'sermone_topics' ) ) {
    $term = get_queried_object();
    $direct_url = sprintf( '%s?topics=%s', $root_archive_link, $term->slug );
    wp_redirect( $direct_url );
    exit();
  }

  if( is_tax( 'sermone_books' ) ) {
    $term = get_queried_object();
    $direct_url = sprintf( '%s?books=%s', $root_archive_link, $term->slug );
    wp_redirect( $direct_url );
    exit();
  }
}

add_action( 'pre_get_posts', 'sermone_check_tax_redirect_page' );

/**
 * Add favorite
 */
function sermone_social_item_favorite() {
  if( true != sermone_favorite_enable() ) return;
  $in_fav = sermone_in_user_favorite( get_the_ID() );
  ob_start();
  ?>
  <li class="sermone--bookmark-item">
    <a 
      class="<?php echo $in_fav ? '__in-fav' : '' ?>"
      href="#" 
      data-tippy-content="<?php echo __( 'Favorite', 'sermone' ) ?>"
      data-tippy-placement="bottom"
      title="<?php echo __( 'Favorite', 'sermone' ) ?>" 
      data-sermone-fav=<?php the_ID() ?>>
      <span class="__icon"><?php echo sermone_svg( 'star' ) ?></span>
      <span class="__icon __is-bold"><?php echo sermone_svg( 'star_bold' ) ?></span>
    </a>
  </li>
  <?php 
  echo ob_get_clean();
}

add_action( 'sermone_social_item_end', 'sermone_social_item_favorite' );

/**
 * Button favorite archive loop item
 */
function sermone_archive_loop_item_action_button_favorite() {
  if( true != sermone_favorite_enable() ) return;
  $in_fav = sermone_in_user_favorite( get_the_ID() );
  ?>
  <a 
    href="<?php the_permalink() ?>" 
    class="sermone-favorite <?php echo $in_fav ? '__in-fav' : '' ?>" 
    data-sermone-fav=<?php the_ID() ?>>
    <?php echo __( 'Favorite', 'sermone' ) ?>
    <span class="__icon"><?php echo sermone_svg( 'star' ) ?></span>
    <span class="__icon __is-bold"><?php echo sermone_svg( 'star_bold' ) ?></span>
  </a>
  <?php 
}

add_action( 'sermone_hook_loop_item_action_bottom', 'sermone_archive_loop_item_action_button_favorite' );