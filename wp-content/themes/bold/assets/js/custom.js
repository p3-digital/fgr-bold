jQuery(document).ready(function($) {
    $( document ).ready(function() {
    //Custom Javascript goes here
    //window width
      animations();
      checkCookie();



          $('.carousel').bcSwipe({ threshold: 50 });

          function checkCookie() {
              var fgrCta = getCookie('fgr-cta');
              if (fgrCta == '') {
                  setTimeout(function(){ 
                    $('.foot-cta').fadeIn();
                  }, 5000);
              }
          }

          function getCookie(cname) {
              var name = cname + "=";
              var ca = document.cookie.split(';');
              for(var i = 0; i < ca.length; i++) {
                  var c = ca[i];
                  while (c.charAt(0) == ' ') {
                      c = c.substring(1);
                  }
                  if (c.indexOf(name) == 0) {
                      return c.substring(name.length, c.length);
                  }
              }
              return "";
          }

          function setCookie(cname, cvalue, exdays) {
              var d = new Date();
              d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
              var expires = "expires="+d.toUTCString();
              document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
          }


          $('.close-foot-cta').on('click',function(){
            $('.foot-cta').fadeOut();
            setCookie('fgr-cta', 'true', 2);
          });

          $(window).on( 'scroll', function(){
            if($(window).scrollTop() + $(window).height() == $(document).height() ) {
               $('.foot-cta').css('position','relative')
            }else if($(window).scrollTop() + $(window).height() < $(document).height() -150 ){
              $('.foot-cta').css('position','fixed')
            }
          });


          var windowWidth = $(window).width();
          $(window).on('resize',function(){
            windowWidth = $(window).width();
          });

          if (windowWidth >= 992) {
            $('.experience-0, .tab-content #index-0').addClass('active');
          };

          //scroll to top

          $('a.go-to-top').on('click', function(e){
            e.preventDefault();
            $("html,body").animate({scrollTop: 0}, 1000);
          });



          // mobile menu
          $('.mobile-menu-toggle').on('click',function(){
            if( $(this).hasClass('open') ){
              $('#main-navigation').animate({
                  left: '-100%'
                }, 400, function() {
                  // Animation complete.
              });
              $(this).removeClass('open');
            }else{
              $('#main-navigation').animate({
                  left: '0'
                }, 400, function() {
                  // Animation complete.
              });
              $(this).addClass('open');
            }
          });

          if (windowWidth <= 768) {
            $(window).scroll(function() {
              $('.mobile-menu-toggle').fadeIn();
                clearTimeout($.data(this, 'scrollTimer'));
                $.data(this, 'scrollTimer', setTimeout(function() {
                  $('.mobile-menu-toggle').hide();
               }, 2000));
            });
          }




        //remove auto increment from slider
        $('#case-study-carousel').carousel({
          interval: false
        })

        // add click event
        $('.section-block, .related-cs').click(function() {
           var anchor = $(this).find("a");
           if (anchor.hasClass('new-tab')) {
             window.open($(this).find("a").attr("href"), '_blank');
           }else{
             window.location = $(this).find("a").attr("href"); 
           }
          
           return false;
        }); 



        //header animation
	     $(document).ready(function(){
          if($(document).scrollTop() > 50){
            if (!$('.nav').hasClass('shrunk')){
              shrinkHeader();
            };
          }else{
            if ($('.nav').hasClass('shrunk')){
              growHeader();
            };
          }
        });

        $(document).on('scroll', function(){
          if($(document).scrollTop() > 50){
            if (!$('.nav').hasClass('shrunk')){
              shrinkHeader();
            };
          }else{
            if ($('.nav').hasClass('shrunk')){
              growHeader();
            };
          }
        });


      

      
        // $('.video-section .play').on('click',function(e){
        //   e.preventDefault();
        //   $(this).parent().hide();
        //   var url = $(this).parent().parent().find('iframe').attr('src');
        //   $(this).parent().parent().find('iframe').attr('src', url+'&autoplay=1');
        //   $(this).parent().parent().find('.aspect').show().animate({
        //     opacity: 1,
        //   }, 4000, function() {
        //   });
        // })


        // catering menu tabs
        $('.menu-experience').on('click',function(e){
          e.preventDefault();
          var section = $('.catering-experience-tab.active').attr('id');
          var $selector = $('#'+section);
          var exp = $(this).attr('data-experience');
          var pdf = $(this).attr('data-pdf');
          var menu = $(this).attr('data-menu');
          $('.'+exp+' .menu-wrapper, .'+exp+' .menu-experience, .pdf-menu').removeClass('active');
          $('.'+exp+' #'+menu+', #'+pdf).addClass('active');
          $(this).addClass('active');
          if (windowWidth <= 768) {
            $selector.data('oHeight',$selector.height()).css('height','auto').data('nHeight',$selector.height()).height($selector.data('oHeight')).animate({height: $selector.data('nHeight')},400);
          }
        });

        // reset menus when tab is changed  
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          $('.pdf-menu, .menu-experience, .menu-wrapper').removeClass('active');
          var tabs = $('.catering-experience-tab');
          $.each(tabs, function( index, value ) {
            $(this).find('.pdf-menu').first().addClass('active');
            $(this).find('.menu-experience').first().addClass('active');
            $(this).find('.menu-wrapper').first().addClass('active');
          });
        })

        $(".expander").click(function(){
          var $this = $(this),
              $content = $this.find(".content");
          if(!$this.hasClass("closed")){
            TweenLite.to($content, 0.2, {height:0})
            $this.addClass("closed")
          }else{
            TweenLite.set($content, {height:"auto"})
            TweenLite.from($content, 0.2, {height:0})
            $this.removeClass("closed");
          }
        })


        //mobile catering toggle
        $('.mobile-ce-section-toggle').on('click',function(e){
          e.preventDefault();
          var section = $(this).parent().attr('id');
          if ( !$(this).parent().hasClass('active') ) {
            $('.mobile-ce-section-toggle').parent().removeClass('active');
            $(this).parent().addClass('active');
            var $selector = $('#'+section);
            $content = $('.catering-experience-tab');
            $('.catering-experience-tab').css('height', '73px').removeClass('active');
            TweenMax.set($selector, {height:"auto"});
            TweenMax.from($selector, 1, {height:0})
             $('html, body').animate({ 
                scrollTop: $('#'+section).offset().top 
              }, 0, function() {
                //animation complete
              });
            $(this).parent().addClass('active');
          }else{
            $(this).parent().removeClass('active');
            TweenMax.to($content, 1, {height:73});
          }
        });


        $('.open-caption').on('click',function(e){
          e.preventDefault();
          if( $(this).hasClass('open') ){
            $(this).parent().find('.long-text').hide(); 
            $(this).parent().find('.shortened').show(); 
            $(this).removeClass('open');
          }else{
            $(this).parent().find('.shortened').hide(); 
            $(this).parent().find('.long-text').show();
            $(this).addClass('open');
          }
        });


        $('.related-cs, .fp-trio').on('mouseenter',function(){
          $(this).find('.overlay').fadeIn();
        }).on('mouseleave',function(){
          $(this).find('.overlay').fadeOut();
        });



        
        //case study filtering
        $('.filter-wrap a').on('click',function(){
          var filter = $(this).attr('data-id');
          if (filter == 'all') {
            $('.related-cs').fadeIn();
          }else{
            $('.related-cs').hide();
            $('.related-cs.'+filter).fadeIn();
          }
        });

        $('#csFilter').on('change',function(){
          var filter = $(this).val();
          if (filter == 'all') {
            $('.related-cs').fadeIn();
          }else{
            $('.related-cs').hide();
            $('.related-cs.'+filter).fadeIn();
          }
        });

        //change color of select
        $('select').on('change',function(){
          $(this).addClass('selected');
        })





        // masonry layout stuff
        var $container = $('.grid');
        $container.imagesLoaded( function () {
          $container.masonry({
            columnWidth: 243,
            itemSelector: '.grid-item',
            gutter: 0
          });   
        });


        $('a[data-toggle=tab]').each(function () {
          var $this = $(this);

          $this.on('shown.bs.tab', function () {
            $container.imagesLoaded( function () {
              $container.masonry({
                columnWidth: 243,
                itemSelector: '.grid-item',
                gutter: 0
              });   
            });  
          });
        });



        // leader thumbs
        $('.leader-thumb').on('mouseenter',function(){
          $(this).find('.leader-content').stop().fadeIn();
        }).on('mouseleave',function(){
          $('.leader-content').stop().fadeOut();
        });


        $('.leader-thumb .leader-content').on('click',function(){
          if (windowWidth <= 768) {
            var leaderID = $(this).parent().attr('data-leader');
            $('.leader-content').fadeOut();
            $('.mobile-leader-content').hide();
            $('#leader-id-'+leaderID).fadeIn();
            $('.leader-thumb').removeClass('active');
            $(this).parent().addClass('active');
          }else{
            var rowID = $(this).parent().attr('data-row');
            var bio = $(this).parent().find('.bio').text();
            var linkedin = $(this).parent().find('.linkedin').text();
             if (linkedin !== '') {
              linkedin = '<a href="'+linkedin+'" class="linkedin">Email</a>';
            };
            var email = $(this).parent().find('.email').text();
            if (email !== '') {
              email = '<a href="mailto:'+email+'" class="email">Email</a>';
            };
            $('.leader-info-row').hide();
            $('#leader-info-row-'+rowID).html('<div class="bio">'+bio+'</div><div class="close-bio">x</div><div class="bio-links-wrap">'+linkedin+email+'</div>').fadeIn();
            $('.leader-thumb').removeClass('active');
            $(this).parent().addClass('active');
          }
        });

        $(document).on('click', '.close-bio', function(){
          $('.leader-info-row, .mobile-leader-content').hide();
          $('.leader-thumb').removeClass('active');
        });


        $('.social-icon').on('mouseenter',function(){
          $(this).find('.not-active').hide();
          $(this).find('.active').show();
        }).on('mouseleave',function(){
          $(this).find('.active').hide();
          $(this).find('.not-active').show();
        });






  });
});

