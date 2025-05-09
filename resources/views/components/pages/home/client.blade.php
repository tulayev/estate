@php
    use \Illuminate\Support\Facades\Lang;

    $reviews = [];

    for ($i = 1; $i <= 10; $i++) {
        $nameKey = 'home/client.client_name_' . $i;
        $reviewKey = 'home/client.client_review_' . $i;

        if (Lang::has($nameKey) && Lang::has($reviewKey)) {
            $name = __($nameKey);
            $review = __($reviewKey);

            if (trim($name) !== '' && trim($review) !== '') {
                $reviews[] = [
                    'name' => $name,
                    'text' => $review,
                ];
            }
        }
    }
@endphp

<section id="ourClientsSection" class="section" x-data="{ reviews: {{ json_encode($reviews) }}, visibleReviews: 3 }">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('home/client.title') }}
        </h2>
        <button class="primary-button">
            {{ __('home/client.action_1') }}
        </button>
    </div>

    @if ($reviews)
        <div class="container">
            <div class="mt-10 uk-child-width-1-1 " uk-grid>
                <template x-for="(review, index) in reviews.slice(0, visibleReviews)" :key="index">
                    <div>
                        <div class="relative bg-cover bg-no-repeat text-white border-rounded h-full"
                             style="background-color: rgb(15 31 61 / var(--tw-bg-opacity, 1))">
                            <div class="border-rounded absolute inset-0"></div>
                            <div class="relative px-4 xl:px-11 py-4 xl:py-8">
                                <h4 class="font-bold uppercase text-white text-sm sm:text-lg xl:text-3xl">
                                    <span x-text="review.name"></span>
                                </h4>
                                <p class="mt-2 xl:mt-4 text-xs sm:text-base lg:text-xl">
                                    <span x-text="review.text"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="mt-4" x-show="reviews.length > visibleReviews">
                <button
                    id="seeMore"
                    @click="visibleReviews += 3"
                    class="bg-white text-primary rounded-[100px] modal-subtitle py-5 w-full hover:text-white hover:bg-primary"
                >
                    {{ __('general.see_more') }}
                </button>
            </div>
        </div>
    @endif
</section>
