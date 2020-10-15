

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

  $('#tab').easyResponsiveTabs({
    activetab_bg: '#ffffff',
    inactive_bg: '#ffffff',
    fit: true,
    active_content_border_color: '#ffffff',
  });  
});