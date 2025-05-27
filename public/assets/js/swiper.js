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
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            873: {
                slidesPerView: 3,
            },
            1280: {
                slidesPerView: 4,
            },
            1536: {
                slidesPerView: 5,
            },
            1920: {
                slidesPerView: 6,
            },
        },
    });

    /* Home Page slider */
    const homeSlider = new Swiper('.home-slider', {
        loop: true,
        loopedSlides: 4,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 5000, // must be greater than speed
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                spaceBetween: 0,
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
