<?php 
/**
 * Register post type
 * 
 */

function sermone_register_sermon_cpt() {
  $icon = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 370 370" style="enable-background:new 0 0 370 370;" xml:space="preserve" fill="#000"> <path d="M87.357,300.867l231.484-0.21c7.433-0.008,13.454-6.034,13.454-13.468V40.406C332.296,18.124,314.172,0,291.893,0H78.106 C55.828,0,37.704,18.124,37.704,40.41l0.078,280.204c0,27.23,22.235,49.386,49.565,49.386h231.48 c7.439,0,13.468-6.029,13.468-13.468v-7.13c0-7.437-6.028-13.465-13.464-13.467l-231.486-0.057c-8.416,0-15.265-6.845-15.265-15.262 v-4.484C72.081,307.716,78.931,300.867,87.357,300.867z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';

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