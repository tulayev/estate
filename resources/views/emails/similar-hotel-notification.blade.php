<h1 class="section-title"># New similar object</h1>
<h2 class="modal-subtitle">**{{ $hotel->title }}**</h2>
{{ Str::limit(Helper::removeHtmlTags($hotel->description), 100) }}

<div>
    <a
        href="{{ route('pages.listing.show', $hotel->slug) }}"
        target="_blank"
        class="text-primary"
    >
        View details
    </a>
</div>
<div class="text-primary text-sm">
    If you want to unsubscribe from this:
    <a
        href="{{ route('subscription.unsubscribe', $subscription->unsubscribe_token) }}"
        target="_blank"
    >
        Unsubscribe
    </a>
</div>
