/**
 * Sermone quickview modal 
 */

import { NavMediaContentRender } from './helpers'

! ( ( w, $ ) => {
  'use strict'

  let Modal = null
  let Cache = {}
  let UrlLoadedInit = w.location.href
  let TitleLoadInit = $( 'title' ).text()

  const ModalOpenHandle = ( ID ) => {
    Modal.trigger( '__open:sermone' ) // Open modal 
    Modal.trigger( '__loading:sermone', [ true ] ) // Enable loading effect

    Modal.trigger( '__loadContent:sermone', [ ID, ( data ) => {
      Modal.trigger( '__loading:sermone', [ false ] ) // Disable loading effect 
      Modal.trigger( '__pushContent:sermone', [ data.content ] )
      
      $( '.sermone--media-content-type:not(.__is-render)' ).each( function() {
        NavMediaContentRender( $( this ) )
      } )

      /**
       * Update browser url
       */
      UpdateBrowserUrl( { 
        ID: data.meta_data.post_id, 
        Title: data.meta_data.post_title, 
        Url: data.meta_data.post_url 
      } )

    } ] )
  }

  const UpdateBrowserUrl = ( { ID, Title, Url } ) => {
    window.history.pushState( { SermoneID: ID }, Title, Url );
  }

  w.onpopstate = ( event ) => {
    let SermoneID = event.state ? event.state.SermoneID : 0

    if( ! SermoneID || SermoneID == 0 || SermoneID == undefined ) {
      Modal.trigger( '__close:sermone' )

      /**
       * Update browser url
       */
      UpdateBrowserUrl( { 
        ID: 0,
        Title: TitleLoadInit, 
        Url: UrlLoadedInit
      } )

      return;
    }

    ModalOpenHandle( SermoneID )
  }

  /**
   * Quick view modal func 
   */
  const QuickviewModalFunc = () => {
    
    /**
     * Add custom trigger event
     */
    Modal.on( {
      '__open:sermone' ( e, post_id ) {
        $( 'body' ).addClass( '__sermone-quickview-modal-open' )
      },
      '__close:sermone' ( e ) {
        $( 'body' ).removeClass( '__sermone-quickview-modal-open' )

        // Remove content
        $( this ).trigger( '__pushContent:sermone', [ '' ] )
      },
      '__loading:sermone' ( e, status = false ) {
        if( status == true ) {
          Modal.addClass( '__is-loading' )
        } else {
          Modal.removeClass( '__is-loading' )
        }
      },
      '__loadContent:sermone' ( e, post_id, callback ) {

        if( Cache[ post_id ] ) {
          callback.call( '', Cache[ post_id ] )
          return
        }

        $.ajax( {
          type: 'POST',
          url: PHP_DATA.ajax_url,
          data: { action: 'sermone_ajax_quickview_template', post_id  },
          success ( res ) {
            
            callback ? callback.call( '', res ) : ''

            if( res.success == true )  
              Cache[ post_id ] = res
          },
          error ( err ) {
            console.log( err )
          }
        } )
      },
      '__pushContent:sermone' ( e, content ) {
        Modal.find( '.sermone-modal-content' ).html( content )
      }
    } )

    $( 'body' ).on( 'click', '[data-sermone-quickview]', function( e ) {
      e.preventDefault();
      let ID = $( this ).data( 'sermone-quickview' )

      // Modal open handle
      ModalOpenHandle( ID )
    } )

    $( 'body' ).on( 'click', function( e ) {
      if( $( e.target ).hasClass( 'sermone-modal-container' ) ) {
        Modal.trigger( '__close:sermone' )

        /**
         * Update browser url
         */
        UpdateBrowserUrl( { 
          ID: 0,
          Title: TitleLoadInit, 
          Url: UrlLoadedInit
        } )
      }
    } )
  }

  /**
   * DOM Ready
   */
  $( () => {
    Modal = $( '#sermone-modal' )
    QuickviewModalFunc() 
  } )

} ) ( window, jQuery )

module.exports = {}