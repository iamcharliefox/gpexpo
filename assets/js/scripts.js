


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
    speed: 1200
  });


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
    slidesToScroll: 1    
  });  

    $('.product-carousel').slick({
    autoplay: true,
    autoplaySpeed: 0,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    centerMode: true,
    arrows: false,
    pauseOnHover: false,
    speed: 1000
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


});