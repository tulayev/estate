export function initCompare() {
    const compareKey = 'comparison';
    const compared = JSON.parse(localStorage.getItem(compareKey) || '[]');

    const compareBar = document.getElementById('compareBar');
    const compareCount = document.getElementById('compareCount');
    const compareLink = document.getElementById('compareLink');
    const compareClose = document.getElementById('compareClose');
    const compareDeleteAll = document.getElementById('compareDeleteAll');

    document.addEventListener('click', function (e) {
        const button = e.target.closest('[data-compare-id]');
        if (!button) {
            return;
        }

        const id = button.getAttribute('data-compare-id');
        toggleCompare(id);
        updateButtonIcon(button, compared.includes(id));
    });

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

    function updateButtonIcon(button, isCompared) {
        const img = button.querySelector('img');
        if (!img) {
            return;
        }

        img.src = isCompared
            ? '/assets/images/icons/compare-minus.svg'
            : '/assets/images/icons/compare-plus.svg';
    }

    function toggleCompare(id) {
        const index = compared.indexOf(id);
        const isCompared = index !== -1;

        if (isCompared) {
            compared.splice(index, 1);
        } else {
            compared.push(id);
        }

        localStorage.setItem(compareKey, JSON.stringify(compared));
        updateCompareBar();

        document.querySelectorAll(`[data-compare-id="${id}"]`).forEach(button => {
            updateButtonIcon(button, !isCompared);
        });
    }

    function updateCompareBar() {
        if (compareBar && compareCount && compareLink) {
            if (compared.length >= 2) {
                compareBar.style.display = 'flex';
                compareCount.innerText = compared.length;
                compareLink.href = `/listings/compare?ids=${compared.join(',')}`;
            } else {
                compareBar.style.display = 'none';
            }
        }

        document.querySelectorAll('[data-compare-id]').forEach(button => {
            const id = button.getAttribute('data-compare-id');
            updateButtonIcon(button, compared.includes(id));
        });
    }

    updateCompareBar();
}
