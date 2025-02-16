 /* Slider */
const cardSlider = new Swiper('.swiper', {
    loop: true,
    slidesPerView: 3,
    direction: 'horizontal',
    spaceBetween: 30,
    freeMode: true,
    freeModeMomentum: true,
    freeModeMomentumBounce: true,
    speed: 15000,
    clickable: false,
    autoplay: {
        delay: 0,
        disableOnInteraction: true,
        reverseDirection: false,
    },
    grabCursor: false,
    breakpoints: {
        0: { // For very small screens (like mobile)
            slidesPerView: 1,
        },
        640: { // At 640px and above
            slidesPerView: 2,
        },
        768: { // At 768px and above
            slidesPerView: 3,
        },
        1024: { // At 1024px and above
            slidesPerView: 4,
        },
        1280: { // At 1280px and above
            slidesPerView: 5,
        },
        1536: { // At 1536px and above
            slidesPerView: 6,
        },
    },
});

/* Home Page slider */
const homeSlider = new Swiper('.homeSlider', {
    loop: true,
    slidesPerView: 1,
    direction: 'horizontal',
    spaceBetween: 30,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        reverseDirection: false,
        waitForTransition: true,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

window.addEventListener('load', () => {
    setTimeout(() => {
        document.querySelectorAll('.homeSlider').forEach(slider => {
            slider.swiper.update();
        });
    }, 100);
});
