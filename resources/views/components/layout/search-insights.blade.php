<!-- Search Form -->
<form
    id="searchFormInsights"
    class="uk-visible@s justify-between text-secondary z-10 bg-white font-semibold uppercase rounded-full absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 sm:flex items-center px-3 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-xl"
    autocomplete="off"
>
    <div>
        <img
            src="{{ asset('assets/images/icons/circle.png') }}"
            alt="circle"
            class="w-10"
        />
    </div>

    <x-ui.search.search-input />    

    <div class="h-full flex items-center justify-end w-[12%] md:w-[10%] space-x-5">
         <div>
        <img
            src="{{ asset('assets/images/icons/filter-dark.svg') }}"
            alt="circle"
            class="w-10"
        />
    </div>
        <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px]">
            <button
                class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px] bg-primary rounded-full flex items-center justify-center"
                type="submit"
            >
                <img
                    class="w-[14px] xl:w-[20px]"
                    src="{{ asset('assets/images/icons/search.svg') }}"
                    alt="search"
                />
            </button>
        </div>
    </div>
</form>


