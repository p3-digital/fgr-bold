jQuery(document).ready(function($) {
    $( document ).ready(function() {
    //Custom Javascript goes here
    //window width
      animations();







          var windowWidth = $(window).width();
          $(window).on('resize',function(){
            windowWidth = $(window).width();
          });



          //scroll to top
          $('a.go-to-top').on('click', function(e){
            e.preventDefault();
            $("html,body").animate({scrollTop: 0}, 1000);
          });




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
          var exp = $(this).attr('data-experience');
          var menu = $(this).attr('data-menu');
          $('.'+exp+' .menu-wrapper, .'+exp+' .menu-experience').removeClass('active');
          $('.'+exp+' #'+menu).addClass('active');
          $(this).addClass('active');
        });



        //mobile catering toggle
        $('.mobile-ce-section-toggle').on('click',function(e){
          e.preventDefault();
          var section = $(this).parent().attr('id');
          if ( !$(this).hasClass('active') ) {
            $('.mobile-ce-section-toggle').removeClass('active');
            $(this).addClass('active');
            $('.catering-experience-tab').css('height','73px');
            var $selector = $('#'+section);
            $selector.data('oHeight',$selector.height()).css('height','auto').data('nHeight',$selector.height()).height($selector.data('oHeight')).animate({height: $selector.data('nHeight')},400);
            }else{
              $(this).removeClass('active');
              $('.catering-experience-tab').animate({
                height: '73px'
              }, 400, function() {
                // Animation complete.
              });
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


        if (windowWidth > 768) {
          $('.related-cs, .fp-trio').on('mouseenter',function(){
            $(this).find('.overlay').fadeIn();
          }).on('mouseleave',function(){
            $(this).find('.overlay').fadeOut();
          });
        };

        
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


        $('.leader-thumb').on('click',function(){
          if (windowWidth <= 768) {
            var leaderID = $(this).attr('data-leader');
            $('.mobile-leader-content').hide();
            $('#leader-id-'+leaderID).fadeIn();
            $('.leader-thumb').removeClass('active');
            $(this).addClass('active');
          }else{
            var rowID = $(this).attr('data-row');
            var bio = $(this).find('.bio').text();
            var linkedin = $(this).find('.linkedin').text();
             if (linkedin !== '') {
              linkedin = '<a href="'+linkedin+'" class="linkedin">Email</a>';
            };
            var email = $(this).find('.email').text();
            if (email !== '') {
              email = '<a href="mailto:'+email+'" class="email">Email</a>';
            };
            $('.leader-info-row').hide();
            $('#leader-info-row-'+rowID).html('<div class="bio">'+bio+'</div><div class="close-bio">x</div><div class="bio-links-wrap">'+linkedin+email+'</div>').fadeIn();
            $('.leader-thumb').removeClass('active');
            $(this).addClass('active');
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
