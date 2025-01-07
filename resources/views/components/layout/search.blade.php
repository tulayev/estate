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
    class="w-[85%] m-auto bg-white rounded-[31px]"
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
        <div>
            <h3 class="mt-14 modal-subtitle text-primary">Type | x </h3>

            <div class="uk-child-width-1-3 mt-12" uk-grid>
                <div>
                    <div class="modal-subtitle bg-primary cursor-pointer p-6 rounded-[25px] text-4xl text-white text-center">
                        primary
                    </div>
                </div>
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
                        class="modal-subtitle text-primary placeholder-secondary w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                        placeholder="For example"
                    />
                </div>
            </div>
            <!-- Price Range -->
            <div>
                <x-ui.input-range
                    :fromInputName="'price_from'"
                    :toInputName="'price_to'"
                    :minLength="7"
                    :maxLength="7"
                    :step="1000"
                    :minValue="1"
                    :maxValue="1000000"
                />
            </div>
        </div>

        <!-- Features -->
        <div x-data="features()">
            <h3 class="mt-14 modal-subtitle text-primary">
                Facilities | x
                <span
                    id="selectedFeatures"
                    x-text="selectedFeatures.join(', ')"
                ></span>
            </h3>
            <div class="mt-6 features flex">
                <div
                    class="feature mr-9 shadow-feature-card rounded-[25px] px-10 py-5 flex justify-center items-center cursor-pointer"
                    :class="selectedFeatures.includes('gym') ? 'bg-primary' : 'bg-white'"
                    @click="toggleFeature('gym')"
                >
                    <div>
                        <img
                            src="{{ asset('assets/images/gym.png') }}"
                            alt=""
                            class="block"
                        />
                        <p
                            class="modal-subtitle text-center"
                            :class="selectedFeatures.includes('gym') ? 'text-white' : 'text-primary'"
                        >
                            gym
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tags -->
        @if ($tags)
            <div x-data="tags()">
                <h3 class="mt-14 modal-subtitle text-primary">
                    Tags | x
                    <span
                        id="selectedTags"
                        x-text="selectedTags.join(', ')"
                    ></span>
                </h3>
                <div class="mt-6 tags flex">
                    @foreach($tags as $tag)
                        <div
                            class="tag mr-2 modal-subtitle cursor-pointer text-white text-center p-3 rounded-[25px]"
                            :class="getRandomColor()"
                            @click="addTag('{{ $tag->name }}')"
                        >
                            {{ $tag->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    function tags() {
        return {
            selectedTags: [],
            colors: ['bg-tag-1', 'bg-tag-2', 'bg-tag-3', 'bg-tag-4'],
            addTag(tag) {
                if (!this.selectedTags.includes(tag)) {
                    this.selectedTags.push(tag);
                }
            },
            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            }
        }
    }

    function features() {
        return {
            selectedFeatures: [],
            toggleFeature(feature) {
                if (this.selectedFeatures.includes(feature)) {
                    this.selectedFeatures = this.selectedFeatures.filter(f => f !== feature);
                } else {
                    this.selectedFeatures.push(feature);
                }
            },
        }
    }
</script>
