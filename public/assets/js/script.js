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

function lazyLoadImages() {
    const lazyImages = document.querySelectorAll('.lazy-image');

    const lazyLoad = (entry) => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.getAttribute('data-src');
            img.onload = () => {
                img.classList.add('loaded');
            };
            observer.unobserve(img);
        }
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(lazyLoad);
    });

    lazyImages.forEach((img) => observer.observe(img));
}

onDOMLoaded(() => overlay());
onDOMLoaded(() => randomBgColor());
onDOMLoaded(() => lazyLoadImages());
