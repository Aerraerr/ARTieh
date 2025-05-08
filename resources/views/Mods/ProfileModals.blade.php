@if(Auth::user()->role === 'seller') 
<!-- Upload Artwork Modal -->
<div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden px-4">
  <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-4 sm:p-6 overflow-y-auto max-h-[90vh]">

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <h5 class="text-[#6E4D41] text-xl sm:text-2xl font-semibold">Upload Artwork</h5>
      <button onclick="toggleModal('upload-modal')" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
    </div>

    <form action="{{ route('storeUpload') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- Add Photo -->
      <div class="mb-4 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
        <label class="w-full sm:w-[120px] font-semibold text-gray-700">Add Photo</label>
        <div>
          <label for="imageUpload" class="cursor-pointer">
            <img src="{{ asset('images/add_photo.svg') }}" alt="Upload Image" class="w-24 h-12 border-2 border-dashed border-gray-300 p-2">
          </label>
          <input id="imageUpload" name="image" type="file" class="hidden">
        </div>
      </div>

      <!-- Artwork Name -->
      <div class="mb-4 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
        <label for="artwork_title" class="w-full sm:w-[120px] font-semibold text-gray-700">Artwork Name</label>
        <input type="text" name="artwork_title" placeholder="Artwork Name" required
               class="w-full sm:flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none" />
      </div>

      <!-- Dimension -->
      <div class="mb-4 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
        <label for="dimension" class="w-full sm:w-[120px] font-semibold text-gray-700">Dimension</label>
        <input type="text" name="dimension" placeholder="Size of Canvas"
               class="w-full sm:flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none" />
      </div>

      <!-- Category -->
      <div class="mb-4 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
        <label for="category_id" class="w-full sm:w-[120px] font-semibold text-gray-700">Category</label>
        <select name="category_id" required
                class="w-full sm:flex-1 px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-[#A99476] focus:outline-none">
          <option value="" disabled selected>Please set category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            
          @endforeach
        </select>
      </div>

      <!-- Price -->
      <div class="mb-4 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
        <label for="price" class="w-full sm:w-[120px] font-semibold text-gray-700">Price</label>
        <input type="number" name="price" placeholder="₱" required
               class="w-full sm:flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none" />
      </div>

      <!-- Description -->
      <div class="mb-6 flex flex-col sm:flex-row items-start gap-2 sm:gap-4">
        <label for="description" class="w-full sm:w-[120px] font-semibold text-gray-700 pt-1">Description</label>
        <textarea name="description" rows="4" placeholder="Enter product description"
                  class="w-full sm:flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none"></textarea>
      </div>

      <!-- Buttons -->
      <div class="flex flex-col sm:flex-row justify-end gap-3">
        <button type="button" onclick="toggleModal('upload-modal')"
                class="w-full sm:w-auto px-6 py-2 rounded text-gray-600 border hover:bg-gray-100 transition">
          Cancel
        </button>
        <button type="submit"
                class="w-full sm:w-auto px-6 py-2 rounded text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">
          Upload
        </button>
      </div>

    </form>
  </div>
</div>
@endif


@if(Auth::user()->role === 'buyer')
<!-- Edit Buyer Profile Modal -->
<div id="editbuyer-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden px-4">
  <div class="bg-white rounded-lg w-full max-w-4xl shadow-lg overflow-y-auto max-h-[90vh]">

    <!-- Header -->
    <div class="flex justify-between items-center px-4 sm:px-6 py-4 border-b">
      <h5 class="text-[#6E4D41] text-xl sm:text-2xl font-semibold">My Profile</h5>
      <button onclick="toggleModal('editbuyer-modal')"class="text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
    </div>

    <!-- Form -->
    <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="put" />

      <div class="p-4 sm:p-6 space-y-6">
        <div class="flex flex-col lg:flex-row gap-6">

          <!-- Profile Image Upload -->
          <div class="flex flex-col items-center w-full lg:w-1/3">
            <div class="w-28 h-28 rounded-full overflow-hidden mb-4">
              <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/profile_pic/user.png') }}" 
                   alt="Profile Photo" class="w-full h-full object-cover">
            </div>
            <input name="profile_img" type="file"
              class="w-full text-sm border rounded-lg cursor-pointer bg-gray-50 border-gray-300 
                     focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full 
                     file:border-0 file:text-sm file:font-semibold 
                     file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]" />
          </div>

          <!-- Divider (hidden on mobile) -->
          <div class="hidden lg:block border-l h-auto mx-4"></div>

          <!-- Input Fields -->
          <div class="flex-1 space-y-4">
            @php
              $inputs = [
                ['label' => 'First Name', 'name' => 'first_name', 'type' => 'text', 'value' => $user->first_name],
                ['label' => 'Last Name', 'name' => 'last_name', 'type' => 'text', 'value' => $user->last_name],
                ['label' => 'Email', 'name' => 'email', 'type' => 'text', 'value' => $user->email],
                ['label' => 'Phone', 'name' => 'phone', 'type' => 'number', 'value' => $user->phone],
                ['label' => 'Address', 'name' => 'address', 'type' => 'text', 'value' => $user->address ?? 'zone/barangay/municipality/province']
              ];
            @endphp

            @foreach ($inputs as $input)
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
              <label class="w-full sm:w-32 font-semibold text-gray-700">{{ $input['label'] }}</label>
              <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" value="{{ $input['value'] }}"
                class="w-full sm:w-[250px] border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]">
            </div>
            @endforeach

            <!-- Submit Button -->
            <div class="pt-4 text-right">
              <button type="submit"
                class="w-full sm:w-auto bg-[#6E4D41] text-white px-6 py-2 rounded hover:bg-[#48332B] transition">
                Save
              </button>
            </div>
          </div>

        </div>
      </div>
    </form>

  </div>
