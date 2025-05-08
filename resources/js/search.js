function performSearch() {
    const searchTerm = document.getElementById('searchInput').value;
    const priceFilter = document.getElementById('priceFilter').value;
    const genreFilter = document.getElementById('genreFilter').value;
    const artworksContainer = document.getElementById('artworks-container');

    // Construct the URL for the AJAX request
    const url = `/artworks/search?search=${searchTerm}&price=${priceFilter}&genre=${genreFilter}`;

    fetch(url, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest', // To indicate it's an AJAX request
        },
    })
    .then(response => response.text())
    .then(data => {
        artworksContainer.innerHTML = data; // Update the artworks container with the new HTML
        // Optional: Re-initialize any JavaScript components within the updated content
    })
    .catch(error => {
        console.error('Error fetching search results:', error);
        // Optionally display an error message to the user
    });
}