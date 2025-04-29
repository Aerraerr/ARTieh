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
            <input type="text" class="form-control d-inline-block h-10 w-50" placeholder="Search by name, artist">
            <button class="btn h-10 w-35">Search</button>
        </div>

        <div class="line sm:w-[82%] w-full ml-10 mr-10"><hr></div>


        <div class="card-container">
            @foreach ($creator as $artist)
                <div class="card">
                    <div class="card-image">
                        <img src="{{ $artist->profile_pic ? asset('storage/' . $artist->profile_pic) : asset('storage/profile_pic/user.png') }}" alt="Artist">
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">Artist: {{ $artist->first_name }} {{ $artist->last_name }}</h5>
                            <div>
                                <!--revise this part i want this to show the artist artwork count-->
                                <p class="card-text">Artworks: {{ $artist->artworks->count() ?? 'artwork count.' }}</p>
                            </div>
                            <div>
                                <a href="{{ route('view_artist', ['id' => $artist->id]) }}" id="viewartistbtn" class="bg-[#6e4d41] sm:bg-[#6e4d41] btn btn-primary" role="button">View Artist</a>
                            </div>
                        </div>   
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


    


    


    <!-- Featured Paintings 
    <section class="text-center px-10 py-16 bg-gray-100">
        <h2 class="text-4xl font-bold">Featured Paintings</h2>
        <div class="flex justify-center mt-6">
            <div class="p-4 bg-white shadow-lg rounded-lg max-w-xs">
                <img src="{{ asset('storage/featured-art.jpg') }}" alt="Wallowing Breeze" class="w-full h-80 object-cover rounded-md">
                <p class="font-semibold mt-2">Wallowing Breeze</p>
                <p class="text-gray-500">Aeron Jead Marquez</p>
                <p class="text-gray-500 text-sm">Oil on canvas, 2008</p>
            </div>
        </div>
    </section>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
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