<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Artist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body style="height:auto;" class="bg-white text-gray-900">

    @include('layouts.forNav')

   
    <section class="w-full">
    <div class="w-full bg-white pb-4 rounded-md shadow-lg border relative">
        
        <!-- Header Section -->
        <div class="w-full bg-[#F6EBDA] min-h-[300px] flex flex-col md:flex-row justify-center items-center mb-3 py-5 px-4 sm:px-6 md:px-10 lg:px-20 xl:px-32 gap-4 sm:gap-6">
            <div class="flex flex-col items-center w-full max-w-md md:w-1/2 lg:w-1/3">
                <div class="w-24 h-24 sm:w-30 sm:h-30 md:w-40 md:h-40 rounded-full overflow-hidden">
                    <img id="profileImage" src="{{ $artist->profile_pic ? asset('storage/' . $artist->profile_pic) : asset('storage/profile_pic/user.png') }}" alt="Profile Photo" class="object-cover w-full h-full" />
                </div>

                <h1 class="mt-3 px-4 py-2 text-[#6E4D41] font-bold text-xl sm:text-2xl text-center">{{ $artist->full_name }}</h1>
                <p class="text-[#6E4D41] font-bold text-lg sm:text-lg text-center">Rating 4.6</p>
                <div class="flex items-center gap-2 text-sm sm:text-base text-[#6E4D41]">
                    <span>{{ $artist->email }}</span>
                    <div class="bg-[#6E4D41] h-4 w-[1.5px]"></div>
                    <span>Seller</span>
                </div>

                <div class="flex flex-row text-center w-full max-w-[90%] sm:max-w-[400px] mt-2">
                    <p id="bioText" class="px-4 text-[#6E4D41] text-sm sm:text-base line-clamp-3">{{ $artist->bio }}</p>
                </div>

                <button id="showMoreContainer" class="mt-2 text-sm text-[#6E4D41] font-bold hover:underline" data-bs-toggle="modal" data-bs-target="#ViewmoreModal" aria-label="View more">
                    Show full bio
                </button>

                <div class="relative mt-4 flex flex-wrap justify-center gap-3 sm:gap-4">
                    <button onclick="toggleModal('share-modal')">
                        <img src="{{ asset('images/SHARE.svg') }}" alt="Share icon" class="w-6 h-6 sm:w-7 sm:h-7 hover:opacity-80 transition-opacity" />
                    </button>
                    <a href="{{route('user', $artist->id)}}" class="px-3 py-1.5 no-underline sm:px-4 sm:py-2 text-[#6E4D41] rounded-full bg-white font-medium hover:bg-[#5a3c32] transition duration-300 text-sm sm:text-base">
                        Message
                    </a>
                    <button class="px-3 py-1.5 sm:px-4 sm:py-2 text-white rounded-full bg-[#6E4D41] font-medium hover:bg-[#5a3c32] transition duration-300 text-sm sm:text-base" data-bs-toggle="modal" data-bs-target="#RateArtist" style="cursor: pointer;">
                        Rate
                    </button>
                </div>
            </div>
        </div>

        <!-- Available Artworks -->
        <div class="relative mb-3 flex justify-center text- gap-10 mt-4">
            <h1  class="text-lg text-[#6E4D41] font-bold">AVAILABLE ARTWORKS</h1>
          </div>
          <div id="Viewpaintings" class="tab-content">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 p-3">
              @forelse($artist->artworks->filter(function($artwork) {
                  return $artwork->orderItems->isEmpty() ||
                        $artwork->orderItems->first(fn($oi) => optional($oi->order)->status_id == 5);
              }) as $artwork)
                <div class="relative w-full overflow-hidden ">
                    <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl">
                    <div class="mt-1 p-0 flex row items-center">
                        <h3 class="font-bold text-sm">{{$artwork->artwork_title}}</h3>
                    </div>
                </div>
              @empty
                <p class="col-span-5 text-center text-gray-500">No artworks to display.</p>
              @endforelse
            </div>
          </div>

        <!-- Sold Artworks -->
        <div class="relative mb-3 flex justify-center text- gap-10 mt-4">
            <h1  class="text-lg text-[#6E4D41] font-bold">UNAVAILABLE ARTWORKS</h1>
          </div>
          <div id="Viewpaintings" class="tab-content">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 p-3">
              @forelse($artist->artworks->filter(fn($artwork) => $artwork->orderItems->isNotEmpty()) as $artwork)
              @php
                  $completedOrder = $artwork->orderItems->first(fn($oi) => optional($oi->order)->status_id == 4);
                  $inProgressOrder = $artwork->orderItems->first(fn($oi) => in_array(optional($oi->order)->status_id, [1, 2, 3]));
              @endphp

              @if($completedOrder)
                <div class="relative w-full overflow-hidden">
                  <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl" alt="{{ $artwork->artwork_title }}" data-bs-toggle="modal" data-bs-target="#viewReview{{$artwork->id}}" style="cursor: pointer;">
                  <div class="absolute top-2 right-2 bg-white text-red-600 text-xs font-bold px-2 py-1 border border-red-600 rounded-lg shadow max-w-[60px] sm:max-w-[80px] md:max-w-[100px]">
                    SOLD
                  </div>
                    <div class="mt-1 p-0 flex row items-center">
                    <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                    </div>
                  </div>

                      <!-- Sa Sold ini na pang view -->
                          <div class="modal fade" id="viewReview{{$artwork->id}}" tabindex="-1" aria-labelledby="viewReview{{$artwork->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-4">
                                    @php
                                        // Find the order with status 4 (completed) for the current artwork
                                        $completedOrder = $artwork->orderItems->filter(function ($orderItem) {
                                            return optional($orderItem->order)->status_id == 4;
                                        })->first()->order ?? null;
                                    @endphp

                                    <div class="modal-header">
                                        <p class="modal-title font-bold">Rate by: {{$completedOrder->user->full_name ?? 'Unknown Buyer'}}</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    @if($completedOrder && $completedOrder->review)
                                      <div class="modal-body text-center">
                                          <p class="font-bold mb-2">Artist Rating:</p>
                                          <p class="text-yellow-400 text-3xl">{{ str_repeat('★', $completedOrder->review->artist_rating) }}</p>

                                          <p class="font-bold mt-4 mb-2">Artwork Rating:</p>
                                          <p class="text-yellow-400 text-3xl">{{ str_repeat('★', $completedOrder->review->artwork_rating) }}</p>

                                          <p class="font-bold mt-4 mb-2">Comment:</p>
                                          <p class="text-gray-600">{{ $completedOrder->review->comment ?? 'No comment provided.' }}</p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    @else
                                      <p class="font-bold mt-4 mb-2 p-4 text-center"> This artwork has no review submitted.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
              @elseif($inProgressOrder)
                  {{-- PENDING / IN PROGRESS ARTWORK --}}
                  <div class="relative w-full overflow-hidden">
                      <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl" alt="{{ $artwork->artwork_title }}">
                      <div class="absolute top-2 right-2 bg-white text-yellow-600 text-xs font-bold px-2 py-1 border border-yellow-600 rounded-lg shadow">
                          ON PROGRESS
                      </div>
                      <div class="mt-1 p-0 flex row items-center">
                          <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                      </div>
                  </div>
              @endif
              @empty
                <p class="col-span-5 text-center text-gray-500">No artworks to display.</p>
              @endforelse
            </div>
          </div>
    </div>
