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
  $sermone_post_meta_settings = Container::make( 'post_meta', __( 'Sermon Detail', 'sermone' ) )
    ->where( 'post_type', '=', 'sermone' );

  /**
   * Preacher term meta settings
   */
  $sermone_preacher_meta_settings = Container::make( 'term_meta', __( 'Preacher Detail', 'sermone' ) )
    ->where( 'term_taxonomy', '=', 'sermone_preacher' );


  /**
   * User settings 
   */
  $sermone_user_settings = Container::make( 'user_meta', __( 'Sermon Favorite', 'sermone' ) );

  do_action( 'sermone_hook_settings', $sermone_settings );
  do_action( 'sermone_hook_post_meta_settings', $sermone_post_meta_settings );
  do_action( 'sermone_hook_preacher_meta_settings', $sermone_preacher_meta_settings );
  do_action( 'sermone_hook_user_settings', $sermone_user_settings );
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
    Field::make( 'date', 'sermon_date_preached', __( 'Date Preached', 'sermone' ) ),
    Field::make( 'text', 'sermone_main_bible_passage', __( 'Main Bible Passage', 'sermone' ) )
      ->set_help_text( __( 'Enter the Bible passage with the full book names, e.g. John 3:16-18
      Or multiple books like John 3:16-18, Luke 2:1-3', 'sermone' ) ),
    Field::make( 'separator', 'sermone_separator_audio', __( 'Audio Settings' ) ),
    Field::make( 'select', 'audio_source', __( 'Audio Source', 'sermone' ) )
      ->set_options( [
        'audio_embed_code' => __( 'Embed Code', 'sermone' ),
        'audio_link' => __( 'Audio Link (Soundcloud)' , 'sermone' ),
        'audio_wp_media' => __( 'WP Media' , 'sermone' ),
      ] )
      ->set_default_value( 'audio_wp_media' )
      ->set_help_text( __( 'Choose type audio (default: WP Media)', 'sermone' ) ),
    Field::make( 'textarea', 'audio_embed_code', __( 'Audio Embed Code', 'sermone' ) )
      ->set_help_text( __( 'Enter embed code here!', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'audio_source',
          'value' => 'audio_embed_code'
        ]
      ] ),
    Field::make( 'text', 'audio_link', __( 'Audio Link (Soundcloud, etc.)', 'sermone' ) )
      ->set_help_text( __( 'Enter audio link (Exam: https://soundcloud.com/rapzilla/cutright-church-ft-dru-bex-chosen)', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'audio_source',
          'value' => 'audio_link'
        ]
      ] ),
    // Field::make( 'oembed', 'audio_link', __( 'Audio Link (Soundcloud, etc.)', 'sermone' ) )
    //   ->set_help_text( __( 'Enter audio link (Exam: https://soundcloud.com/rapzilla/cutright-church-ft-dru-bex-chosen)', 'sermone' ) )
    //   ->set_conditional_logic( [
    //     [
    //       'field' => 'audio_source',
    //       'value' => 'audio_link'
    //     ]
    //   ] ),
    Field::make( 'file', 'audio_wp_media', __( 'Select Audio MP3', 'sermone' ) )
      ->set_type( [ 'audio' ] )
      ->set_help_text( __( 'Select audio MP3', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'audio_source',
          'value' => 'audio_wp_media'
        ]
      ] ),
    Field::make( 'text', 'mp3_duration', __( 'MP3 Duration', 'sermone' ) )
      ->set_attribute( 'placeholder', __( '16:20 mins', 'sermone' ) ),
    Field::make( 'separator', 'sermone_separator_video', __( 'Video Settings' ) ),
    Field::make( 'select', 'video_source', __( 'Video Source', 'sermone' ) )
      ->set_options( [
        'video_embed_code' => __( 'Embed Code', 'sermone' ),
        'video_link' => __( 'Video Link (Youtube, Vimeo, etc)' , 'sermone' ),
        'video_wp_media' => __( 'WP Media' , 'sermone' ),
      ] )
      ->set_default_value( 'video_wp_media' )
      ->set_help_text( __( 'Choose type video (default: WP Media)', 'sermone' ) ),
    Field::make( 'textarea', 'video_embed_code', __( 'Video Embed Code', 'sermone' ) )
      ->set_help_text( __( 'Paste your embed code for Vimeo, Youtube, Facebook, or direct video file here', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'video_source',
          'value' => 'video_embed_code'
        ]
      ] ),
    Field::make( 'text', 'video_link', __( 'Video Link (Youtube, Vimeo)', 'sermone' ) )
      ->set_help_text( __( 'aste your link for Vimeo, Youtube...', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'video_source',
          'value' => 'video_link'
        ]
      ] ),
    // Field::make( 'oembed', 'video_link', __( 'Video Link (Youtube, Vimeo)', 'sermone' ) )
    //   ->set_help_text( __( 'Paste your link for Vimeo, Youtube...', 'sermone' ) )
    //   ->set_conditional_logic( [
    //     [
    //       'field' => 'video_source',
    //       'value' => 'video_link'
    //     ]
    //   ] ),
    Field::make( 'file', 'video_wp_media', __( 'Select Video MP4', 'sermone' ) )
      ->set_type( [ 'video' ] )
      ->set_help_text( __( 'Upload or select video from WP Media', 'sermone' ) )
      ->set_conditional_logic( [
        [
          'field' => 'video_source',
          'value' => 'video_wp_media'
        ]
      ] ),
    Field::make( 'separator', 'sermone_separator_other', __( 'Other Settings' ) ),
    Field::make( 'file', 'sermone_notes', __( 'Sermone Notes', 'sermone' ) )
      ->set_help_text( __( 'Upload a pdf file', 'sermone' ) ),
    Field::make( 'file', 'sermone_bulletin', __( 'Bulletin', 'sermone' ) )
      ->set_help_text( __( 'Upload a pdf file', 'sermone' ) )
  ] );

  $settings->add_fields( $fields );
}

