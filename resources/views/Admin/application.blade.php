@extends('layouts.formanagement')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

<div class="ml-[15%] ml-3 mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Seller Application Management</h1>
    <div class="flex justify-between mb-4">
        <select id="roleFilter" style="padding-left:10px; height:40px; width:10%; margin-left:53%;" class="border border-[#A99476]  border rounded-lg">
            <option value="">All Roles</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
        <input type="text" id="searchInput" style="padding-left:10px; height:40px;" class="border border-[#A99476] mr-5 border text-[#A99476]  rounded-lg w-1/3" placeholder="Search users...">

    </div>
    <div class="overflow-x-auto ml-2 mr-2 p-4  rounded-lg">
    <table id="example" class="w-full border border-gray-300 rounded-lg text-sm text-gray-700">
    <thead class="bg-[#F3EBE1] text-gray-600 uppercase text-sm">
        <tr class="text-[#6e4d41]">
            <th class="py-3 px-2 border-b">ID</th>
            <th class="py-3 px-6 border-b">First Name</th>
            <th class="py-3 px-6 border-b">Last Name</th>
            <th class="py-3 px-6 border-b">Email</th>
            <th class="py-3 px-6 border-b">Password</th>
            <th class="py-3 px-6 border-b">Phone Number</th>
            <th class="py-3 px-6 border-b">Role</th>
            <th class="py-3 px-6 border-b">Joined In</th>
            <th class="py-3 px-6 border-b">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
    @foreach ($users as $user)
        @if ($user->role === 'buyer'  && $user->sampleArt && $user->validId && $user->gcash_no) 
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b">{{ $user->id }}</td>
                <td class="py-3 px-6 border-b">{{ $user->first_name }}</td>
                <td class="py-3 px-6 border-b">{{ $user->last_name }}</td>
                <td class="py-3 px-6 border-b">{{ $user->email }}</td>
                <td class="py-3 px-6 border-b">••••••••••••</td> <!-- Hide password for security -->
                <td class="py-3 px-6 border-b">{{ $user->phone ?? 'N/A' }}</td>
                <td class="py-3 px-6 border-b">{{ ucfirst($user->role) }}</td>
                <td class="py-3 px-6 border-b">{{ $user->created_at->format('Y-m-d') }}</td>
                <td class="py-3 px-6 border-b">
                    <button class="border text-black px-3 py-1 rounded text-xs hover:bg-[#2E2420] whitespace-nowrap"
                    data-bs-toggle="modal" data-bs-target="#application{{$user->id}}"> change 
                    </button>
                </td>
            </tr>
            <!-- modal -->
                        <div class="modal fade" id="application{{$user->id}}" tabindex="-1" aria-labelledby="application{{$user->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title w-full" id="application{{$user->id}}">Manage Seller Application</h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body px-4 py-2">
                                        <h6 class="mb-3 font-semibold">User Information:</h6>

                                        <div>

                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>Name:</span></div>
                                                <div class="text-right"><span>{{ $user->full_name }}</span></div>
                                            </div>
                                            
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><span>Gcash number:</span></div>
                                                <div class="text-right"><span>{{ $user->gcash_no }}</span></div>
                                            </div>

                                            <div class="flex space-x-6 mt-4 mb-4 pl-20">
                                                <div class="text-center">
                                                    <span class="block font-medium text-gray-700 mb-1">Sample Artwork:</span>
                                                    <img src="{{ asset('storage/' . $user->sampleArt) }}" alt="Sample Artwork"
                                                        class="w-32 h-32 rounded-lg object-cover border border-gray-300 shadow-sm hover:scale-105 transition-transform duration-300">
                                                </div>

                                                <div class="text-center">
                                                    <span class="block font-medium text-gray-700 mb-1">Valid ID:</span>
                                                    <img src="{{ asset('storage/' . $user->validId) }}" alt="Valid ID"
                                                        class="w-32 h-32 rounded-lg object-cover border border-gray-300 shadow-sm hover:scale-105 transition-transform duration-300">
                                                </div>
                                            </div>

                                    <div class="modal-footer">
                                        <form method="POST" action="{{route('approveApplication', $user->id)}}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn border  hover:bg-[#2E2420] px-4">approve</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
        @endif
                        
    @endforeach
</tbody>

</table>










    
</div>

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