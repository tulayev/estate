@props([
    'hotel' => null,
])

@if ($hotel)
    <div class="relative group">
        <a
            href="{{ route('pages.listing.show', $hotel->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div class="relative shadow-card border-rounded flex flex-col justify-between p-2 lg:p-3 w-[305px] h-[205px]">
            <div class="absolute inset-0">
                <img
                    data-src="{{ Helper::resolveImagePath($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}"
                    alt="{{ $hotel->title }}"
                    class="lazy-image"
                    loading="lazy"
                />
            </div>
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
                    <x-ui.buttons.like-button
                        baseUrl="listings"
                        :id="$hotel->id"
                        :is-liked="$hotel->is_liked"
                    />
                </div>
            </div>
        </div>
    </div>
@endif
