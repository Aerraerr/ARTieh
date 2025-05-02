<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/artist.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body  class="bg-white text-gray-900">
@include('layouts.forNav')
@extends('layouts.forbg')
    
    
<section>    
    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%] sm:max-w-[100%]" >
    <h4 class="mt-10 mb-5 font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl ml-0 sm:ml-[130px] md:ml-[130px]">Artists</h4>
        <!-- Toggle Button for Mobile View -->
        <a id="toggleFilterBtn"
        class="btn sm:hidden sm:ml-[120px] ml-[53%] sm:mt-[-30px] mt-[-42px] absolute text-[10px] flex items-center gap-1 whitespace-nowrap">
        <img src="{{ asset('/iconused/filters.png') }}" 
                alt="Filter Icon" 
                class="w-4 h-4 inline-block align-middle">
        <span id="toggleFilterText" class="inline-block align-middle">Show Filters</span>
        </a>
        <!-- Search Bar -->
        <div id="filterDiv" class="search-bar mr-[130px] mb-3 sm:w-1/2 w-full">
            <select id="priceFilter" class="form-select d-inline-block sm:h-10 sm:w-200 w-200">
                <option selected>Price</option> 
                <option value="low-to-high">Price: Low to High</option>
                <option value="high-to-low">Price: High to Low</option>
            </select>
            <select class="form-select d-inline-block sm:h-10 sm:w-25 w-200">
                <option selected disabled>Genre / Type</option>
                <option>Renaisance</option>
                <option>Retro</option>
                <option>Indie</option>
                <option>Realism</option>
                <option>Abstract</option>
            </select>
            <input type="text" id="artistSearchInput" class="form-control d-inline-block h-10 w-50" placeholder="Search by name, artist">
            <button class="btn  h-10 w-35">Search</button>
        </div>

        <div class="line sm:w-[82%] w-full ml-10 mr-10"><hr></div>


        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 px-5 mt-5 ml-20 mr-20" id="artistCardsContainer">
            @foreach ($creator as $artist)
            <div class="artist-card aspect-[3/4] bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center hover:shadow-lg transition-all" data-name="{{ strtolower($artist->full_name) }}">

                    
                    <!-- Artist Image -->
                    <div class="w-40 h-40 bg-gray-100 rounded-full overflow-hidden border border-gray-300 shadow-inner">
                        <img src="{{ $artist->profile_pic ? asset('storage/' . $artist->profile_pic) : asset('storage/profile_pic/user.png') }}"
                            alt="Artist"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Artist Info -->
                    <div class="mt-4">
                        <h5 class="text-base font-semibold">{{ $artist->full_name }}</h5>
                        <p class="text-xs text-gray-500">Artist</p>
                        <p class="text-xs text-gray-500">Artworks: {{ $artist->artworks->count() ?? 0 }}</p>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex justify-center gap-4 mt-3 text-gray-500">
                        <a href="#" class="hover:text-red-600">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                        <a href="#" class="hover:text-pink-500">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="hover:text-blue-500">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="hover:text-green-600">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>

                    <!-- View Artist Button -->
                    <a href="{{ route('view_artist', ['id' => $artist->id]) }}"
                    class="mt-4 bg-[#6e4d41] text-white text-xs py-1 px-4 rounded-full hover:bg-[#5a3f34] transition">
                        View Artist
                    </a>
                </div>
            @endforeach
        </div>



        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">></a></li>
        </ul>
        </nav>

    </div>

        

</section>

@include('Example.howtoget')
@include('layouts.footer')

    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.getElementById("menuBtn").addEventListener("click", function () {
        let mobileMenu = document.getElementById("mobileMenu");
        mobileMenu.classList.toggle("hidden");
    });

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
    document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById('toggleFilterBtn');
    const filterDiv = document.getElementById('filterDiv');
    const toggleText = document.getElementById('toggleFilterText');

    toggleBtn.addEventListener('click', function () {
        if (!filterDiv.classList.contains('show')) {
            filterDiv.style.display = 'flex'; // Show the filter
            setTimeout(() => filterDiv.classList.add('show'), 20); // Animate in
            toggleText.textContent = "Hide Filters";
            toggleText.classList.add('font-bold');
        } else {
            filterDiv.classList.remove('show');
            setTimeout(() => filterDiv.style.display = 'none', 300); // Animate out
            toggleText.textContent = "Show Filters";
            toggleText.classList.add('font-bold');
        }
    });
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('#artistSearchInput');
    const artistCards = document.querySelectorAll('#artistCardsContainer .artist-card');
    const artistCardsWrapper = document.getElementById('artistCardsContainer');

    function updateCardLayout() {
        const visibleCards = Array.from(artistCards).filter(card => card.style.display !== 'none');
        if (visibleCards.length === 1) {
            artistCardsWrapper.classList.remove('justify-start');
            artistCardsWrapper.classList.add('justify-start');
        } else {
            artistCardsWrapper.classList.remove('justify-start');
            artistCardsWrapper.classList.add('justify-start');
        }
    }

    searchInput.addEventListener('input', function () {
        const searchValue = this.value.trim().toLowerCase();

        artistCards.forEach(card => {
            const dataName = card.dataset.name;
            card.style.display = dataName.includes(searchValue) ? 'flex' : 'none';
        });

        updateCardLayout();
    });

    updateCardLayout(); // run initially on load
});
</script>

