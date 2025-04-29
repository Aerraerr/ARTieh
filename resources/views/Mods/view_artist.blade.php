<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Artist</title>
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body  class="bg-white text-gray-900">

    @include('layouts.forNav')
@extends('layouts.forbg')
   
<section>    
    <div class="container-fluid ">
        <div class="bg-white pb-4  rounded-md shadow-lg border mx-auto max-w-[100%]   relative">
        
            <div class="w-full bg-[#F6EBDA] min-h-[400px]  flex flex-col md:flex-row justify-center mb-3 py-5 px-3 md:px-20 lg:px-32 xl:px-40 gap-6">
               
            <div class="flex flex-col items-center w-[50%] ">
            <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
              <img id="profileImage" src="{{ asset('storage/' . $artist->profile_pic) }}" alt="Profile Photo" class="object-cover w-full h-full" />
            </div>     
            <h1 class="mt-3 px-4 py-2 text-[#6E4D41] font-bold text-2xl">{{ $artist->full_name }}</h1>
            <div class="flex items-center text- gap-2">
             <label class=>{{ $artist->email }}</label>
             <div class="bg-[#6E4D41] border-l h-4 w-[1.5px]"></div>
             <label class=>Seller</label>
          </div>
            <div class="flex row text-center w-[500px] h-[50px] overflow-hidden">
            <p id="bioText" class="mt-1 px-4  text-[#6E4D41]"> {{ $artist->bio }} </p>
            </div>
            <button id="showMoreContainer" class="mt-2 text-sm text-[#6E4D41] font-bold hover:underline"  
            data-bs-toggle="modal" data-bs-target="#ViewmoreModal" aria-label="View more">
          Show full bio
          </button>

     

          <div class="relative mt-3 flex items-center text- gap-2">
          <div class="pr-2">
          <button>
            <button onclick="toggleModal('share-modal')"><img src="{{ asset('images/SHARE.svg') }}" alt="copylink icon"  class="w-7 h-7 hover:opacity-80 transition-opacity"></button>
          </button>
          </div>
          <button class="whitespace-nowrap px-4 py-2 text-[#6E4D41] rounded-full bg-white font-medium hover:bg-[#5a3c32] transition duration-300"
          data-bs-toggle="modal" data-bs-target="#MessageModal" aria-label="View more">
          Message</button>
          <button class="whitespace-nowrap px-3 py-2 text-white rounded-full  bg-[#6E4D41] font-medium hover:bg-[#5a3c32] transition duration-300">Rate</button>
          <div class="pl-2">
          <button>
            <img src="{{ asset('images/REPORT.svg') }}" alt="copylink icon"  class="w-7 h-7 hover:opacity-80 transition-opacity">
          </button>
          </div>
          </div>
        
          
          
            </div>

          </div>


          <div class="relative mb-3 flex justify-center text- gap-10 mt-4">
            <h1  class="text-lg text-[#6E4D41] font-bold">AVAILABLE ARTWORKS</h1>
          </div>
          <div id="Viewpaintings" class="tab-content">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 p-3">
              @forelse($artist->artworks->filter(fn($artwork) => $artwork->orderItems->isEmpty()) as $artwork)
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
        
          <div class="relative mb-3 flex justify-center text- gap-10 mt-4">
            <h1  class="text-lg text-[#6E4D41] font-bold">SOLD ARTWORKS</h1>
          </div>
          <div id="Viewpaintings" class="tab-content">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 p-3">
              @forelse($artist->artworks->filter(fn($artwork) => $artwork->orderItems->isNotEmpty()) as $artwork)
                <div class="relative w-full overflow-hidden ">
                    <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl">
                      <div class="absolute top-2 right-2 bg-white text-red-600 text-xs font-bold px-2 py-1 border border-red-600 rounded-lg shadow">
                      SOLD
                    </div>
                    <div class="mt-1 p-0 flex row items-center">
                        <h3 class="font-bold text-sm">{{$artwork->artwork_title}}</h3>
                    </div>
                </div>
              @empty
                <p class="col-span-5 text-center text-gray-500">No artworks to display.</p>
              @endforelse
            </div>
          </div>

          </div>

                
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

<!-- share modal -->
<div id="share-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white w-[400px] rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6e4d41]">Share Profile</h2>
        <p class="text-sm text-gray-600 mt-2">Share this artist with your friends...</p>

        <!--<Modal Buttons -->
        <div class="flex justify-end gap-3 mt-4">
            <button onclick="toggleModal('share-modal')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Close</button>
            <button id="copyLinkBtn" onclick="copyLink()" class="px-4 py-2 bg-[#6e4d41] text-white rounded-lg hover:bg-[#5a3c32]">Copy Link</button>
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
        const tempInput = document.createElement('input');
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