</section>



  <!-- VIEW  MORE MODAL -->
    <div class="modal fade" id="ViewmoreModal" tabindex="-1" aria-labelledby="ViewmoreModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-white text-[#6E4D41]">
      <div class="modal-header">
        <h3 class="modal-title font-bold" id="editAddressLabel">Bonak Kid's Full Bio</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz I like Ratzzz
      </div>
     
    </div>
  </div>
</div>

<!-- MESSAGE MODAL -->
<div class="modal fade" id="MessageModal" tabindex="-1" aria-labelledby="MessageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm  modal-dialog-centered">
    <div class="modal-content bg-white text-[#6E4D41] rounded-md">
      <div class="modal-body ">
      <div class="flex flex-col items-center">
      <textarea 
    class="w-full h-[100px] p-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-[#6E4D41]" 
    placeholder="Add a message">
  </textarea>
  <button 
    class="w-[150px] mt-2 py-2 text-white font-semibold rounded-full bg-[#6E4D41] ">
    Send
  </button>
      </div>
      </div>
     
    </div>
  </div>
</div>

<!-- RateArtist Modal -->
<div class="modal fade" id="RateArtist" tabindex="-1" aria-labelledby="RateArtistLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="flex justify-end p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="text-center">
              <h1 class="text-xl sm:text-2xl md:text-4xl font-bold mb-2 sm:mb-4">Rate Artist</h1>
                    <p class="text-[#6E4D41] font-bold mb-4">{{ $artist->full_name }}</p>
                    <div class="flex flex-row items-center justify-center gap-2 mb-6">
                        <div class="flex flex-col items-center">
                            <img id="rating-icon5" src="{{ asset('images/Rating5.svg') }}" alt="Rating 5 stars" aria-label="Rate 5 stars" class="w-10 h-10 cursor-pointer transition-all duration-300" onclick="toggleRating(5)" />
                            <p class="text-[#6E4D41] font-bold w-10 text-center mt-1">1</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img id="rating-icon4" src="{{ asset('images/Rating4.svg') }}" alt="Rating 4 stars" aria-label="Rate 4 stars" class="w-10 h-10 cursor-pointer transition-all duration-300" onclick="toggleRating(4)" />
                            <p class="text-[#6E4D41] font-bold w-10 text-center mt-1">2</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img id="rating-icon3" src="{{ asset('images/Rating3.svg') }}" alt="Rating 3 stars" aria-label="Rate 3 stars" class="w-10 h-10 cursor-pointer transition-all duration-300" onclick="toggleRating(3)" />
                            <p class="text-[#6E4D41] font-bold w-10 text-center mt-1">3</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img id="rating-icon2" src="{{ asset('images/Rating2.svg') }}" alt="Rating 2 stars" aria-label="Rate 2 stars" class="w-10 h-10 cursor-pointer transition-all duration-300" onclick="toggleRating(2)" />
                            <p class="text-[#6E4D41] font-bold w-10 text-center mt-1">4</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img id="rating-icon1" src="{{ asset('images/Rating1.svg') }}" alt="Rating 1 star" aria-label="Rate 1 star" class="w-10 h-10 cursor-pointer transition-all duration-300" onclick="toggleRating(1)" />
                            <p class="text-[#6E4D41] font-bold w-10 text-center mt-1">5</p>
                        </div>
                    </div>

      <div class="flex justify-center gap-4 p-4">
        <button class="px-4 py-2 bg-[#6E4D41] text-white rounded-md hover:bg-[#5a3e34]">Send</button>
        <button class="px-4 py-2 border-3 border-[#6E4D41] text-gray-800 rounded-md hover:bg-gray-300" data-bs-dismiss="modal">Cancel</button>
      </div>
