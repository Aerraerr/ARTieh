<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>




</head>
<body  class="bg-white text-gray-900">
@include('layouts.forNav')
    <!-- Hero Section -->
    <section class="ml-[-20px] sm:ml-5 flex flex-col lg:flex-row items-center justify-between px-10 py-20">
        <div class="max-w-lg">
            <h1 class="text-5xl sm:text-6xl font-bold font-rubik text-[#6e4d41] sm:text-[#6e4d41] " style="font-family: 'Rubik', sans-serif;  " >WELCOME!</h1>
            <p class="text-4xl sm:text-6xl font-light mt-4 text-[#6e4d41] sm:text-[#6e4d41]" style="line-height:1;">Where <br><b>Creativity</b>  <br>Finds Its <b>Home.</b> </p>
            <p class="text-600 mt-4 text-[#1e1e1e] sm:text-[#6e4d41]" >
                Discover unique artworks, connect with Albay's local artists, 
                and bring creativity into your space.
            </p>
            <a style="text-decoration:none;" href="#" class="bg-[#6e4d41] sm:bg-[#6e4d41] sm:bg-500 mt-6 inline-block text-white px-6 py-3 rounded-lg text-lg hover:bg-[#A99476] transition">Explore Now</a>

        </div>
    </section>
    

    @extends('layouts.mainbg')
    <section>
        <!--<div class="section2">-->

        </div>

    </section>
    @include('Example.featuredpainting')
    @include('Example.howtoget')





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    
</script>