add_action( 'sermone_hook_post_meta_settings', 'sermone_hook_sermone_post_meta_settings' );

/**
 * User favorite settingfs 
 * 
 * @param Object $settings
 * 
 * @return void
 */
function sermone_hook_user_favorite_settings( $settings ) {
  $fields = apply_filters( 'sermone_hook_user_favorite_options', [
    Field::make( 'complex', 'sermone_user_favorite', __( 'Favorite', 'sermone' ) )
      ->set_duplicate_groups_allowed( false )
      ->set_max( 1 )
      ->add_fields( [
        Field::make( 'association', 'items' )
          ->set_types( [
            [
              'type' => 'post',
              'post_type' => 'sermone',
            ]
          ] )
      ] )
  ] );

  $settings->add_fields( $fields );
}

add_action( 'sermone_hook_user_settings', 'sermone_hook_user_favorite_settings' );

/**
 * Preacher term meta settingfs 
 * 
 * @param Object $settings
 * 
 * @return void
 */
function sermone_hook_preacher_meta_settings( $settings ) {

  $fields = apply_filters( 'sermone_hook_preacher_meta_options', [
    Field::make( 'image', 'preacher_avatar', __( 'Avatar', 'sermone' ) )
      ->set_help_text( __( 'Select avatar for preacher', 'sermone' ) )
      ->set_type( [ 'image' ] ),
    Field::make( 'text', 'preacher_facebook', __( 'Facebook', 'sermone' ) ),
    Field::make( 'text', 'preacher_twitter', __( 'Twitter', 'sermone' ) ),
    Field::make( 'text', 'preacher_email', __( 'Email', 'sermone' ) ),
    Field::make( 'text', 'preacher_phone', __( 'Phone', 'sermone' ) ),
  ] );

  $settings->add_fields( $fields );
}

add_action( 'sermone_hook_preacher_meta_settings', 'sermone_hook_preacher_meta_settings' );