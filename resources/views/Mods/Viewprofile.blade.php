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
    <div class="container-fluid ">
        <div class="bg-white pb-4  rounded-md shadow-lg border mx-auto max-w-[100%]   relative">
        
            <div class="w-full bg-[#F6EBDA] min-h-[400px]  flex flex-col md:flex-row justify-center mb-3 py-5 px-3 md:px-20 lg:px-32 xl:px-40 gap-6">
               
            <div class="flex flex-col items-center w-[50%] ">
            <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
              <img id="profileImage" src="images/REOW.jpg" alt="Profile Photo" class="object-cover w-full h-full" />
            </div>     
            <h1 class="mt-3 px-4 py-2 text-[#6E4D41] font-bold text-2xl">Bonak Kid</h1>
            <div class="flex items-center text- gap-2">
             <label class=>panot na</label>
             <div class="bg-[#6E4D41] border-l h-4 w-[1.5px]"></div>
             <label class=>Seller</label>
          </div>
            <div class="flex row text-center w-[500px] h-[50px] overflow-hidden">
            <p id="bioText" class="mt-1 px-4  text-[#6E4D41]"> I like Ratzzz I like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like Ratzzz I like Ratzzz  I like Ratzzz  I like Ratzzz  I like Ratzzz   I like Ratzzz   I like Ratzzz   I like Ratzzz   I like Ratzzz  I like Ratzzz  I like Ratzzz I like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like RatzzzI like Ratzzz </p>
            </div>
            <button id="showMoreContainer" class="mt-2 text-sm text-[#6E4D41] font-bold hover:underline"  
            data-bs-toggle="modal" data-bs-target="#ViewmoreModal" aria-label="View more">
          Show full bio
          </button>

     

          <div class="relative mt-3 flex items-center text- gap-2">
          <div class="pr-2">
          <button>
            <img src="images/SHARE.svg" alt="copylink icon"  class="w-7 h-7 hover:opacity-80 transition-opacity">
          </button>
          </div>
          <button class="whitespace-nowrap px-4 py-2 text-[#6E4D41] rounded-full bg-white font-medium hover:bg-[#5a3c32] transition duration-300"
          data-bs-toggle="modal" data-bs-target="#MessageModal" aria-label="View more">
          Message</button>
          <button class="whitespace-nowrap px-3 py-2 text-white rounded-full  bg-[#6E4D41] font-medium hover:bg-[#5a3c32] transition duration-300">Rate</button>
          <div class="pl-2">
          <button>
            <img src="images/REPORT.svg" alt="copylink icon"  class="w-7 h-7 hover:opacity-80 transition-opacity">
          </button>
          </div>
          </div>

          
          
            </div>

          </div>

          <div class="relative mb-3 flex justify-center text- gap-10">
          <h1  class="text-lg text-[#6E4D41] font-bold">ARTWORKS</h1>
          </div>


          <div id="Viewpaintings" class="tab-content">
          <div class="grid grid-cols-2 md:grid-cols-5 gap-3 p-3">
        
        <div class="relative w-full overflow-hidden ">
            <img src="images/drawing3.jpg" class="w-full h-[250px] object-cover rounded-xl">
            <div class="absolute top-2 right-2 bg-white text-red-600 text-xs font-bold px-2 py-1 border border-red-600 rounded-lg shadow">
    SOLD
  </div>
            <div class="mt-1 p-0 flex row items-center">
                <h3 class="font-bold text-sm">Artwork Title</h3>
                <p class="text-sm"> 1.6k likes </p>
            </div>
        </div>

        <div class=" w-full overflow-hidden ">
            <img src="images/joker-laugh.gif" class="w-full h-[250px] object-cover rounded-xl">
            <div class="mt-1 p-0 flex row items-center">
                <h3 class="font-bold text-sm">Artwork Title</h3>
                <p class="text-sm"> 1.6k likes </p>
            </div>
        </div>

        <div class=" w-full overflow-hidden ">
            <img src="images/meow.jpg" class="w-full h-[250px] object-cover rounded-xl">
            <div class="mt-1 p-0 flex row items-center">
                <h3 class="font-bold text-sm">Artwork Title</h3>
                <p class="text-sm"> 1.6k likes </p>
            </div>
        </div>

        <div class=" w-full overflow-hidden ">
            <img src="images/drawing.jpg" class="w-full h-[250px] object-cover rounded-xl">
            <div class="mt-1 p-0 flex row items-center">
                <h3 class="font-bold text-sm">Artwork Title</h3>
                <p class="text-sm"> 1.6k likes </p>
            </div>
        </div>

        <div class=" w-full overflow-hidden ">
            <img src="images/drawing2.jpg" class="w-full h-[250px] object-cover rounded-xl">
            <div class="mt-1 p-0 flex row items-center">
                <h3 class="font-bold text-sm">Artwork Title</h3>
                <p class="text-sm"> 1.6k likes </p>
            </div>
        </div>
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






