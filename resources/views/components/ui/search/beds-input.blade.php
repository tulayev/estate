<div
    x-data="bedDropdown()"
    class="relative px-6 md:px-10 border-r border-borderColor h-full flex items-center justify-center w-[8%]"
>
    <input
        type="hidden"
        name="beds"
        x-model="selectedBeds"
    />
    <button
        type="button"
        class="flex items-center justify-center"
        @click="toggleDropdown"
    >
        🛏️ <span class="ml-2" x-text="selectedBeds === 0 ? '' : selectedBeds"></span>
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

<script>
    function bedDropdown() {
        return {
            open: false,
            selectedBeds: 0, // Default bed count
            minBeds: 1,      // Minimum bed count
            maxBeds: 10,     // Maximum bed count

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
            }
        };
    }
</script>
