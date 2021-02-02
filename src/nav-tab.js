/**
 * Sermone nav tab 
 */

( ( w, $ ) => {
  'use strict'

  let TabNav, TabContent

  /**
   * Media tab nav single sermone
   * 
   * @single 1.0.0
   * @version 1.0.0
   * 
   * @return void
   */
  const NavTabFunc = () => {
    TabNav.on( 'click', 'a[data-nav-type=tab]', function( e ) {
      e.preventDefault();
      let TabName = $( this ).data( 'nav-key' )

      // Tab nav
      $( this )
        .parent( '.media-item' )
        .addClass( '__active' )
        .siblings()
        .removeClass( '__active' )

      // Tab content
      TabContent
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
    TabNav = $( '.sermone--media-nav-container' )
    TabContent = $( '.sermone--media-tab-container' )

    NavTabFunc()
  } )

} )( window, jQuery )

module.exports = {}