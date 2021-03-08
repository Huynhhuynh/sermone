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

  /**
   * General settings 
   */
  $sermone_settings = Container::make( 'theme_options', __( 'Sermon\'e Settings', 'sermone' ) )
    ->set_page_menu_title( __( 'Settings' ) )
    ->set_page_parent( 'edit.php?post_type=sermone' )
    ->set_page_file( 'sermone-settings-panel' );

  /**
   * Sermon'e post meta settings
   */
  $sermone_post_meta_settings = Container::make( 'post_meta', __( 'Sermone Detail', 'sermone' ) )
    ->where( 'post_type', '=', 'sermone' );

  do_action( 'sermone_hook_settings', $sermone_settings );
  do_action( 'sermone_hook_post_meta_settings', $sermone_post_meta_settings );
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
    Field::make( 'text', 'sermone_archive_page_slug', __( 'Archive Page Slug', 'sermone' ) )
      ->set_default_value( 'sermone' )
      ->set_help_text( __( 'This controls the page where sermones will be located, which includes single sermones.', 'sermone' ) )
      ->set_required( true ),
    Field::make( 'checkbox', 'sermone_add_to_favorite', __( 'Add to Favorite', 'sermone' ) )
      ->set_default_value( false )
      ->set_help_text( 'Enable / Disable add to favorite feature (require user logged). <br />
      We provide a shortcode you can use anywhere to display a user\'s favorites list <strong>[sermone_favorite heading_text="My Favorite"]</strong>' ),
    Field::make( 'text', 'sermone_user_login_url', __( 'User login URL', 'sermone' ) )
      ->set_default_value( '#' )
      ->set_help_text( __( 'Type user login redirect url.', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'sermone_add_to_favorite',
          'value' => true,
        ]
      ] )
  ] );

  $settings->add_tab( __( 'General Settings', 'sermone' ), $fields );
}

add_action( 'sermone_hook_settings', 'sermone_settings_general', 10 );

/**
 * Add settings display 
 * 
 * @param Object $settings
 */
function sermone_settings_display( $settings ) {

  $fields = apply_filters( 'sermone_hook_display_options', [
    Field::make( 'image', 'sermone_image_default', __( 'Image Default', 'sermone' ) )
      ->set_help_text( __( 'Sets the default sermone image that would show up if there is no sermone or series (if applicable) image is set.', 'sermone' ) )
      ->set_type( [ 'image' ] ),
    Field::make( 'checkbox', 'sermone_archive_filtering', __( 'Archive Filtering', 'sermone' ) )
      ->set_default_value( true )
      ->set_help_text( __( 'Enable / Disable filter on archive page', 'sermone' ) ),
    Field::make( 'select', 'sermone_archive_layout', __( 'Archive Layout', 'sermone' ) )
      ->set_options( apply_filters( 'sermone_hook_archive_layout', [
        'list' => __( 'List' ),
        'grid' => __( 'Grid (2 columns)' ),
      ] ) )
      ->set_default_value( 'list' )
      ->set_help_text( __( 'Choose a sermon\'e archive layout', 'sermone' ) ),
    Field::make( 'checkbox', 'single_sharing', __( 'Single Sharing', 'sermone' ) )
      ->set_default_value( true )
      ->set_help_text( __( 'Enable / Disable sharing on sermone single page', 'sermone' ) ),
  ] );

  $settings->add_tab( __( 'Display Settings', 'sermone' ), $fields );
}

add_action( 'sermone_hook_settings', 'sermone_settings_display', 12 );

/**
 * Sermone post meta settings 
 * 
 * @param Object $settings
 */
function sermone_hook_sermone_post_meta_settings( $settings ) {
  $fields = apply_filters( 'sermone_hook_post_meta_options', [
    Field::make( 'date', 'sermon_date_preached', __( 'Date Preached', 'sermone' ) )
      ->set_storage_format( 'Y-m-d' )
      ->set_input_format( 'Y-m-d', 'F j, Y' ),
    Field::make( 'text', 'sermone_main_bible_passage', __( 'Main Bible Passage', 'sermone' ) )
      ->set_help_text( __( 'Enter the Bible passage with the full book names, e.g. John 3:16-18
      Or multiple books like John 3:16-18, Luke 2:1-3', 'sermone' ) ),
    Field::make( 'complex', 'sermone_audio' )
      ->set_duplicate_groups_allowed( false )
      ->add_fields( [
        Field::make( 'select', 'audio_source', __( 'Audio Source', 'sermone' ) )
          ->set_options( [
            'embed_code' => __( 'Embed Code', 'sermone' ),
            'audio_link' => __( 'Audio Link (Soundcloud)' , 'sermone' ),
            'wp_media' => __( 'WP Media' , 'sermone' ),
          ] )
          ->set_default_value( 'wp_media' )
          ->set_help_text( __( 'Choose type audio (default: WP Media)', 'sermone' ) ),
        Field::make( 'textarea', 'embed_code', __( 'Embed Code', 'sermone' ) )
          ->set_help_text( __( 'Enter embed code here!', 'sermone' ) )
          ->set_conditional_logic( [
            [
              'field' => 'audio_source',
              'value' => 'embed_code'
            ]
          ] ),
        Field::make( 'oembed', 'audio_link', __( 'Audio Link (Soundcloud, etc.)', 'sermone' ) )
          ->set_help_text( __( 'Enter audio link (Exam: https://mydomain.com/audio.mp3)', 'sermone' ) )
          ->set_conditional_logic( [
            [
              'field' => 'audio_source',
              'value' => 'audio_link'
            ]
          ] ),
        Field::make( 'file', 'wp_media', __( 'Select Audio MP3', 'sermone' ) )
          ->set_type( [ 'audio' ] )
          ->set_help_text( __( 'Select audio MP3', 'sermone' ) )
          ->set_conditional_logic( [
            [
              'field' => 'audio_source',
              'value' => 'wp_media'
            ]
          ] ),
        Field::make( 'text', 'mp3_duration', __( 'MP3 Duration', 'sermone' ) )
          ->set_attribute( 'placeholder', __( '16:20 mins', 'sermone' ) )
      ] )
      ->set_default_value( [
        [
          'audio_source' => 'wp_media'
        ]
      ] )
      ->set_header_template( __( 'Audio', 'sermone' ) ),
    
  ] );

  $settings->add_fields( $fields );
}

add_action( 'sermone_hook_post_meta_settings', 'sermone_hook_sermone_post_meta_settings' );