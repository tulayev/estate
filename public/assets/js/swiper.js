var swiper2 = new Swiper(".mySwiper", {
  grabCursor: true,
  loop: true,
  effect: "fade",
  slidesPerView: 1,
  spaceBetween: 0,
  creativeEffect: {
    prev: {
      shadow: true,
      translate: [0, 0, -400],
    },
    next: {
      translate: ["100%", 0, 0],
    },
  },
  speed: 2000,
  autoplay: {
    disableOnInteraction: true,
    //waitForTransition: false,
    reverseDirection: true,
    delay: 2000,
  },
  navigation: {
    nextEl: ".u-button-next",
    prevEl: ".u-button-prev",
  },
  pagination: {
    el: ".swiper-pagination", // Target the pagination element
    clickable: true, // Allow users to click on pagination dots
    dynamicBullets: true, // Optional: Enable dynamic bullets for better UX
  },
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      autoplay: {
        delay: 800,
      },
    },
    "@0.75": {
      slidesPerView: 1,
      autoplay: {
        delay: 3000,
      },
    },
  },
});

const swiperOptions = {
  loop: true,
  slidesPerView: 3,
  direction: "horizontal",
  spaceBetween: 30,
  freeMode: true,
  freeModeMomentum: false,
  freeModeMomentumBounce: false,
  speed: 12000,
  clickable: false,
  autoplay: {
    delay: 0,
    disableOnInteraction: true,
    //waitForTransition: false,
    reverseDirection: true,
  },
  grabCursor: false,
  breakpoints: {
    "@0.00": {
      slidesPerView: 2,
    },
    "@0.75": {
      slidesPerView: 3,
    },
    "@1.00": {
      slidesPerView: 4,
    },
    "@1.50": {
      slidesPerView: 6,
    },
  },
};

const swiper = new Swiper(".sliderPartner", swiperOptions);
