/**
 * Sermone Script 
 * 
 * @since 1.0.0
 */

/**
 * Style
 */
import './scss/main.scss' 
import 'plyr/src/sass/plyr.scss'
import 'tippy.js/dist/tippy.css' // optional for styling

/**
 * Modules
 */
import { NavMediaContentRender, TippyTooltip } from './helpers'
import './nav-tab'
import './share'
import './quickview-modal'
import './favorite'

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

    /**
     * Tippy JS (tooltip)
     */
    TippyTooltip( '[data-tippy-content]' ) 
  } )

} )( window, jQuery )