/**
 * Sermone nav tab 
 */

( ( w, $ ) => {
  'use strict'

  /**
   * Media tab nav single sermone
   * 
   * @single 1.0.0
   * @version 1.0.0
   * 
   * @return void
   */
  const NavTabFunc = () => {
    $( 'body' ).on( 'click', '.sermone--media-nav-container a[data-nav-type=tab]', function( e ) {
      e.preventDefault();
      let TabName = $( this ).data( 'nav-key' )

      // Tab nav
      $( this )
        .parent( '.media-item' )
        .addClass( '__active' )
        .siblings()
        .removeClass( '__active' )

      // Tab content
      $( '.sermone--media-tab-container' )
        .find( `.__tab-item[data-tab-key=${ TabName }]` )
        .addClass( '__active' )
        .siblings()
        .removeClass( '__active' )
    } )
  }

  /**
   * DOM Ready
   */
  $( () => {
    NavTabFunc()
  } )

} )( window, jQuery )

module.exports = {}