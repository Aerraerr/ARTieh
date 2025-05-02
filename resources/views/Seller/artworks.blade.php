@extends('layouts.forSeller')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<section>
    <div class="ml-[15%] mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Artwork Management</h1>
        <div class="flex justify-between mb-2">
            <button class="border-[#A99476]  w-[40px] border rounded-lg ml-[50%] p-2">&#43;</button>
            <select id="roleFilter" style="padding-left:10px; height:40px; width:10%;" class="border border-[#A99476]  border rounded-lg">
                <option value="">Category</option>
                <option value="Admin">Paintings</option>
                <option value="">Drawings</option>
                <option value="">Drawings</option>
                <option value="">Sculptures</option>
            </select>
            <input type="text" id="orderSearch" style="padding-left:10px; height:40px;" class="border border-[#A99476] mr-8 border text-[#A99476]  rounded-lg w-1/3" placeholder="Search users...">
        </div>
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
                    @include('Seller.artworksModal')
            @endforeach
            @else
                <p class="text-gray-500">No artworks uploaded yet.</p>
            @endif
            </tbody>
        </table>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
