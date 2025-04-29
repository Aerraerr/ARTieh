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
    <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Order Management</h1>
    <div class="flex justify-between mb-4">
        <select id="statusFilter" style="padding-left:10px; height:40px; width:10%; margin-left:53%;" class="border border-[#A99476]  border rounded-lg">
            <option value="">Status</option>
            <option value="to pay">to pay</option>
            <option value="to pickup">to pickup</option>
             <option value="to receive">to receive</option>
              <option value="completed">completed</option>
               <option value="cancelled">cancelled</option>
        </select>
        <input type="text" id="orderSearch" style="padding-left:10px; height:40px;" class="border border-[#A99476] mr-5 border text-[#A99476]  rounded-lg w-1/3" placeholder="Search users...">

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

                        <!-- Process Order Modal --> <!-- note: dapat nasa laog kang loop para kuwa na so id-->
                        <div class="modal fade" id="ordersmodal{{$order->id}}" tabindex="-1" aria-labelledby="ordersmodal{{$order->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">

                                    <div class="modal-header bg-[#6e4d41] text-white">
                                        <h4 class="modal-title text-center" id="ordersmodal{{$order->id}}">Manage Order</h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body ">
                                        <div>
                                            <h6>Order details:</h6>
                                        </div>

                                        <div>
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><p>order id:</p></div>
                                                <div class="text-right"><p>{{ $order->id }}</p></div>
                                            </div>
                                                
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><p>Artwork title:</p></div>
                                                <div class="text-right">
                                                    <p>
                                                        @foreach($order->items as $item)
                                                            {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><p>Total amount:</p></div>
                                                <div class="text-right"><p>₱{{ $order->total_amount }}</p></div>
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><p>Delivery method:</p></div>
                                                <div class="text-right"><p>{{ $order->delivery_method }}</p></div>
                                            </div>
                                            
                                            <div class="flex justify-between items-center">
                                                <div class="text-left"><p>Payment method:</p></div>
                                                <div class="text-right"><p>{{ $order->payment->payment_method }}</p></div>
                                            </div>
                                                  @if($order->status_id === 1 || $order->status_id === 2 || $order->status_id === 3)
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Status:</p></div><div class="text-right text-gray-800"><p>{{ $order->status->status_name }}</p></div></div>
                                                  @elseif($order->status_id === 4)
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Status:</p></div><div class="text-right text-green-800"><p>{{ $order->status->status_name }}</p></div></div>
                                                  @else
                                                    <div class="flex justify-between items-center"><div class="text-left"><p>Status:</p></div><div class="text-right text-red-800"><p>{{ $order->status->status_name }}</p></div></div>
                                                  @endif
                                                  <div class="flex justify-between items-center"><div class="text-left"><p>Order date:</p></div><div class="text-right"><p>{{ $order->ordered_at }}</p></div></div>         
                                              </div>
                                          </div>

                                    <div class="modal-footer justify-center">
                                        @if($order->status_id === 1)
                                            <form method="POST" action="{{route('order.update', $order->id)}}"> {{-- change status 1 to 2 or 3 depends if the delivery method is self pickup or request delivery --}}
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status_id" value="{{$order->delivery_method === 'self pickup' ? 2 : 3 }}">
                                                <button type="submit" class="btn btn-success px-4">Confirm Order</button>
                                            </form>

                                            <form method="POST" action="{{route('order.update', $order->id)}}"> {{-- Cancel order--}}
                                                @csrf
                                                @method('PATCH')
                                                  <input type="hidden" name="status_id" value="5"> 
                                                  <button type="sumbit" class="btn btn-secondary px-4" >Cancel Order</button>
                                            </form>

                                        @elseif($order->status_id === 2 || $order->status_id === 3)
                                            <form method="POST" action="{{route('order.update', $order->id)}}"> {{-- change status 2 or 3 to 4 (completed)--}}
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status_id" value="4"> 
                                                <button  class="btn btn-success px-4">Complete Order</button>
                                            </form>

                                            <form method="POST" >
                                                @csrf
                                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
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
