<div
    x-data="bedDropdown()"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[8%]"
>
    <input
        type="hidden"
        name="beds"
        x-model="selectedBeds"
    />
    <button
        type="button"
        class="flex justify-center items-center space-x-2"
        @click="toggleDropdown"
    >
        <span>🛏️</span>
        <span
            class="modal-subtitle"
            x-text="selectedBeds === 0 ? '' : selectedBeds"
        ></span>
    </button>
    <div
        x-show="open"
        @click.outside="open = false"
        class="absolute w-full top-16 bg-white shadow-lg border border-borderColor rounded z-50 p-4"
    >
        <div class="flex items-center justify-between text-primary text-lg font-black">
            <button
                type="button"
                class="p-1"
                @click="decreaseBeds"
            >
                -
            </button>
            <span x-text="selectedBeds"></span>
            <button
                type="button"
                class="p-1"
                @click="increaseBeds"
            >
                +
            </button>
        </div>
    </div>
</div>

<script defer>
    function bedDropdown() {
        return {
            open: false,
            selectedBeds: 0,
            minBeds: 1,
            maxBeds: 100,

            toggleDropdown() {
                this.open = !this.open;
            },

            increaseBeds() {
                if (this.selectedBeds < this.maxBeds) {
                    this.selectedBeds++;
                }
            },

            decreaseBeds() {
                if (this.selectedBeds > this.minBeds) {
                    this.selectedBeds--;
                }
            },
        };
    }
</script>
