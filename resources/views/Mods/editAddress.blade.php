<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900">
    @include('layouts.forNav')
    @extends('layouts.forbg')
    
    




<section>    
    <div class="container-fluid py-0 px-0">

    <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%] sm:max-w-[100%]" >
        <button class="text-[#6e4d41] text-lg font-medium transition duration-300 hover:underline hover:underline-offset-[6px] hover:decoration-2 hover:text-gray-500"
        data-bs-toggle="modal"data-bs-target="#editaddressModal">
            Edit Address
        </button>

    </div>
    </div>
</section>

<!--MODAL WOWWW EDIT ADD -->
<div class="modal fade" id="editaddressModal" tabindex="-1" aria-labelledby="editaddressModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-fullscreen-md-down modal-fullscreen-sm-down modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title font-semibold text-[#6E4D41] text-2xl sm:text-xl md:text-2xl lg:text-2xl pl-[20px]">My Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      
      <div class="modal-body mx-auto max-w-[50%] sm:max-w-[80%] rounded-lg">
     
          <!-- EDIT ADDRESSSS Form Section -->
           
          <div class="p-3 max-w-sm text-start">
    <div class="flex text-start w-full">
        <div class="flex text-start gap-3 w-full">
            <p id="name" class="text-black font-bold">Bonak Kid</p>

            <div class="hidden lg:block border-l h-10 mx-2"></div>

            <p id="phone" class="text-gray-700">Sample num</p>

            <button class="text-[#6e4d41] font-medium hover:underline hover:underline-offset-4 ml-5 mb-3"
                data-bs-toggle="modal" data-bs-target="#editaddress1Modal" aria-label="Edit Address">
                Edit
            </button>
        </div>
    </div>

    <div class="mt-3 text-gray-700">
        <p id="StreetName-HouseNo">Purok 1 pag asa 0555</p>
        <p id="Barangay">Brgy. 42 - Rawis, Chicago</p>
        <p id="PostalCode">4500</p>
    </div>

    <hr class="my-4">

    <button class="text-[#6e4d41] font-medium mb-3"
        data-bs-toggle="modal" data-bs-target="#editaddress1Modal" aria-label="Add New Address">
        + Add New Address
    </button>
</div>




        
      </div>
    </div>
  </div>
        </div>


        <div class="modal fade" id="editaddress1Modal" tabindex="-1" aria-labelledby="editaddress1ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered ">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">Edit Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      
      <div class="modal-body mx-auto max-w-[100%] sm:max-w-[100%]">
        <div class="flex flex-row gap-8 items-stretch">
          

          <!--  Form Section -->
    <div class="max-w-md mx-auto p-6 ">
  
  <div class="space-y-4 mb-6">
    <div class="flex flex-row gap-3 items-center">
    <div>
      <label class="block text-gray-700 mb-1">Full Name</label>
      <input id="name" type="text" class="w-full px-2 py-2 border rounded-sm focus:outline-none focus:ring-1 focus:ring-[#6E4D41]">
    </div>
    <div>
      <label class="block text-gray-700 mb-1">Phone Number</label>
      <input id="phone" type="tel" class="w-full px-2 py-2 border rounded-sm focus:outline-none focus:ring-1 focus:ring-[#6E4D41]">
    </div>
    </div>
    <div>
        <label class="block text-gray-700 mb-1">Street Name, Building, House No.</label>
        <input id="StreetName-HouseNo" type="text" class="w-full px-2 py-2 border rounder-md focus:outline-none focus:ring-1 focus:ring-[#6E4D41]">
    </div>
    <div>
        <label class="block text-gray-700 mb-1">Barangay</label>
        <input id="Barangay" type="text" class="w-full px-2 py-2 border rounder-md focus:outline-none focus:ring-1 focus:ring-[#6E4D41]">
    </div>
    <div>
        <label class="block text-gray-700 mb-1">Postal Code</label>
        <input id="PostalCode" type="text" class="w-full px-2 py-2 border rounder-md focus:outline-none focus:ring-1 focus:ring-[#6E4D41]">
    </div>
  </div>

</div>

        </div>
      </div>

    </div>
  </div>
</div>
    

@include('Example.howtoget')
@include('layouts.footer')
</html>
</body>
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