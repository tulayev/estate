@props([
    'baseUrl' => '',
    'id' => 0,
    'isLiked' => false,
])

<button
    x-data="likeHandler('{{ $baseUrl }}', {{ $id }}, {{ $isLiked ? 'true' : 'false' }}, '{{ csrf_token() }}')"
    @click.stop="toggleLike"
>
    <img
        :src="isLiked ? '{{ asset('assets/images/icons/heart-red.svg') }}' : '{{ asset('assets/images/icons/heart.svg') }}'"
        alt="like"
    />
</button>
