@props([
    'title' => __('general.nothing_found'),
    'message' => __('general.search_try_again'),
    'showSearchTips' => false,
    'backUrl' => null,
    'hideSearch' => true,
])

@section('nothing-found-page', true)

<style>
    /* Apply specific dark blue background color for navbar on nothing found page */
    .header.uk-sticky-fixed,
    .header .navbar {
        background-color: rgb(15 31 61 / var(--tw-bg-opacity, 1)) !important;
    }
    
    /* Define the specific background color class */
    .nothing-found-bg {
        background-color: rgb(15 31 61 / var(--tw-bg-opacity, 1)) !important;
    }
    
    /* Ensure text is visible on dark background */
    .nothing-found-bg a,
    .header.nothing-found-bg a,
    .header.nothing-found-bg .uk-navbar-toggle {
        color: white !important;
    }
</style>



<div class="section py-20">
    <div class="container">
        <div class="flex flex-col items-center text-center max-w-3xl mx-auto">
            <div class="mb-8 relative">
                <div class="search-icon-wrapper relative">
                    <img src="{{ asset('assets/images/icons/search-icon.svg') }}" alt="Nothing found" class="w-24 h-24 opacity-40">
                </div>
            </div>
            
            <h2 class="section-title mb-4">{{ $title }}</h2>
            
            <p class="modal-subtitle mb-8">{{ $message }}</p>
            
            @if($showSearchTips)
            <div class="bg-gray-50 p-6 rounded-lg w-full mb-8 shadow-sm">
                <h3 class="font-bold text-lg mb-4 text-primary">{{ __('general.search_tips') }}</h3>
                <ul class="text-left list-disc pl-5 space-y-3">
                    <li>{{ __('general.search_tip_1') }}</li>
                    <li>{{ __('general.search_tip_2') }}</li>
                    <li>{{ __('general.search_tip_3') }}</li>
                </ul>
            </div>
            @endif
            
            @if($backUrl)
            <div class="mt-6">
                <a href="{{ $backUrl }}" class="bg-white text-primary rounded-[100px] modal-subtitle py-4 px-8 hover:text-white hover:bg-primary border border-primary inline-block transition-all duration-300">
                    {{ __('general.go_back') }}
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

@if($hideSearch)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide the search bar in the listing page when nothing is found
        const searchForm = document.getElementById('listingSearchForm');
        if (searchForm) {
            searchForm.style.display = 'none';
        }

        // Also hide the search toggle button if it exists
        const searchToggle = document.querySelector('[uk-toggle="target: #listingFilterModal"]');
        if (searchToggle) {
            const parentWrapper = searchToggle.closest('.h-full');
            if (parentWrapper) {
                parentWrapper.style.display = 'none';
            }
        }
        
        // Apply dark blue background color to headers and remove top-4 class
        const headers = document.querySelectorAll('.header');
        headers.forEach(header => {
            header.style.backgroundColor = 'rgb(15 31 61 / var(--tw-bg-opacity, 1))';
            header.classList.remove('top-4');
        });
        
        // Hide the title/sort display/toggle view div when nothing found page is displayed
        const titleSectionDiv = document.querySelector('.section .container .w-full.flex.justify-between');
        if (titleSectionDiv) {
            titleSectionDiv.style.display = 'none';
        }
        
        // Sanitize the URL by removing query parameters and reset search fields
        const cleanupUrl = () => {
            const currentPath = window.location.pathname;
            // Only replace the URL state without refreshing the page
            window.history.replaceState({}, document.title, currentPath);
            
            // Update back URL button if it exists
            const backButton = document.querySelector('a[href*="pages.listing.index"]');
            if (backButton) {
                backButton.setAttribute('href', currentPath);
            }
            
            // Reset any search input fields that might still contain the failed search terms
            const searchInputs = document.querySelectorAll('input[type="text"], input[type="search"]');
            searchInputs.forEach(input => {
                if (input.value && input.id !== 'title') { // Don't clear main title field
                    input.value = '';
                }
            });
            
            // Reset any select elements
            const selectElements = document.querySelectorAll('select');
            selectElements.forEach(select => {
                select.selectedIndex = 0;
            });
        };
        
        // Delay URL cleanup slightly to ensure page is fully loaded
        setTimeout(cleanupUrl, 200);
        
        // Ensure offcanvas menu has the right color too
        const offcanvasBar = document.querySelector('.uk-offcanvas-bar');
        if (offcanvasBar) {
            offcanvasBar.classList.remove('bg-primary');
            offcanvasBar.classList.add('nothing-found-bg');
        }
    });
</script>
@endif
