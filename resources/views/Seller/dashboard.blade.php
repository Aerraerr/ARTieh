@extends('layouts.forSeller')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

  <div class="ml-[15%] mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg h-auto overflow-auto">
    <h1 style="font-family:rubik;" class="text-[#6e4d41] ml-5 text-3xl font-bold mb-4">Dashboard </h1>

    <div class="overflow-x-auto ml-2 mr-2 p-4 rounded-lg">
        <!-- To Do List -->
        <div>
            <h3 class="text-md font-medium text-[#3A2E2A] mb-3">To Do List</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">{{$ordered->whereIn('status_id', [2, 3])->count()}}</p>
                    <p class="text-sm mt-1">To-Process Shipment</p>
                </div>
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">{{$ordered->where('status_id', 4)->count()}}</p>
                    <p class="text-sm mt-1">Processed Shipment</p>
                </div>
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">{{$ordered->where('status_id', 5)->count()}}</p>
                    <p class="text-sm mt-1">Cancelled</p>
                </div>
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">{{$ordered->where('status_id', 1)->count()}}</p>
                    <p class="text-sm mt-1">Pending Orders</p>
                </div>
            </div>
        </div>

        <br>

        <!-- Business Insights -->
        <div class="space-y-4">
            <h3 class="text-md font-medium text-[#3A2E2A]">Business Insights</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">&#8369;{{$monthlysale}}</p>
                    <p class="text-sm mt-1">Monthly Sales</p>
                </div>
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">&#8369;{{$yearlysale}}</p>
                    <p class="text-sm mt-1">Yearly Sales</p>
                </div>
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">&#8369;{{$totalsale}}</p>
                    <p class="text-sm mt-1">Total Sales</p>
                </div>
                <div class="border rounded-lg p-4 text-center">
                    <p class="text-2xl font-bold">{{$totalorders}}</p>
                    <p class="text-sm mt-1">Total Orders</p>
                </div>
            </div>
        </div>

        <br>

        <!-- Business Graphs -->
        <div class="border p-4 rounded-lg">
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
            <canvas id="salesChart" class="bg-[#fdfdff]"></canvas>
        </div>

        <br>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Sales History Table -->
            <div class="md:col-span-2">
                <div class="border rounded-lg p-4">
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
                                                    @endforeach
                                                </td>
                                                <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                                                <td>{{ $order->total_amount ?? 'N/A' }}</td>
                                                <td>
                                                    <span class="text-green-500 px-2 py-1 text-xs">
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
            <div class="border rounded-lg p-4">
                <h3 class="font-semibold text-[#3A2E2A] mb-4">Top Arts Distribution</h3>
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>
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

<script>
    const salesData = {
        items: @json($monthlyItems),
        currency: @json($monthlySales)
    };

    const categoryLabels = @json($categoryLabels);
    const categoryValues = @json($categoryValues);

    const monthLabels = @json(
        collect(range(5, 0))->map(function($i) {
            return \Carbon\Carbon::now()->startOfMonth()->subMonths($i)->format('F');
        })
    );

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
            labels: monthLabels,
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
        labels: @json($categoryLabels),
        datasets: [{
            data: @json($categoryValues),
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
                        return context.label + ': ' + context.parsed + ' sold';
                    }
                }
            }
        }
    }
});

</script>


<script>
const ctx2 = document.getElementById('artworksSoldChart').getContext('2d');
const artworksSoldChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April'],
        datasets: [{
            label: 'Artworks Sold',
            data: [5, 10, 3, 8],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
            tension: 0.4
        }]
    },
    options: {
        responsive: true
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
