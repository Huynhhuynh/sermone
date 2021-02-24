/**
 * Sermone favorite 
 * 
 * @package sermone
 */

; ( ( w, $ ) => {
  'use strict'

  const FavoriteHandle = () => {
    
    const sendData = async ( ID ) => {
      return await $.ajax( {
        type: 'POST',
        url: PHP_DATA.ajax_url,
        data: {
          action: 'sermone_ajax_add_to_favorite',
          id: ID
        },
        error ( err ) {
          console.log( err )
          alert( 'Internal error: Please reload page and try again!' )
        }
      } )
    }

    $( document.body ).on( {
      async 'sermone:addToFavorite' ( e, ID ) {
        const Result = await sendData( ID )
        console.log( Result )
      }
    } )

    $( 'body' ).on( 'click', '[data-sermone-fav]', function( e ) {
      e.preventDefault();
      let ID = $( this ).data( 'sermone-fav' )

      $( document.body ).trigger( 'sermone:addToFavorite', [ ID ] )
    } )
  }  

  $( FavoriteHandle )

} )( window, jQuery )

module.exports = {} 