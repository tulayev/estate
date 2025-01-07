@props([
    'tags' => null,
])

<div class="hidden absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 text-[#C6C6C6] z-[99] bg-white font-600 uppercase rounded-full sm:flex items-center px-3 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-base xlWide:text-xl">
    <div>
        <img
            width="40"
            src="{{ asset('assets/images/circle.png') }}"
            alt="circle"
        />
    </div>
    <div class="pr-5 border-r border-borderColor h-full flex items-center justify-center w-[18%]">
        <input
            type="text"
            placeholder="keywords"
            class="bg-transparent border-none text-center outline-none uppercase"
        />
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%]">
        <p>type</p>
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[20%]">
        <p>location</p>
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[8%]">
        🛏️
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[24%]">
        <p>price</p>
    </div>
    <div class="h-full flex items-center justify-end w-[10%] space-x-5">
        <button
            class="text-3xl bg-transparent border-none outline-none cursor-pointer"
            uk-toggle="target: #searchModal"
        >
            +
        </button>
        <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px]">
            <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px] bg-[#0F1F3D] rounded-full flex items-center justify-center">
                <img
                    class="w-[14px] xl:w-[20px]"
                    src="{{ asset('assets/images/search.svg') }}"
                    alt="search"
                />
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div
    id="searchModal"
    class="w-[89%] m-auto bg-white rounded-[31px]"
    uk-modal
>
    <div class="px-11 py-9">
        <div class="flex justify-between items-center">
            <h2 class="section-title">
                filters
            </h2>

            <div>
                <button>
                    <img
                        class="uk-modal-close"
                        src="{{ asset('assets/images/modal-close.svg') }}"
                        alt="close"
                    />
                </button>
            </div>
        </div>

        <!-- Type -->
        <h3 class="mt-14 modal-subtitle text-primary">Type | x </h3>

        <div class="uk-child-width-1-3 mt-12" uk-grid>
            <div>
                <a href="#">
                    <h4 class="bg-primary rounded-[25px] text-4xl text-white text-center font-900 uppercase p-6">
                        primary
                    </h4>
                </a>
            </div>
        </div>

        <!-- Keywords & Price range -->
        <div class="uk-child-width-1-2 pt-12" uk-grid>
            <!-- Keywords -->
            <div>
                <h3 class="modal-subtitle text-primary">Keywords</h3>

                <div class="mt-6">
                    <input
                        name="keywords"
                        type="text"
                        class="modal-subtitle text-primary placeholder-primary w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                        placeholder="For example"
                    />
                </div>
            </div>
            <!-- Price Range -->
            <div
                id="priceRangeWrapper"
                x-data="priceRange()"
                x-init="mintrigger(); maxtrigger()"
            >
                <h3 class="modal-subtitle text-primary">Price range</h3>

                <div class="uk-child-width-1-2" uk-grid>
                    <div class="mt-6">
                        <input
                            name="price_from"
                            type="text"
                            class="modal-subtitle text-primary placeholder-primary w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                            placeholder="From"
                            maxlength="7"
                            x-on:input.debounce="mintrigger"
                            x-model="minprice"
                            wire:model.debounce.300="minprice"
                        />
                    </div>
                    <div class="mt-6">
                        <input
                            name="price_to"
                            type="text"
                            class="modal-subtitle text-primary placeholder-primary w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                            placeholder="To"
                            maxlength="7"
                            x-on:input.debounce.300="maxtrigger"
                            x-model="maxprice"
                            wire:model.debounce="maxprice"
                        />
                    </div>
                </div>
                <div class="mt-12 flex justify-center items-center">
                    <div class="relative w-full">
                        <div>
                            <!-- Range Inputs -->
                            <input
                                type="range"
                                step="100"
                                x-bind:min="min"
                                x-bind:max="max"
                                x-on:input="mintrigger"
                                x-model="minprice"
                                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                            />
                            <input
                                type="range"
                                step="100"
                                x-bind:min="min"
                                x-bind:max="max"
                                x-on:input="maxtrigger"
                                x-model="maxprice"
                                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                            />
                            <!-- Thumbs -->
                            <div class="relative z-10 h-2">
                                <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-primary"></div>
                                <div
                                    class="absolute z-20 top-0 bottom-0 rounded-md bg-primary"
                                    x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"
                                ></div>
                                <div
                                    class="absolute z-30 w-6 h-6 top-0 left-0 bg-primary rounded-full -mt-2"
                                    x-bind:style="'left: '+minthumb+'%'"
                                ></div>
                                <div
                                    class="absolute z-30 w-6 h-6 top-0 right-0 bg-primary rounded-full -mt-2"
                                    x-bind:style="'right: '+maxthumb+'%'"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tags -->
        <h3 class="mt-14 modal-subtitle text-primary">Tags | x </h3>

        <div class="mt-6 tags flex">
            <div class="tag modal-subtitle bg-primary text-white text-center p-3 rounded-[25px]">
                research
            </div>
        </div>
    </div>
</div>

<script defer>
    // Price Range using Alpine JS
    function priceRange() {
        return {
            minprice: 0,
            maxprice: 1000000,
            min: 0,
            max: 1000000,
            minthumb: 0,
            maxthumb: 0,
            mintrigger() {
                this.validation();
                this.minprice = Math.min(this.minprice, this.maxprice - 500);
                this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
            },
            maxtrigger() {
                this.validation();
                this.maxprice = Math.max(this.maxprice, this.minprice + 200);
                this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
            },
            validation() {
                if (/^\d*$/.test(this.minprice)) {
                    if (this.minprice > this.max) {
                        this.minprice = 9500;
                    }
                    if (this.minprice < this.min) {
                        this.minprice = this.min;
                    }
                } else {
                    this.minprice = 0;
                }
                if (/^\d*$/.test(this.maxprice)) {
                    if (this.maxprice > this.max) {
                        this.maxprice = this.max;
                    }
                    if (this.maxprice < this.min) {
                        this.maxprice = 200;
                    }
                } else {
                    this.maxprice = 10000;
                }
            }
        }
    }
</script>
