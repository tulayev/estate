/* Slider */
new Swiper('.swiper', {
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
        '@0.00': {
            slidesPerView: 2,
        },
        '@0.75': {
            slidesPerView: 3,
        },
        '@1.00': {
            slidesPerView: 4,
        },
        '@1.50': {
            slidesPerView: 6,
        },
    },
});

/* Home Page slider */
new Swiper('.homeSlider', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});
