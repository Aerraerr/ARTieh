@extends('layouts.formanagement')

<div class="ml-[15%] ml-3 mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">User Management</h1>
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
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
    @foreach ($users as $user)
        @if ($user->role !== 'admin') <!-- Exclude admins -->
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b">{{ $user->id }}</td>
                <td class="py-3 px-6 border-b">{{ $user->first_name }}</td>
                <td class="py-3 px-6 border-b">{{ $user->last_name }}</td>
                <td class="py-3 px-6 border-b">{{ $user->email }}</td>
                <td class="py-3 px-6 border-b">••••••••••••</td> <!-- Hide password for security -->
                <td class="py-3 px-6 border-b">{{ $user->phone ?? 'N/A' }}</td>
                <td class="py-3 px-6 border-b">{{ ucfirst($user->role) }}</td>
                <td class="py-3 px-6 border-b">{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
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

<!--
    <table id="example" class="w-full border border-gray-300 rounded-lg text-sm text-gray-700">
        <thead class="bg-[#F3EBE1]   text-gray-600 uppercase text-sm">
            <tr class="text-[#6e4d41]">
                <th class="py-3 px-2 border-b">ID</th>
                <th class="py-3 px-6 border-b">First Name</th>
                <th class="py-3 px-6 border-b">Last Name</th>
                <th class="py-3 px-6 border-b">Email</th>
                <th class="py-3 px-6 border-b">Password</th>
                <th class="py-3 px-6 border-b">Phone Number</th>
                <th class="py-3 px-6 border-b">Role</th>
                <th class="py-3 px-6 border-b">Joined In</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b">0001</td>
                <td class="py-3 px-6 border-b">Aeron Jead</td>
                <td class="py-3 px-6 border-b">Marquez</td>
                <td class="py-3 px-6 border-b">marquezaeronjead@artieh.com</td>
                <td class="py-3 px-6 border-b">••••••••••••</td>
                <td class="py-3 px-6 border-b">+123456789</td>
                <td class="py-3 px-6 border-b">Admin</td>
                <td class="py-3 px-6 border-b">2011-04-25</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b">0002</td>
                <td class="py-3 px-6 border-b">Ron Peter</td>
                <td class="py-3 px-6 border-b">Mortega</td>
                <td class="py-3 px-6 border-b">mortegaronpeter@gmail.com</td>
                <td class="py-3 px-6 border-b">••••••••••••</td>
                <td class="py-3 px-6 border-b">+987654321</td>
                <td class="py-3 px-6 border-b">User</td>
                <td class="py-3 px-6 border-b">2011-07-25</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b">0003</td>
                <td class="py-3 px-6 border-b">Gian Russell</td>
                <td class="py-3 px-6 border-b">Villegas</td>
                <td class="py-3 px-6 border-b">villegasgian@gmail.com</td>
                <td class="py-3 px-6 border-b">••••••••••••</td>
                <td class="py-3 px-6 border-b">+987654321</td>
                <td class="py-3 px-6 border-b">User</td>
                <td class="py-3 px-6 border-b">2011-07-25</td>
            </tr>
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b">0004</td>
                <td class="py-3 px-6 border-b">John Cedrick</td>
                <td class="py-3 px-6 border-b">Bailon</td>
                <td class="py-3 px-6 border-b">BailonJohn@gmail.com</td>
                <td class="py-3 px-6 border-b">••••••••••••</td>
                <td class="py-3 px-6 border-b">+987654321</td>
                <td class="py-3 px-6 border-b">Seller</td>
                <td class="py-3 px-6 border-b">2011-07-25</td>
            </tr>
        </tbody>
    </table>
    -->
