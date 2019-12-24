var $ = jQuery.noConflict();


$(document).ready(function(){
  console.log('ready? ok!');


  // header background on scroll
  $(window).scroll(function(){
    let scrollTop = $(window).scrollTop();
    console.log(scrollTop);
    if(scrollTop > 5){
      $('.site-header').addClass('scrolled');
    }else{
      $('.site-header').removeClass('scrolled');
    }
  });

  if($('.header-slide').length > 1){
    $('.header-slides').slick({
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true
    });
  }




});
