
<!-- Edit Artwork Modal -->
<div class="modal fade" id="updateArtmodal{{ $artwork->id }}" tabindex="-1" aria-labelledby="updateArtmodalLabel{{ $artwork->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="updateArtmodalLabel{{ $artwork->id }}" class="modal-title font-semibold text-[#6E4D41] text-2xl">Edit Artwork: {{ $artwork->artwork_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SellerEditArtwork', $artwork->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body px-6 py-4 space-y-6">
                    
                    <!-- Image Section -->
                    <div class="flex items-center space-x-6">
                        <label class="w-48 text-gray-700 font-medium">Change Artwork Photo</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-24 h-24 object-cover border rounded" />
                            <input id="imageUpload{{ $artwork->id }}" name="image" type="file" 
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6E4D41] focus:border-[#6E4D41] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#6E4D41] file:text-white hover:file:bg-[#48332B]">
                        </div>
                    </div>

                    <!-- Product Name -->
                    <div class="flex items-center space-x-6">
                        <label for="artwork_title{{ $artwork->id }}" class="w-48 text-gray-700 font-medium">Product Name</label>
                        <input type="text" id="artwork_title{{ $artwork->id }}" name="artwork_title" value="{{ $artwork->artwork_title }}"
                            class="flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none">
                    </div>

                    <!-- Dimension -->
                    <div class="flex items-center space-x-6">
                        <label for="dimension{{ $artwork->id }}" class="w-48 text-gray-700 font-medium">Dimension</label>
                        <input type="text" id="dimension{{ $artwork->id }}" name="dimension" value="{{ $artwork->dimension }}" required
                            class="flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none">
                    </div>

                    <!-- Category -->
                    <div class="flex items-center space-x-6">
                        <label for="category_id{{ $artwork->id }}" class="w-48 text-gray-700 font-medium">Category</label>
                        <select id="category_id{{ $artwork->id }}" name="category_id" required
                            class="flex-1 px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-[#A99476] focus:outline-none">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $artwork->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="flex items-center space-x-6">
                        <label for="price{{ $artwork->id }}" class="w-48 text-gray-700 font-medium">Price</label>
                        <input type="number" name="price" id="price{{ $artwork->id }}" value="{{ $artwork->price }}" required
                            class="flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none">
                    </div>

                    <!-- Description -->
                    <div class="flex items-start space-x-6">
                        <label for="description{{ $artwork->id }}" class="w-48 text-gray-700 font-medium mt-2">Description</label>
                        <textarea id="description{{ $artwork->id }}" name="description" rows="4" required
                            class="flex-1 px-4 py-2 border rounded focus:ring focus:ring-[#A99476] outline-none">{{ $artwork->description }}</textarea>
                    </div>
                </div>

                <div class="modal-footer px-6 py-4 flex justify-end space-x-4">
                    <button type="button" class="px-6 py-2 text-gray-600 border hover:bg-gray-100" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-6 py-2 text-white bg-[#6E4D41] hover:bg-[#5a3d33] transition">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
