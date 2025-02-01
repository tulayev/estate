window.getRandomColor = function() {
    const colors = ['bg-color-1', 'bg-color-2', 'bg-color-3', 'bg-color-4'];
    return colors[Math.floor(Math.random() * colors.length)];
};

document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('overlay');

    if (overlay) {
        setTimeout(() => overlay.style.display = 'none', 1000);
    }

    document.querySelectorAll('.random-bg-color').forEach((element) => {
        element.classList.add(window.getRandomColor());
    });
});
