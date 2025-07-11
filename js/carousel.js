const carousel = document.querySelector('.qualities-carousel');

let current = 0;

setInterval(() => {
  const slides = carousel.children;
  current = (current + 1) % slides.length;
  carousel.style.transform = `translateX(-${current * 100}%)`;
}, 3000);