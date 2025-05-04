<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
  <title>Artists</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome 6.5.1 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Guaranteed Icon Styling -->
  <style>
    /* Force black icons with hover override */
    .social-icon i {
      color: #000 !important;
      transition: all 0.3s ease !important;
      display: inline-block;
    }
    
    .social-icon:hover i {
      color: inherit !important;
      transform: scale(1.2);
    }
  </style>

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mods/artist.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
  <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body class="bg-white text-gray-900">
  @include('layouts.forNav')
  @extends('layouts.forbg')
  @include('Mods.forNotif')
  @include('Mods.forChat')

  <section>
    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%]">
      <h4 class="mt-10 mb-5 font-semibold text-[#6E4D41] text-3xl ml-5">Artists</h4>

      <!-- Filter Toggle -->
      <a id="toggleFilterBtn" class="btn sm:hidden ml-5 absolute text-[10px] flex items-center gap-1">
        <img src="{{ asset('/iconused/filters.png') }}" alt="Filter Icon" class="w-4 h-4 inline-block">
        <span id="toggleFilterText">Show Filters</span>
      </a>

      <!-- Filters -->
      <div id="filterDiv" class="search-bar mr-[130px] mb-3 sm:w-1/2 w-full">
        <select class="form-select sm:h-10 w-200">
          <option selected>Price</option>
          <option value="low-to-high">Price: Low to High</option>
          <option value="high-to-low">Price: High to Low</option>
        </select>
        <select class="form-select sm:h-10 w-200">
          <option selected disabled>Genre / Type</option>
          <option>Renaisance</option>
          <option>Retro</option>
          <option>Indie</option>
          <option>Realism</option>
          <option>Abstract</option>
        </select>
        <input type="text" class="form-control h-10 w-50" placeholder="Search by name, artist">
        <button class="btn h-10 w-35">Search</button>
      </div>

      <div class="line sm:w-[82%] w-full ml-10 mr-10"><hr></div>

      <!-- Artist Cards -->
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 px-5 mt-5">
        @foreach ($creator as $artist)
        <div class="aspect-[3/4] bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center hover:shadow-lg transition-all">
          <div class="w-40 h-40 bg-gray-100 rounded-full overflow-hidden border border-gray-300 shadow-inner">
            <img src="{{ $artist->profile_pic ? asset('storage/' . $artist->profile_pic) : asset('storage/profile_pic/user.png') }}"
                 alt="Artist"
                 class="w-full h-full object-cover">
          </div>

          <div class="mt-4">
            <h5 class="text-base font-semibold">{{ $artist->full_name }}</h5>
            <p class="text-xs text-gray-500">Artist</p>
            <p class="text-xs text-gray-500">Artworks: {{ $artist->artworks->count() ?? 0 }}</p>
          </div>

          <!-- Fixed Social Media Icons -->
          <div class="flex justify-center gap-4 mt-3">
            <a href="#" class="social-icon hover:text-red-600">
              <i class="fab fa-youtube text-xl"></i>
            </a>
            <a href="#" class="social-icon hover:text-pink-500">
              <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="#" class="social-icon hover:text-blue-500">
              <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="#" class="social-icon hover:text-green-600">
              <i class="fab fa-whatsapp text-xl"></i>
            </a>
          </div>

          <a href="{{ route('view_artist', ['id' => $artist->id]) }}"
             class="mt-4 bg-[#6e4d41] no-underline text-white text-xs py-1 px-3 rounded-full hover:bg-[#5a3f34] transition">
            View Artist
          </a>
        </div>
        @endforeach

        <!-- Sample Card -->
        <div class="aspect-[3/4] bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center hover:shadow-lg transition-all">
          <div class="w-40 h-40 bg-gray-100 rounded-full overflow-hidden border border-gray-300 shadow-inner">
            <img src="{{ asset('storage/profile_pic/user.png') }}" alt="Sample Artist" class="w-full h-full object-cover">
          </div>

          <div class="mt-4">
            <h5 class="text-base font-semibold">Sample Artist</h5>
            <p class="text-xs text-gray-500">Artist</p>
            <p class="text-xs text-gray-500">Artworks: 12</p>
          </div>

          <div class="flex justify-center gap-4 mt-3">
            <a href="#" class="social-icon hover:text-red-600">
              <i class="fab fa-youtube text-xl"></i>
            </a>
            <a href="#" class="social-icon hover:text-pink-500">
              <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="#" class="social-icon hover:text-blue-500">
              <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="#" class="social-icon hover:text-green-600">
              <i class="fab fa-whatsapp text-xl"></i>
            </a>
          </div>

          <a href="#" class="mt-4 bg-[#6e4d41] text-white text-xs py-1 px-3 rounded-full hover:bg-[#5a3f34] transition">
            View Artist
          </a>
        </div>
      </div>

      <!-- Pagination -->
      <nav aria-label="Page navigation example" class="mt-6">
        <ul class="pagination flex justify-center gap-2">
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

  <script>
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
</body>
</html>