</div>
@endif


@if(Auth::user()->role === 'seller')
<!-- Edit seller profile modal -->
<div id="editseller-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden px-4">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl mx-auto overflow-auto max-h-[90vh]">
    <div class="modal-header flex justify-between items-center px-6 py-4 border-b">
      <h5 class="modal-title font-semibold text-[#6E4D41] text-2xl md:text-3xl">My Profile</h5>
      <button onclick="toggleModal('editseller-modal')" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
    </div>

    <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="p-6">
      @csrf
      @method('PUT')

      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Profile Image Section -->
        <div class="flex flex-col items-center w-full lg:w-1/3">
          <div class="w-[120px] h-[120px] rounded-full overflow-hidden">
            <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/profile_pic/user.png') }}" 
                 alt="Profile Photo" class="object-cover w-full h-full" />
          </div>
          <br>
          <input name="profile_img" type="file" 
                 class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6E4D41] focus:border-[#6E4D41] 
                        file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]">
        </div>

        <!-- Divider -->
        <div class="hidden lg:block border-l min-h-[100px] mx-4"></div>

        <!-- Profile Form Section -->
        <div class="w-full lg:w-2/3">
          <div class="grid grid-cols-1 gap-4">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
              <label class="w-[100px] font-semibold text-gray-700">First Name</label>
              <input type="text" name="first_name" value="{{ $user->first_name }}"
                     class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
              <label class="w-[100px] font-semibold text-gray-700">Last Name</label>
              <input type="text" name="last_name" value="{{ $user->last_name }}"
                     class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
              <label class="w-[100px] font-semibold text-gray-700">Email</label>
              <input type="text" name="email" value="{{ $user->email }}"
                     class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
              <label class="w-[100px] font-semibold text-gray-700">Phone</label>
              <input type="number" name="phone" value="{{ $user->phone }}"
                     class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
              <label class="w-[100px] font-semibold text-gray-700">Address</label>
              <input type="text" name="address" value="{{ $user->address }}"
                     class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center gap-2">
              <label class="w-[100px] font-semibold text-gray-700">Biography</label>
              <textarea name="biography" rows="4"
                        class="flex-1 px-2 py-1 border rounded focus:ring focus:ring-[#6E4D41] outline-none mt-1">{{ $user->biography }}</textarea>
            </div>
          </div>

          <div class="mt-6 text-right">
            <button type="submit" class="bg-[#6E4D41] text-white px-6 py-2 rounded hover:bg-[#48332B] transition">
              Save
            </button>
          </div>
        </div>
      </div>
    </form>
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


<!-- Add Event Modal -->
<div id="addevent-modal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true"
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
  <div class="bg-white rounded-lg w-full max-w-2xl shadow-lg overflow-y-auto max-h-[90vh]">

    <!-- Modal Header -->
    <div class="flex justify-between items-center px-4 sm:px-6 py-4 border-b">
      <h5 class="text-[#6E4D41] text-xl sm:text-2xl font-semibold">Add Event</h5>
      <button onclick="toggleModal('addevent-modal')" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
    </div>

    <!-- Modal Body -->
    <form action="{{ route('events.add', auth()->id()) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="p-4 sm:p-6 space-y-4">

        <!-- Event Photo -->
              <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                  <label class="w-full sm:w-[130px] font-semibold text-gray-700">Event Photo</label>
                  <div>
          <label for="event_img" class="cursor-pointer inline-block">
            <img id="event_preview" src="images/add_photo.svg" alt="Upload Image"
                class="w-24 h-12 border-2 border-dashed border-gray-300 p-2">
          </label>
          <input id="event_img" name="event_img" type="file" class="hidden" accept="image/*" onchange="previewEventImage(event)">
        </div>
          </div>
        <!-- Event Name -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Event Name</label>
          <input type="text" name="event_name" placeholder="Event name" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Organizer -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Organizer</label>
          <input type="text" name="organizer_name" placeholder="Organizer name" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Event Date -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Event Date</label>
          <input type="date" name="event_date" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Location -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700">Location</label>
          <input type="text" name="location" placeholder="zone/barangay/municipality/district" required
                 class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]" />
        </div>

        <!-- Description -->
        <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-4">
          <label class="w-full sm:w-[130px] font-semibold text-gray-700 mt-1 sm:mt-2">Description</label>
          <textarea name="event_description" placeholder="Event description" rows="4" required
                    class="flex-1 border border-gray-300 rounded p-2 focus:outline-none focus:ring-1 focus:ring-[#6E4D41]"></textarea>
        </div>

        <!-- Footer Buttons -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
          <button type="button" onclick="toggleModal('addevent-modal')"
                  class="w-full sm:w-auto px-6 py-2 rounded text-gray-600 border border-gray-300 hover:bg-gray-100 transition">
            Cancel
          </button>
          <button type="submit"
                  class="w-full sm:w-auto px-6 py-2 rounded text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">
            Save
          </button>
        </div>

      </div>
    </form>
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
<script>
  function previewEventImage(event) {
    const input = event.target;
    const preview = document.getElementById('event_preview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>