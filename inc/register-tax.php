<?php 
/**
 * Sermone custom tax 
 * 
 */

/**
 * Register sirmone preacher
 * 
 */
function sermone_register_preacher_tax() {
  $labels = [
    'name' => _x( 'Preachers', 'taxonomy general name', 'sermone' ),
    'singular_name' => _x( 'Preacher', 'taxonomy singular name', 'sermone' ),
    'search_items' => __( 'Search Preachers', 'sermone' ),
    'popular_items' => __( 'Popular Preachers', 'sermone' ),
    'all_items' => __( 'All Preachers', 'sermone' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Preacher', 'sermone' ),
    'update_item' => __( 'Update Preacher', 'sermone' ),
    'add_new_item' => __( 'Add New Preacher', 'sermone' ),
    'new_item_name' => __( 'New Preacher Name', 'sermone' ),
    'separate_items_with_commas' => __( 'Separate Preachers with commas', 'sermone' ),
    'add_or_remove_items' => __( 'Add or remove Preachers', 'sermone' ),
    'choose_from_most_used' => __( 'Choose from the most used Preachers', 'sermone' ),
    'not_found' => __( 'No Preachers found.', 'sermone' ),
    'menu_name' => __( 'Preachers', 'sermone' ),
  ];

  $args = [
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => [ 'slug' => 'sermone_preacher' ],
  ];

  register_taxonomy( 'sermone_preacher', 'sermone', $args );
}

add_action( 'init', 'sermone_register_preacher_tax', 22 );

/**
 * Register sirmone preacher
 * 
 */
function sermone_register_series_tax() {
  $labels = [
    'name' => _x( 'Series', 'taxonomy general name', 'sermone' ),
    'singular_name' => _x( 'Series', 'taxonomy singular name', 'sermone' ),
    'search_items' => __( 'Search PrSerieseachers', 'sermone' ),
    'popular_items' => __( 'Popular Series', 'sermone' ),
    'all_items' => __( 'All Series', 'sermone' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Series', 'sermone' ),
    'update_item' => __( 'Update Series', 'sermone' ),
    'add_new_item' => __( 'Add New Series', 'sermone' ),
    'new_item_name' => __( 'New Series Name', 'sermone' ),
    'separate_items_with_commas' => __( 'Separate Series with commas', 'sermone' ),
    'add_or_remove_items' => __( 'Add or remove Series', 'sermone' ),
    'choose_from_most_used' => __( 'Choose from the most used Series', 'sermone' ),
    'not_found' => __( 'No Series found.', 'sermone' ),
    'menu_name' => __( 'Series', 'sermone' ),
  ];

  $args = [
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => [ 'slug' => 'sermone_series' ],
  ];

  register_taxonomy( 'sermone_series', 'sermone', $args );
}

add_action( 'init', 'sermone_register_series_tax', 24 );