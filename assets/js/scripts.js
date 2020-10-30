

$(document).ready(function(){
  console.log('Javascript Loaded...');
  $('.hero-slide-container').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    dots: true,
    speed: 1200
  });

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