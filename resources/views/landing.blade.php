<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
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
            <div class="buttons ml-[-300px]">
            <button class="blob-btn">
                Explore Now
                <span class="blob-btn__inner">
                <span class="blob-btn__blobs">
                    <span class="blob-btn__blob"></span>
                    <span class="blob-btn__blob"></span>
                    <span class="blob-btn__blob"></span>
                    <span class="blob-btn__blob"></span>
                </span>
                </span>
            </button>
            <br/>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
                <filter id="goo">
                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
                <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                </filter>
            </defs>
            </svg>
        </div>

        <div class="hidden lg:flex flex-col space-y-6 absolute right-5 top-1/2 transform -translate-y-1/2 z-50 mt-40">
        <a href="https://facebook.com" target="_blank" class="flex items-center group relative">
            <img src="/images/socialmedia/facebook.png" alt="Facebook"
                class="w-10 h-10 transition-all duration-300 transform group-hover:-translate-x-5" />
            <span class="absolute right-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white bg-[#3b5998] px-3 py-1 rounded shadow text-sm">
            Facebook
            </span>
        </a>

        <a href="https://instagram.com" target="_blank" class="flex items-center group relative">
            <img src="/images/socialmedia/instagram.png" alt="Instagram"
                class="w-10 h-10 transition-all duration-300 transform group-hover:-translate-x-5" />
            <span class="absolute right-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white bg-[#E1306C] px-3 py-1 rounded shadow text-sm">
            Instagram
            </span>
        </a>

        <a href="https://twitter.com" target="_blank" class="flex items-center group relative">
            <img src="/images/socialmedia/twitter.png" alt="Twitter"
                class="w-10 h-10 transition-all duration-300 transform group-hover:-translate-x-5" />
            <span class="absolute right-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white bg-[#1DA1F2] px-3 py-1 rounded shadow text-sm">
            Twitter
            </span>
        </a>

        <a href="https://linkedin.com" target="_blank" class="flex items-center group relative">
            <img src="/images/socialmedia/linkedin.png" alt="LinkedIn"
                class="w-10 h-10 transition-all duration-300 transform group-hover:-translate-x-5" />
            <span class="absolute right-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white bg-[#0077b5] px-3 py-1 rounded shadow text-sm">
            LinkedIn
            </span>
        </a>

        </div>




    </section>
    

    @extends('layouts.mainbg')
    <section>
        <!--<div class="section2">-->

        </div>

    </section>
    @include('Example.featuredpainting')


<section class="mt-10 py-10 px-3 bg-[#F6EBDA]">
  <h2 class="text-3xl font-bold text-[#6E4D41] text-center mb-8">Featured Sculptures</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
    <!-- Sculptures Example (repeat for more) -->
    <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
      <img src="https://source.unsplash.com/400x400/?sculpture" alt="Sculpture 1" class="w-full h-64 object-cover mb-4 rounded-lg">
      <h5 class="font-semibold text-[#6E4D41] text-lg">The Thinker</h5>
      <p class="text-gray-600">Auguste Rodin</p>
    </div>

    <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
      <img src="https://source.unsplash.com/400x400/?sculpture" alt="Sculpture 2" class="w-full h-64 object-cover mb-4 rounded-lg">
      <h5 class="font-semibold text-[#6E4D41] text-lg">David</h5>
      <p class="text-gray-600">Michelangelo</p>
    </div>

    <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
      <img src="https://source.unsplash.com/400x400/?sculpture" alt="Sculpture 3" class="w-full h-64 object-cover mb-4 rounded-lg">
      <h5 class="font-semibold text-[#6E4D41] text-lg">Venus de Milo</h5>
      <p class="text-gray-600">Alexandros of Antioch</p>
    </div>

    <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
      <img src="https://source.unsplash.com/400x400/?sculpture" alt="Sculpture 4" class="w-full h-64 object-cover mb-4 rounded-lg">
      <h5 class="font-semibold text-[#6E4D41] text-lg">Bust of Nefertiti</h5>
      <p class="text-gray-600">Thutmose</p>
    </div>

    <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
      <img src="https://source.unsplash.com/400x400/?sculpture" alt="Sculpture 5" class="w-full h-64 object-cover mb-4 rounded-lg">
      <h5 class="font-semibold text-[#6E4D41] text-lg">The Pietà</h5>
      <p class="text-gray-600">Michelangelo</p>
    </div>

    <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md">
      <img src="https://source.unsplash.com/400x400/?sculpture" alt="Sculpture 6" class="w-full h-64 object-cover mb-4 rounded-lg">
      <h5 class="font-semibold text-[#6E4D41] text-lg">The Discus Thrower</h5>
      <p class="text-gray-600">Myron</p>
    </div>

    <!-- Add more sculpture items here if needed -->
  </div>
  <div class="flex justify-center mt-10">
    <button style="border-radius:10px;" class="blob-btn h-[50px] px-6 flex items-center justify-center">
    See More Masterpieces
      <span class="blob-btn__inner">
        <span class="blob-btn__blobs">
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
        </span>
      </span>
    </button>
  </div>
