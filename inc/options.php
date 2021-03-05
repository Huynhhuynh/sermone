<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
/**
 * Options
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Register settings
 * 
 */
function sermone_settings() {

  $sermone_settings = Container::make( 'theme_options', __( 'Sermon\'e Settings', 'sermone' ) )
    ->set_page_menu_title( __( 'Settings' ) )
    ->set_page_parent( 'edit.php?post_type=sermone' )
    ->set_page_file( 'sermone-settings-panel' );

  do_action( 'sermone_hook_settings', $sermone_settings );
}

add_action( 'carbon_fields_register_fields', 'sermone_settings' );

/**
 * Add settings general
 * 
 * @param Object $settings
 */
function sermone_settings_general( $settings ) {

  $fields = apply_filters( 'sermone_hook_general_options', [
    Field::make( 'text', 'sermone_container_width', __( 'Container Width', 'sermone' ) )
      ->set_default_value( '1120px' )
      ->set_help_text( __( 'Enter container width for .sermone-container (default: 1120px)', 'sermone' ) )
      ->set_required( true ),
    Field::make( 'select', 'sermone_audio_video_player', __( 'Audio & Video Player', 'sermone' ) )
      ->set_options( [
        'plyr' => __( 'Plyr', 'sermone' ),
        'html5' => __( 'Browser Html 5', 'sermone' )
      ] )
      ->set_default_value( 'plyr' )
      ->set_help_text( __( 'Select which player to use for playing Sermones.', 'sermone' ) ),
    Field::make( 'text', 'sermone_archive_page_slug', __( 'Archive Page Slug' ) )
      ->set_default_value( 'sermone' )
      ->set_help_text( __( 'This controls the page where sermones will be located, which includes single sermones.', 'sermone' ) )
      ->set_required( true ),
  ] );

  $settings->add_tab( __( 'General Settings', 'sermone' ), $fields );
}

add_action( 'sermone_hook_settings', 'sermone_settings_general', 10 );