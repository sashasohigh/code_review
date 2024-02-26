$(document).ready(function(){
  $("nav").on("click","a", function (event) {
    event.preventDefault();
    var id  = $(this).attr('href'),
    top = $(id).offset().top;
    $('body,html').animate({scrollTop: top - 50}, 1500);
  });
  
  $('.gallery-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
  });

  $('.gallery-slider-nav .item').click(function(){
    var sliderId = $(this).attr('js-slider-id');
    $('.gallery-slider-nav .item').removeClass('active');
    $(this).addClass('active');
    $('#section-gallery .container .gallery-wrapper .gallery-slider').removeClass('active');
    $('#section-gallery #gallery-slider-' + sliderId).addClass('active');
  });

  $('.lawyers-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    Infinity: true,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
    
  $('.btn-trigger').click(function () {
    $('header').toggleClass('open-menu');
    if($('header').hasClass('open-form')) {
      $('header').removeClass('open-form');
      $('header').removeClass('open-menu');
      $('.btn-trigger span').text('Menu')
    }
    if($('header').hasClass('open-menu')) {
      $('.btn-trigger span').text('Close');
    } else {
      $('.btn-trigger span').text('Menu')
    }
  });

  $('.nav-col > ul > li.menu-item-has-children > a').click(function(e){
    e.preventDefault();
    $(this).toggleClass('active');
    $(this).next('.sub-menu').slideToggle();
  });

  $('.play').click(function () {
    $('.popup-wrapper').addClass('show');
    $('#video-popup').addClass('active');
  });

  $('.close').click(function () {
    $('#video_iframe').attr('src', $('#video_iframe').attr('src'));
    $('.popup-wrapper').removeClass('show');
    $('.popup-window').removeClass('active');
  });

  $('.btn-form-trigger').click(function () {
    $('header').removeClass('open-menu');
    $('header').addClass('open-form');
    $('.btn-trigger span').text('Close')
  });
 
  $('.btn-form-trigger').click(function(){
    var parent = $(this).closest('section, header, footer');
    var parentId = parent.attr('id');
    $('.request_input input').val(parentId);
  });

  $('.btn-plan').click(function(){
    var selectedPlan = $(this).data('plan');
    $('.plan_input input').val(selectedPlan);
  });

  $('.wpforms-field').each(function() {
    if ($(this).find('input, textarea').val()) {
      $(this).addClass('fill');
    }
    $('.wpforms-field').each(function() {
      var $input = $(this).find('input, textarea');
      var $parent = $(this);
      $input.focus(function() {
        $parent.addClass('fill');
      });
      $input.blur(function() {
        if (!$input.val()) {
          $parent.removeClass('fill');
        }
      });
      if ($input.val()) {
          $parent.addClass('fill');
      }
    });
  });

  $('a.fc-event').each(function() {
    $(this).attr('target', '_blank');
  });

  document.addEventListener("DOMContentLoaded", function() {
    var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));
  
    if ("IntersectionObserver" in window) {
      var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(video) {
          if (video.isIntersecting) {
            for (var source in video.target.children) {
              var videoSource = video.target.children[source];
              if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                videoSource.src = videoSource.dataset.src;
              }
            }
  
            video.target.load();
            video.target.classList.remove("lazy");
            lazyVideoObserver.unobserve(video.target);
          }
        });
      });
  
      lazyVideos.forEach(function(lazyVideo) {
        lazyVideoObserver.observe(lazyVideo);
      });
    }
  });

});