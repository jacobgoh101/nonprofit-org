(function($) {
  $(window).load(function() {
        // The slider being synced must be initialized first
        $('#carousel').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: true,
          slideshow: false,
          itemWidth: 150,
          itemMargin: 5,
          asNavFor: '#slider'
        });

        $('#slider').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          sync: "#carousel"
        });
      });

})( jQuery );