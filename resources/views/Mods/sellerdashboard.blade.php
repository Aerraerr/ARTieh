<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Seller Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-[#F8F7F4] text-gray-900">

  @include('layouts.forNav')
  @extends('layouts.forbg')

  <section class="max-w-6xl mx-auto py-6 px-4">
    <!-- White background container -->
    <div class="bg-white p-6 rounded-xl shadow-sm">

      <!-- Header -->
      <div class="flex items-center gap-2 mb-6">
        <button onclick="history.back()" class="text-[#6E4D41] text-xl">&larr;</button>
        <h2 class="text-2xl font-bold text-[#3A2E2A]">Seller Dashboard</h2>
      </div>

      <!-- Combined Metrics Section -->
      <div class="space-y-6 mb-8">
        <!-- To Do List -->
        <div>
          <h3 class="text-md font-medium text-[#3A2E2A] mb-3">To Do List</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">{{$ordered->whereIn('status_id', [2, 3])->count()}}</p>
              <p class="text-sm mt-1">To-Process Shipment</p>
            </div>
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">{{$ordered->where('status_id', 4)->count()}}</p>
              <p class="text-sm mt-1">Processed Shipment</p>
            </div>
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">{{$ordered->where('status_id', 5)->count()}}</p>
              <p class="text-sm mt-1">Cancelled</p>
            </div>
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">{{$ordered->where('status_id', 1)->count()}}</p>
              <p class="text-sm mt-1">Pending Orders</p>
            </div>
          </div>
        </div>

        <!-- Business Insights -->
        <div class="space-y-4">
          <h3 class="text-md font-medium text-[#3A2E2A]">Business Insights</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">&#8369;{{$monthlysale}}</p>
              <p class="text-sm mt-1">Monthly Sales</p>
            </div>
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">&#8369;{{$yearlysale}}</p>
              <p class="text-sm mt-1">Yearly Sales</p>
            </div>
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">&#8369;{{$totalsale}}</p>
              <p class="text-sm mt-1">Total Sales</p>
            </div>
            <div class="bg-[#FFE0B2] rounded-lg p-4 text-center">
              <p class="text-2xl font-bold">{{$totalorders}}</p>
              <p class="text-sm mt-1">Total Orders</p>
            </div>
          </div>
        </div>

        <!-- Business Graphs -->
        <div class="bg-[#FFE0B2] p-4 rounded-lg">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-[#3A2E2A]">Monthly Sales Performance</h3>
            <div class="flex gap-2">
              <button id="toggleItems" class="px-3 py-1 rounded bg-[#3A2E2A] text-white text-sm">
                Items Sold
              </button>
              <button id="toggleSales" class="px-3 py-1 rounded bg-white border border-[#3A2E2A] text-sm hover:bg-gray-100">
                Total Sales
              </button>
            </div>
          </div>
          <canvas id="salesChart"></canvas>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Sales History Table -->
        <div class="md:col-span-2">
          <div class="bg-[#FFE0B2] rounded-lg p-4">
            <div class="flex justify-between items-center mb-3">
              <h3 class="font-semibold text-[#3A2E2A]">Sales History</h3>
              <select class="text-sm border border-gray-300 rounded px-2 py-1">
                <option>Last 6 Months</option>
              </select>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-left text-sm border-b-2 border-[#3A2E2A]">
                    <th class="pb-2">Product Name</th>
                    <th class="pb-2">Payment Method</th>
                    <th class="pb-2">Price</th>
                    <th class="pb-2">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($ordered->isNotEmpty())
                    @foreach($ordered as $order)
                      @if($order->status_id === 4)
                        <tr class="text-sm border-b border-[#3A2E2A]/10">
                          <td class="py-3">
                            @foreach($order->items as $item)
                              {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                            @endforeach</td>
                          <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                          <td>{{ $order->total_amount ?? 'N/A' }}</td>
                          <td>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                              {{ $order->status->status_name ?? 'N/A' }}
                            </span>
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  @endif
                </tbody>
                @if($ordered->where('status_id', 4)->isEmpty())
                   <tr class="text-center"><td colspan="4"><br>No Sale History!</td></tr>
                @endif
              </table>
            </div>
          </div>
        </div>

          <!-- Top Arts Sold -->
          <div class="bg-[#FFE0B2] rounded-lg p-4">
              <h3 class="font-semibold text-[#3A2E2A] mb-4">Top Arts Distribution</h3>
              <canvas id="categoryChart"></canvas>
              
            </div>
          </div>

        <!-- Manage Orders Table -->
      <div id="manageOrdersSection"  class="bg-[#FFE0B2] rounded-lg p-4 mt-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h4 class="font-semibold text-[#3A2E2A] text-lg">Manage Orders</h4>
        <div class="flex gap-2 w-full sm:w-auto">
          <input
            type="text" id="orderSearch" placeholder="Search Orders..."
            class="border border-gray-300 rounded px-2 py-1 text-sm w-full sm:w-64"/>
          <select class="text-sm border border-gray-300 rounded px-2 py-1 w-full sm:w-32">
            <option>Last 30 Days</option>
            <option>Last Week</option>
          </select>
        </div>
        </div>
        <div class="overflow-x-auto">
            @if($ordered->count() > 0)
                      <table class="w-full min-w-[600px] sm:min-w-0">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">Order ID</th>
                                  <th scope="col">Product</th>
                                  <th scope="col">Total Amount</th>
                                  <th scope="col">Delivery Method</th>
                                  <th scope="col">Payment Method</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($ordered as $order)
                                  <tr class="text-center " data-bs-toggle="modal">
                                      <td>{{ $order->id }}</td>
                                      <td>
                                          @foreach($order->items as $item)
                                              {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                                          @endforeach
                                      </td>
                                      <td>₱{{ $order->total_amount }}</td>
                                      <td>{{ $order->delivery_method }}</td>
                                      <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                                      <td>
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
                                      <td>{{ $order->ordered_at }}</td>
                                      <td class="px-2">
                                        <div class="flex flex-col sm:flex-row gap-2 py-1">
                                          <button class="bg-[#3A2E2A] text-white px-3 py-1 rounded text-xs hover:bg-[#2E2420] whitespace-nowrap"
                                            data-bs-toggle="modal" data-bs-target="#processOrderModal{{$order->id}}">
                                            Edit 
                                          </button>
                                        </div>
                                      </td>
                                  </tr>

                                  <!-- Process Order Modal --> <!-- note: dapat nasa laog kang loop para kuwa na so id-->
                                    <div class="modal fade" id="processOrderModal{{$order->id}}" tabindex="-1" aria-labelledby="processOrderLabel{{$order->id}}" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                          <div class="modal-header bg-[#6e4d41] text-white">
                                            <h4 class="modal-title text-center" id="processOrderLabel{{$order->id}}">Manage Order</h4>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body ">
                                            <div><h6>Order details:</h6></div>
                                            <div>
                                              <div class="flex justify-between items-center">
                                                <div class="text-left"><p>order id:</p></div><div class="text-right"><p>{{ $order->id }}</p></div></div>
                                                <div class="flex justify-between items-center">
                                                <div class="text-left">
                                                  <p>Artwork title:</p>
                                                  </div>
                                                    <div class="text-right">
                                                      <p>
                                                          @foreach($order->items as $item)
                                                          {{ $item->artwork->artwork_title ?? 'Untitled' }}<br>
                                                        @endforeach
                                                      </p>
                                                    </div>
                                                  </div>
                                                  <div class="flex justify-between items-center"><div class="text-left"><p>Total amount:</p></div><div class="text-right"><p>₱{{ $order->total_amount }}</p></div></div>
                                                  <div class="flex justify-between items-center"><div class="text-left"><p>Delivery method:</p></div><div class="text-right"><p>{{ $order->delivery_method }}</p></div></div>
                                                  <div class="flex justify-between items-center"><div class="text-left"><p>Payment method:</p></div><div class="text-right"><p>{{ $order->payment->payment_method }}</p></div></div>
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
          </div>
          </div>
    </div> <!--  container -->

  </section>





  <script>
    const salesData = {
      items: [45, 62, 28, 51, 37, 43],
      currency: [125000, 185000, 89000, 154000, 110000, 143000]
    };

    let currentView = 'items';
    let chartInstance = null;

    function updateChart(viewType) {
      const isCurrency = viewType === 'currency';
      
      chartInstance.data.datasets[0].data = salesData[viewType];
      chartInstance.data.datasets[0].label = isCurrency ? 
        'Monthly Total Sales' : 'Monthly Items Sold';

      chartInstance.options.scales.y.ticks.callback = isCurrency ? 
        value => '₱' + value.toLocaleString() : 
        value => value.toLocaleString();

      chartInstance.options.scales.y.title.text = isCurrency ? 
        'Total Sales (PHP)' : 'Number of Items Sold';

      chartInstance.options.plugins.tooltip.callbacks.label = function(context) {
        return isCurrency ? 
          '₱' + context.parsed.y.toLocaleString() : 
          context.parsed.y + ' items sold';
      };

      chartInstance.update();
      
      document.querySelectorAll('button[id^="toggle"]').forEach(btn => {
        const isActive = btn.id === `toggle${viewType.charAt(0).toUpperCase() + viewType.slice(1)}`;
        btn.classList.toggle('bg-[#3A2E2A]', isActive);
        btn.classList.toggle('text-white', isActive);
        btn.classList.toggle('border', !isActive);
        btn.classList.toggle('bg-white', !isActive);
      });
    }

    // Initialize chart
    chartInstance = new Chart(document.getElementById('salesChart'), {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Monthly Items Sold',
          data: salesData.items,
          borderColor: '#3A2E2A',
          tension: 0.4,
          backgroundColor: 'rgba(58, 46, 42, 0.1)'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { 
            position: 'top',
            labels: {
              boxWidth: 0,
              padding: 16
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.parsed.y} items sold`;
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Number of Items Sold'
            },
            ticks: {
              callback: function(value) {
                return value.toLocaleString();
              }
            }
          }
        }
      }
    });

    // Event listeners
    document.getElementById('toggleItems').addEventListener('click', () => {
      currentView = 'items';
      updateChart(currentView);
    });

    document.getElementById('toggleSales').addEventListener('click', () => {
      currentView = 'currency';
      updateChart(currentView);
    });

    // Category chart
    new Chart(document.getElementById('categoryChart'), {
      type: 'doughnut',
      data: {
        labels: ['Drawings', 'Sculpture', 'Paintings', 'Digital Art', 'Commissions'],
        datasets: [{
          data: [35, 25, 20, 15, 5],
          backgroundColor: ['#3A2E2A', '#6E4D41', '#FEE29C', '#D4C1A7', '#F8F7F4'],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed + '%';
              }
            }
          }
        }
      }
    });
  </script>

<script> //search para sa manage orders
  document.getElementById("orderSearch").addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    const orderRows = document.querySelectorAll("#manageOrdersSection table tbody tr");

    orderRows.forEach(row => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
  });
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  @include('layouts.footer')


</body>
</html>