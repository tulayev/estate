<div>
    <div x-data="{ title: '' }">
        <h3 class="modal-subtitle text-primary">
            {{ __('general.filter_popup_keywords') }}
        </h3>

        <div class="mt-2 md:mt-4 xl:mt-6">
            <input
                id="title"
                type="hidden"
                name="title"
                :value="title"
            />

            <input
                type="text"
                class="modal-subtitle text-primary placeholder-secondary w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                placeholder="{{ __('general.filter_popup_keywords_placeholder') }}"
                x-model="title"
            />
        </div>
    </div>

    <x-ui.listing.filter.switchers.verified-switcher />
</div>
