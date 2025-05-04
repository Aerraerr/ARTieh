<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .search-active-image img {
            object-fit: contain !important;
            aspect-ratio: 4 / 3;
            height: auto !important;
        }
    </style>

</head>
<body style="height:auto;"  class="bg-white text-gray-900 ">
    @include('layouts.forNav')
    @extends('layouts.forbg')
    
    




<section>    

<div  class="bg-white p-4 rounded shadow-lg border  max-w-[100%] sm:max-w-[100%]" >
<h4 class="mt-10 font-bold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl ml-0 sm:ml-[130px] md:ml-[130px]">All Artworks</h4> 
<h5 class="mb-5 text-[#6E4D41] text-sm italic ml-0 sm:ml-[130px] md:ml-[130px]">
    Explore a diverse collection of art, where creativity knows no bounds. From paintings to sculptures, each piece tells its own unique story.
</h5> 
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
                <option selected>Sort by Price</option> 
                <option value="low-to-high">Sort: Low to High</option>
                <option value="high-to-low">Sort: High to Low</option>
            </select>
            <select class="form-select d-inline-block sm:h-10 sm:w-25 w-200">
                <option selected disabled>Genre / Type</option>
                <option>Renaissance</option>
                <option>Baroque</option>
                <option>Rococo</option>
                <option>Neoclassicism</option>
                <option>Romanticism</option>
                <option>Realism</option>
                <option>Impressionism</option>
                <option>Post-Impressionism</option>
                <option>Expressionism</option>
                <option>Fauvism</option>
                <option>Symbolism</option>
                <option>Art Nouveau</option>
                <option>Cubism</option>
                <option>Dada</option>
                <option>Surrealism</option>
                <option>Abstract</option>
                <option>Abstract Expressionism</option>
                <option>Pop Art</option>
                <option>Minimalism</option>
                <option>Conceptual Art</option>
                <option>Contemporary</option>
                <option>Modernism</option>
                <option>Postmodernism</option>
                <option>Street Art</option>
                <option>Graffiti</option>
                <option>Futurism</option>
                <option>Constructivism</option>
                <option>Retro</option>
                <option>Indie</option>
                <option>Digital Art</option>
                <option>Photorealism</option>
                <option>Fantasy</option>
                <option>Naïve Art</option>
                <option>Outsider Art</option>
                <option>Installation Art</option>
                <option>Performance Art</option>
            </select>

            <input type="text" class="form-control d-inline-block h-10 w-50" placeholder="Search by name, artist">
            <button class="btn h-10 w-35">Search</button>
        </div>

        <div class="line sm:w-[82%] w-full ml-10 mr-10"><hr></div>

        @include('Example.allArtworks')


</div>
</section>


       











<section>

@include('Example.howtoget')
</section>


@include('layouts.footer')

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