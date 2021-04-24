import Plyr from 'plyr'
import tippy, { followCursor } from 'tippy.js'

export const NavMediaContentRender = ( $el ) => {
  let MediaType = $el.data( 'media-type' )
  let MediaPlayer = $el.data( 'media-player' )
  let MediaSource = $el.data( 'media-source' )
  let Content = $el.data( 'media-content' )
  
  switch ( MediaSource ) {
    case 'video_wp_media':
    case 'audio_wp_media':
      
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

export const TippyTooltip = ( Selector, opts ) => {
  let _opts = window.jQuery.extend( {
    allowHTML: true,
    followCursor: true, 
    plugins: [ followCursor ],
    offset: [0, 25],
    maxWidth: 320,
    theme: 'sermone',
  }, opts )

  tippy( Selector, _opts )
  window.jQuery( Selector ).removeAttr( 'title' )
} 