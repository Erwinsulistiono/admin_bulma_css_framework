$(document).ready(function() {
  $('.toggler').on('click', function() {
    console.log('poop')
    $('.menu-container').toggleClass('active');
  });

  $('.nav-toggler').on('click', function() {
    $('.navbar-toggler').toggleClass('is-active');
    $('.navbar-menu').toggleClass('is-active');
  });

  // function setMenuHeight() {
  //   var navbarHeight = $('.navbar').outerHeight();
  //   $('.menu-wrapper')
  //     .outerHeight(document.documentElement.clientHeight - navbarHeight)
  //     .niceScroll({
  //       emulatetouch: true
  //     });
  // }
  // setMenuHeight();
  // $(window).on('resize', function() {
  //   setMenuHeight();
  // });

  // var burger = document.querySelector('.burger');
  // var menu = document.querySelector('#'+burger.dataset.target);
  // burger.addEventListener('click', function() {
  //     burger.classList.toggle('is-active');
  //     menu.classList.toggle('is-active');
  // });
});
