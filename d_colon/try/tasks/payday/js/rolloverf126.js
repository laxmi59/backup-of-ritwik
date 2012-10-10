$(document).ready( function() {
   rollover.init()
})

rollover = {
   init: function() {
      this.preload()
      $(".ro").hover(
         function () { $(this).attr( 'src', rollover.newimage($(this).attr('src')) ) },
         function () { $(this).attr( 'src', rollover.oldimage($(this).attr('src')) ) }
      )
   },
   preload: function() {
      $(window).bind('load', function() {
         $('.ro').each( function( key, elm ) { $('<img>').attr( 'src', rollover.newimage( $(this).attr('src') ) ) })
      })
   },
   newimage: function( src ) {
      return src.substring( 0, src.search(/(\.[a-z]+)$/) ) + '.sel' + src.match(/(\.[a-z]+)$/)[0]
   },
   oldimage: function( src ) {
      return src.replace(/\.sel\./, '.')
   }
}