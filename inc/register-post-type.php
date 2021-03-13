<?php 
/**
 * Register post type
 * 
 */

function sermone_register_sermon_cpt() {
  $icon = '<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="139.000000pt" height="135.000000pt" viewBox="0 0 139.000000 135.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,135.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path d="M25 1325 l-25 -24 0 -626 0 -626 25 -24 24 -25 646 0 646 0 24 25 25 24 0 626 0 626 -25 24 -24 25 -646 0 -646 0 -24 -25z m1213 -260 c1 -87 0 -165 -2 -172 -6 -15 -24 -7 -352 150 -227 109 -274 127 -274 108 0 -18 57 -80 347 -371 l283 -286 -2 -179 -3 -180 -545 0 -545 0 -3 160 c-1 87 0 165 2 172 6 15 24 7 352 -150 228 -109 274 -127 274 -108 0 19 -116 143 -374 401 l-256 255 0 176 c0 97 3 179 7 182 3 4 250 6 547 5 l541 -3 3 -160z"/> </g> </svg>';

  $labels = [
    'name' => _x( 'Sermon\'e', 'Post type general name', 'sermone' ),
    'singular_name' => _x( 'Sermon\'e', 'Post type singular name', 'sermone' ),
    'menu_name' => _x( 'Sermon\'e', 'Admin Menu text', 'sermone' ),
    'name_admin_bar' => _x( 'Sermon\'e', 'Add New on Toolbar', 'sermone' ),
    'add_new' => __( 'Add New', 'sermone' ),
    'add_new_item' => __( 'Add New Sermon', 'sermone' ),
    'new_item' => __( 'New Sermon', 'sermone' ),
    'edit_item' => __( 'Edit Sermon', 'sermone' ),
    'view_item' => __( 'View Sermon', 'sermone' ),
    'all_items' => __( 'All Sermon', 'sermone' ),
    'search_items' => __( 'Search Sermon', 'sermone' ),
    'parent_item_colon' => __( 'Parent Sermone:', 'sermone' ),
    'not_found' => __( 'No Sermone found.', 'sermone' ),
    'not_found_in_trash' => __( 'No Sermone found in Trash.', 'sermone' ),
    'featured_image' => _x( 'Sermone Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'sermone' ),
    'set_featured_image' => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'sermone' ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'sermone' ),
    'use_featured_image' => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'sermone' ),
    'archives' => _x( 'Sermon archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'sermone' ),
    'insert_into_item' => _x( 'Insert into Sermon', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'sermone' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this Sermon', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'sermone' ),
    'filter_items_list' => _x( 'Filter Sermons list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'sermone' ),
    'items_list_navigation' => _x( 'Sermons list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'sermone' ),
    'items_list' => _x( 'Sermons list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'sermone' ),
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
    'has_archive' => sermone_get_field( 'sermone_archive_page_slug', 'option' ) || 'sermone',
    'hierarchical' => false,
    'menu_position' => 26,
    'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode( $icon ),
    'supports' => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ],
    'show_in_rest' => false
  ];

  register_post_type( 'sermone', $args );
}

add_action( 'init', 'sermone_register_sermon_cpt', 1 );