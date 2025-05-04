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
     @include('Mods.forNotif')
     @include('Mods.forChat')
    
     <section>
    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%] sm:max-w-[100%]">
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

        <!-- Event List -->
        <!-- Centered Event List -->
<div class="flex justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center">
        @forelse($events as $event)
            <div class="w-full max-w-[400px] h-auto rounded-xl shadow-lg bg-white">
                <!-- Image Section -->
                <div class="w-full h-[230px] rounded-t-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $event->event_img) }}" alt="{{ $event->event_name }}" class="w-full h-full object-cover" />
                </div>

                <!-- Content Section -->
                <div class="p-4">
                    <div class="flex flex-col md:flex-row justify-between md:items-start space-y-4 md:space-y-0">
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
                                <p>👥 {{ $event->attendees->count() }} Attending</p>
                            </div>

                            @auth
                                <!-- Button for logged-in users -->
                                <button class="bg-[#6E4D41] text-white px-4 py-2 rounded whitespace-nowrap hover:bg-[#5a3e34] transition-colors w-full md:w-auto"
                                    data-bs-toggle="modal" data-bs-target="#ViewDetailsModal{{$event->id}}">
                                    Event Info
                                </button>
                            @else
                                <!-- Disabled button for guests -->
                                <button class="bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed w-full md:w-[200px]" disabled>
                                    Please log in to view details
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Details Modal -->
            @auth
                <div class="modal fade" id="ViewDetailsModal{{$event->id}}" tabindex="-1" aria-labelledby="ViewDetailsModalLabel{{$event->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="space-y-1 mb-4">
                                    <h5 class="modal-title text-xl font-semibold text-[#6E4D41]" id="ViewDetailsModalLabel{{$event->id}}">{{ $event->event_name }}</h5>
                                    <p class="text-[#6E4D41] text-start flex items-center gap-2">
                                        <img src="images/calendar.svg" class="w-4 h-4">
                                        <span class="text-sm font-medium">WHEN:</span>
                                        <span class="text-sm text-gray-600">{{ $event->event_date }}</span>
                                    </p>
                                    <p class="text-[#6E4D41] text-start flex items-center gap-2">
                                        <img src="images/person.svg" class="w-4 h-4">
                                        <span class="text-sm font-medium">ORGANIZER:</span>
                                        <span class="text-sm text-gray-600">{{ $event->organizer_name }}</span>
                                    </p>
                                    <div class="flex text-sm text-[#6E4D41] text-start space-x-1">
                                        <img src="images/location.svg">
                                        <span class="font-medium">LOCATION:</span>
                                        <span class="text-gray-600 flex-1">{{ $event->location }}</span>
                                    </div>
                                    <div class="pt-2">
                                        <p class="text-sm text-[#6E4D41] font-medium">DESCRIPTION:</p>
                                        <p class="text-sm text-gray-600">{{ $event->event_description }}</p>
                                    </div>
                                </div>

                                <!-- Buttons aligned to the right -->
                                <div class="flex justify-end space-x-2 pt-2">
                                    <form action="{{ route('events.attend', $event->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-[#6E4D41] text-white px-4 py-2 rounded hover:bg-[#5a3e34] transition-colors text-sm">
                                            Notify Me!
                                        </button>
                                    </form>
                                    <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition-colors text-sm" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
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
<!-- Add Event Modal -->
<div id="addevent-modal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true"
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
  <div class="bg-white rounded-lg w-full max-w-2xl shadow-lg overflow-y-auto max-h-[90vh]">

    <!-- Modal Header -->
    <div class="flex justify-between items-center px-4 sm:px-6 py-4 border-b">
      <h5 class="text-[#6E4D41] text-xl sm:text-2xl font-semibold">Add Event</h5>
      <button onclick="toggleModal('addevent-modal')" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
    </div>

    <!-- Modal Body -->
    <form action="{{ route('events.add', auth()->id()) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="p-4 sm:p-6 space-y-4">

        <!-- Event Photo -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Event Photo</label>
          <div>
            <label for="event_img" class="cursor-pointer inline-block">
              <img src="images/add_photo.svg" alt="Upload Image"
                   class="w-24 h-12 border-2 border-dashed border-gray-300 p-2">
            </label>
            <input id="event_img" name="event_img" type="file" class="hidden">
          </div>
        </div>

        <!-- Event Name -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Event Name</label>
          <input type="text" name="event_name" placeholder="Event name" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Organizer -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Organizer</label>
          <input type="text" name="organizer_name" placeholder="Organizer name" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Event Date -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Event Date</label>
          <input type="date" name="event_date" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Location -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Location</label>
          <input type="text" name="location" placeholder="zone/barangay/municipality/district" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Description -->
        <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700 mt-1 sm:mt-2">Description</label>
          <textarea name="event_description" placeholder="Event description" rows="4" required
                    class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]"></textarea>
        </div>

        <!-- Footer Buttons -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
          <button type="button" onclick="toggleModal('addevent-modal')"
                  class="w-full sm:w-auto px-6 py-2 rounded text-gray-600 border border-gray-300 hover:bg-gray-100 transition">
            Cancel
          </button>
          <button type="submit"
                  class="w-full sm:w-auto px-6 py-2 rounded text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">
            Save
          </button>
        </div>

      </div>
    </form>
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


