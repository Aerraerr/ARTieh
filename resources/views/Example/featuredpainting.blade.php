<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
        /* Custom Styling */
        .carousel-item img {
            max-height: 450px;  /* Limit height for consistency */
            object-fit: cover;  /* Keep aspect ratio */
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5); /* Dark overlay for better text visibility */
            padding: 15px;
            border-radius: 5px;
        }

        .carousel-control-prev, .carousel-control-next {

            color: #030202 !important; /* Brown color */
        }
        .carousel-indicators button {
            width: 2px; 
            height: 2px;
            border-radius: 20%; 
            background-color: #030202 !important;
            border: none;
            opacity: 10%; 
            transition: opacity 0.3s ease-in-out; 
        }

        .carousel-indicators .active {
            opacity: 1;
            background-color: #6E4D41 !important;
        }
        .artistCarousel {
            animation: scrollArtists 30s linear infinite;

        }
        .artistCarousel2{
          width: 270px;
        }
        @keyframes scrollArtists {
            0% {
            transform: translateX(0);
            }
            100% {
            transform: translateX(-50%);
            }
        }

</style> 
<section class="bg-[#F6EBDA] py-16 px-6 text-center opacity-0 translate-y-12 transition-all duration-1000 ease-out" id="art-section">
    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-[#6E4D41]">Discover Art with Meaning in Albay</h1>
    <p class="text-sm fw-semibold md:text-base max-w-3xl mx-auto text-[#6E4D41]">
      ARTIEH makes discovering art in Albay a meaningful experience. We bring together a curated collection of premium-quality artworks created by talented local and regional artists.
    </p>
</section>





<section class="p-6 sm:p-6 mt-5">
  <h2 class="text-2xl text-center font-bold mb-4 text-[#6E4D41]">Featured Artists</h2>

  <div class="overflow-x-hidden relative">
    <!-- Carousel wrapper -->
    <div class="artistCarousel gap-10 whitespace-nowrap transition-transform duration-500 ease-in-out px-2 w-max">
      
      <!-- Artist Card (repeat as needed) -->
      <div class="artistCarousel2 flex-shrink-0 sm:w-[260px] w-[20px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 1" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="artistCarousel2 text-lg font-semibold text-[#6E4D41]">Lebron James</h3>
          <p class="text-sm text-gray-600">15 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/bob.jpg') }}" alt="Artist 2" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Bob Ross</h3>
          <p class="text-sm text-gray-600">8 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 3" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Lebron James</h3>
          <p class="text-sm text-gray-600">13 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/bronny.jpg') }}" alt="Bronny James" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Bronny James</h3>
          <p class="text-sm text-gray-600">3 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/ad.jpg') }}" alt="Anthony Davis" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Anthony Davis</h3>
          <p class="text-sm text-gray-600">10 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/luka.jpg') }}" alt="Luka Doncic" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Luka Doncic</h3>
          <p class="text-sm text-gray-600">9 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/rui.jpg') }}" alt="Rui Hachimura" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Rui Hachimura</h3>
          <p class="text-sm text-gray-600">7 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/ar.jpg') }}" alt="Austin Reaves" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Austin Reaves</h3>
          <p class="text-sm text-gray-600">6 artworks</p>
        </div>
      </div>
      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 1" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Lebron James</h3>
          <p class="text-sm text-gray-600">15 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/bob.jpg') }}" alt="Artist 2" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Bob Ross</h3>
          <p class="text-sm text-gray-600">8 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 3" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Lebron James</h3>
          <p class="text-sm text-gray-600">13 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/bronny.jpg') }}" alt="Bronny James" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Bronny James</h3>
          <p class="text-sm text-gray-600">3 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/ad.jpg') }}" alt="Anthony Davis" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Anthony Davis</h3>
          <p class="text-sm text-gray-600">10 artworks</p>
        </div>
      </div>

    </div>
  </div>

  <!-- Button -->
  <div class="flex justify-center mt-10">
  <a href="{{ route('artists', ['category' => 'artists']) }}" style="text-decoration:none;" class="blob-btn h-[50px] w-1/2 px-6 flex items-center justify-center">
                FIND MORE ARTIST
                <span class="blob-btn__inner">
                    <span class="blob-btn__blobs">
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                    </span>
                </span>
                </a>
  </div>
</section>


<section class="p-6 sm:p-6 mt-5">
  <h2 class="text-2xl text-center font-bold mb-4 text-[#6E4D41]">Featured Artists</h2>

  <div class="overflow-x-hidden relative">
    <!-- Carousel wrapper -->
    <div class="artistCarousel gap-10 whitespace-nowrap transition-transform duration-500 ease-in-out px-2 w-max">
      
      <!-- Artist Card (repeat as needed) -->
      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 1" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Lebron James</h3>
          <p class="text-sm text-gray-600">15 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/bob.jpg') }}" alt="Artist 2" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Bob Ross</h3>
          <p class="text-sm text-gray-600">8 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 3" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Lebron James</h3>
          <p class="text-sm text-gray-600">13 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/bronny.jpg') }}" alt="Bronny James" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Bronny James</h3>
          <p class="text-sm text-gray-600">3 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/ad.jpg') }}" alt="Anthony Davis" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Anthony Davis</h3>
          <p class="text-sm text-gray-600">10 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/luka.jpg') }}" alt="Luka Doncic" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Luka Doncic</h3>
          <p class="text-sm text-gray-600">9 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/rui.jpg') }}" alt="Rui Hachimura" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Rui Hachimura</h3>
          <p class="text-sm text-gray-600">7 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/ar.jpg') }}" alt="Austin Reaves" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Austin Reaves</h3>
          <p class="text-sm text-gray-600">6 artworks</p>
        </div>
      </div>

      <div class="artistCarousel2 flex-shrink-0 w-[260px] bg-white p-4 rounded-2xl shadow inline-flex items-center gap-4">
        <img src="{{ asset('images/profileused/lbj.jpg') }}" alt="Artist 1" class="w-16 h-16 rounded-full object-cover">
        <div>
          <h3 class="text-lg font-semibold text-[#6E4D41]">Aeron Jead Marquez</h3>
          <p class="text-sm text-gray-600">15 artworks</p>
        </div>
      </div>

      <!-- Repeat other artist cards as needed -->

    </div>
  </div>

  <!-- Button -->
  <div class="flex justify-center mt-10">
    <a href="{{ route('artists', ['category' => 'artists']) }}" style="text-decoration:none;" class="blob-btn h-[50px] w-1/2 px-6 flex items-center justify-center">
      FIND MORE ARTIST
      <span class="blob-btn__inner">
        <span class="blob-btn__blobs">
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
          <span class="blob-btn__blob"></span>
        </span>
      </span>
    </a>
  </div>
</section>

<!-- Featured Paintings--> 
<section id="featured-paintings-section" class="mt-10 bg-[#F6EBDA] py-5 w-[80%] mx-auto shadow-md opacity-0 translate-y-10 transition-all duration-500" style="border-radius:20px; max-width: 90%;">
<div class="container">
        <div class="row align-items-center">
            <!-- Carousel Column -->
            <div  class="col-md-5 mx-auto ">
                <div id="paintingsCarousel" class="carousel slide " data-bs-ride="carousel">
                    <div style="border-radius:10px;" class="carousel-inner ">
                        <div class="carousel-item active">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting1.png') }}" class="card-img-top" alt="Wallowing Breeze">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Flora Flore Nomi</h5>
                                    <p class="text-muted">Aeron Jead Marquez</p>
                                    <p class="text-muted fst-italic">Oil on canvas, 2008</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting2.png') }}" class="card-img-top" alt="Wallowing Breeze">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Tuxedo Cat</h5>
                                    <p class="text-muted">Aeron Jead Marquez</p>
                                    <p class="text-muted fst-italic">Oil on canvas, 2008</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting3.png') }}" class="card-img-top" alt="Golden Horizon">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Golden Horizon</h5>
                                    <p class="text-muted">Ria Arante</p>
                                    <p class="text-muted fst-italic">Acrylic on canvas, 2015</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting4.png') }}" class="card-img-top" alt="Serene Dusk">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Serene Dusk</h5>
                                    <p class="text-muted">Lorenzo Mendez</p>
                                    <p class="text-muted fst-italic">Watercolor, 2020</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting4.png') }}" class="card-img-top" alt="Serene Dusk">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Serene Dusk</h5>
                                    <p class="text-muted">Lorenzo Mendez</p>
                                    <p class="text-muted fst-italic">Watercolor, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Indicators -->
                    <div class=" carousel-indicators">
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" style="background-color: brown;"></button>
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: brown;"></button>
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="2" aria-label="Slide 3" style="background-color: brown;"></button>
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="3" aria-label="Slide 4" style="background-color: brown;"></button>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="mr-10 carousel-control-prev" type="button" data-bs-target="#paintingsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#paintingsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>



                </div>
            </div>

            <!-- Description Column -->
            <div class="col-md-6 mr-10 align-self-start">
                <h1 class="fw-bold text-[50px] text-[#6E4D41] mt-20">Featured Paintings</h1>
                <h2 class="fw-semibold text-[20px] text-[#6E4D41] mt-10">Discover a collection of exceptional artworks from talented local artists in Albay. </h2>

                <p class="text-[#8D6E63] text-[15px]  text-justify mb-30">
                    Immerse yourself in a world of color, emotion, and creativity with our handpicked selection of featured paintings. From stunning landscapes to expressive portraits, each piece is a testament to the talent of Albay’s local artists. Find the perfect artwork to inspire your space and be part of the growing art community.
                </p>
                <a href="{{ route('category', ['category' => 'paintings']) }}" style="text-decoration:none;" class="blob-btn h-[50px] w-1/2 px-6 flex items-center justify-center">
                Explore Now
                <span class="blob-btn__inner">
                    <span class="blob-btn__blobs">
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                        <span class="blob-btn__blob"></span>
                    </span>
                </span>
                </a>


            </div>

            </div>
        </div>
    </section>


    <script>
  // Intersection Observer to trigger animation when the section is in view
  document.addEventListener('DOMContentLoaded', function () {
    const section = document.getElementById('art-section');
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Add class to animate section when in view
          entry.target.classList.add('opacity-100', 'translate-y-0');
          observer.unobserve(entry.target); // Stop observing once the animation is triggered
        }
      });
    }, {
      threshold: 0.5 // Trigger animation when 50% of the section is in view
    });

    observer.observe(section);
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const section1 = document.getElementById('featured-paintings-section');

    const observer1 = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('opacity-100', 'translate-y-0');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.5
    });

    observer1.observe(section1);
  });
</script>
