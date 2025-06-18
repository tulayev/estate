<div
    x-data="compareBarHandler()"
    x-init="init()"
    x-show="compared.length >= 2"
    x-transition
    class="fixed p-2 md:p-4 z-[1001] bottom-4 left-1/2 transform -translate-x-1/2 bg-primary dark:bg-darkPrimary text-white border-rounded modal-subtitle"
    id="compareBar"
>
    <a :href="compareLink">
        {{ __('listing/compare.compare') }} <span x-text="compared.length"></span> {{ __('listing/compare.listings') }}
    </a>
    <button
        @click="hide"
        class="ml-4"
    >
        ✖
    </button>
</div>
