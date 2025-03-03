window.getRandomColor = function() {
    const colors = ['bg-color-1', 'bg-color-2', 'bg-color-3', 'bg-color-4'];
    return colors[Math.floor(Math.random() * colors.length)];
};

function onDOMLoaded(fn) {
    document.addEventListener('DOMContentLoaded', fn);
}

function overlay() {
    const overlay = document.getElementById('overlay');

    if (overlay) {
        setTimeout(() => overlay.style.display = 'none', 1000);
    }
}

function randomBgColor() {
    document.querySelectorAll('.random-bg-color').forEach((element) => {
        element.classList.add(window.getRandomColor());
    });
}

function lazyLoadBgImages() {
    const lazyBgElements = document.querySelectorAll('.lazy-bg');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.backgroundImage = `url('${entry.target.dataset.bg}')`;
                observer.unobserve(entry.target);
            }
        });
    });

    lazyBgElements.forEach((el) => observer.observe(el));
}

function seeMore() {
    const seeMoreButton = document.querySelector('#seeMore');

    if (seeMoreButton) {
        seeMoreButton.addEventListener('click', () => lazyLoadBgImages());
    }
}

onDOMLoaded(() => overlay());
onDOMLoaded(() => randomBgColor());
onDOMLoaded(() => lazyLoadBgImages());
onDOMLoaded(() => seeMore());
