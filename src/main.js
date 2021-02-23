/**
 * Sermone Script 
 * 
 * @since 1.0.0
 */

import './scss/main.scss' 
import 'plyr/src/sass/plyr.scss'

/**
 * Single
 */
import { NavMediaContentRender } from './helpers'
import './nav-tab'
import './share'
import './quickview-modal'

;( ( w, $ ) => {
  'use strict';

  const NavMediaRender = () => {
    $( '.sermone--media-content-type' ).each( function() {
      NavMediaContentRender( $( this ) )
    } )
  }

  /**
   * Ready 
   */
  const Ready = () => {
    
  }

  /**
   * DOM Ready
   */
  $( Ready )

  /**
   * Browser load completed
   */
  $( w ).on( 'load', () => {
    NavMediaRender()
  } )

} )( window, jQuery )