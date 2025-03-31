<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paintings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">
    @include('layouts.forNav')
    @extends('layouts.forbg')
    
    




<section>    
    <div class="container-fluid py-5 px-4">
    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[99%] sm:max-w-[90%]" >
        
        <div class="search-bar mr-10 mb-3">
            <input type="text" class="form-control d-inline-block w-50" placeholder="Search by name, artist">
            <select id="priceFilter" class="form-select d-inline-block w-25">
                <option selected>Price</option> 
                <option value="low-to-high">Price: Low to High</option>
                <option value="high-to-low">Price: High to Low</option>
            </select>
            <select class="form-select d-inline-block w-25">
                <option>Renaisance</option>
                <option>Retro</option>
                <option>Indie</option>
                <option>Realism</option>
                <option>Abstract</option>
            </select>
            <button class="btn">Search</button>
        </div>


          <div class="line ml-10 mr-10"><hr></div>
    
    <div class="card-container grid grid-cols-3 gap-6 p-6">
        @forelse($artworks as $artwork)
        <a href="{{ route('product-details', ['id' => $artwork->id]) }}" class="block">
        <div class="card bg-white border rounded-lg shadow-md">
                <div class="card-image">
                    <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-full h-60 object-cover rounded-t-lg">
                    <div class="card-overlay p-4">
                        <h5 class="card-title text-lg font-bold">{{ $artwork->artwork_title }}</h5>
                        <h6 class="artist text-sm">By {{ $artwork->user_id ?? 'Unknown Artist' }}</h6>
                        <p class="card-text text-sm">{{ $artwork->description }}</p>
                        <p class="card-text text-sm">Size: {{ $artwork->dimensions ?? 'N/A' }}</p>
                        <h5 class="price text-md font-semibold">₱{{ number_format($artwork->price, 2) }}</h5>
                    </div>
                </div>
            </div> 
            </a>
        @empty
            <p class="text-center col-span-3">No artworks found in this category.</p>
        @endforelse
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



  </div>
        



    


@include('layouts.footer')
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
</script>