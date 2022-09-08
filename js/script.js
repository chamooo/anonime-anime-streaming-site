/*jshint esversion: 6 */
// SLIDER

const swiper = new Swiper('.slider-preview', {
    // Optional parameters
    loop: true,
    speed: 1000,
  
    
    autoplay: {
      delay: 2700,
    }
  });

  // Custom scripts
// Мобильное меню бургер
function burgerMenu() {
  const burger = document.querySelector('.burger')
  const menu = document.querySelector('.burger__list')
  const body = document.querySelector('.burger__body')
  const navBtn = document.querySelector('.nav__btn')
  burger.addEventListener('click', () => {
    if (!menu.classList.contains('active')) {
      menu.classList.add('active');
    } else {
      menu.classList.remove('active');
    }

  })
  
   
}
burgerMenu()

