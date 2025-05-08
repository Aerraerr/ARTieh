
@extends('layouts.forSeller')
@include('Mods.forNotif')
@include('Mods.forChat')
<link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<section>
<div class="ml-[15%] mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Order Management</h1>
    <div style ="margin-left:90%; ">
        <button id="printBtn" class="border border-[#A99476] border rounded-lg"><img src="{{ asset('images/print.svg') }}" class="opacity-70 w-10 h-9"></button>
        <button id="exportBtn" class="border border-[#A99476] border rounded-lg"><img src="{{ asset('images/export.svg') }}" class="opacity-70 w-10 h-9"></button>
    </div>
    <div class="flex justify-between mb-4">
        <select id="statusFilter" style="padding-left:10px; height:40px; width:10%; margin-left:53%;" class="border border-[#A99476]  border rounded-lg">
            <option value="all">Status</option>
            @foreach ($status as $stats)
                <option value="{{ $stats->id }}">{{ $stats->status_name }}</option>
            @endforeach
        </select>
        <input type="text" id="orderSearch" style="padding-left:10px; height:40px;" class="border border-[#A99476] mr-8 border text-[#A99476]  rounded-lg w-1/3" placeholder="Search users...">

    </div>
    <div id="orderTableContainer" class="overflow-x-auto ml-2 mr-2 p-4  rounded-lg">
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
                        <tr class="hover:bg-gray-100" data-status="{{ $order->status_id }}" data-bs-toggle="modal">
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

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Search 
  const orderSearch = document.getElementById("orderSearch");
  if (orderSearch) {
    orderSearch.addEventListener("input", function() {
      const searchValue = this.value.toLowerCase();
      const orderRows = document.querySelectorAll("table tbody tr");

      orderRows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(searchValue) ? "" : "none";
      });
    });
  }

  // Status filter
  const statusFilter = document.getElementById('statusFilter');
  const orderRows = document.querySelectorAll("table tbody tr");

  if (statusFilter && orderRows.length > 0) {
    statusFilter.addEventListener('change', function() {
      const selectedStatus = this.value;
      
      orderRows.forEach(row => {
        const statusId = row.getAttribute('data-status');
        
        if (selectedStatus === 'all' || statusId === selectedStatus) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
  }
});
</script>
<script>
// Print
document.getElementById("printBtn").addEventListener("click", function () {
    const originalTable = document.querySelector("#example"); 
    const clonedTable = originalTable.cloneNode(true);

    // Remove the "Action" column 
    const headerCells = clonedTable.querySelectorAll("thead tr th");
    if (headerCells.length > 0) headerCells[headerCells.length - 1].remove();

    const bodyRows = clonedTable.querySelectorAll("tbody tr");
    bodyRows.forEach(row => {
        if (row.children.length > 0) row.lastElementChild.remove();
    });

    // Create print wrapper
    const printContainer = document.createElement("div");
    printContainer.innerHTML = `
        <h2 style="text-align:center; font-family: Poppins;">Orders Report</h2>
        ${clonedTable.outerHTML}
    `;

    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContainer.innerHTML;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
});

// Export PDF
document.getElementById("exportBtn").addEventListener("click", function () {
    const originalTable = document.querySelector("#example"); 
    const clonedTable = originalTable.cloneNode(true);

    // Remove the "Action" column 
    const headerCells = clonedTable.querySelectorAll("thead tr th");
    if (headerCells.length > 0) headerCells[headerCells.length - 1].remove();

    const bodyRows = clonedTable.querySelectorAll("tbody tr");
    bodyRows.forEach(row => {
        if (row.children.length > 0) row.lastElementChild.remove();
    });

    // Create container for PDF export
    const exportContainer = document.createElement("div");
    exportContainer.innerHTML = `
        <h2 style="text-align:center; font-family: Poppins;">Orders Report</h2>
        ${clonedTable.outerHTML}
    `;

    const opt = {
        margin:       0.5,
        filename:     'orders_report.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
    };

    html2pdf().set(opt).from(exportContainer).save();
});
</script>
