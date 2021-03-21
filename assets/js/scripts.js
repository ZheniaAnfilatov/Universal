// слайдер
const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  loop: true,
  autoplay: {
    delay: 5000,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },
});

// меню
let menuToggle = $('.header-menu-toggle');
menuToggle.on('click', function (event){
  event.preventDefault();
  $('.header-nav').slideToggle(200);
});

// перенос курсора
let commentArea = $('.comments-add-button');
commentArea.on('click', function (event){
  event.preventDefault();
  $(".comment-textarea").focus();
});

