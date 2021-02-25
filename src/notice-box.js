/**
 * Notice Box 
 * 
 * @package sermone 
 * @version 1.0.0
 */

export default class NoticeBox {

  constructor ( options ) {
    this.opts = $.extend( {
      content: '',
      autoClose: true,
      autoCloseTimer: 5000
    }, options )

    this.showTimeout

    return this
  }

  template ( content ) {
    let html = `
    <div class="notice-box-container">
      <div class="notice-box--content">
        ${ content }
      </div>
    </div>`
    return $( html )
  }

  setContent ( newContent ) {
    this.opts.content = newContent
    if( this.$box ) this.$box.find( '.notice-box--content' ).html( this.opts.content )
  }

  show () {
    let self = this
    clearTimeout( self.showTimeout )

    if( this.$box ) {

      self.showTimeout = setTimeout( () => {
        self.hide()
      }, this.opts.autoCloseTimer )

      return
    }

    this.$box = this.template( this.opts.content )

    $( 'body' ).append( this.$box )
    this.$box.find( '.notice-box--content' ).animate( {
      bottom: 20,
    }, 'slow' )

    if( this.opts.autoClose == true ) {
      self.showTimeout = setTimeout( () => {
        self.hide()
      }, this.opts.autoCloseTimer )
    }
  }

  hide () {
    let self = this 

    if( ! self.$box ) return

    this.$box.find( '.notice-box--content' ).animate( {
      bottom: -150,
    }, 'slow', () => {
      self.$box.remove()
      self.$box = null
    } )
  }
}