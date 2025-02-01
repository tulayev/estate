@props([
    'topics' => null,
])

<section class="section">
    <div class="container pb-10 sm:pb-24">
        <div class="w-full flex justify-end">
            <a href="{{ route('pages.insight.index', ['filter' => 'liked']) }}">
                <img src="{{ asset('assets/images/icons/heart-red.svg') }}" alt="like-view" />
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
        @endif

        @if ($topics->hasMorePages())
            <div
                class="w-full flex justify-center mt-4 md:mt-6 xl:mt-10"
                x-data="topicPagination()"
            >
                <button
                    x-show="hasMorePages"
                    @click="loadMore"
                    class="bg-white text-primary rounded-[100px] modal-subtitle py-5 w-full"
                >
                    {{ __('general.see_more') }}
                </button>
            </div>
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
                    const queryParams = new URLSearchParams({
                        page: this.currentPage,
                    });

                    const response = await axios.get(`?${queryParams.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    const topicsWrapper = document.getElementById('topicsWrapper');
                    topicsWrapper.insertAdjacentHTML('beforeend', response.data);

                    if (this.currentPage >= this.lastPage) {
                        this.hasMorePages = false;
                    }
                } catch (error) {
                    console.error("Error loading more topics:", error);
                }
            }
        };
    }
</script>
