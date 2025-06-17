@props([
    'hotels' => null,
])

@php
    $tableFields = [
        __('listing/compare.title') => 'title',
        __('listing/compare.price') => 'price',
        __('listing/compare.type') => 'types',
        __('listing/compare.tag') => 'tags',
        __('listing/compare.address') => 'physical_address',
        __('listing/compare.area') => 'formatted_area',
        __('listing/compare.codename') => 'codename',
        __('listing/compare.bedrooms') => 'bedrooms',
    ];

    $columnCount = count($hotels);
    $gridTemplateForCards = '305px ' . str_repeat('305px ', $columnCount);
    $gridTemplateForTable = '305px ' . str_repeat('321px ', $columnCount);
@endphp

@if ($hotels)
    <section class="pt-6 sm:pt-8 md:pt-12 lg:pt-16 xl:pt-20">
        <div class="container">
            <div class="flex items-center justify-between">
                <h2 class="section-title">
                    {{ __('listing/compare.comparison') }}
                </h2>

                <button
                    id="compareDeleteAll"
                    class="primary-button"
                >
                    {{ __('listing/compare.delete_all') }}
                </button>
            </div>

            <div class="w-full overflow-x-auto pt-6 md:pt-12 xl:pt-24">
                <!-- Cards Wrapper -->
                <div class="grid gap-x-4 min-w-max" style="grid-template-columns: {{ $gridTemplateForCards }};">
                    <a href="{{ route('pages.listing.index') }}">
                        <div class="w-full h-[205px] bg-white shadow-card flex justify-center items-center border-rounded">
                            <div>
                                <img
                                    src="{{ asset('assets/images/icons/compare-add.svg') }}"
                                    alt="{{ __('listing/compare.add_to_comparison') }}"
                                    class="mx-auto mb-4"
                                />
                                <h3 class="modal-subtitle text-[#525252]">
                                    {{ __('listing/compare.add_to_comparison') }}
                                </h3>
                            </div>
                        </div>
                    </a>
                    @foreach($hotels as $hotel)
                        <x-pages.listing.compare.card :hotel="$hotel" />
                    @endforeach
                </div>
                <!-- Table Wrapper -->
                <div class="grid mt-8 min-w-max" style="grid-template-columns: {{ $gridTemplateForTable }};">
                    @php($rowIndex = 0)
                    @foreach($tableFields as $label => $key)
                        <div class="p-3 text-right font-bold text-black {{ $rowIndex % 2 === 0 ? 'bg-[#f4f4f4]' : 'bg-white' }}">
                            {{ $label }}
                        </div>

                        @foreach ($hotels as $hotel)
                            @php($value = is_iterable($hotel[$key])
                                ? collect($hotel[$key])->pluck('name')->take(3)->join(', ')
                                : $hotel[$key])
                            <div class="p-3 text-black {{ $rowIndex % 2 === 0 ? 'bg-[#f4f4f4]' : 'bg-white' }}">
                                {{ $value ?? '--' }}
                            </div>
                        @endforeach

                        @php($rowIndex++)
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
