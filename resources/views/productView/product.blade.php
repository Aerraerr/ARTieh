<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body style="font-family:rubik;" class="bg-[#EEEEEE] text-gray-900">
    <div class="flex justify-center items-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="mt-2 h-10 sm:h-12 max-w-[120px]">
        </a>
    </div>


    <div class="  max-w-6xl mx-auto p-4">

        <!-- Artwork Details Section -->
        <div class="bg-white pl-14 pr-14 p-14 rounded shadow-xl flex flex-wrap md:flex-nowrap gap-6">
            <!-- Artwork Image Section -->
            <div class="w-full md:w-3/5 relative">
                        <a href="{{ route('paintings') }}" style="font-family: Rubik;" class="text-[#6e4d41] opacity-60 ml-1 mt-[-45px] absolute left-0 -translate-x-10 hover:bg-gray-400 p-2 rounded-full">
            &lt; BACK
            </a>

            <!-- Main Image -->
            <img src="images/painting2.png" alt="Tuxedo Cat Painting" class="w-full rounded-lg object-cover">
            
            <!-- Thumbnail Navigation with Arrows -->
            <div class=" flex items-center justify-center gap-2 mt-3 relative">
                <!-- Left Arrow -->
                <button class="ml-10 absolute left-0 -translate-x-10 bg-gray-300 hover:bg-gray-400 p-2 rounded-full">
                    &#9664;
                </button>

                <!-- Thumbnails -->
                <div class="flex gap-2">
                    <img src="images/painting1.png" alt="Thumbnail 1" class="w-16 h-14 object-cover rounded cursor-pointer">
                    <img src="images/painting1.png" alt="Thumbnail 2" class="w-16 h-14 object-cover rounded cursor-pointer">
                    <img src="images/painting1.png" alt="Thumbnail 3" class="w-16 h-14 object-cover rounded cursor-pointer">
                    <img src="images/painting1.png" alt="Thumbnail 4" class="w-16 h-14 object-cover rounded cursor-pointer">
                </div>

                <!-- Right Arrow -->
                <button class="mr-10 absolute right-0 translate-x-10 bg-gray-300 hover:bg-gray-400 p-2 rounded-full">
                    &#9654;
                </button>
            </div>
    </div>



            <!-- Artwork Information Section -->
            <div style class="mt-3 w-full md:w-3/5 space-y-4">
                <h2 class="text-[#6e4d41] text-4xl font-bold">Tuxedo Cat - Painting</h2>
                <div class="mb-5 text-[#6e4d41] text-xl font-semibold">P 30,000</div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 mt-20">
                <button class="px-6 py-2 bg-[#6e4d41] text-white rounded hover:bg-[#FFE0B2] transition duration-300">
                    Buy Now
                </button>
                <button class="px-6 py-2 border border-[#6e4d41] text-[#6e4d41] rounded hover:bg-[#FFE0B2] hover:border-[#FFE0B2] transition duration-200">
                    Add to Cart
                </button>
            </div>


                <hr class="">
                <!-- Artwork Details -->
                <div style="color:#6e4d41;" class=" grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
                    <strong>Dimension:</strong> <span>1 METER</span>
                    <strong>Medium:</strong> <span>Oil on Canvas</span>
                    <strong>Artist:</strong> <span>LEBRROONN JEYYMS</span>
                </div>

                <hr class="">
                <!-- Description -->
                <p class="text-[#6e4d41] text-sm leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>

        <!-- More Works Section -->
        <div class="mt-8 flex justify-between items-center">
            <h3 class="text-[#6e4d41] text-lg font-semibold">More Works of LEBRROONN JEYYMS</h3>
            <a href="#" class="border border-[#6e4d41] text-[#6e4d41] rounded hover:bg-[#FFE0B2] hover:border-[#FFE0B2]  px-3 py-2 rounded ">View All</a>
        </div>

        <!-- More Works Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
            <div class="bg-gray-100 p-4 rounded text-center">
                <img src="images/painting2.png" alt="Placeholder" class="w-full h-36 object-cover rounded">
                <h4 class="mt-2 font-semibold">TITLE</h4>
                <p class="text-sm text-gray-600">BRIEF DESCRIPTION</p>
            </div>
            <div class="bg-gray-100 p-4 rounded text-center">
                <img src="images/painting3.png" alt="Placeholder" class="w-full h-36 object-cover rounded">
                <h4 class="mt-2 font-semibold">TITLE</h4>
                <p class="text-sm text-gray-600">BRIEF DESCRIPTION</p>
            </div>
            <div class="bg-gray-100 p-4 rounded text-center">
                <img src="images/painting4.png" alt="Placeholder" class="w-full h-36 object-cover rounded">
                <h4 class="mt-2 font-semibold">TITLE</h4>
                <p class="text-sm text-gray-600">BRIEF DESCRIPTION</p>
            </div>
            <div class="bg-gray-100 p-4 rounded text-center">
                <img src="images/painting1.png" alt="Placeholder" class="w-full h-36 object-cover rounded">
                <h4 class="mt-2 font-semibold">TITLE</h4>
                <p class="text-sm text-gray-600">BRIEF DESCRIPTION</p>
            </div>
        </div>
    </div>
</body>
</html>
