@props([
    'topic' => null,
])

@if ($topic)
    <div class="relative group">
        <a
            href="{{ route('pages.insight.show', $topic->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div
            class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-3 h-[300px]"
            style="background-image: url('{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/insight-card-bg.png') }}');"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Image Top -->
            <div class="flex justify-between items-center relative z-10">
                <div class="flex items-center space-x-2">
                    <a
                        href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                        class="card-tag-button bg-color-{{ $topic->category->id }} hover:text-primary"
                    >
                        {{ Str::limit($topic->category->title, 3) }}
                    </a>
                </div>
                <div class="flex items-center space-x-2">
                    <button
                        x-data="likeHandler({{ $topic->id }}, @json($topic->isLiked))"
                        @click="toggleLike"
                    >
                        <img
                            :src="isLiked ? '{{ asset('assets/images/icons/heart-red.svg') }}' : '{{ asset('assets/images/icons/heart.svg') }}'"
                            alt="like"
                        />
                    </button>
                </div>
            </div>
            <!-- Image Bottom -->
            <div class="flex justify-between items-center uppercase text-sm sm:text-base md:text-lg">
                <div class="flex items-center space-x-2">
                    <p class="text-white sm:font-bold group-hover:text-primary">
                        {{ Str::limit($topic->title, 10) }}
                    </p>
                </div>
                <div>
                    <span class="text-white sm:font-bold group-hover:text-primary">
                        {{ $topic->minutes_to_read }} min
                    </span>
                </div>
            </div>
        </div>
    </div>
@endif

<script defer>
    function likeHandler(topicId, initialIsLiked) {
        return {
            API_URI: `insights/${topicId}/like`,
            isLiked: initialIsLiked,

            async toggleLike() {
                try {
                    const { status } = await axios.post(this.API_URI, {}, {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    });

                    if (status === 204) {
                        this.isLiked = false;
                    } else if (status === 201) {
                        this.isLiked = true;
                    }
                } catch (error) {
                    console.error('Error:', error.message);
                }
            },
        };
    }
</script>
