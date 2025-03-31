<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/mods/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">

    
    @include('layouts.forNav')
    @extends('layouts.forbg')
    

 
    
    



    <section>    
    <div class="container-fluid py-5 px-4">
        <div class="bg-white pt-4 pb-4  rounded-lg shadow-lg border mx-auto max-w-[90%] relative">
            <div class="max-w-full bg-[#F6EBDA] h-[500px]  flex items-center p-[150px]">
              <a href="{{ url()->previous() }}" style="font-family: Rubik;" class="text-[#6e4d41] opacity-60 ml-10 
                absolute top-0 left-0 -translate-x-10 hover:bg-gray-400 p-2 rounded-full"> &lt; BACK
              </a>
                <div class="bg-[#CDCDCD] rounded-[3px] w-[220px] h-[300px] flex items-center justify-center shadow-[0px_4px_8px_rgba(0,0,0,0.3)] p-3">
                    <div class="flex flex-col gap-5 bg-transparent w-full h-full">
                        <img src="images/user.jpg" alt="Artwork" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="flex-1 pl-10 mb-[10px]">
                    <h1 class=" mb-2 font-extrabold">{{ $artwork->user->name ?? 'Unknown Artist' }}</h1>
                    <hr class="w-[100%] h-[5px] my-3 bg-black">
                    <h2 class="my-3 font-medium">Biography</h2>
                    <p class="leading-[1.6] mb-3">
                        Lorem Ipsum bla bla bla bla bla bla bla ! text a postcard sent to you Did it go through? 
                        Sendin’ all my love to you You are the moonlight of my life Every night Givin’ all my love to you.
                    </p>
                    
                    <div class="flex gap-4">
                        <a href="{{ route('paintings') }}" class="text-[#6e4d41] font-medium transition duration-300 hover:underline hover:underline-offset-[6px] hover:decoration-2 hover:text-gray-500">
                         Painting </a>
                         <a href="{{ route('drawings') }}" class="text-[#6e4d41] font-medium transition duration-300 hover:underline hover:underline-offset-[6px] hover:decoration-2 hover:text-gray-500">
                             Drawing </a>
                    </div>

                </div>

                <div class="flex flex-col gap-3 mb-[60px] ml-[100px] items-center">
                    <div class="flex gap-3 items-center ">
                      <button onclick="toggleModal('edit-modal')" class="border !border-[#6e4d41] border-1 px-3 py-1 rounded text-[#6e4d41] transition duration-300 hover:text-gray-500">
                          Edit Profile
                      </button>
                     <button onclick="toggleModal('share-modal')" class="border !border-[#6e4d41] border-1 px-3 py-1 rounded text-[#6e4d41] transition duration-300 hover:text-gray-500">
                        Share
                    </button>
                    </div>
                    <button onclick="toggleModal('upload-modal')" 
                        class="bg-[#6e4d41] text-white px-4 py-3 rounded-lg font-medium transition duration-300 hover:bg-[#5a3c32]">
                        UPLOAD ARTWORK
                    </button>
                </div>
                
            </div>
            <!-- Include the modals -->
            @include('Mods.ProfileModals')


    <!-- Sa ilalim ng profile -->
     <div class="flex py-5 ml-[150px]">
          
     <!--Buttons na pa vertical -->
    <div class="flex flex-col gap-4 w-[300px]">  
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="artworks">
        ARTWORKS</button>
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="orders">
        ORDERS</button>
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="purchases">
        MY PURCHASES</button>
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="dashboard">
        SELLER DASHBOARD</button>

    </div>

    <div class="container d-flex justify-content-center ml-[150px]">

        

     <div id="artworks" class="tab-content ">
        <div class="d-flex align-items-center gap-3 w-full bg-white pt-4 ml-4">
            
        
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

        <div class="grid grid-cols-3 gap-6 mt-3 mx-5">
        
        <div class="bg-white w-[150px] h-[150px] border-1 ">
            <img src="images/drawing3.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

       
        <div class="bg-white w-[150px] h-[150px] border-1 mb-3 ">
            <img src="images/BekiBoxer.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-[150px] h-[150px] border-1 mb-3 ">
            <img src="images/meow.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

         <div class="bg-white w-[150px] h-[150px] border-1 mb-3 ">
            <img src="images/tuxedo cat.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-[150px] h-[150px] border-1 mb-3 ">
            <img src="images/painting4.png" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-[150px] h-[150px] border-1 mb-3 ">
            <img src="images/painting3.png" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <!-- Repeat for more cards... -->
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
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">2</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">3</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">4</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">5</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">6</th>
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

    <!-- PURCHASES firee fireee brrrttt-->
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
    <tr class="text-center">
      <th scope="row">2</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">3</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">4</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">5</th>
      <td>$250000000</td>
      <td>21/06/2019</td>
      <td>pending</td>
      <td>
        <button id="" class=" text-[#6e4d41] font-bold transition duration-300 hover:text-[#5a3c32] ">Edit</button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">6</th>
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