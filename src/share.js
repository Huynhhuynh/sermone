/**
 * Sermone share 
 * 
 */

! ( ( w, $ ) => {
  'use strict'

  const ShareFunc = () => {

    $( 'body' ).on( 'click', '.sermone--share-container .share-item > a', function( e ) {
      e.preventDefault()
      let link = $( this ).attr( 'href' )
      let title = $( this ).attr( 'title' )

      w.open( link, title, `width=400,height=350` )
    } )
  }

  $( () => {
    ShareFunc()
  } )
} )( window, jQuery )

module.exports = {}