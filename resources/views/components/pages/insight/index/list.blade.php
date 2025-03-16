@props([
    'topics' => null,
])

<section class="section">
    <div class="container">
        <div class="w-full flex justify-between">
            <div class="collapse-title">
                {{ __('insight/index/list.insights_grid') }}
            </div>
            @php($queryParams = request()->query())
            <a href="{{ route('pages.insight.index', array_merge($queryParams, ['filter' => 'liked'])) }}">
                <img src="{{ asset('assets/images/icons/heart-blue.svg') }}" alt="like-view" />
            </a>
        </div>

        @if ($topics->isNotEmpty())
            <div
                id="topicsWrapper"
                class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-4 md:mt-6 xl:mt-12"
                uk-grid
            >
                <x-pages.insight.index.view-type.list
                    :topics="$topics"
                />
            </div>

            @if ($topics->hasMorePages())
                <div
                    class="w-full flex justify-center mt-4 md:mt-6 xl:mt-10"
                    x-data="topicPagination()"
                >
                    <button
                        x-show="hasMorePages"
                        @click="loadMore"
                        class="bg-white text-primary rounded-[100px] modal-subtitle py-5 w-full hover:text-white hover:bg-primary"
                    >
                        {{ __('general.see_more') }}
                    </button>
                </div>
            @endif
        @else
            <h2 class="section-title mt-4 md:mt-10">{{ __('general.nothing_found') }}</h2>
        @endif
    </div>
</section>

<script defer>
    function topicPagination() {
        return {
            currentPage: 1,
            hasMorePages: {{ $topics->hasMorePages() ? 'true' : 'false' }},
            lastPage: {{ $topics->lastPage() }},

            async loadMore() {
                if (!this.hasMorePages)
                    return;

                this.currentPage++;

                try {
                    const existingParams = new URLSearchParams(window.location.search);
                    const queryParams = new URLSearchParams(existingParams);

                    queryParams.set('page', this.currentPage);

                    const response = await axios.get(`?${queryParams.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    const topicsWrapper = document.getElementById('topicsWrapper');
                    topicsWrapper.insertAdjacentHTML('beforeend', response.data);

                    this.lazyLoadImages();

                    if (this.currentPage >= this.lastPage) {
                        this.hasMorePages = false;
                    }
                } catch (error) {
                    console.error("Error loading more topics:", error);
                }
            },

            lazyLoadImages() {
                const lazyImages = document.querySelectorAll('.lazy-image');

                const lazyLoad = (entry) => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.getAttribute('data-src');
                        img.onload = () => {
                            img.classList.add('loaded');
                        };
                        observer.unobserve(img);
                    }
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(lazyLoad);
                });

                lazyImages.forEach((img) => observer.observe(img));
            },
        };
    }
</script>
