<?php 
/**
 * Register post type
 * 
 */

function sermone_register_sermon_cpt() {
  $icon = '<svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" fill="#000" xmlns="http://www.w3.org/2000/svg"><path d="m447.733 30h1.066c8.285 0 15-6.716 15-15s-6.715-15-15-15h-345.431c-30.42 0-55.168 24.748-55.168 55.168v401.667c0 30.418 24.748 55.165 55.168 55.165h305.264c30.42 0 55.168-24.747 55.168-55.165v-321.335c0-15.152-6.143-28.894-16.066-38.873v-66.627zm-92.895 257.069-38.536 37.564 8.957 52.225c.246 1.077.376 2.199.376 3.351 0 8.277-6.705 14.989-14.98 15-.014 0-.027 0-.041 0-2.388 0-4.784-.569-6.979-1.723l-47.634-25.044-47.635 25.044c-5.054 2.655-11.178 2.214-15.797-1.142-4.619-3.355-6.933-9.043-5.967-14.671l9.098-53.039-38.536-37.564c-4.089-3.985-5.56-9.946-3.796-15.377 1.765-5.43 6.459-9.388 12.109-10.208l53.256-7.737 23.816-48.259c2.526-5.12 7.741-8.361 13.451-8.361 5.709 0 10.924 3.241 13.45 8.361l23.817 48.259 53.256 7.737c5.65.82 10.345 4.778 12.109 10.208 1.765 5.43.295 11.391-3.794 15.376zm62.895-205.969c-2.963-.494-6-.765-9.102-.765h-305.263c-13.878 0-25.168-11.29-25.168-25.167 0-13.878 11.29-25.168 25.168-25.168h314.365z"/></svg>';

  $labels = [
    'name' => _x( 'Sermones', 'Post type general name', 'sermone' ),
    'singular_name' => _x( 'Sermone', 'Post type singular name', 'sermone' ),
    'menu_name' => _x( 'Sermones', 'Admin Menu text', 'sermone' ),
    'name_admin_bar' => _x( 'Sermone', 'Add New on Toolbar', 'sermone' ),
    'add_new' => __( 'Add New', 'sermone' ),
    'add_new_item' => __( 'Add New Sermone', 'sermone' ),
    'new_item' => __( 'New Sermone', 'sermone' ),
    'edit_item' => __( 'Edit Sermone', 'sermone' ),
    'view_item' => __( 'View Sermone', 'sermone' ),
    'all_items' => __( 'All Sermones', 'sermone' ),
    'search_items' => __( 'Search Sermones', 'sermone' ),
    'parent_item_colon' => __( 'Parent Sermones:', 'sermone' ),
    'not_found' => __( 'No Sermones found.', 'sermone' ),
    'not_found_in_trash' => __( 'No Sermones found in Trash.', 'sermone' ),
    'featured_image' => _x( 'Sermone Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'sermone' ),
    'set_featured_image' => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'sermone' ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'sermone' ),
    'use_featured_image' => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'sermone' ),
    'archives' => _x( 'Sermone archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'sermone' ),
    'insert_into_item' => _x( 'Insert into Sermone', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'sermone' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this Sermone', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'sermone' ),
    'filter_items_list' => _x( 'Filter Sermones list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'sermone' ),
    'items_list_navigation' => _x( 'Sermones list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'sermone' ),
    'items_list' => _x( 'Sermones list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'sermone' ),
  ];

  $args = [
    'labels' => $labels,
    'description' => __( 'a WordPress Plugin for Church.', 'sermone' ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => [ 'slug' => 'sermone' ],
    'capability_type' => 'post',
    'has_archive' => get_field( 'sermone_archive_page_slug', 'option' ) || 'sermone',
    'hierarchical' => false,
    'menu_position' => 26,
    'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode( $icon ),
    'supports' => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ],
    'show_in_rest' => false
  ];

  register_post_type( 'sermone', $args );
}

add_action( 'init', 'sermone_register_sermon_cpt' );