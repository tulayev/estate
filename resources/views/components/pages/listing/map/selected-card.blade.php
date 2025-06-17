@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <div
            class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-3 h-[300px]"
            style="background-image: url('{{ Helper::resolveImagePath($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Image Top -->
            <div class="flex justify-between items-center z-10">
                @if ($hotel->tags)
                    <div class="flex items-center space-x-2">
                        @foreach($hotel->tags->take(2) as $index => $tag)
                            <a
                                href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                class="card-tag-button {{ $tag->color_ui_tag ? 'card-tag-button-bg' : 'bg-color-'.($index + 1) }} bg-opacity-60 hover:text-primary"
                                    style="{{ $tag->color_ui_tag ? '--tag-bg-color: '.$tag->color_ui_tag.';' : '' }}"
                            >
                                {{ Str::limit($tag->name, 10) }}
                            </a>
                        @endforeach
                    </div>
                @endif
                <div class="flex items-center space-x-2">
                    <x-ui.buttons.compare-button
                        :hotelId="$hotel->id"
                    />

                    <x-ui.buttons.like-button
                        baseUrl="listings"
                        :id="$hotel->id"
                        :is-liked="$hotel->is_liked"
                    />
                </div>
            </div>
            <!-- Image Bottom -->
            <a
                href="{{ route('pages.listing.show', $hotel->slug) }}"
                class="z-10"
            >
                <div class="space-y-2 text-white text-sm sm:text-base md:text-lg">
                    <div class="flex justify-between items-center uppercase">
                        <div class="flex items-center space-x-2">
                            @if ($hotel->ie_verified)
                                <img
                                    class="w-6"
                                    src="{{ asset('assets/images/icons/verified.svg') }}"
                                    alt="verified"
                                />
                            @endif
                            <p class="sm:font-bold">
                                {{ $hotel->title }}
                            </p>
                        </div>
                        <div>
                        <span class="sm:font-bold">
                            @php($converted = Helper::getCurrencyConvertedValue($hotel->price))
                            {{ $converted['symbol'] . ' ' . $converted['value'] }}
                        </span>
                        </div>
                    </div>
                    <div>
                        <p>
                            {{ Str::limit(Helper::removeHtmlTags($hotel->description), 200) }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endif
