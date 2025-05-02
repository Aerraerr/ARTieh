@if(Auth::user()->role === 'seller') 
<!-- Upload Artwork Modal -->
<div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white w-[800px] rounded-lg shadow-lg p-8 ">
        <div class="modal-header flex justify-between items-center">
            <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl">Upload Artwork</h5>
            <button onclick="toggleModal('upload-modal')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <br>

        <form action="{{ route('storeUpload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 flex items-center gap-4">
                <label class="block font-semibold text-gray-700 w-[120px]">Add Photo</label>
                <label for="imageUpload" class="cursor-pointer">
                    <img src="{{ asset('images/add_photo.svg') }}" alt="Upload Image" class="w-20 h-10 border-2 border-dashed border-gray-300 p-2">
                </label>
                <input id="imageUpload" name="image" type="file" class="hidden">
            </div>

            <div class="mb-4 flex items-center gap-4">
                <label for="artwork_title" class="block font-semibold text-gray-700 w-[120px]">Artwork Name</label>
                <input type="text" name="artwork_title" placeholder="Artwork Name" required
                    class="w-[500px] px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none">
            </div>

            <div class="mb-4 flex items-center gap-4">
                <label for="dimension" class="block font-semibold text-gray-700 w-[120px]">Dimension</label>
                <input type="text" name="dimension" placeholder="Size of Canvas"
                    class="w-[500px] px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none">
            </div>

            <div class="mb-4 flex items-center gap-4">
                <label for="category_id" class="block font-semibold text-gray-700 w-[120px]">Category</label>
                <select name="category_id" required
                    class="w-[500px] px-4 py-2 border border-gray-400 focus:ring-[#A99476] focus:ring-2 focus:outline-none">
                    <option value="" disabled selected>Please set category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 flex items-center gap-4">
                <label for="price" class="block font-semibold text-gray-700 w-[120px]">Price</label>
                <input type="number" name="price" placeholder="₱" required
                    class="w-[500px] px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none">
            </div>

            <div class="mb-6 flex items-start gap-4">
                <label for="description" class="block font-semibold text-gray-700 w-[120px] pt-2">Description</label>
                <textarea name="description" rows="4" placeholder="Enter product description"
                    class="w-[500px] px-4 py-2 border focus:ring focus:ring-[#A99476] outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-4">
                <button onclick="toggleModal('upload-modal')" type="button"
                    class="px-6 py-2 text-gray-600 border hover:bg-gray-100">Cancel</button>
                <button type="submit"
                    class="px-6 py-2 text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">Upload</button>
            </div>
        </form>
    </div>
</div>
@endif

