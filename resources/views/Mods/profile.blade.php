<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{ asset('css/forprofile.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body  class="h-[1200px] bg-white text-gray-900">
    @include('layouts.forNav')
    @if(session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                timer: 800,
                showConfirmButton: false
            });
        </script>
    @endif
    <section class="w-full">
        <div class=" bg-[#F6EBDA] pb-4  border max-w-full relative">
            <div class=" md:ml-[100px] ml-[-10px] max-w-full  bg-[#F6EBDA] h-[400px] md:h-[350px] sm:mt-[-200px] md:mt-0 flex flex-col md:flex-row items-center justify-center p-6 md:p-[150px]">
            
                <button onclick="history.back()" style="font-family: Rubik;" class="text-[#6e4d41] opacity-60 ml-2 md:ml-12 mt-2 absolute top-2 left-2 md:top-5 md:left-10 md:-translate-x-10 no-underline text-inherit"> < BACK</button>

            <div class="sm:ml-0 ml-[25px] sm:mb-0 mb-[20px] border-5 border-[#6e4d41] rounded-full w-[150px] md:w-[220px] h-[150px] md:h-[220px] flex items-center justify-center shadow-md p-3 mt-5 md:mt-5">
                <div class="flex flex-col gap-5 bg-transparent  w-full h-full">
                    <a href="javascript:void(0);" @click="open = !open" class="w-full h-full">
                        <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('images/user.png') }}" alt="profile" class="cursor-pointer w-full h-full rounded-full">
                    </a>
                </div>
            </div>

            <div class="flex-1 pl-5 md:pl-10 w-full text-[#6e4d41] ">
                @if(Auth::user()->role === 'seller')
                    <h1 class="parasaprofileini font-extrabold text-lg md:text-2xl mb-2">
                        {{ Auth::user()->full_name }}
                    </h1>
                    <hr class="w-full h-[3px] my-2 bg-black text-[#6e4d41]">
                    <h2 class="parasaprofileiniuser1 my-1 font-medium text-sm mt-[-20px]">{{ ucfirst(strtolower(Auth::user()->role)) }} &nbsp;|&nbsp; Artist</h2>
                    <span class="font-bold">Biography:</span>
                    <h2 class="parasaprofileini2 my-1 font-medium text-sm mb-2 text-[#6e4d41] ">{{Auth::user()->biography ?? 'Enter your biography here...'}}</h2>
                    <br>
                    <div class="parasaprofileini3 gap-1 text-sm text-[#6e4d41]">
                        <span class="font-bold">Category: </span>
                        @foreach($artworks->unique('category_id') as $artwork)
                            <span class="bg-gray-100 text-green-800 px-2 py-1 rounded-full text-xs">{{ $artwork->category->category_name ?? 'Uncategorized' }} </span>
                        @endforeach
                    </div>
                @endif
                @if(Auth::user()->role === 'buyer')
                    <h1 class="parasaprofileini mb-2 font-extrabold text-lg md:text-xl">
                        {{ Auth::user()->full_name }}
                    </h1>
                    <hr class="w-full h-[3px] my-3 bg-black">
                    <h2 class=" parasaprofileiniuser1 my-1 font-medium text-sm ">{{ ucfirst(strtolower(Auth::user()->role)) }}</h2>
                    <h2 class="parasaprofileiniuser my-1 font-medium text-sm ">{{ Auth::user()->email }}</h2>
                    <h2 class="parasaprofileiniuser my-1 font-medium text-sm ">{{ Auth::user()->phone }}</h2>
                    <h2 class="parasaprofileiniuser my-1 font-medium text-sm ">{{ Auth::user()->address }}</h2>
                @endif
            </div>
            
            <div x-data="{ open: false }" class="profilemenu relative mt-6 md:mt-0 md:ml-10 sm:w-1/2 w-full max-w-sm text-center">
                <div class="md:hidden flex justify-end w-full">
                    <button @click="open = !open" :class="open ? 'text-white' : 'text-[#6e4d41]'"  class="overflowmenubtn text-20  text-[#6e4d41] mb-0 px-4 py-2 rounded text-3xl"> ⋮ </button>
                </div>
                <div :class="{'hidden': !open, 'block': open}" class="profilemenu2 absolute top-full right-0 mt-[-10] w-full rounded-md p-4 md:p-0 md:static md:grid md:grid-cols-1 md:gap-3">
                    @if(Auth::user()->role === 'seller')
                        <div class=" profilemenu2btns sm:bg-transparent md:bg-transparent bg-transparent">
                            <button onclick="toggleModal('editseller-modal')" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32]">
                                Edit Profile
                            </button>
                            <button onclick="toggleModal('upload-modal')" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32] ">
                                Upload Artwork
                            </button>
                            <button onclick="toggleModal('addevent-modal')" class=" mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32] "
                                data-bs-toggle="modal" data-bs-target="#addeventModal">
                                Add Event
                            </button> 
                            <button onclick="toggleModal('share-modal')" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32] ">
                                Share
                            </button>
                        </div>
                    @endif
                    @if(Auth::user()->role === 'buyer')
                    <div class="profilemenu2btns sm:bg-transparent md:bg-transparent bg-transparent">
                        <button onclick="toggleModal('editbuyer-modal')" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32]">
                            Edit Profile
                        </button>
                        <button onclick="toggleModal('addevent-modal')" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32]">
                            Add Event
                        </button>
                        <a style="text-decoration:none;" href="{{route('beSeller')}}"> <button style="text-decoration:none;" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32]">
                            Start Selling
                        </button></a>
                    </div>

                        

                    @endif
                </div>
            </div>

        </div>
        @include('Mods.ProfileModals')
    </div>

