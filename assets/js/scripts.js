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

let contactsForm = $('.contacts-form');

contactsForm.on('submit', function (event){
  event.preventDefault();
  var formData = new FormData(this);
  formData.append('action', 'contacts_form');
  $.ajax({
    type: "POST",
    url: adminAjax.url,
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      alert('Ответ сервера: ' + response)
    }
  });
});