@extends('layouts.forSeller')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
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
    <div class="ml-[15%] mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Artwork Management</h1>
        <div class="flex justify-between mb-4">
            <select id="roleFilter" style="padding-left:10px; height:40px; width:10%; margin-left:53%;" class="border border-[#A99476]  border rounded-lg">
                <option value="">Category</option>
                <option value="Admin">Paintings</option>
                <option value="">Drawings</option>
                <option value="">Drawings</option>
                <option value="">Sculptures</option>
            </select>
            <input type="text" id="orderSearch" style="padding-left:10px; height:40px;" class="border border-[#A99476] mr-5 border text-[#A99476]  rounded-lg w-1/3" placeholder="Search users...">
        </div>
        <br>
        <div class="overflow-x-auto ml-2 mr-2 p-4  rounded-lg">
        <table id="example" class="w-full border border-gray-300 rounded-lg text-sm text-gray-700">
            <thead class="bg-[#F3EBE1]  text-gray-600 uppercase text-sm">
                <tr class="text-[#6e4d41]">
                    <th class="text-center py-3 px-2 border-b">ID</th>
                    <th class="text-center py-3 px-6 border-b">Artwork</th>
                    <th class="text-center py-3 px-6 border-b">Artwork Title</th>
                    <th class="text-center py-3 px-6 border-b">Dimension</th>
                    <th class="text-center py-3 px-6 border-b">Category</th>
                    <th class="text-center py-3 px-6 border-b">Price</th>
                    <th class="text-center py-3 px-6 border-b">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if(Auth::user()->role === 'seller' && $artworks->count() > 0)
                @foreach($artworks as $artwork)
                    <tr class="hover:bg-gray-100" data-bs-toggle="modal">
                        <td class="text-center py-3 px-4 border-b">{{$artwork->id}}</td>
                        <td class="text-center py-3 px-6 border-b"><img src="{{ asset($artwork->image_path) }}" class="w-[50px] h-[50px] object-cover"></td>
                        <td class="text-center py-3 px-6 border-b">{{ $artwork->artwork_title }}</td>
                        <td class="text-center py-3 px-6 border-b">{{ $artwork->dimension }}</td>
                        <td class="text-center py-3 px-6 border-b">{{ $artwork->category->category_name }}</td>
                        <td class="text-center py-3 px-6 border-b">₱{{$artwork->price}}</td>
                        <td class="text-center py-3 px-6 border-b">
                            <div class="flex flex-col sm:flex-row gap-2 py-1">
                                <button class="border px-3 py-1 rounded text-xs hover:bg-[#2E2420] whitespace-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#updateArtmodal{{ $artwork->id }}">
                                    <img src="{{ asset('images/edit.svg') }}" class="w-4 h-4">
                                </button>
                                <button class="border px-3 py-1 rounded text-xs hover:bg-[#2E2420] whitespace-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#processOrderModal">
                                    <img src="{{ asset('images/del.svg') }}" class="w-4 h-4">
                                </button>
                            </div>
                        </td>
                    </tr>

                    
                    <!-- edit artwork modal -->
                        <div class="modal fade" id="updateArtmodal{{ $artwork->id }}" tabindex="-1" aria-labelledby="updateArtmodalLabel{{ $artwork->id }}" aria-hidden="true">
                            <div class="bg-white w-[800px] modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="updateArtmodal{{ $artwork->id }}" class="modal-title font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl pl-[20px]">Edit Artwork {{ $artwork->artwork_title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <br>
                                <div class="modal-body bg-white w-[800px]">
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

                                <div class="modal-footer mt-2">
                                    <div class="flex justify-end space-x-4">
                                        <button type="button" class="px-6 py-2 text-gray-600 border hover:bg-gray-100" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="px-6 py-2 text-white bg-[#6E4D41]  hover:bg-[#5a3d33] transition">Save</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div> 
            @endforeach
            @else
                <p class="text-gray-500">No artworks uploaded yet.</p>
            @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4 text-right mr-6 ">
            <button>Add</button>
        </div>
</section>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            pageLength: 10,
            lengthChange: false,
            language: {
                search: "Search users:",
                paginate: {
                    previous: "←",
                    next: "→"
                }
            }
        });
    });
</script>
<script> //search para sa manage orders
  document.getElementById("orderSearch").addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    const orderRows = document.querySelectorAll("table tbody tr");

    orderRows.forEach(row => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
  });
</script>
