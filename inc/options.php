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
 * Register options general
 * 
 */
function sermone_options_general() {

  Container::make( 'theme_options', __( 'Options', 'sermone' ) )
    ->set_page_parent( 'edit.php?post_type=sermone' )
    ->set_page_file( 'sermone-options' );
}

add_action( 'carbon_fields_register_fields', 'sermone_options_general' );