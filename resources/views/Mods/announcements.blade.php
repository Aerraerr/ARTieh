<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body  class="bg-white text-gray-900 min-h-screen max-h-[100vh]">
    @include('layouts.forNav')
    @extends('layouts.forbg')
    
    <section>
    <div class="bg-white p-8 rounded-lg shadow-lg border mx-auto max-w-[100%] sm:max-w-[100%]">
        <!-- Header Section -->
        <div class="text-center">
            <h4 class="font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl">Upcoming Fairs and Events</h4>
            <h5 class="text-[#6E4D41] text-sm italic mt-2 mx-auto max-w-4xl">
                Join us for exciting fairs and events that celebrate creativity, culture, and community. Don’t miss the chance to experience art in a whole new way.
            </h5>
        </div>

        <!-- Horizontal Line -->
        <div class="mt-6 mb-8">
            <hr class="border-t border-[#6E4D41] w-24 mx-auto">
        </div>

        <!-- Centered Event List -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center">
                @forelse($events as $event)
                <div class="w-full max-w-[400px] h-auto rounded-xl shadow-lg bg-white">
                    <!-- Image Section -->
                    <div class="w-full h-[230px] rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $event->event_img) }}" alt="{{ $event->event_name }}"
                            class="w-full h-full object-cover" />
                    </div>

                    <!-- Content Section -->
                    <div class="p-4">
                        <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0">
                            <!-- Left Info -->
                            <div class="space-y-2">
    <h5 class="text-xl font-semibold text-[#6E4D41]">{{ $event->event_name }}</h5>

    @auth
        <p class="text-[#6E4D41] text-sm">
            <span class="font-medium">WHEN:</span>
            <span class="text-gray-600">{{ $event->event_date }}</span>
        </p>
        <p class="text-[#6E4D41] text-sm">
            <span class="font-medium">ORGANIZER:</span>
            <span class="text-gray-600">{{ $event->organizer_name }}</span>
        </p>
        <div class="flex text-sm text-[#6E4D41] text-start space-x-1">
            <span class="font-medium">LOCATION:</span>
            <span class="text-gray-600 flex-1">{{ $event->location }}</span>
        </div>
    @endauth
</div>

                            <!-- Right Actions -->
                            <div class="flex flex-col items-start md:items-end space-y-2 w-full md:w-auto">
                                <div class="flex items-center space-x-2 text-sm text-[#6E4D41]">
                                    <p>👥 12 Attending</p>
                                </div>

                                @auth
                                    <!-- Button for logged-in users -->
                                    <button class="bg-[#6E4D41] text-white px-4 py-2 rounded whitespace-nowrap hover:bg-[#5a3e34] transition-colors w-full md:w-auto"
                                        data-bs-toggle="modal" data-bs-target="#ViewDetailsModal">
                                        Event Info
                                    </button>
                                @else
                                    <!-- Disabled button for guests or non-logged-in users -->
                                    <button class="bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed w-full md:w-[200px]" disabled>
                                        Please log in to view details
                                    </button>
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500 col-span-full">No events found.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>


        



    <div class="flex items-center justify-center min-h-screen bg-transparent">
        <div class="bg-[#F6EBDA] p-8 rounded-lg shadow-md max-w-4xl w-full text-center">
            <h2 class="text-2xl font-bold text-[#6E4D41] mb-6">Share Your Event in Albay</h2>
            <p class="text-gray-600 mb-6">Are you hosting an art fair, gallery, or creative event? Let the community know! Upload your event and bring more people together to celebrate local artistry.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('iconused/host.png') }}" alt="Host Event" class="w-16 h-16 mb-4">
                    <h5 class="font-semibold text-[#6E4D41]">Host an Event</h5>
                    <p class="text-[#6E4D41] text-sm">Organizing an art exhibit or fair? Spread the word to reach more people.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('iconused/upload.png') }}" alt="Upload Details" class="w-16 h-16 mb-4">
                    <h5 class="font-semibold text-[#6E4D41]">Upload Your Event</h5>
                    <p class="text-[#6E4D41] text-sm">Easily submit your event details and get featured on ARTieh.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('iconused/usernetwork.png') }}" alt="Engage Community" class="w-16 h-16 mb-4">
                    <h5 class="font-semibold text-[#6E4D41]">Engage the Community</h5>
                    <p class="text-[#6E4D41] text-sm">Connect with artists, visitors, and enthusiasts across Albay.</p>
                </div>
            </div>
            @auth
                <div class="mt-6">
                    <button onclick="toggleModal('addevent-modal')" class="bg-[#6E4D41] text-white py-2 px-6 rounded-lg hover:bg-[#594639] transition">Submit Your Event</button>
                </div>
            @endauth
            @guest
                <div class="mt-6">
                    <button onclick="window.location.href='{{ route('show.login') }}'" class="bg-[#6E4D41] text-white py-2 px-6 rounded-lg hover:bg-[#594639] transition">Submit Your Event</button>
                </div>
            @endguest
        </div>
    </div>
