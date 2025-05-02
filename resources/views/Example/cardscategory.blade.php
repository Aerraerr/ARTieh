<div class="card-container justify-start">
<div id="artworkCardsWrapper" class="flex flex-wrap gap-4 justify-start">
    @forelse($artworks as $artwork)
        <a href="{{ route('product-details', ['id' => $artwork->id]) }}" 
           class="block no-underline text-inherit artwork-card w-[300px]" 
           data-name="{{ strtolower($artwork->artwork_title . ' ' . ($artwork->user->full_name ?? '')) }}">
            <div id="productdetails" class="card border-0 shadow-lg">
                <div class="w-full h-64"> 
                   <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="card-img-top w-full h-full object-cover">
                </div>   
                <div class="card-body text-start">
                    <h5 class="fw-bold text-[#6E4D41]">{{ $artwork->artwork_title }}</h5>
                    <p class="text-semibold text-[#6E4D41] text-[13px] mt-[-10px] mb-1">by {{ $artwork->user?->full_name ?? 'Unknown Artist' }}</p>
                    <p class="text-[12px] text-medium text-[#6E4D41]">dimension: {{ $artwork->dimension ?? 'N/A' }}</p>
                    <p class="text-[12px] text-normal text-[#6E4D41] fst-italic">{{ $artwork->category->category_name ?? 'Uncategorized' }}</p>
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

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.search-bar input[type="text"]');
    const artworkCards = document.querySelectorAll('.artwork-card');
    const artworkCardsWrapper = document.getElementById('artworkCardsWrapper');

    function updateCardLayout() {
        const visibleCards = Array.from(artworkCards).filter(card => card.style.display !== 'none');
        if (visibleCards.length === 1) {
            artworkCardsWrapper.classList.remove('justify-start');
            artworkCardsWrapper.classList.add('justify-start');
        } else {
            artworkCardsWrapper.classList.remove('justify-start');
            artworkCardsWrapper.classList.add('justify-start');
        }
    }

    searchInput.addEventListener('input', function () {
        const searchValue = this.value.trim().toLowerCase();

        artworkCards.forEach(card => {
            const dataName = card.dataset.name;
            card.style.display = dataName.includes(searchValue) ? 'block' : 'none';
        });

        updateCardLayout();
    });

    updateCardLayout(); // run initially on load
});
</script>
