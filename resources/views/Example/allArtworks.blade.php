<style>
    .artwork-card {
        width: 100%;
        max-width: 350px;
    }

    .card-container.single-visible {
        justify-content: center;
    }
</style>

<div class="card-container flex flex-wrap gap-4 justify-center" id="artworkCardsContainer">
    @forelse($artworks as $artwork)
        <a href="{{ route('product-details', ['id' => $artwork->id]) }}" 
           class="block no-underline text-inherit artwork-card transition-all duration-300" 
           data-name="{{ strtolower($artwork->artwork_title . ' ' . ($artwork->user->full_name ?? '')) }}"
           data-price="{{ $artwork->price }}">
            <div class="card border-0 shadow-lg">
                <div class="w-full h-64">
                    <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="card-img-top w-full h-full object-cover">
                </div>
                <div class="card-body text-start">
                    <h5 class="fw-bold text-[#6E4D41]">{{ $artwork->artwork_title }}</h5>
                    <p class="text-semibold text-[#6E4D41] text-[13px] mt-[-10px] mb-1">by {{ $artwork->user?->full_name ?? 'Unknown Artist' }}</p>
                    <p class="text-[12px] text-medium text-[#6E4D41]">dimension: {{ $artwork->dimension ?? 'N/A' }}</p>
                    <p class="text-[12px] text-normal text-[#6E4D41] fst-italic" data-category="{{ $artwork->category_id }}">{{ $artwork->category->category_name ?? 'Uncategorized' }}</p>
                    <h5 class="fw-bold text-end text-[#6E4D41]">₱{{ number_format($artwork->price, 2) }}</h5>
                    <hr class="custom-line">
                    <div class="text-end">
                        <button class="btn btn-outline-dark rounded-md px-4 custom-button">View Product</button>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <p class="text-center col-span-3">No artworks found in this category.</p>
    @endforelse
</div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.querySelector('.search-bar input[type="text"]');
        const artworkCards = document.querySelectorAll('.artwork-card');
        const cardContainer = document.getElementById('artworkCardsContainer');
        const priceFilter = document.getElementById('priceFilter');

        function updateVisibleCards() {
            const searchValue = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            artworkCards.forEach(card => {
                const dataName = card.dataset.name;
                if (dataName.includes(searchValue)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 1) {
                cardContainer.classList.add('single-visible');
            } else {
                cardContainer.classList.remove('single-visible');
            }
        }

        function sortByPrice(order) {
            const sortedCards = Array.from(artworkCards).sort((a, b) => {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                if (order === 'low-to-high') {
                    return priceA - priceB;
                } else if (order === 'high-to-low') {
                    return priceB - priceA;
                }
                return 0;
            });

            // Reattach the sorted cards to the container
            sortedCards.forEach(card => cardContainer.appendChild(card));
        }

        // Event listeners
        searchInput.addEventListener('input', updateVisibleCards);
        priceFilter.addEventListener('change', function () {
            const selectedOrder = priceFilter.value;
            sortByPrice(selectedOrder);
        });

        updateVisibleCards(); // initial call
    });
</script>
