// Sticky Header
$(document).ready(function () {
   function updateScroll() {
      if ($(window).width() > 992) {
      if ($(window).scrollTop() >= 80) {
         $(".navbar").addClass('sticky');
      } else {
         $(".navbar").removeClass("sticky");
      }
      }
       if ($(window).width() < 992) {
      if ($(window).scrollTop() >= 80) {
         $(".topBar").addClass('sticky');
      } else {
         $(".topBar").removeClass("sticky");
      }
      }
   }

   $(function () {
      $(window).scroll(updateScroll);
      updateScroll();
   });
});


// menu icon changes
$(document).ready(function () {
   $(".navbar-toggler").click(function () {
      $(this).toggleClass("i-change");
   });
});

$('.count').each(function () {
   $(this).prop('Counter',0).animate({
       Counter: $(this).text()
   }, {
       duration: 3000,
       easing: 'swing',
       step: function (now) {
           $(this).text(Math.ceil(now));
       }
   });
}); 

$(document).ready(function () {

   $('.Carouselitem').owlCarousel({
      loop: true,
      autoplay: true,
      autoPlay: 3000,
      nav: false,
      responsiveClass: true,
      responsive: {
         0: {
            items: 2,
         },
         600: {
            items: 3,
         },
         1000: {
            items: 5,
         },
      }
   });

   $('.testimonial').owlCarousel({
      loop: true,
      margin: 15,
      items: 1,
      autoplay: true,
      autoPlay: 3000,
   });

   $('.newsslide').owlCarousel({
      // center: true,
      margin: 15,
      autoplay: true,
      autoPlay: 3000,
      nav: false,
      responsiveClass: true,
      responsive: {
         0: {
            items: 1.5,
         },
         600: {
            items: 2,
         },
         1000: {
            items: 3,
         },
        

      }
   });

});


$(document).ready(function () {
$('.navbar-nav .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
}); 
 
    $(document).ready(function() {
   $(".megamenu").on("click", function(e) {
      e.stopPropagation();
   });
});



new WOW().init(2000);

