@extends('layouts.forSeller')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<section>
<div class="ml-[15%] mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Order Management</h1>
    <div style ="margin-left:90%; ">
        <button class="border border-[#A99476] border rounded-lg"><img src="{{ asset('images/print.svg') }}" class="opacity-70 w-10 h-9"></button>
        <button class="border border-[#A99476] border rounded-lg"><img src="{{ asset('images/export.svg') }}" class="opacity-70 w-10 h-9"></button>
    </div>
    <div class="flex justify-between mb-4">
        <select id="statusFilter" style="padding-left:10px; height:40px; width:10%; margin-left:53%;" class="border border-[#A99476]  border rounded-lg">
            <option value="">Status</option>
            <option value="to pay">to pay</option>
            <option value="to pickup">to pickup</option>
             <option value="to receive">to receive</option>
              <option value="completed">completed</option>
               <option value="cancelled">cancelled</option>
        </select>
        <input type="text" id="orderSearch" style="padding-left:10px; height:40px;" class="border border-[#A99476] mr-8 border text-[#A99476]  rounded-lg w-1/3" placeholder="Search users...">

    </div>
    <div class="overflow-x-auto ml-2 mr-2 p-4  rounded-lg">
        @if($ordered->count() > 0)
            <table id="example" class="w-full border border-gray-300 rounded-lg text-sm text-gray-700">
                <thead class="bg-[#F3EBE1]   text-gray-600 uppercase text-sm">
                    <tr class="text-[#6e4d41]">
                        <th class="py-3 px-2 border-b">Order ID</th>
                        <th class="py-3 px-6 border-b">Product</th>
                        <th class="py-3 px-6 border-b">Total Amount</th>
                        <th class="py-3 px-6 border-b">Delivery Method</th>
                        <th class="py-3 px-6 border-b">Payment Method</th>
                        <th class="py-3 px-6 border-b">Status</th>
                        <th class="py-3 px-6 border-b">Orderd Date</th>
                        <th class="py-3 px-6 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($ordered as $order)
                        <tr class="hover:bg-gray-100" data-bs-toggle="modal">
                            <td class="py-3 px-4 border-b">{{ $order->id }}</td>
                            <td class="py-3 px-6 border-b">
                                @foreach($order->items as $item)
                                    {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                                @endforeach</td>
                            <td class="py-3 px-6 border-b">₱{{ $order->total_amount }}</td>
                            <td class="py-3 px-6 border-b">{{ $order->delivery_method }}</td>
                            <td class="py-3 px-6 border-b">{{ $order->payment->payment_method ?? 'N/A' }}</td>
                            <td class="py-3 px-6 border-b">
                                @if($order->status_id === 1 || $order->status_id === 2 || $order->status_id === 3)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">
                                        {{ $order->status->status_name ?? 'N/A' }}
                                    </span>
                                @elseif($order->status_id === 4)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                                        {{ $order->status->status_name ?? 'N/A' }}
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">
                                        {{ $order->status->status_name ?? 'N/A' }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-6 border-b">{{ $order->ordered_at }}</td>
                            <td class="py-3 px-6 border-b">
                                <div class="flex flex-col sm:flex-row gap-2 py-1">
                                    <button class="border text-black px-3 py-1 rounded text-xs hover:bg-[#2E2420] whitespace-nowrap"
                                        data-bs-toggle="modal" data-bs-target="#ordersmodal{{$order->id}}">
                                        View 
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('Seller.ordersModal')
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center mt-5">No orders found.</p>
        @endif
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
