
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[placeholder="Search by name, artist"]');
    const priceFilter = document.getElementById('priceFilter');
    const artworks = document.querySelectorAll('.artwork-item'); // Add this class to each artwork
    const searchBtn = document.querySelector('button.btn');

    function filterArtworks() {
        const searchTerm = searchInput.value.toLowerCase();
        const priceSort = priceFilter.value;

        let filteredArtworks = Array.from(artworks);

        // Filter by search input
        filteredArtworks.forEach(item => {
            const name = item.getAttribute('data-name')?.toLowerCase() || '';
            const artist = item.getAttribute('data-artist')?.toLowerCase() || '';
            if (name.includes(searchTerm) || artist.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });

        // Sort by price
        if (priceSort === 'low-to-high' || priceSort === 'high-to-low') {
            filteredArtworks = filteredArtworks.sort((a, b) => {
                const priceA = parseFloat(a.getAttribute('data-price'));
                const priceB = parseFloat(b.getAttribute('data-price'));
                return priceSort === 'low-to-high' ? priceA - priceB : priceB - priceA;
            });

            const container = artworks[0].parentElement;
            filteredArtworks.forEach(item => container.appendChild(item)); // Reorder in DOM
        }
    }

    searchBtn.addEventListener('click', filterArtworks);
});