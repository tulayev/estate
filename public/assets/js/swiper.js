document.addEventListener('DOMContentLoaded', () => {
    const cardSlider = new Swiper('.card-slider', {
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
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
            1280: {
                slidesPerView: 5,
            },
            1536: {
                slidesPerView: 6,
            },
        },
    });

    /* Home Page slider */
    const homeSlider = new Swiper('.home-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                spaceBetween: 0,
                speed: 400, // speed in milliseconds
            },
        },
    });

    const insightMainSlider = new Swiper('.insights-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                spaceBetween: 0,
                speed: 400, // speed in milliseconds
            },
        },
    });

    const listingMainSlider = new Swiper('.listings-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                spaceBetween: 0,
                speed: 400, // speed in milliseconds
            },
        },
    });
});