</section>
<div class=" bg-white forcurve z-1">
</div>

<section class="w-full px-4 sm:px-8">
    <div x-data="{ open: false }" class="relative ">
        <!-- Trigger Button -->
        <button @click="open = !open"
            class="w-15 sm:w-[200px] sm:mt-[-60px] mt-[-70px] sm:mr-0 mr-[-20px] absolute top-0 right-4 border p-2 bg-white rounded shadow hover:bg-gray-100">
            ☰ Menu
        </button>

        <!-- Floating Modal -->
        <div x-show="open" @click.away="open = false" x-transition
             class="absolute sm:right-4 right-0 sm:mt-[-20px] mt-[-30px] z-10 w-44 sm:w-48 bg-white rounded-xl shadow-lg p-3 border border-gray-200">
            <a href="{{ route('purchases') }}"
               class="block px-4 py-2 no-underline rounded-md text-gray-700 hover:bg-[#A99476] hover:text-white font-medium">
                Purchases
            </a>
            @if(Auth::user()->role === 'seller')
            <a href="{{ route('SellerDashboard') }}"
               class="block px-4 py-2 no-underline rounded-md text-gray-700 hover:bg-[#A99476] hover:text-white font-medium">
                Dashboard
            </a>
            @endif
        </div>
    </div>

    @if(Auth::user()->role === 'seller')
        <!-- Available Artworks -->
        <div class="mt-20 sm:mt-20 mb-3 flex justify-center">
            <h1 class="text-lg text-[#6E4D41] font-bold">AVAILABLE ARTWORKS</h1>
        </div>
        <div id="Viewpaintings" class="tab-content">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-2 sm:p-5">
                @forelse($artworks->filter(fn($artwork) => $artwork->orderItems->isEmpty()) as $artwork)
                    <div class="relative w-full overflow-hidden">
                        <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl">
                        <div class="mt-1 p-0 flex row items-center">
                            <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">No available artworks to display.</p>
                @endforelse
            </div>
        </div>

        <!-- Sold Artworks -->
        <div class="mb-3 flex justify-center mt-4">
            <h1 class="text-lg text-[#6E4D41] font-bold">SOLD ARTWORKS</h1>
        </div>
        <div id="Viewpaintings" class="tab-content">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-2 sm:p-5">
                @forelse($artworks->filter(fn($artwork) => $artwork->orderItems->isNotEmpty()) as $artwork)
                    <div class="relative w-full overflow-hidden">
                        <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl">
                        <div class="absolute top-2 right-2 bg-white text-red-600 text-xs font-bold px-2 py-1 border border-red-600 rounded-lg shadow">
                            SOLD
                        </div>
                        <div class="mt-1 p-0 flex row items-center">
                            <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">No sold artworks to display.</p>
                @endforelse
            </div>
        </div>
    @endif
    @if(Auth::user()->role === 'buyer')


    <!-- Info Message -->
    <div class="mb-3 mt-[70px] text-center">
        <p class="text-sm md:text-base text-[#6E4D41] font-semibold">
            Want to post your artworks? <a href="{{ route('beSeller') }}" class="underline text-[#5a3c32] hover:text-[#3e2a23]">Apply as a Seller</a> to start sharing your creations!
        </p>
    </div>

    <!-- Sold Artworks -->
    <div class="mb-3 flex justify-center mt-4">
        <h1 class="text-lg text-[#6E4D41] font-bold">SOLD ARTWORKS</h1>
    </div>
    <div id="Viewpaintings" class="tab-content">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-2 sm:p-5">
            @forelse($artworks->filter(fn($artwork) => $artwork->orderItems->isNotEmpty()) as $artwork)
                <div class="relative w-full overflow-hidden">
                    <img src="{{ asset($artwork->image_path) }}" class="w-full h-[250px] object-cover rounded-xl">
                    <div class="absolute top-2 right-2 bg-white text-red-600 text-xs font-bold px-2 py-1 border border-red-600 rounded-lg shadow">
                        SOLD
                    </div>
                    <div class="mt-1 p-0 flex row items-center">
                        <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">No sold artworks to display.</p>
            @endforelse
        </div>
    </div>
@endif

</section>


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
     //search filter sa artworks
    document.getElementById('artworkSearch').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const cards = document.querySelectorAll('.artwork-card');

        cards.forEach(card => {
            const title = card.getAttribute('data-title');
            if (title.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

<!-- JavaScript for Modal Functionality -->
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>

<!-- load and change the file/img selected in the modal -->
<script>
    // Attach an event listener to all image upload inputs
    document.querySelectorAll('input[type="file"][name="image"]').forEach(input => {
        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    // Find the nearest preview image within the same container
                    const container = e.target.closest('.flex');
                    const previewImg = container.querySelector('img#artworkImage');

                    if (previewImg) {
                        previewImg.src = event.target.result;
                    }
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>


<!-- JavaScript for Modal Functionality -->
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>

<!-- load and change the file/img selected in the modal -->
<script>
    // Attach an event listener to all image upload inputs
    document.querySelectorAll('input[type="file"][name="image"]').forEach(input => {
        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    // Find the nearest preview image within the same container
                    const container = e.target.closest('.flex');
                    const previewImg = container.querySelector('img#artworkImage');

                    if (previewImg) {
                        previewImg.src = event.target.result;
                    }
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>