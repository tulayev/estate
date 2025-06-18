export function compareHandler() {
    return {
        compareKey: 'comparison',
        isCompared: false,

        init() {
            const stored = JSON.parse(localStorage.getItem(this.compareKey) || '[]');
            this.isCompared = stored.includes(this.hotelId);
        },

        toggleCompare() {
            let list = JSON.parse(localStorage.getItem(this.compareKey) || '[]');
            const index = list.indexOf(this.hotelId);

            if (index !== -1) {
                list.splice(index, 1);
                this.isCompared = false;
            } else {
                list.push(this.hotelId);
                this.isCompared = true;
            }

            localStorage.setItem(this.compareKey, JSON.stringify(list));
            this.updateCompareBar();
        },

        updateCompareBar() {
            // Optional: update bar dynamically, or trigger custom event
            const event = new CustomEvent('compare-updated', { detail: {} });
            window.dispatchEvent(event);
        },

        get hotelId() {
            return String(this.$el.dataset.compareId);
        }
    };
}

export function compareBarHandler() {
    return {
        compareKey: 'comparison',
        compared: [],

        init() {
            this.refresh();
            window.addEventListener('compare-updated', () => this.refresh());
        },

        refresh() {
            this.compared = JSON.parse(localStorage.getItem(this.compareKey) || '[]');
        },

        hide() {
            // Optional: only hide visually without clearing state
            const el = document.getElementById('compareBar');
            if (el) el.classList.add('hidden');
        },

        get compareLink() {
            return `/listings/compare?ids=${this.compared.join(',')}`;
        },
    };
}
