<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">

    
    @include('layouts.forNav')
    @extends('layouts.forbg')

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

    <section>    
    <div class="container-fluid py-0 px-0">
        <div class="bg-white pb-4  rounded-lg shadow-lg border mx-auto max-w-[100%] relative">

            <div class="max-w-full bg-[#F3EBE1] h-[500px] mt-0 flex items-center p-[150px]">
              <button onclick="history.back()"  style="font-family: Rubik;" class="text-[#6e4d41] opacity-60 ml-12 mt-2
                absolute top-0 left-0 -translate-x-10 no-underline text-inherit"> &larr; BACK
              </button>
                <div class="bg-[#6e4d41] rounded-full w-[220px] h-[220px] flex items-center justify-center shadow-[0px_4px_8px_rgba(0,0,0,0.3)] p-3">
                    <div class="flex flex-col gap-5 bg-transparent w-full h-full">
                        <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('images/user.png') }}" alt="Artwork" class="w-full h-full rounded-full object-cover">
                    </div>
                </div>

                <!-- seller/buyer information-->
                <div class="flex-1 pl-10 mb-[10px]">
                 @if(Auth::user()->role === 'seller') 
                    <h1 class=" mb-2 font-extrabold">{{Auth::user()->full_name}} </h1>
                    <hr class="w-[100%] h-[5px] my-3 bg-black">
                    <p class="my-3 font-medium">{{Auth::user()->biography ?? 'Enter your biography here...'}}</p>
                    
                    <div class="flex gap-4">
                        @foreach($artworks as $artwork)
                            {{ $artwork->category->category_name ?? 'Uncategorized' }} /
                        @endforeach
                    </div>
                    @elseif(Auth::user()->role === 'buyer')
                        <h1 class=" mb-2 font-extrabold">{{Auth::user()->full_name}} </h1>
                        <hr class="w-[100%] h-[5px] my-3 bg-black">
                        <p class="my-3 font-medium">{{Auth::user()->role}}</p>
                        <p class="my-3 font-medium">{{Auth::user()->email}}</p>
                        <p class="my-3 font-medium">{{Auth::user()->phone}}</p>
                        <p class="my-3 font-medium">{{Auth::user()->address}}</p>
                    @endif
                </div>
           
                {{-- buttons to display dpende sa user role--}}
                <div class="flex flex-col gap-3 mb-[60px] ml-[100px] items-center">
                    @if(Auth::user()->role === 'seller') 
                        <button onclick="toggleModal('upload-modal')" 
                            class="w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                            Upload Artwork
                        </button>
                        <button onclick="toggleModal('editseller-modal')" class="w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                            Edit Profile
                        </button>
                        <button onclick="toggleModal('addevent-modal')" class=" w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]"
                            data-bs-toggle="modal" data-bs-target="#addeventModal">
                            Add Event
                        </button> 
                        <button onclick="toggleModal('share-modal')" class="w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                            Share
                        </button>
                    @elseif(Auth::user()->role === 'buyer')
                        <button onclick="toggleModal('addevent-modal')" class=" w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]"
                        data-bs-toggle="modal" data-bs-target="#addeventModal">
                        Add Event
                        </button> 
                        <button onclick="toggleModal('editbuyer-modal')" class="w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                            Edit Profile
                        </button>
                        <a href="{{route('beSeller')}}"> <button class="w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                            Start Selling
                        </button></a>
                    @endif  
                </div>
            </div>
            <!-- Include the modals -->
            @include('Mods.ProfileModals')

            <!-- Sa ilalim ng profile -->
            <div class="flex py-5 ml-[150px]">
            
            <!--Buttons na pa vertical -->
            <div class="flex flex-col gap-4 w-[300px]">  
            @if(Auth::user()->role === 'seller')  {{-- Seller-only buttons --}}
                <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="artworks">
                ARTWORKS</button>
                <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="orders">
                ORDERS</button>
                <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="dashboard">
                SELLER DASHBOARD</button>
            @endif  
            @if(Auth::user()->role === 'buyer')  {{-- Buyer buttons --}}
                <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="purchases">
                MY PURCHASES</button>
            @endif
            </div>

            
            <!-- artworks -->
            <div class="container d-flex justify-content-center ml-[150px]">
            <div id="artworks" class="tab-content ">
                <div class="d-flex align-items-center gap-3 w-full bg-white pt-4 ml-2">
                    <input  id="artworkSearch" class="form-control w-[400px] !border-[#6e4d41] border-1 px-3" type="search" placeholder="Search" aria-label="Search">
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
            <div class="grid grid-cols-3 gap-5 mt-3 mx-5">
                @if(Auth::user()->role === 'seller' && $artworks->count() > 0)
                    @foreach($artworks as $artwork)
                        <div class="artwork-card bg-white w-[190px] h-[150px] border-1 mb-4" data-title="{{ strtolower($artwork->artwork_title) }}">
                            <img src="{{ asset($artwork->image_path) }}" class="w-full h-[150px] object-cover">
                            <div class="p-2 flex items-center justify-between">
                                <h3 class="font-bold text-sm">{{ $artwork->artwork_title }}</h3>
                                <button type="button" onclick="toggleModal('updateArtmodal{{ $artwork->id }}')"
                                    class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
                                    <img src="{{ asset('images/edit.svg') }}" class="w-4 h-4">
                                </button>
                            </div>
                        </div>

                        
                        <!-- edit artwork modal -->
                        <div id="updateArtmodal{{ $artwork->id }}" class="container-fluid py-5 px-4 hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white w-[800px] rounded-lg shadow-lg p-8 max-h-[90vh] overflow-y-auto" style="max-width: auto;">
                                <div class="modal-header">
                                    <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">Edit Artwork {{ $artwork->artwork_title }}</h5>
                                    <button onclick="toggleModal('updateArtmodal{{ $artwork->id }}')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <br>
                                <form action="{{ route('artworks.update', $artwork->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Required for updates -->
                                    
                                        <div class="flex space-x-4 ml-10 mt-5">
                                            <label for class="block text-gray-700 w-[150px] mt-4">Change Artwork Photo</label> 
                                            <div class="w-[120px] h-[120px]">
                                                <img id="artworkImage" src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="object-cover w-full h-full mb-1" />
                                            </div>               
                                            <div class="w-[150px]">
                                                <input id="imageUpload{{ $artwork->id }}" name="image" type="file" class="mt-5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                                                    focus:outline-none focus:ring-2 focus:ring-[#6E4D41] focus:border-[#6E4D41] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                                    file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]"> 
                                            </div>  
                                        </div>
                                    

                                    <div class="flex space-x-4 ml-10 mt-5">
                                        <label for="artwork_title{{ $artwork->id }}" class=" mt-3 mr-10 block text-sm text-black-600" required>Product Name</label>
                                        <input type="text" id="artwork_title{{ $artwork->id }}" name="artwork_title"  value="{{ $artwork->artwork_title }}"
                                        class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                                    </div>

                                    <div class="flex space-x-4 ml-10 mt-5">
                                        <label for="dimension{{ $artwork->id }}" class=" mt-3 mr-10 block text-sm text-black-600" >Dimension</label>
                                        <input type="text" id="dimension{{ $artwork->id }}" name="dimension" required value="{{ $artwork->dimension }}"
                                        class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                                    </div>

                                    <div class="flex space-x-4 ml-10 mt-5">
                                        <label for="category_id{{ $artwork->id }}" required class="block mr-16 text-sm text-black-700">Category:</label>
                                            <select id="category_id{{ $artwork->id }}" name="category_id"  class="w-50 px-4 py-2 border border-gray-400 focus:ring-[#A99476] focus:ring-2 focus:outline-none mt-1" 
                                                required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $artwork->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                    </div>

                                    <div class="flex space-x-4 ml-10 mt-5">
                                        <label for="price{{ $artwork->id }}" class="block mr-20 text-sm font-medium text-gray-700">Price</label>
                                        <input type="number" name="price" id="price{{ $artwork->id }}" required value="{{ $artwork->price }}"
                                            class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                                    </div>

                                    <div class="flex space-x-4 ml-10 mt-5">
                                        <label for="description{{ $artwork->id }}" class="block mr-10 text-sm font-medium text-gray-700">Description</label>
                                            <textarea id="description{{ $artwork->id }}" required name="description" rows="4"
                                        class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">{{ $artwork->description }}</textarea>
                                    </div>

                                    <div class="flex justify-end space-x-4">
                                        <button onclick="toggleModal('updateArtmodal{{ $artwork->id }}')" class="px-6 py-2 text-gray-600 border  hover:bg-gray-100">Cancel</button>
                                        <button type="submit" class="px-6 py-2 text-white bg-[#6E4D41]  hover:bg-[#5a3d33] transition">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    @endforeach
                @else
                    @if(Auth::user()->role === 'seller')
                        <p class="text-gray-500">No artworks uploaded yet.</p>
                    @endif
                @endif
            </div>
            <div class="grid grid-cols-3 gap-6 mt-3 mx-5">
            </div>
            </div>

            
            @if(Auth::user()->role === 'seller')
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
                @if($ordered->count() > 0)
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">Order ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Delivery Method</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($ordered as $order)
                                <tr class="text-center " data-bs-toggle="modal">
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @foreach($order->items as $item)
                                            {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                                        @endforeach
                                    </td>
                                    <td>₱{{ $order->total_amount }}</td>
                                    <td>{{ $order->delivery_method }}</td>
                                    <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                                    <td>{{ $order->status->status_name }}</td>
                                    <td>{{ $order->ordered_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right mt-4">
                        <a href="{{route('sellerdashboard')}}"  class="btn bg-[#6e4d41] ">edit orders</a>
                    </div>
                @else
                    <p class="text-center mt-5">No orders found.</p>
                @endif
                </div>
            @endif    

            


            @if(Auth::user()->role === 'buyer')
            <!-- Purchases-->
            <div id="purchases" class="tab-content hidden mx-auto container-fluid py-5 px-4" >
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
                <div class="bg-white p-4 rounded shadow-lg border mx-auto" style="max-width: 80%;">
                    <!-- Purchase Status Tabs -->
                    <div class="flex justify-between border-b pb-2 text-gray-500">
                        <div class="tab flex flex-col items-center cursor-pointer active" data-tab="to-pay">
                            <img src="{{ asset('images/topay.png') }}" class="w-8 h-8" alt="To Pay">
                            <span>To Pay</span>
                            @if ($toPayCount > 0)
                                <span class="absolute mb-5 ml-6 bg-[#6e4d41] bg-opacity-90 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                    {{ $toPayCount }}
                                </span>
                            @endif
                        </div>
                        <div class="tab flex flex-col items-center cursor-pointer" data-tab="to-pickup">
                            <img src="{{ asset('images/topickup.png') }}" class="w-8 h-8" alt="To Pickup">
                            <span>To Pickup</span>
                            @if ($toPickupCount > 0)
                                <span class="absolute mb-5 ml-6 bg-[#6e4d41] bg-opacity-90 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                    {{ $toPickupCount }}
                                </span>
                            @endif
                        </div>
                        <div class="tab flex flex-col items-center cursor-pointer" data-tab="to-receive">
                            <img src="{{ asset('images/toreceive.png') }}" class="w-8 h-8" alt="To Receive">
                            <span>To Receive</span>
                            @if ($toReceiveCount > 0)
                                <span class="absolute mb-5 ml-6 bg-[#6e4d41] bg-opacity-90 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                    {{ $toReceiveCount }}
                                </span>
                            @endif
                        </div>
                        <div class="tab flex flex-col items-center cursor-pointer" data-tab="completed-orders">
                            <img src="{{ asset('images/completed.png') }}" class="w-8 h-8" alt="Completed Orders">
                            <span>Completed Orders</span>
                            @if ($completedCount > 0)
                                <span class="absolute mb-5 ml-6 bg-[#6e4d41] bg-opacity-90 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                    {{ $completedCount }}
                                </span>
                            @endif
                        </div>
                        <div class="tab flex flex-col items-center cursor-pointer" data-tab="cancelled-items">
                            <img src="{{ asset('images/cancelled.png') }}" class="w-8 h-8" alt="Cancelled Items">
                            <span>Cancelled Items</span>
                            @if ($cancelledCount > 0)
                                <span class="absolute mb-5 ml-6 bg-[#6e4d41] bg-opacity-90 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                    {{ $cancelledCount }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <a href="{{route('purchases')}}"  class="btn bg-[#6e4d41] ">see more</a>
                </div>
            </div>
            @endif

            <!-- seller dashboard -->
            <div id="dashboard" class="tab-content hidden">Seller Dashboard Section
                <div class="text-right mt-4">
                        <a href="{{route('sellerdashboard')}}"  class="btn bg-[#6e4d41] "> visit seller dashboard</a>
                </div>
            </div>
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

