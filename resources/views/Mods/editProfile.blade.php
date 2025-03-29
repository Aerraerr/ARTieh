<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/mods/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">
   
@include('layouts.forNav')
@extends('layouts.forbg')
    
    




<section>    
    
<div class="container-fluid py-5 px-4">
  <div class="bg-white p-6 rounded-lg shadow-lg border mx-auto max-w-[100%] sm:max-w-[50%]">
    
    
    <h4 class="font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl mb-4">
      My Profile
    </h4>
    <hr class="border-t-[2px] border-[#6E4D41] mb-8" />
    
   
    <div class="flex flex-col lg:flex-row gap-8 h-[400px]">
      
      <!-- Left Column-->
      <div class="flex flex-col items-center lg:w-1/3">
        <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
          <img id="profileImage"
            src="images/artist.jpg" 
            alt="Profile Photo" 
            class="object-cover w-full h-full" 
          />
        </div>

        <input type="file" id="fileInput" accept="image/*" class="hidden"/>

        <button id="uploadButton" class="mt-4 px-4 py-2 text-[#6E4D41] border border-[#6E4D41] rounded hover:bg-[#6E4D41] hover:text-white transition duration-300">
          Select Image
        </button>
      </div>

      <div class="border-[1px] h-full "></div>
      
      <!-- Right Column-->
      <div class="lg:w-2/3">
        <!-- Username -->
        <div class="mb-4 flex items-center gap-6">
          <label class="block font-semibold text-gray-700 w-[100px]">First Name</label>
          <input type="text" placeholder="First Name"class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Name -->
        <div class="mb-4 flex items-center gap-4">
          <label class="block font-semibold text-gray-700 w-[100px]">Last Name</label>
          <input 
            type="text" 
            placeholder="Last Name" 
            class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]"
          />
        </div>

        <!-- Email -->
        <div class="mb-4 flex items-center gap-4">
          <label class="font-semibold text-gray-700 w-[100px]">Email</label>
          <div class="flex items-center gap-2">
            <span class="p-2">Yahoo@gmail.com</span>
            <a href="#" class="text-[#6E4D41] hover:text-[#48332B] transition">Change</a>
        </div>
      </div>


        <!-- Gender -->
        <div class="mb-4 flex items-center gap-4">
          <label class="font-semibold text-gray-700 w-[100px]">Gender</label>
          <div class="flex items-center gap-2">
            <label class="flex items-center">
              <input type="radio" name="gender" class="mr-1" /> Male
            </label>
            <label class="flex items-center">
              <input type="radio" name="gender" class="mr-1" /> Female
            </label>
            <label class="flex items-center">
              <input type="radio" name="gender" class="mr-1" /> Vaklesh
            </label>
          </div>
        </div>

        <!-- Date of Birth -->
        <div class="mb-4 flex items-center gap-4">
          <label class="block font-semibold text-gray-700 mb-1 w-[100px]">Birthday</label>
          <div class="flex gap-2">
            <input type="text" placeholder="Date" class="border border-gray-300 rounded p-2 w-[80px]" />
            <input type="text" placeholder="Month" class="border border-gray-300 rounded p-2 w-[80px]" />
            <input type="text" placeholder="Year" class="border border-gray-300 rounded p-2 w-[100px]" />
          </div>

          
          
        </div>
        
        

        <!-- Save Button -->
        <button 
          class="ml-[120px] bg-[#6E4D41] text-white px-4 py-2 rounded hover:bg-[#48332B] transition">
          Save
        </button>
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

<!-- Su mga BUTTONS Sa IRAROM mag paralitan sa script  -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".tab-btn");
        const tabs = document.querySelectorAll(".tab-content");

        buttons.forEach(button => {
            button.addEventListener("click", function () {
                let targetTab = this.getAttribute("data-tab");

                // Remove active class from all buttons
                buttons.forEach(btn => btn.classList.remove("bg-[#48332B]"));

                // Hide all tabs
                tabs.forEach(tab => tab.classList.add("hidden"));

                // Show the selected tab
                document.getElementById(targetTab).classList.remove("hidden");

                // Add active class to the clicked button
                this.classList.add("bg-[#48332B]", "text-white");
            });
        });
    });
</script>


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

<!-- Upload Image -->
<script>
  document.getElementById("uploadButton").addEventListener("click", function() {
    document.getElementById("fileInput").click();
  });

  document.getElementById("fileInput").addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("profileImage").src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });

  // Load saved image on page refresh
  window.addEventListener("load", function() {
    const savedImage = localStorage.getItem("profileImage");
    if (savedImage) {
      document.getElementById("profileImage").src = savedImage;
    }
  });
</script>