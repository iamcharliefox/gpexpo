


$(document).ready(function(){
  console.log('Javascript Loaded...');
  localStorage.setItem('eventBugShown', 'true');

  $('.hero-slide-container').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    dots: true,
    lazyLoad: 'ondemand',
    speed: 1200,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          arrows: true,
          dots: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          arrows: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          dots: true
        }
      } ,
      {
        breakpoint: 576,
        settings: {
          arrows: false,
          dots: false
        }
      }     

    ]      
  });
  $('.hero-slide-container').fadeIn();


  // On before slide change
$('.hero-slide-container').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  $('.hero-background').removeClass('active');
  $('div[data-slick-index = "'+nextSlide+'"]').find('.hero-background').addClass('active');
});


// $('hero-slide-container .slick-arrow').on('click', function() {
// $('.hero-background').removeClass('active');
// });

  $('.testimonials-container').slick({
    autoplay: true,
    autoplaySpeed: 6000,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          arrows: false
        }
      } 
    ]      
  });  


    $('.product-carousel').slick({
    autoplay: true,
    autoplaySpeed: 2500,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    // centerMode: true,
    arrows: false,
    pauseOnHover: false,
    speed: 1000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        }
      } 
    ]  
  });  
  $('.product-carousel').fadeIn();

      $('.adv-slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    pauseOnHover: true,
    speed: 1000,
    fade: true
  }); 

  $('#tab').easyResponsiveTabs({
    activetab_bg: '#ffffff',
    inactive_bg: '#ffffff',
    fit: true,
    active_content_border_color: '#ffffff',
  });  




console.log(localStorage.getItem('bug'));
 $('.bug').addClass(localStorage.getItem('bug'));

$('.bug-close').on('click', function() {
    localStorage.setItem('bug', 'inactive');
    $('.bug').removeClass('active');
    $('.bug').addClass('inactive');
});

$('.bug-icon').on('click', function() {
    localStorage.setItem('bug', 'active');
    $('.bug').removeClass('inactive');
    $('.bug').addClass(localStorage.getItem('bug'));
});


function loadFaq() {
  $("#trigger li").first().addClass('active');
  $(".faq-general").fadeIn(100);
  $( "#trigger li" ).click(function() {
    $("#trigger li").removeClass('active');
    $(this).addClass('active');
    $faq = ".faq-" + $(this).attr('id');
    $( ".faq-item" ).hide();
    $( $faq ).fadeIn();
  });
}

if ($("body").hasClass("page-faq")) {
  loadFaq();
}


$('.drawer-title').on('click', function() {
  $(this).parent().find('.drawer-content').toggle();
});


$('.upcoming-filter a').on('click', function() {
  var myFilter = "." + $(this).data("filter");
  console.log(myFilter);
  // $(".event-row").filter(myFilter).hide(); 
  $('.upcoming-filter a').removeClass('active');
  $(this).addClass('active');
   $('.event-row').hide();
    $(myFilter).fadeIn(300);
});





});