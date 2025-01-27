/* Slider */
new Swiper('.swiper', {
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
    }
});
