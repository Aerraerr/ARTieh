<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">
    @include('layouts.forNav')
    @extends('layouts.forbg')
    
    




<section>    
    <div class="container-fluid py-5 px-4">

    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%] sm:max-w-[90%]" >
    <h4 class="mt-10 mb-10 font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl ml-0 sm:ml-6 md:ml-10">Paintings</h4>

        
        <div class="search-bar mr-10 mb-3 w-[95%]">

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


        <div class="line ml-20"><hr></div>
        @include('Example.example')

    





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
</div>
</section>

        



    

@include('Example.howtoget')
@include('layouts.footer')
</html>
</body>
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
</script>