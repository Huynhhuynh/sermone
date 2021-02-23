import Plyr from 'plyr'; 

export const NavMediaContentRender = ( $el ) => {
  let MediaType = $el.data( 'media-type' )
  let MediaPlayer = $el.data( 'media-player' )
  let MediaSource = $el.data( 'media-source' )
  let Content = $el.data( 'media-content' )

  switch ( MediaSource ) {
    case 'wp_media':
      
      switch( MediaType ) {
        case 'sermone-video':
          $el.html( `
          <video controls> 
            <source src="${ Content }">
          </video>` )
          break;

        case 'sermone-audio':
          $el.html( `
          <audio controls>
            <source src="${ Content }">
          </audio>` )
          break;
      }
      break;

    default:
      $el.html( Content )
      break;
  }

  if( MediaPlayer == 'plyr' ) {
    $el.find( 'video, audio' ).each( function() {
      new Plyr( this )
    } )
  }

  $el.addClass( '__is-render' )
}