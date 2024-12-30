@props([
    'hotels' => null,
    'tags' => null,
    'features' => null,
])

<form
    id="filterForm"
    method="GET"
    action="{{ route('pages.listing.index') }}"
>
    <input
        type="text"
        name="search"
        id="search"
        placeholder="Search"
        value="{{ request('search') }}"
    />
    <input
        type="number"
        name="price_min"
        id="price_min"
        placeholder="Min Price"
        value="{{ request('price_min') }}"
    />
    <input
        type="number"
        name="price_max"
        id="price_max"
        placeholder="Max Price"
        value="{{ request('price_max') }}"
    />
    <input
        type="number"
        name="bedrooms_min"
        id="bedrooms_min"
        placeholder="Min Bedrooms"
        value="{{ request('bedrooms_min') }}"
    />
    <input
        type="number"
        name="bedrooms_max"
        id="bedrooms_max"
        placeholder="Max Bedrooms"
        value="{{ request('bedrooms_max') }}"
    />
    <input
        type="number"
        name="bathrooms_min"
        id="bathrooms_min"
        placeholder="Min Bathrooms"
        value="{{ request('bathrooms_min') }}"
    />
    <input
        type="number"
        name="bathrooms_max"
        id="bathrooms_max"
        placeholder="Max Bathrooms"
        value="{{ request('bathrooms_max') }}"
    />

    <select
        name="tags[]"
        id="tags"
        multiple
    >
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" {{ in_array($tag->id, request('tags', [])) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    <select
        name="features[]"
        id="features"
        multiple
    >
        @foreach ($features as $feature)
            <option value="{{ $feature->id }}" {{ in_array($feature->id, request('features', [])) ? 'selected' : '' }}>
                {{ $feature->name }}
            </option>
        @endforeach
    </select>

    <button
        id="showResultsButton"
        type="submit"
    >
        Show Results
    </button>
</form>

<script>
    const API_URI = '/api/objects/count';
    const filtersForm = document.getElementById('filterForm');
    const showResultsButton = document.getElementById('showResultsButton');

    // Function to fetch the count of hotels
    const updateResultsCount = async () => {
        const formData = new FormData(filtersForm);
        const filters = Object.fromEntries(formData.entries());
        filters.tags = Array.from(document.getElementById('tags').selectedOptions).map(option => option.value);
        filters.features = Array.from(document.getElementById('features').selectedOptions).map(option => option.value);

        try {
            const response = await fetch(API_URI, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(filters),
            });

            const data = await response.json();

            // Update the button text
            showResultsButton.textContent = `Show ${data.count} Results`;
        } catch (error) {
            console.error('Error updating results count:', error);
        }
    };

    // Event listeners to update results count on filter change
    const filterInputs = filtersForm.querySelectorAll("input, select");
    filterInputs.forEach(input => {
        input.addEventListener('change', updateResultsCount);
    });

    // Initial load
    document.addEventListener('DOMContentLoaded', updateResultsCount);
</script>
