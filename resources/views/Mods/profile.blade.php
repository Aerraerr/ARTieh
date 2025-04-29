<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{ asset('css/forprofile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/profile.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="h-[1200px] bg-white text-gray-900">

    
    @include('layouts.forNav')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section class="w-full">
    <div class=" bg-[#F6EBDA] pb-4  border max-w-full relative">
        <div class=" md:ml-[100px] ml-[-10px] max-w-full  bg-[#F6EBDA] h-[400px] md:h-[350px] sm:mt-[-200px] md:mt-0 flex flex-col md:flex-row items-center justify-center p-6 md:p-[150px]">
            
            <button onclick="history.back()" style="font-family: Rubik;" class="text-[#6e4d41] opacity-60 ml-2 md:ml-12 mt-2 absolute top-2 left-2 md:top-5 md:left-10 md:-translate-x-10 no-underline text-inherit"> < BACK
            </button>

            <div class="sm:ml-0 ml-[25px] sm:mb-0 mb-[20px] border-5 border-[#6e4d41] rounded-full w-[150px] md:w-[220px] h-[150px] md:h-[220px] flex items-center justify-center shadow-md p-3 mt-5 md:mt-5">
                <div class="flex flex-col gap-5 bg-transparent  w-full h-full">
                    <a href="javascript:void(0);" @click="open = !open">
                        <img src="{{ asset('images/user.png') }}" alt="profile" class="cursor-pointer w-full h-full rounded-full border-2 border-[#FFE0B2]">
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
                    <h2 class="parasaprofileini2 my-1 font-medium text-sm mb-2 text-[#6e4d41] ">{{Auth::user()->biography ?? 'Enter your biography here...'}}</h2>
                    <div class="parasaprofileini3  gap-1 text-sm text-[#6e4d41]">
                        @foreach($artworks as $artwork)
                            <span>{{ $artwork->category->category_name ?? 'Uncategorized' }} /</span>
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
                        <button onclick="" class="mb-1 md:w-1/2 w-full bg-[#6e4d41] text-white px-4 py-3 rounded transition hover:bg-[#5a3c32]">
                            Start Selling
                        </button>
                        <button disabled onclick="" class="mb-1 md:w-1/2 w-full bg-transparentt text-transparent text-white px-4 py-3 rounded ">
                        </button>
                    </div>

                        

                    @endif
                </div>
            </div>

        </div>
        @include('Mods.ProfileModals')
    </div>

</section>
<div class=" bg-white forcurve">
</div>

<section class="w-full">
    <!-- Sa ilalim ng profile -->
    <div class="flex py-5 ml-[150px]">

    <div x-data="{ open: false }" class="profilemobileini mt-[90px] w-[300px]">
            <!-- Mobile hamburger -->
            <button @click="open = !open" 
                    :class="{'bg-transparent border-[#6e4d41]  text-[#6e4d41]': open, 'bg-[#6e4d41] text-white border-none': !open}" 
                    class="sailalim md:hidden px-4 py-2 rounded font-medium focus:outline-none hover:bg-[#5a3c32] transition mb-4 border-2">
                ☰ Menu
            </button>
            <!-- Buttons wrapper -->
            <div :class="{ 'flex': open, 'hidden': !open }" class="sailalim2 flex-col gap-4 md:flex">
                @if(Auth::user()->role === 'seller')
                <button class="sailalim2btn tab-btn w-full whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="artworks">
                    ARTWORKS
                </button>
                <button class="sailalim2btn tab-btn w-full whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="orders">
                    ORDERS
                </button>
                <button class="sailalim2btn tab-btn w-full whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="dashboard">
                    SELLER DASHBOARD
                </button>
                @endif

                @if(Auth::user()->role === 'buyer')
                <button class="tab-btn w-full whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="purchases">
                    MY PURCHASES
                </button>
                @endif
            </div>
        </div>


        <!-- artworks -->
        <div class="container w-full d-flex justify-content-center px-2 sm:px-4">
        <div id="artworks" class="profilemobile1 tab-content  w-full">

            <!-- Search + Filter -->
            <div class=" profilemobile2 d-flex justify-content-end gap-3  bg-white pt-4 ml-2">
                        <input class="mobilesearch form-control sm:w-[50px] w-[20px] border border-1 !border-[#6e4d41] px-3" type="search" placeholder="Search" aria-label="Search">
                        <div class="dropdown">
                            <button class="form-control dropdown-toggle w-[50px] border border-1 !border-[#6e4d41] px-3" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                Latest first
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        

                    </div>
                    <hr class="mobilesearchunderline  h-[3px]  my-2 bg-black text-[#6e4d41] ">

            <!-- Artworks Grid -->
            <div class="profilemobile3 w-full sm:w-full   grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 mt-3 mx-1">
                @if(Auth::user()->role === 'seller' && $artworks->count() > 0)
                @foreach($artworks as $artwork)
                <div class="profileproducts ml-[-125px] sm:ml-[0px] bg-white w-[200px] sm:w-[230px] sm:h-[280px] h-[250px] border-1 mb-2">
                    <img src="{{ asset($artwork->image_path) }}" class="w-full h-[180px] object-cover">
                    <div class="p-2 flex items-center justify-between">
                    <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                    <button type="button" onclick="toggleModal('updateArtmodal{{ $artwork->id }}')" class="hover:bg-gray-200 transition flex items-center">
                        <img src="{{ asset('iconused/edit.png') }}" class="mt-[-10px] w-4 h-4">
                    </button>
                    </div>
                </div>

                <!-- edit artwork modal (mobile-friendly width) -->

                


                <div id="updateArtmodal{{ $artwork->id }}" class="container-fluid py-5 px-4 hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white w-full sm:w-[800px] max-w-[95vw] rounded-lg shadow-lg p-4 sm:p-8 max-h-[90vh] overflow-y-auto">
                        <div class="modal-header">
                                <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">Edit Artwork {{ $artwork->artwork_title }}</h5>
                                <button onclick="toggleModal('updateArtmodal{{ $artwork->id }}')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <br>
                                <form action="{{ route('artworks.update', $artwork->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Image Section -->
                                <div class="flex flex-col md:flex-row md:items-start gap-4 md:gap-6 mt-5 px-4">
                                    <label class="block text-gray-700 w-full md:w-[150px] mt-2">Change Artwork Photo</label>
                                    <div class="flex flex-col md:flex-row gap-4 items-center">
                                        <div class="w-[120px] h-[120px] shrink-0">
                                            <img id="artworkImage" src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="object-cover w-full h-full rounded" />
                                        </div>
                                        <input id="imageUpload{{ $artwork->id }}" name="image" type="file"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                                                focus:outline-none focus:ring-2 focus:ring-[#6E4D41] focus:border-[#6E4D41] 
                                                file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 
                                                file:text-sm file:font-semibold file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]">
                                    </div>
                                </div>

                                <!-- Product Name -->
                                <div class="flex flex-col md:flex-row items-start md:items-center gap-2 mt-5 px-4">
                                    <label for="artwork_title{{ $artwork->id }}" class="block text-sm text-black-600 w-full md:w-[150px]">Product Name</label>
                                    <input type="text" id="artwork_title{{ $artwork->id }}" name="artwork_title" value="{{ $artwork->artwork_title }}"
                                        class="w-full md:w-1/2 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                                </div>

                                <!-- Dimension -->
                                <div class="flex flex-col md:flex-row items-start md:items-center gap-2 mt-5 px-4">
                                    <label for="dimension{{ $artwork->id }}" class="block text-sm text-black-600 w-full md:w-[150px]">Dimension</label>
                                    <input type="text" id="dimension{{ $artwork->id }}" name="dimension" value="{{ $artwork->dimension }}"
                                        required class="w-full md:w-1/2 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                                </div>

                                <!-- Category -->
                                <div class="flex flex-col md:flex-row items-start md:items-center gap-2 mt-5 px-4">
                                    <label for="category_id{{ $artwork->id }}" class="block text-sm text-black-700 w-full md:w-[150px]">Category</label>
                                    <select id="category_id{{ $artwork->id }}" name="category_id"
                                        class="w-full md:w-1/2 px-4 py-2 border border-gray-400 focus:ring-[#A99476] focus:ring-2 focus:outline-none mt-1"
                                        required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $artwork->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Price -->
                                <div class="flex flex-col md:flex-row items-start md:items-center gap-2 mt-5 px-4">
                                    <label for="price{{ $artwork->id }}" class="block text-sm font-medium text-gray-700 w-full md:w-[150px]">Price</label>
                                    <input type="number" name="price" id="price{{ $artwork->id }}" required value="{{ $artwork->price }}"
                                        class="w-full md:w-1/2 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                                </div>

                                <!-- Description -->
                                <div class="flex flex-col md:flex-row items-start md:items-start gap-2 mt-5 px-4">
                                    <label for="description{{ $artwork->id }}" class="block text-sm font-medium text-gray-700 w-full md:w-[150px] mt-2">Description</label>
                                    <textarea id="description{{ $artwork->id }}" name="description" rows="4" required
                                        class="w-full md:w-1/2 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">{{ $artwork->description }}</textarea>
                                </div>

                                <!-- Buttons -->
                                <div class="flex justify-end gap-4 mt-6 px-4">
                                    <button type="button" onclick="toggleModal('updateArtmodal{{ $artwork->id }}')"
                                        class="px-6 py-2 text-gray-600 border hover:bg-gray-100 transition">Cancel</button>
                                    <button type="submit"
                                        class="px-6 py-2 text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">Save</button>
                                </div>
                            </form>

                        </div>
                </div>
                @endforeach
            @else
                <p class="text-gray-500">No artworks uploaded yet.</p>
            @endif
            </div>
            <div class="grid grid-cols-3 gap-6 mt-3 mx-5"></div>
        </div>
        </div>

     
     
     
         <!-- ORDERS -->
         <div id="orders" class="tab-content hidden">
         <div class="d-flex align-items-center gap-3 w-full bg-white py-4 pl-1">
                 <input class="form-control w-[400px] !border-[#6e4d41] border-1 px-3" type="search" placeholder="Search" aria-label="Search">
             <div class="dropdown">
                 <button class="form-control dropdown-toggle w-[150px] !border-[#6e4d41] border-1 px-3" type="button" id="Latest first" data-bs-toggle="dropdown" aria-expanded="false">
                     Latest first
                  </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
             </div>
     
             </div>
             <hr class="bg-[#6e4d41]">
     
             <table class="table table-striped">
               <thead>
                 <tr class="text-center">
                   <th scope="col">Order No.</th>
                   <th scope="col">Price</th>
                   <th scope="col">Date</th>
                   <th scope="col">Status</th>
                   <th scope="col"></th>
                 </tr>
               </thead>
               <tbody>
                 <tr class="text-center">
                   <th scope="row">1</th>
                   <td>$250000000</td>
                   <td>21/06/2019</td>
                   <td>pending</td>
                   <td>
                     <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
                 </tr>
               </tbody>
             </table>
         </div>
     
     
         <!-- Purchases-->
         <div id="purchases" class="tab-content hidden">
             
         <div class="d-flex align-items-center gap-3 w-full bg-white py-4 pl-1">
                 
             <input class="form-control w-[400px] !border-[#6e4d41] border-1 px-3" type="search" placeholder="Search" aria-label="Search">
           
             <div class="dropdown">
                 <button class="form-control dropdown-toggle w-[150px] !border-[#6e4d41] border-1 px-3" type="button" id="Latest first" data-bs-toggle="dropdown" aria-expanded="false">
                     Latest first
                  </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
             </div>
     
             </div>
             <hr class="bg-[#6e4d41]">
     
             <table class="table table-striped">
               <thead>
                 <tr class="text-center">
                   <th scope="col">Order No.</th>
                   <th scope="col">Price</th>
                   <th scope="col">Date</th>
                   <th scope="col">Status</th>
                   <th scope="col"></th>
                 </tr>
               </thead>
               <tbody>
                 <tr class="text-center">
                   <th scope="row">1</th>
                   <td>$250000000</td>
                   <td>21/06/2019</td>
                   <td>pending</td>
                   <td>
                     <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
                   </td>
                 </tr>
               </tbody>
             </table>
         </div>
     
       <!-- seller dashboard -->
       <div id="dashboard" class="tab-content hidden">Seller Dashboard Section</div>
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