<!-- Include the event modals -->

    <!-- add event modal -->
    @auth
    <div id="addevent-modal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-fullscreen-sm-down modal-dialog-centered">
            <div class="modal-content">
        
                <div class="modal-header">
                    <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">ADD EVENT</h5>
                    <button onclick="toggleModal('addevent-modal')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <div class="modal-body mx-auto max-w-[100%] sm:max-w-[100%]">
                    <div class="flex flex-col lg:flex-row gap-8 items-stretch">
                    <div class="hidden lg:block border-l  h-auto min-h-[100px] mx-4"></div>
            
                <form action="{{ route('events.add', auth()->id()) }}" method="POST" enctype="multipart/form-data">
                @csrf  
                <!-- Event Form Section -->
                <div class="lg:w-2/3">

                    <div class="mb-4 flex items-center gap-4">
                        <label class="block font-semibold text-gray-700 w-[100px]">Add Event Photo</label>
                        <label for="event_img" class="cursor-pointer">
                            <img src="images/add_photo.svg" alt="Upload Image" class="w-20 h-10 border-2 border-dashed border-gray-300 p-2">
                                </label>
                                <input id="event_img" name="event_img" type="file" class="hidden">     
                                </label>
                    </div>

                    <div class="mb-4 flex items-center gap-6">
                    <label class="block font-semibold text-gray-700 w-[100px]">Event Name</label>
                    <input type="text" name="event_name" placeholder="Event name" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
                    </div>

                    <div class="mb-4 flex items-center gap-6">
                    <label class="block font-semibold text-gray-700 w-[100px]">Organizer name</label>
                    <input type="text" name="organizer_name" placeholder="Organizer name" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
                    </div>

                    <div class="mb-4 flex items-center gap-6">
                    <label class="block font-semibold text-gray-700 w-[100px]">Event Date</label>
                    <input type="date" name="event_date" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
                    </div>

                    <div class="mb-4 flex items-center gap-4">
                    <label class="block font-semibold text-gray-700 w-[100px]">Location</label>
                    <input type="text" name="location" placeholder="zone/barangay/municipality/district" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
                    </div>

                    <div class="mb-4 flex items-center gap-4">
                            <label for="description" class="block font-semibold text-gray-700 w-[100px]" required>Description:</label>
                                <textarea name="event_description" placeholder="Event description" rows="4" 
                            class="w-[350px] px-4 py-2 border focus:ring focus:ring-[#6E4D41] outline-none mt-1" required></textarea>
                        </div>
                        
                        <div class="flex justify-end space-x-4">
                            <button onclick="toggleModal('addevent-modal')" class="px-6 py-2 rounded text-gray-600 border  hover:bg-gray-100">Cancel</button>
                            <button type="submit" class="px-6 py-2 rounded text-white bg-[#6E4D41]  hover:bg-[#5a3d33] transition">Save</button>
                        </div>
                </div>
                </form>  
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- View Details Modal -->
    
<div class="modal fade" id="ViewDetailsModal" tabindex="-1" aria-labelledby="ViewDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="space-y-1 mb-4">
          <h5 class="modal-title text-xl font-semibold text-[#6E4D41]" id="ViewDetailsModalLabel">Swimming</h5>
          <p class="text-[#6E4D41] text-start flex items-center gap-2">
          <img src="images/calendar.svg" class="w-4 h-4">
            <span class="text-sm font-medium">WHEN:</span>
            <span class="text-sm text-gray-600">30 May 2025, 3.30 PM - 10.00 PM</span>
          </p>
          <p class="text-[#6E4D41] text-start flex items-center gap-2">
  <img src="images/person.svg" class="w-4 h-4">
  <span class="text-sm font-medium">ORGANIZER:</span>
  <span class="text-sm text-gray-600">Cedricku</span>
</p>
          <div class="flex text-sm text-[#6E4D41] text-start space-x-1">
          <img src="images/location.svg">
            <span class="font-medium">LOCATION:</span>
            <span class="text-gray-600 flex-1">Beach party</span>
          </div>
          <div class="pt-2">
            <p class="text-sm text-[#6E4D41] font-medium">DESCRIPTION:</p>
            <p class="text-sm text-gray-600">Magugma at suliting ang bakasyon sa pa outing ni cedrick mari na kamo</p>
          </div>
        </div>
        
        <!-- Buttons aligned to the right -->
        <div class="flex justify-end space-x-2 pt-2">
          <button
            class="bg-[#6E4D41] text-white px-4 py-2 rounded hover:bg-[#5a3e34] transition-colors text-sm"
          >
            Notify Me!
          </button>
          <button
            class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition-colors text-sm"
            data-bs-dismiss="modal"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>



    
</div>
    @endauth


@include('layouts.footer')
</html>
</body>
<!-- JavaScript for Modal Functionality -->
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
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


