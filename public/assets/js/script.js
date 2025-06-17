import { initCompare } from './compare.js';
import { likeHandler } from './likes.js';

window.likeHandler = likeHandler;

window.getRandomColor = function () {
    const colors = ['bg-color-1', 'bg-color-2', 'bg-color-3', 'bg-color-4'];
    return colors[Math.floor(Math.random() * colors.length)];
};

function onDOMLoaded(fn) {
    document.addEventListener('DOMContentLoaded', fn);
}

function overlay() {
    const overlay = document.getElementById('overlay');

    if (overlay) {
        setTimeout(() => (overlay.style.display = 'none'), 1000);
    }
}

function randomBgColor() {
    const colors = ['bg-color-1', 'bg-color-2', 'bg-color-3', 'bg-color-4'];
    document.querySelectorAll('.random-bg-color').forEach((element, index) => {
        element.classList.add(colors[index % colors.length]);
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

function switchTheme() {
    const root = document.documentElement;

    const storedTheme = localStorage.getItem('theme');
    if (storedTheme === 'dark') {
        root.classList.add('dark');
    }

    const themeToggleButtons = document.getElementsByClassName('theme-toggle');

    if (themeToggleButtons) {
        Array.from(themeToggleButtons).forEach(themeToggleButton => {
            const updateIcon = () => {
                if (root.classList.contains('dark')) {
                    themeToggleButton.innerText = '☀️';
                } else {
                    themeToggleButton.innerText = '🌙';
                }
            };

            updateIcon();

            themeToggleButton.addEventListener('click', () => {
                root.classList.toggle('dark');

                const isDark = root.classList.contains('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                updateIcon();
            });
        });
    }
}

onDOMLoaded(() => overlay());
onDOMLoaded(() => randomBgColor());
onDOMLoaded(() => lazyLoadImages());
onDOMLoaded(() => switchTheme());
onDOMLoaded(() => initCompare());
