
<div id="upload-modal" class="container-fluid py-5 px-4 hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-[800px] rounded-lg shadow-lg p-8 max-h-[90vh] overflow-y-auto" style="max-width: auto;">
            <h1 class=" ml-10 mt-3 text-5x2 text-[#6E4D41]">Upload Artwork</h1>
            <hr class="my-4">
            <form action="{{ route('storeUpload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 ml-10 mt-5">
                        <div class="flex space-x-4">
                            <label class="mt-12 mr-10 block text-black-600 text-sm mb-4">Product Images</label>
                                <input name="image" type="file" required class="w-40 h-40 border-2 border-dashed border-gray-300 cursor-pointer file:hidden bg-white-100 p-2">
                            </label>
                        </div>
                </div>
                
                <div class="flex space-x-4 ml-10 mt-5">
                    <label for="artwork_title" class=" mt-3 mr-10 block text-sm text-black-600" required>Product Name</label>
                    <input type="text" name="artwork_title" placeholder="Artwork Name + Key Features" 
                    class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                </div>

                <div class="flex space-x-4 ml-10 mt-5">
                    <label for="Category" required class="block mr-16 text-sm text-black-700">Category:</label>
                        <select name="category_id"  class="w-50 px-4 py-2 border border-gray-400 focus:ring-[#A99476] focus:ring-2 focus:outline-none mt-1" 
                            required>
                            <option value="" disabled selected>Please set category</option>
                                @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                        </select>
                </div>

                <div class="flex space-x-4 ml-10 mt-5">
                    <label class="block mr-20 text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" placeholder="₱" required 
                        class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1">
                </div>

                <div class="flex space-x-4 ml-10 mt-5">
                    <label for="description" class="block mr-10 text-sm font-medium text-gray-700" required>Description:</label>
                        <textarea name="description" placeholder="Enter product description" rows="4" 
                    class="w-50 px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none mt-1"></textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="toggleModal('upload-modal')" class="px-6 py-2 text-gray-600 border  hover:bg-gray-100">Cancel</button>
                    <button type="" class="px-6 py-2 text-white bg-[#6E4D41]  hover:bg-[#5a3d33] transition">Save</button>
                </div>
            </form>
        </div>
    </div>


<div id="edit-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white w-[800px] rounded-lg shadow-lg p-6">

        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-4">
            <h2 class="text-3xl font-bold text-[#6E4D41]">My Profile</h2>
            <button onclick="toggleModal('edit-modal')" class="text-gray-600 hover:text-gray-900">
                &times;
            </button>
        </div>

        <!-- Modal Body -->
        <div class="flex flex-col lg:flex-row gap-8 mt-6">

            <!-- Profile Image Section -->
            <div class="flex flex-col items-center lg:w-1/3">
                <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
                    <img id="profileImage" src="images/artist.jpg" alt="Profile Photo" class="object-cover w-full h-full" />
                </div>
                <input type="file" id="fileInput" accept="image/*" class="hidden"/>
                <button id="uploadButton" 
                        class="mt-4 px-4 py-2 text-[#6E4D41] border border-[#6E4D41] rounded hover:bg-[#6E4D41] hover:text-white transition">
                    Select Image
                </button>
            </div>

            <div class="hidden lg:block border-l h-auto min-h-[100px] mx-4"></div>

            <!-- Profile Form Section -->
            <div class="lg:w-2/3">

                <!-- First Name -->
                <div class="mb-4 flex items-center gap-6">
                    <label class="block font-semibold text-gray-700 w-[100px]">First Name</label>
                    <input type="text" placeholder="First Name" 
                           class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
                </div>

                <!-- Last Name -->
                <div class="mb-4 flex items-center gap-4">
                    <label class="block font-semibold text-gray-700 w-[100px]">Last Name</label>
                    <input type="text" placeholder="Last Name" 
                           class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
                </div>

                <!-- Email -->
                <div class="mb-4 flex items-center gap-4">
                    <label class="font-semibold text-gray-700 w-[100px]">Email</label>
                    <div class="flex items-center gap-2">
                        <span class="p-2">Yahoo@gmail.com</span>
                        <a href="#" class="text-[#6E4D41] hover:text-[#48332B] transition">Edit</a>
                    </div>
                </div>

                <!-- Gender -->
                <div class="mb-4 flex items-center gap-4">
                    <label class="font-semibold text-gray-700 w-[100px]">Gender</label>
                    <div class="flex items-center gap-2">
                        <label class="flex items-center"><input type="radio" name="gender" class="mr-1" /> Male</label>
                        <label class="flex items-center"><input type="radio" name="gender" class="mr-1" /> Female</label>
                        <label class="flex items-center"><input type="radio" name="gender" class="mr-1" /> Vaklesh</label>
                    </div>
                </div>

                <!-- Save and Edit Profile Buttons -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="toggleModal('edit-modal')" 
                            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-[#6E4D41] text-white rounded-lg hover:bg-[#5a3c32] transition">Save</button>
                </div>

            </div>
        </div>
    </div>
</div>


<div id="share-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white w-[400px] rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6e4d41]">Share Profile</h2>
        <p class="text-sm text-gray-600 mt-2">Add sharing options here...</p>

        <!--<Modal Buttons -->
        <div class="flex justify-end gap-3 mt-4">
            <button onclick="toggleModal('share-modal')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Close</button>
            <button class="px-4 py-2 bg-[#6e4d41] text-white rounded-lg hover:bg-[#5a3c32]">Copy Link</button>
        </div>
    </div>
</div>

<!-- JavaScript for Modal Functionality -->
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>