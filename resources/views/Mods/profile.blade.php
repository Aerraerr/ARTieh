<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">

    
    <!-- Navbar   style="height:3000px;" -->
    <nav style="max-width:100%; height:60px; " class=" flex justify-between items-center px-10 py-6 shadow-sm bg-transparent">
        <div>
        <a href="{{ route('home') }}">
        <img style="max-width: 120px;" src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="mt-2 sm:ml-2 h-10 sm:h-12">
        </div>
        <!-- Navigation Links -->
        <div id="forNav" style="margin-left:400px;" class="  hidden md:flex space-x-2" style="font-family: 'Rubik', sans-serif;  ">
            <a href="{{ route('paintings') }}" style="text-decoration: underline;text-underline-offset: 23px;text-decoration-thickness:2px; " class="flex items-center justify-center  text-[#6e4d41] hover:text-gray-500 font-medium h-[60px] px-3  transition duration-300 ">PAINTINGS</a>
            <a href="{{ route('drawings') }}" class="flex items-center justify-center  text-[#6e4d41] opacity-60 hover:text-gray-500 font-medium h-[60px] px-4  transition duration-300">DRAWINGS</a>
            <a href="{{ route('sculptures') }}" class="flex items-center justify-center  text-[#6e4d41] opacity-60 hover:text-gray-500 font-medium h-[60px] px-4  transition duration-300">SCULPTURES</a>
            <a href="{{ route('artists') }}" class="flex items-center justify-center  text-[#6e4d41] opacity-60 hover:text-gray-500 font-medium h-[60px] px-4  transition duration-300">ARTISTS</a>
        </div>

        <!-- Login/Register Buttons -->
        <div class="hidden md:flex space-x-4">
            <a id="loginbtn" href="{{ route('login') }}" class=" px-7 py-1 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
            <a href="{{ route('register') }}" class="px-7 py-1 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
        </div>
        

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden mr-[-25px] block text-[#6e4d41] focus:outline-none text-2xl ">☰</button>

    </nav>
    <div id="mobileMenu" class="hidden fixed inset-0 bg-white flex flex-col items-center justify-top space-y-7  shadow-md z-40">
    <a id="navmobi" href="{{ route('paintings') }}" style="text-decoration: underline;text-underline-offset: 23px;text-decoration-thickness:2px; " class="menu-link flex items-center justify-center  text-[#6e4d41] hover:text-gray-500 font-medium h-[60px] px-3  transition duration-500 ">PAINTINGS</a>
    <a id="navmobi" href="{{ route('drawings') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link  opacity-60 transition duration-500 ">DRAWINGS</a>
    <a id="navmobi" href="{{ route('sculptures') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link opacity-60 transition duration-500 ">SCULPTURE</a>
    <a id="navmobi" href="{{ route('artists') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link opacity-60 transition duration-500 ">ARTISTS</a>
    <a id="navmobi" href="{{ route('artists') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link opacity-60 transition duration-500 ">ANNOUNCMENTS</a>

        <a href="{{ route('login') }}" class="w-28 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
        <a href="{{ route('register') }}" class="w-28 h-10 flex items-center justify-center bg-[#6e4d41] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
        <button id="closeMenu" class="absolute top-3 right-4 text-2xl text-gray-800">
            &times;
        </button>
    </div>
    

 
    
    




<section>    
    <div class="container-fluid py-5 px-4">
        <div class="bg-white p-4 rounded shadow-lg border mx-auto" style="max-width: 90%;">
        
        <div class="profile-container">
    <div class="card">
        <div class="card-container">
            <img src="images/artist.jpg" alt="Artwork">
        </div>
    </div>

    <div class="profile-details">
        <h1>Van Gogh</h1>
        <hr>
        <h2>Biography</h2>
        <p>Lorem Ipsum bla bla bla bla bla bla bla ! text a postcard sent to you Did it go through? Sendin’ all my love to you You are the moonlight of my life Every night Givin’ all my love to you.</p>
        <a href="{{ route('paintings') }}" class="button">Painting</a>
        <a href="{{ route('drawings') }}" class="button">Drawing</a>
    </div>

    <div class="button-group">
        <div class="action-buttons">
            <a href="#" class="button">Edit Profile</a>
            <a href="#" class="button">Share</a>
        </div>
        <a href="#" class="upload-button">UPLOAD ARTWORK</a>
    </div>
</div>
 
        </div>




  </div>
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
</script>