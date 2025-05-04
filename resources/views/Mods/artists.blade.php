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
<style>
    <style>
    @media (max-width: 640px) {
        /* Adjust the grid for 1 column on small screens */
        #artistCardsContainer {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        /* Adjust heading and search bar to stack properly */
        .search-bar {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .search-bar select,
        .search-bar input,
        .search-bar button {
            width: 100% !important;
        }

        .line {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
            width: 100% !important;
        }

        h4 {
            margin-left: 1rem !important;
            font-size: 1.5rem !important;
        }

        #toggleFilterBtn {
            left: 1rem !important;
            top: 0 !important;
            transform: translateY(-100%) !important;
        }
    }
</style>

</style>
</head>
<body style="height:auto;"  class="bg-white text-gray-900 h-auto">
@include('layouts.forNav')
@extends('layouts.forbg')
@include('Mods.forNotif')
@include('Mods.forChat')
    
    
<section>    
    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%] sm:max-w-[100%]" >
    <h4 class="mt-10 font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl ml-0 sm:ml-[130px] md:ml-[130px]">Artists</h4>
    <h5 class="mb-5 text-[#6E4D41] text-sm italic ml-0 sm:ml-[130px] md:ml-[130px]">Connect with the artists behind the art..</h5>
    <!-- Toggle Button for Mobile View -->
        <a id="toggleFilterBtn"
        class="btn sm:hidden sm:ml-[120px] ml-[53%] sm:mt-[-30px] mt-[-42px] absolute text-[10px] flex items-center gap-1 whitespace-nowrap">
        <img src="{{ asset('/iconused/filters.png') }}" 
                alt="Filter Icon" 
                class="w-4 h-4 inline-block align-middle">
        <span id="toggleFilterText" class="inline-block align-middle">Show Filters</span>
        </a>
        <!-- Search Bar -->
        <div id="filterDiv" class="search-bar mr-[75px] mb-3 sm:w-1/2 w-full">
            <select id="priceFilter" class="form-select d-inline-block sm:h-10 sm:w-200 w-200">
                <option selected>Price</option> 
                <option value="low-to-high">Price: Low to High</option>
                <option value="high-to-low">Price: High to Low</option>
            </select>

            <input type="text" id="artistSearchInput" class="form-control d-inline-block h-10 w-50" placeholder="Search by name, artist">
            <button class="btn  h-10 w-35">Search</button>
        </div>
        <div class="line sm:w-[82%] w-full ml-10 mr-10"><hr></div>

        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 px-4 sm:px-5 mt-5 sm:ml-[115px] sm:mr-[110px]" id="artistCardsContainer">

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
                        <h5 class="text-base font-semibold text-[#6E4D41]">{{ $artist->full_name }}</h5>
                        <p class="text-xs  text-[#6E4D41]">Artist</p>
                        <p class="text-xs  text-[#6E4D41]">Artworks: {{ $artist->artworks->count() ?? 0 }}</p>
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
                    <a href="{{ route('view_artist', ['id' => $artist->id]) }}" class="btn btn-outline-dark rounded-md px-4 custom-button">
                        View Artist
                    </a>
                    
                </div>
            @endforeach
        </div>
    </div>
  </section>

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
          filterDiv.style.display = 'flex';
          setTimeout(() => filterDiv.classList.add('show'), 20);
          toggleText.textContent = "Hide Filters";
          toggleText.classList.add('font-bold');
        } else {
          filterDiv.classList.remove('show');
          setTimeout(() => filterDiv.style.display = 'none', 300);
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

