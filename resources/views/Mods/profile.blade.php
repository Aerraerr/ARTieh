<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body  class="bg-white text-gray-900">

    
    <!-- Navbar   style="height:3000px;" -->
    <nav style="max-width:100%; height:60px; " class=" flex justify-between items-center px-10 py-6 shadow-sm bg-transparent">
        <div>
        <a href="{{ route('home') }}">
        <img style="max-width: 120px;" src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="mt-2 sm:ml-2 h-10 sm:h-12">
        </div>
        <!-- Navigation Links -->
        <div id="forNav" style="margin-left:400px;" class="  hidden md:flex space-x-2" style="font-family: 'Rubik', sans-serif;  ">
            <a href="{{ route('paintings') }}" style="text-decoration: underline;text-underline-offset: 23px;text-decoration-thickness:2px; " class="flex items-center justify-center  text-[#6e4d41] hover:text-gray-500 font-medium h-[60px] px-3  transition duration-300 ">PAINTINGS</a>
            <a href="{{ route('drawings') }}" class="flex items-center justify-center  text-[#6e4d41] opacity-60 hover:text-gray-500 font-medium h-[60px] px-4  transition duration-300">DRAWINGS</a>
            <a href="{{ route('sculptures') }}" class="flex items-center justify-center  text-[#6e4d41] opacity-60 hover:text-gray-500 font-medium h-[60px] px-4  transition duration-300">SCULPTURES</a>
            <a href="{{ route('artists') }}" class="flex items-center justify-center  text-[#6e4d41] opacity-60 hover:text-gray-500 font-medium h-[60px] px-4  transition duration-300">ARTISTS</a>
        </div>

        <!-- Login/Register Buttons -->
        <div class="hidden md:flex space-x-4">
            <a id="loginbtn" href="{{ route('login') }}" class=" px-7 py-1 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
            <a href="{{ route('register') }}" class="px-7 py-1 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
        </div>
        

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden mr-[-25px] block text-[#6e4d41] focus:outline-none text-2xl ">☰</button>

    </nav>
    <div id="mobileMenu" class="hidden fixed inset-0 bg-white flex flex-col items-center justify-top space-y-7  shadow-md z-40">
    <a id="navmobi" href="{{ route('paintings') }}" style="text-decoration: underline;text-underline-offset: 23px;text-decoration-thickness:2px; " class="menu-link flex items-center justify-center  text-[#6e4d41] hover:text-gray-500 font-medium h-[60px] px-3  transition duration-500 ">PAINTINGS</a>
    <a id="navmobi" href="{{ route('drawings') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link  opacity-60 transition duration-500 ">DRAWINGS</a>
    <a id="navmobi" href="{{ route('sculptures') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link opacity-60 transition duration-500 ">SCULPTURE</a>
    <a id="navmobi" href="{{ route('artists') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link opacity-60 transition duration-500 ">ARTISTS</a>
    <a id="navmobi" href="{{ route('artists') }}" class="hover:text-[#6e4d41] hover:opacity-90 menu-link opacity-60 transition duration-500 ">ANNOUNCMENTS</a>

        <a href="{{ route('login') }}" class="w-28 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
        <a href="{{ route('register') }}" class="w-28 h-10 flex items-center justify-center bg-[#6e4d41] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
        <button id="closeMenu" class="absolute top-3 right-4 text-2xl text-gray-800">
            &times;
        </button>
    </div>
    

 
    
    



    <section>    
    <div class="container-fluid py-0 px-0">
        <div class="bg-white pb-4  rounded-md shadow-lg border mx-auto max-w-[100%]   relative">
        
            <div class="w-full bg-[#F6EBDA] min-h-[500px]  flex flex-col md:flex-row items-center px-3 md:px-3 lg:px-32 xl:px-40 gap-6">
                <div class="bg-[#CDCDCD] rounded-[3px] max-w-[80%] min-w-[150px] max-h-[350px] min-h-[150px]  flex items-center justify-center shadow-[0px_4px_8px_rgba(0,0,0,0.3)] p-3 ">
                    <div class="flex flex-col gap-5 bg-transparent w-full  max-h-[250px]">
                        <img src="images/artist.jpg" alt="Artwork" class="w-full  max-h-[250px] object-cover">
                    </div>
                </div>

                <div class="flex-1 pl-10 mb-[10px] min-h-[150px] min-w-[150px] text-start">
                    <h1 class=" md:text-3xl sm:text-2xl mb-2 font-extrabold text-[#6e4d41]">Van Gogh</h1>
                    <hr class="w-full h-[5px] my-3 bg-black border-none rounded">
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

                <div class="flex flex-col gap-3 mb-6 md:mb-0 items-center md:items-start md:pl-[90px] sm:pl-0">
                    
                    <button type="button" class=" w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]"
                      data-bs-toggle="modal" data-bs-target="#profileModal">Edit Profile</button> 

                     <a href="#" class=" text-center w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                    Share</a>
                    
                    <a href="{{ route('UploadArtwork') }}" class=" w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]">
                      UPLOAD ARTWORK
                        </a>

                        <button type="button" class=" w-full bg-[#6e4d41] text-white px-4 py-3 rounded font-medium transition duration-300 hover:bg-[#5a3c32]"
                        data-bs-toggle="modal" data-bs-target="#addeventModal">Add Event</button> 
                </div>
            </div>

    <!-- Sa ilalim ng profile -->
    <div class="flex flex-col lg:flex-row gap-8 items-stretch">
          
     <!--Buttons na pa vertical -->
     <div class="flex flex-col items-center lg:w-2/3"> 
    <div class="flex flex-col pt-5 gap-4  w-[250px]">
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="artworks">
        ARTWORKS</button>
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="orders">
        ORDERS</button>
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="purchases">
        MY PURCHASES</button>
        <button class="tab-btn whitespace-nowrap px-4 py-3 text-white rounded text-left bg-[#6e4d41] font-medium hover:bg-[#5a3c32] transition duration-300" data-tab="dashboard">
        SELLER DASHBOARD</button>

    </div>
     </div>

     <div class="container d-flex justify-content-center ml-0 sm:ml-[50px] md:ml-[100px]">


     <div id="artworks" class="tab-content ">
        
     <div class="flex flex-wrap items-center gap-3 w-full max-w-full bg-white pb-4 pt-4 px-4 md:px-6">
    <!-- Search Bar -->
    <input class="form-control w-full sm:w-[400px] max-w-full !border-[#6e4d41] border-1 px-3" type="search" placeholder="Search" aria-label="Search">

    <!-- Dropdown -->
    <div class="dropdown w-full sm:w-[150px] max-w-full">
        <button class="form-control dropdown-toggle w-full !border-[#6e4d41] border-1 px-3" type="button" id="Latest first" data-bs-toggle="dropdown" aria-expanded="false">
            Latest first
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
</div>


        <!-- CARDS -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-3 p-0 justify-items-center">
        
        <div class="bg-white w-full max-w-xs border border-[#6e4d41] shadow-sm">
            <img src="images/drawing3.jpg" class="w-full h-[150px] object-cover ">
            <div class="p-2 flex justify-between items-center">
                <h3 class="font-bold text-sm">Artwork Title</h3>
                <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center p-1 rounded">
                    <img src="images/edit.svg" class="w-4 h-4">
                </button>
            </div>
        </div>

       
        <div class="bg-white w-full max-w-xs border border-[#6e4d41] shadow-sm">
            <img src="images/BekiBoxer.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-full max-w-xs border border-[#6e4d41] shadow-sm">
            <img src="images/meow.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-full max-w-xs border border-[#6e4d41] shadow-sm">
            <img src="images/tuxedo cat.jpg" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-full max-w-xs border border-[#6e4d41] shadow-sm ">
            <img src="images/painting4.png" class="w-full h-[150px] object-cover">
            <div class="p-2 items-center justify-between flex items-center">
            <h3 class="font-bold text-sm">Artwork Title</h3>
            <button onclick="window.location.href='/edit-page'" class="border-2 border-[#6e4d41] hover:bg-gray-200 transition flex items-center">
            <img src="images/edit.svg" class="w-4 h-4">
            </button>
            </div>
        </div>

        <div class="bg-white w-full max-w-xs border border-[#6e4d41] shadow-sm">
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
        
    <div class="flex flex-wrap items-center gap-3 w-full bg-white pb-4 pt-4 pl-1">
    <!-- Search Bar -->
    <input class="form-control w-full sm:w-[400px] !border-[#6e4d41] border-1 px-3" type="search" placeholder="Search" aria-label="Search">

    <!-- Dropdown -->
    <div class="dropdown w-full sm:w-[150px] max-w-full">
        <button class="form-control dropdown-toggle w-full !border-[#6e4d41] border-1 px-3" type="button" id="Latest first" data-bs-toggle="dropdown" aria-expanded="false">
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
        
    <div class="flex flex-wrap items-center gap-3 w-full max-w-full bg-white pb-4 pt-4 py-4 pl-1">
    <!-- Search Bar -->
    <input class="form-control w-full sm:w-[400px] max-w-full !border-[#6e4d41] border-1 px-3" type="search" placeholder="Search" aria-label="Search">

    <!-- Dropdown -->
    <div class="dropdown w-full sm:w-[150px] max-w-full">
        <button class="form-control dropdown-toggle w-full !border-[#6e4d41] border-1 px-3" type="button" id="Latest first" data-bs-toggle="dropdown" aria-expanded="false">
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

<!-- EDIT PROFILE MODAL -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">My Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      
      <div class="modal-body mx-auto max-w-[100%] sm:max-w-[100%]">
        <div class="flex flex-col lg:flex-row gap-8 items-stretch">
          
          <!-- Profile Image Section -->
          <div class="flex flex-col items-center lg:w-1/3">
            <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
              <img id="profileImage" src="images/artist.jpg" alt="Profile Photo" class="object-cover w-full h-full" />
            </div>
            <input type="file" id="fileInput" accept="image/*" class="hidden"/>
            <button id="uploadButton" class="mt-4 px-4 py-2 text-[#6E4D41] border border-[#6E4D41] rounded hover:bg-[#6E4D41] hover:text-white transition duration-300">
              Select Image
            </button>
          </div>

          <div class="hidden lg:block border-l  h-auto min-h-[100px] mx-4"></div>

          <!-- Profile Form Section -->
          <div class="lg:w-2/3">
            <div class="mb-4 flex items-center gap-6">
              <label class="block font-semibold text-gray-700 w-[100px]">First Name</label>
              <input type="text" placeholder="First Name" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="block font-semibold text-gray-700 w-[100px]">Last Name</label>
              <input type="text" placeholder="Last Name" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="font-semibold text-gray-700 w-[100px]">Email</label>
              <div class="flex items-center gap-2">
                <span class="p-2">Yahoo@gmail.com</span>
                <a href="#" class="text-[#6E4D41] hover:text-[#48332B] transition">Edit</a>
              </div>
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="font-semibold text-gray-700 w-[100px]">Gender</label>
              <div class="flex items-center gap-2">
                <label class="flex items-center"><input type="radio" name="gender" class="mr-1" /> Male</label>
                <label class="flex items-center"><input type="radio" name="gender" class="mr-1" /> Female</label>
                <label class="flex items-center"><input type="radio" name="gender" class="mr-1" /> Vaklesh</label>
              </div>
            </div>

            <button class="ml-[120px] bg-[#6E4D41] text-white px-4 py-2 rounded hover:bg-[#48332B] transition">
              Save
            </button>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- ADD EVENT -->

<div class="modal fade" id="addeventModal" tabindex="-1" aria-labelledby="addeventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-fullscreen-sm-down modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">ADD EVENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      
      <div class="modal-body mx-auto max-w-[100%] sm:max-w-[100%]">
        <div class="flex flex-col lg:flex-row gap-8 items-stretch">
          
          <!-- Profile Image Section -->
          <div class="flex flex-col items-center lg:w-1/3">
            <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
              <img id="profileImage" src="images/REOW.jpg" alt="Profile Photo" class="object-cover w-full h-full" />
            </div>     
            <label class="mt-4 px-4 py-2 text-[#6E4D41] font-bold">Bonak Kid</label>
          </div>

          <div class="hidden lg:block border-l  h-auto min-h-[100px] mx-4"></div>

          <!-- Event Form Section -->
          <div class="lg:w-2/3">

          <div class="mb-4 flex items-center gap-4">
             <label class="block font-semibold text-gray-700 w-[100px]">Add Photo</label>
               <label for="imageUpload" class="cursor-pointer">
                   <img src="images/UploadImage1.svg" alt="Upload Image" class="w-40 h-40 border-2 border-dashed border-gray-300 p-2">
                        </label>
                      <input id="imageUpload" name="image" type="file" class="hidden">
                                
                       </label>
              </div>

            <div class="mb-4 flex items-center gap-6">
              <label class="block font-semibold text-gray-700 w-[100px]">Event Name</label>
              <input type="text" placeholder="" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="block font-semibold text-gray-700 w-[100px]">Location</label>
              <input type="text" placeholder="" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>


            <div class="mb-4 flex items-center gap-4">
                    <label for="description" class="block font-semibold text-gray-700 w-[100px]" required>Description:</label>
                        <textarea name="description" placeholder="Enter product description" rows="4" 
                    class="w-[350px] px-4 py-2 border focus:ring focus:ring-[#6E4D41] outline-none mt-1"></textarea>
                </div>
                


                <div class="flex justify-end space-x-4">
                    <button type="button" class="px-6 py-2 rounded text-gray-600 border  hover:bg-gray-100">Cancel</button>
                    <button type="submit" class="px-6 py-2 rounded text-white bg-[#6E4D41]  hover:bg-[#5a3d33] transition">Save</button>
                </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>
    
    


    


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