</div>
</div>
          
        </div>
    </div>
</div>
<!-- Sa Sold ini na pang view -->
<div class="modal fade" id="viewReview" tabindex="-1" aria-labelledby="viewReview" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-4">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-bold">Rating</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4 class="font-bold mb-2">Artist Rating:</h4>
                                        <p class="text-yellow-400 text-3xl"></p>

                                        <h4 class="font-bold mt-4 mb-2">Artwork Rating:</h4>
                                        <p class="text-yellow-400 text-3xl"></p>

                                        <h4 class="font-bold mt-4 mb-2">Comment:</h4>
                                        <p class="text-gray-600"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>



<!-- Script for Show More -->   
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const bioText = document.getElementById('bioText');
    const showMoreContainer = document.getElementById('showMoreContainer');

    const wordCount = bioText.innerText.trim().split(/\s+/).length;

    if (wordCount <= 50) {
      showMoreContainer.style.display = 'none';
    }
  });
</script>
    <!--SCRIPT TO HIDE MESSAGE MODAL -->
<script>
    function toggleMessageModal() {
        const modal = document.getElementById('messageModal');
        modal.classList.toggle('hidden');
    }
</script>

    
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

<script>
    // Function to copy the profile link
    function copyLink() {
        // Assuming you have a dynamic URL for the user's profile
        const profileUrl = window.location.href; // Get the current page URL, or set your own URL

        // Create a temporary input element to use the clipboard API
        const tempInput = document.createElement('ipnut');
        document.body.appendChild(tempInput);
        tempInput.value = profileUrl;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        Swal.fire({
                title: "Link copied!",
                icon: "success",
                timer: 800,
                showConfirmButton: false
            });

    }
</script>

<script>
let currentRating = 0; // Track the currently lit icon (0 means none)

function toggleRating(rating) {
    const basePath = "{{ asset('images/') }}".replace(/\/$/, ''); // Remove trailing slash

    // Toggle off if the same rating is clicked, otherwise set new rating
    currentRating = (currentRating === rating) ? 0 : rating;

    // Update all icons
    for (let i = 1; i <= 5; i++) {
        const icon = document.getElementById(`rating-icon${i}`);
        if (!icon) {
            console.error(`Icon with ID rating-icon${i} not found`);
            continue;
        }

        const defaultSrc = `${basePath}/Rating${i}.svg`; // e.g., /images/Rating1.svg
        const clickedSrc = `${basePath}/Rating${i}clicked.svg`; // e.g., /images/Rating1clicked.svg

        // Set clicked SVG only for the current rating, default for others
        icon.src = (i === currentRating) ? clickedSrc : defaultSrc;

        // Handle image load errors
        icon.onerror = () => {
            console.error(`Failed to load image: ${icon.src}`);
            icon.src = '{{ asset('images/fallback.svg') }}'; // Fallback image
        };
    }

    // Debug: Log the action
    console.log(`Set rating to ${currentRating}, Icon ${rating} toggled`);
}
</script>
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>