function animations(){
  //animations
  TweenMax.fromTo('#transparent-star', 2,
    { 
      scale: 0, 
      rotation: 200 
    },{ 
      scale: 1, 
      opacity: 1, 
      rotation: 360, 
      ease: Back.easeInOut 
    }, 0.2);
}

function shrinkHeader(){
   jQuery('.home-nav-item').animate({
      height: '52'
    }, 300, function() {
      
    });

    TweenMax.fromTo('.home-nav-item', 1,{ 
      scale: 0, 
      rotation: 200 
    },{ 
      scale: 1, 
      opacity: 1, 
      rotation: 360, 
      ease: Back.easeInOut 
    }, 0.2);

    jQuery('.desktop-logo').fadeOut();

    jQuery('.nav').addClass('shrunk');
}

function growHeader(){
    TweenMax.fromTo('.home-nav-item', 1,{ 
      scale: 1, 
      rotation: 360 
    },{ 
      scale: 0, 
      opacity: 1, 
      rotation: 200
    }, 0.2);

    jQuery('.home-nav-item').animate({
      height: '0'
    }, 300, function() {
      
    });

    jQuery('.desktop-logo').fadeIn();

    jQuery('.nav').removeClass('shrunk');
}



/*! Bootstrap Carousel Swipe jQuery plugin v1.1 | https://github.com/maaaaark/bcSwipe | MIT License */
!function(t){t.fn.bcSwipe=function(e){var n={threshold:50};return e&&t.extend(n,e),this.each(function(){function e(t){1==t.touches.length&&(u=t.touches[0].pageX,c=!0,this.addEventListener("touchmove",o,!1))}function o(e){if(c){var o=e.touches[0].pageX,i=u-o;Math.abs(i)>=n.threshold&&(h(),t(this).carousel(i>0?"next":"prev"))}}function h(){this.removeEventListener("touchmove",o),u=null,c=!1}var u,c=!1;"ontouchstart"in document.documentElement&&this.addEventListener("touchstart",e,!1)}),this}}(jQuery);

