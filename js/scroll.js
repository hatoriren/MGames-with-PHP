let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

 window.addEventListener('scroll', () => {
  header.classList.toggle('shadow', window.scrollY > 0);
 });
 
const navbarLinks = document.querySelectorAll('.navbar a');

navbarLinks.forEach(link => {
  link.addEventListener('click', function() {
    navbarLinks.forEach(link => link.classList.remove('active'));
    
    this.classList.add('active');
  });
});


$(function () {
  $('.navbar a').on('click', function (e) {
      e.preventDefault(); 
      const target = $(this).attr('href'); 
      $('html, body').animate({
          scrollTop: $(target).offset().top 
      }, 8);
  });
});

menu.onclick = () => {
  menu.classList.toggle('bx-x');
  navbar.classList.toggle('active');
}
 window.onscroll = () => {
  menu.classList.remove('bx-x');
  navbar.classList.remove('active');
 }


