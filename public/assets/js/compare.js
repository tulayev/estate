export function initCompare() {
    const compareKey = 'comparison';
    const compared = JSON.parse(localStorage.getItem(compareKey) || '[]');

    const compareBar = document.getElementById('compareBar');
    const compareCount = document.getElementById('compareCount');
    const compareLink = document.getElementById('compareLink');
    const compareClose = document.getElementById('compareClose');
    const compareDeleteAll = document.getElementById('compareDeleteAll');

    const compareButtons = document.querySelectorAll('[data-compare-id]');

    if (compareButtons) {
        compareButtons.forEach(button => {
            const id = button.getAttribute('data-compare-id');

            button.addEventListener('click', () => {
                toggleCompare(id);
            });
        });
    }

    if (compareClose) {
        compareClose.addEventListener('click', () => {
            compareBar.style.display = 'none';
        });
    }

    if (compareDeleteAll) {
        compareDeleteAll.addEventListener('click', () => {
            localStorage.removeItem(compareKey);
            window.location.href = '/listings';
        });
    }

    function toggleCompare(id) {
        const index = compared.indexOf(id);

        if (index !== -1) {
            compared.splice(index, 1);
        } else {
            compared.push(id);
        }

        localStorage.setItem(compareKey, JSON.stringify(compared));
        updateCompareBar();
    }

    function updateCompareBar() {
        if (compared.length >= 2) {
            compareBar.style.display = 'flex';
            compareCount.innerText = compared.length;
            compareLink.href = `/listings/compare?ids=${compared.join(',')}`;
        } else {
            compareBar.style.display = 'none';
        }
    }

    updateCompareBar();
}
