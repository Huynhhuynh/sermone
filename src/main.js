/**
 * Sermone Script 
 * 
 * @since 1.0.0
 */

import './scss/main.scss' 

;( ( w, $ ) => {
  'use strict';

  /**
   * Media tab nav single sermone
   * 
   * @single 1.0.0
   * @version 1.0.0
   * 
   * @return void
   */
  const MediaTabFunc = () => {
    let TabNav = $( '.sermone--media-nav-container' )
    let TabContent = $( '.sermone--media-tab-container' )

    TabNav.on( 'click', 'a[data-nav-type=tab]', function( e ) {
      e.preventDefault();
      let TabName = $( this ).data( 'nav-key' )

      $( this )
        .parent( '.media-item' )
        .addClass( '__active' )
        .siblings()
        .removeClass( '__active' )
    } )
  }

  /**
   * Ready 
   */
  const Ready = () => {
    MediaTabFunc()
  }

  /**
   * DOM Ready
   */
  $( Ready )

  /**
   * Browser load completed
   */
  $( w ).on( 'load', () => {} )

} )( window, jQuery )