</section>


<!-- New Section: Art That Reflects Your Story -->
<section class="py-16 px-6 max-w-5xl mx-auto opacity-0 translate-y-12 transition-all duration-1000 ease-out" id="art-story-section">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-3xl font-semibold text-[#6E4D41] mb-4">Art That Reflects Your Story</h2>
        <p class="text-[#6E4D41] text-base text-justify">
          From contemporary styles to traditional Filipino themes, ARTIEH makes it easy for you to find wall art that reflects your taste, your story, and the unique culture of Albay.
        
        </p>
        <button style="border-radius:10px;" class=" blob-btn h-[50px] px-6 flex items-center justify-left">
        Find Art That Reflects Your Story
        <span class="blob-btn__inner">
            <span class="blob-btn__blobs">
            <span class="blob-btn__blob"></span>
            <span class="blob-btn__blob"></span>
            <span class="blob-btn__blob"></span>
            <span class="blob-btn__blob"></span>
            </span>
        </span>
        </button>
      </div>
      <img src="{{ asset('images/wallart.jpg') }}" alt="Wall art example" class="rounded-xl shadow-lg">
    </div>
  </section>

  <!-- Section: Handcrafted Finishes -->
  <section class="bg-[#F6EBDA] py-16 px-6 opacity-0 translate-y-12 transition-all duration-1000 ease-out" id="handcrafted-finishes-section">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-semibold text-[#6E4D41] mb-6">Crafted with Heart</h2>
      <p class="text-[#6E4D41] text-base mb-8">
        Choose from beautifully made frames, gallery-wrapped canvases, and wood-mounted displays—ready to hang and built to last. With ARTIEH, you get top-tier craftsmanship without the custom shop markup.
      </p>
      <img src="{{ asset('images/handc.jpg') }}" alt="Handcrafted Frames" class="mx-auto rounded-lg shadow">
    </div>
    <div class="flex justify-center mt-10">
    <button style="border-radius:10px;" class="blob-btn h-[50px] px-6 flex items-center justify-center">
    Find what crafts your heart
      <span class="blob-btn__inner">
        <span class="blob-btn__blobs">
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
        </span>
      </span>
    </button>
  </div>
  </section>

  <!-- Section: Final Message -->
  <section class="py-16 px-6 max-w-4xl mx-auto text-center opacity-0 translate-y-12 transition-all duration-1000 ease-out" id="final-message-section">
    <h2 class="text-3xl font-bold text-[#6E4D41] mb-4">Bring Your Space to Life</h2>
    <p class="text-[#6E4D41] text-base">
      At ARTIEH, we believe that when you bring meaningful art into your space, you bring it to life. Let your walls tell your story—with heart, with heritage, with ARTIEH from Albay.
    </p>
  </section>

    @include('Example.howtoget')




  <!-- Footer -->
  <footer class="bg-[#6E4D41] text-white py-6 text-center">
    <p>&copy; 2025 ARTIEH. All rights reserved. Based in Albay, Philippines.</p>
  </footer>


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
<script>
  document.querySelector('.blob-btn').addEventListener('click', function () {
    window.scrollTo({
      top: 800,
      behavior: 'smooth' // Smooth scrolling
    });
  });
</script>
 <script>
    // Intersection Observer to trigger animation when the sections are in view
    document.addEventListener('DOMContentLoaded', function () {
      const artSection = document.getElementById('art-section');
      const artStorySection = document.getElementById('art-story-section');

      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Add classes to animate sections when in view
            entry.target.classList.add('opacity-100', 'translate-y-0');
            observer.unobserve(entry.target); // Stop observing once the animation is triggered
          }
        });
      }, {
        threshold: 0.5 // Trigger animation when 50% of the section is in view
      });

      // Observe both sections
      observer.observe(artSection);
      observer.observe(artStorySection);
    });
  </script>
   <script>
    // Intersection Observer to trigger animation when the sections are in view
    document.addEventListener('DOMContentLoaded', function () {
      const artSection = document.getElementById('art-section');
      const artStorySection = document.getElementById('art-story-section');
      const handcraftedFinishesSection = document.getElementById('handcrafted-finishes-section');
      const finalMessageSection = document.getElementById('final-message-section');

      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Add classes to animate sections when in view
            entry.target.classList.add('opacity-100', 'translate-y-0');
            observer.unobserve(entry.target); // Stop observing once the animation is triggered
          }
        });
      }, {
        threshold: 0.5 // Trigger animation when 50% of the section is in view
      });

      // Observe all sections
      observer.observe(artSection);
      observer.observe(artStorySection);
      observer.observe(handcraftedFinishesSection);
      observer.observe(finalMessageSection);
    });
  </script>