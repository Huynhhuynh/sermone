/**
 * Sermone favorite 
 * 
 * @package sermone
 */

import NoticeBox from './notice-box'

; ( ( w, $ ) => {
  'use strict'

  let N = new NoticeBox()

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
        
        N.setContent( Result.data.message )
        N.show()

        if( Result.data.fav.includes( ID ) ) {
          $( `[data-sermone-fav=${ ID }]` ).addClass( '__in-fav' )
        } else {
          $( `[data-sermone-fav=${ ID }]` ).removeClass( '__in-fav' )
        }
      } 
    } )

    $( 'body' ).on( 'click', '[data-sermone-fav]', function( e ) {
      e.preventDefault();
      let ID = $( this ).data( 'sermone-fav' )

      $( document.body ).trigger( 'sermone:addToFavorite', [ parseInt( ID ) ] )
    } )
  }  

  $( FavoriteHandle )

} )( window, jQuery )

module.exports = {} 