@if(Auth::user()->role === 'buyer')
<!-- Edit buyer profile modal -->
<div id="editbuyer-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">My Profile</h5>
        <button onclick="toggleModal('editbuyer-modal')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="put" />
      @csrf
      <div class="modal-body mx-auto max-w-[100%] sm:max-w-[100%]">
        <div class="flex flex-col lg:flex-row gap-8 items-stretch">
          
            <!-- Profile Image Section -->
            <div class="flex flex-col items-center lg:w-1/3">
              <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
                <img id="imageUpload" src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/profile_pic/user.png') }}" 
                alt="Profile Photo" class="object-cover w-full h-full" />
              </div>
              <br>
                <input id="imageUpload" name="profile_img" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                focus:outline-none focus:ring-2 focus:ring-[#6E4D41] focus:border-[#6E4D41] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]">
            </div>

            <div class="hidden lg:block border-l  h-auto min-h-[100px] mx-4"></div>

            <!-- Profile Form Section -->
            <div class="lg:w-2/3">
              <div class="mb-4 flex items-center gap-6">
                <label class="block font-semibold text-gray-700 w-[100px]">First Name</label>
                <input type="text" name="first_name" value="{{ $user->first_name }}"  class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
              </div>

              <div class="mb-4 flex items-center gap-4">
                <label class="block font-semibold text-gray-700 w-[100px]">Last Name</label>
                <input type="text" name="last_name" value="{{ $user->last_name }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
              </div>

              <div class="mb-4 flex items-center gap-4">
                <label class="block font-semibold text-gray-700 w-[100px]">Email</label>
                <input type="text" name="email" value="{{ $user->email }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
              </div>

              <div class="mb-4 flex items-center gap-4">
                <label class="block font-semibold text-gray-700 w-[100px]">Phone</label>
                <input type="number" name="phone" value="{{ $user->phone }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
              </div>

              <div class="mb-4 flex items-center gap-4">
                <label class="block font-semibold text-gray-700 w-[100px]">Address</label>
                <input type="text" name="address" value="{{ $user->address ?? 'zone/barangay/municipality/province' }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
              </div>

              <button type="submit" class="ml-[120px] bg-[#6E4D41] text-white px-4 py-2 rounded hover:bg-[#48332B] transition">
                Save
              </button>
            </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endif

@if(Auth::user()->role === 'seller')
<!-- Edit seller profile modal -->
<div id="editseller-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">My Profile</h5>
        <button onclick="toggleModal('editseller-modal')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT') <!-- Required for updates -->
      <div class="modal-body mx-auto max-w-[100%] sm:max-w-[100%]">
        <div class="flex flex-col lg:flex-row gap-8 items-stretch">
          
          <!-- Profile Image Section -->
          <div class="flex flex-col items-center lg:w-1/3">
            <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
              <img id="profileImage" src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/profile_pic/user.png') }}" alt="Profile Photo" class="object-cover w-full h-full" />
            </div>
            <br>
                <input id="imageUpload" name="profile_img" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                focus:outline-none focus:ring-2 focus:ring-[#6E4D41] focus:border-[#6E4D41] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]">    
          </div>

          <div class="hidden lg:block border-l  h-auto min-h-[100px] mx-4"></div>

          <!-- Profile Form Section -->
          <div class="lg:w-2/3">
            <div class="mb-4 flex items-center gap-6">
              <label class="block font-semibold text-gray-700 w-[100px]">First Name</label>
              <input type="text" name="first_name" value="{{ $user->first_name }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="block font-semibold text-gray-700 w-[100px]">Last Name</label>
              <input type="text" name="last_name" value="{{ $user->last_name }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="block font-semibold text-gray-700 w-[100px]">Email</label>
              <input type="text" name="email" value="{{ $user->email }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="block font-semibold text-gray-700 w-[100px]">Phone</label>
              <input type="number" name="phone" value="{{ $user->phone }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
              <label class="block font-semibold text-gray-700 w-[100px]">Address</label>
              <input type="text" name="address" value="{{ $user->address }}" class="border border-gray-300 rounded w-[350px] p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="mb-4 flex items-center gap-4">
                    <label for="biography" class="block font-semibold text-gray-700 w-[100px]" required>Biography</label>
                        <textarea name="biography" rows="4" 
                    class="w-[350px] px-2 py-1 border focus:ring focus:ring-[#6E4D41] outline-none mt-1">{{ $user->biography }}</textarea>
                </div>

            

            <button class="ml-[120px] bg-[#6E4D41] text-white px-4 py-2 rounded hover:bg-[#48332B] transition">
              Save
            </button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endif

<!-- share modal -->
<div id="share-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white w-[400px] rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6e4d41]">Share Profile</h2>
        <p class="text-sm text-gray-600 mt-2">Share this artist with your friends...</p>

        <!--<Modal Buttons -->
        <div class="flex justify-end gap-3 mt-4">
            <button onclick="toggleModal('share-modal')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Close</button>
            <button id="copyLinkBtn" onclick="copyLink()" class="px-4 py-2 bg-[#6e4d41] text-white rounded-lg hover:bg-[#5a3c32]">Copy Link</button>
        </div>
    </div>
</div>


<!-- add event modal -->
<div id="addevent-modal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true"
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg w-full max-w-[750px] mx-4 sm:mx-auto">
    <div class="p-6">
      <div class="modal-header flex justify-between items-center mb-4">
        <h5 class="font-semibold text-[#6E4D41] text-3xl sm:text-xl">ADD EVENT</h5>
        <button onclick="toggleModal('addevent-modal')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

       <!-- <button onclick="toggleModal('addevent-modal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>-->
      </div>

      <form action="{{ route('events.add', auth()->id()) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
          <!-- Event Photo -->
          <div class="flex items-center gap-4">
            <label class="w-[130px] font-semibold text-gray-700">Event Photo</label>
            <label for="event_img" class="cursor-pointer">
              <img src="images/add_photo.svg" alt="Upload Image"
                   class="w-20 h-10 border-2 border-dashed border-gray-300 p-2">
            </label>
            <input id="event_img" name="event_img" type="file" class="hidden">
          </div>

          <!-- Event Name -->
          <div class="flex items-center gap-4">
            <label class="w-[130px] font-semibold text-gray-700">Event Name</label>
            <input type="text" name="event_name" placeholder="Event name"
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
          </div>

          <!-- Organizer Name -->
          <div class="flex items-center gap-4">
            <label class="w-[130px] font-semibold text-gray-700">Organizer</label>
            <input type="text" name="organizer_name" placeholder="Organizer name"
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
          </div>

          <!-- Event Date -->
          <div class="flex items-center gap-4">
            <label class="w-[130px] font-semibold text-gray-700">Event Date</label>
            <input type="date" name="event_date"
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
          </div>

          <!-- Location -->
          <div class="flex items-center gap-4">
            <label class="w-[130px] font-semibold text-gray-700">Location</label>
            <input type="text" name="location" placeholder="zone/barangay/municipality/district"
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required />
          </div>

          <!-- Description -->
          <div class="flex items-start gap-4">
            <label class="w-[130px] font-semibold text-gray-700 mt-2">Description</label>
            <textarea name="event_description" placeholder="Event description" rows="4"
                      class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" required></textarea>
          </div>

          <!-- Buttons -->
          <div class="flex justify-end space-x-4 pt-4">
            <button type="button" onclick="toggleModal('addevent-modal')"
                    class="px-6 py-2 rounded text-gray-600 border hover:bg-gray-100">Cancel</button>
            <button type="submit"
                    class="px-6 py-2 rounded text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">Save</button>
          </div>
        </div>
      </form>
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

<!-- load and change the file/img selected in the modal -->
<script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Replace the profile image src with the selected image
                document.getElementById('profileImage').src = e.target.result;
            };

            reader.readAsDataURL(file); // Read file as a base64 URL
        }
    });
</script>

<script>
    // Function to copy the profile link
    function copyLink() {
        // Assuming you have a dynamic URL for the user's profile
        const profileUrl = window.location.href; // Get the current page URL, or set your own URL

        // Create a temporary input element to use the clipboard API
        const tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = profileUrl;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        Swal.fire({
                title: "Link copied!",
                icon: "success",
                timer: 800,
                showConfirmButton: false
            });

    }
</script>
