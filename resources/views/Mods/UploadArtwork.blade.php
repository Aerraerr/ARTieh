<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplaod Artwork</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body  class="bg-white text-gray-900">
    @include('layouts.forNav')
    @extends('layouts.forbg')

    <div class="container-fluid py-5 px-4">
        <div class="bg-white p-4 rounded shadow-lg border mx-auto" style="max-width: 90%;">
        <a href="{{ url()->previous() }}" style="font-family: Rubik;" class="text-[#6e4d41] opacity-60  
                  -translate-x-10 hover:bg-gray-400 p-2 rounded-full"> &lt; BACK
              </a>
            <h1 class=" ml-10 mt-3 text-5x2 text-[#6E4D41]">Upload Artwork</h1>
            <hr class="my-4">

            
                <div class="mb-4 ml-10 mt-5">
                        <div class="flex items-center space-x-4">
                            <label class="block font-semibold text-gray-700 w-[140px]">Product Images</label>
                            <label for="imageUpload" class="cursor-pointer">
                            <img src="images/UploadImage1.svg" alt="Upload Image" class="w-40 h-40 border-2 border-dashed border-gray-300 p-2">
                            </label>
                            <input id="imageUpload" name="image" type="file" class="hidden">
                                
                            </label>
                        </div>
                </div>
                
                <div class="flex items-center space-x-4 ml-10 mt-5">
                    <label for="artwork_title" class=" block font-semibold text-gray-700 w-[140px]" required>Product Name</label>
                    <input type="text" name="artwork_title" placeholder="Artwork Name + Key Features" 
                    class="w-50 px-4 py-2 border focus:ring focus:ring-[#6E4D41] outline-none mt-1">
                </div>
            
                <div class="flex items-center space-x-4 ml-10 mt-5">
                    <label for="Category" required class="block font-semibold text-gray-700 w-[140px]">Category:</label>
                        <select name="category_id"  class="w-50 px-4 py-2 border border-gray-400 focus:ring-[#6E4D41] focus:ring-2 focus:outline-none mt-1" 
        required>
                            <option value="" disabled selected>Please set category</option>
                             
                        </select>
                </div>

                <div class="flex items-center space-x-4 ml-10 mt-5">
                    <label class="block font-semibold text-gray-700 w-[140px]">Price</label>
                    <input type="number" name="price" placeholder="₱" required 
                        class="w-50 px-4 py-2 border focus:ring focus:ring-[#6E4D41] outline-none mt-1">
                </div>

                <div class="flex items-center space-x-4 ml-10 mt-5">
                    <label for="description" class="block font-semibold text-gray-700 w-[140px]" required>Description:</label>
                        <textarea name="description" placeholder="Enter product description" rows="4" 
                    class="w-50 px-4 py-2 border focus:ring focus:ring-[#6E4D41] outline-none mt-1"></textarea>
                </div>

        

                <div class="flex justify-end space-x-4">
                    <button type="button" class="px-6 py-2 rounded text-gray-600 border  hover:bg-gray-100">Cancel</button>
                    <button type="submit" class="px-6 py-2 rounded text-white bg-[#6E4D41]  hover:bg-[#5a3d33] transition">Save</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
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