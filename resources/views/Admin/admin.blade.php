@extends('layouts.forAdmin')
<link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">

<div class="ml-[15%] ml-3 mr-3 mt-10 p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-[#6e4d41] ml-5 text-3xl font-bold mb-8" style="font-family: 'Rubik', sans-serif;">
    Dashboard
  </h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Card 1: Total Sellers -->
    <div class="p-5 bg-[#f9f9f9] rounded-lg shadow">
      <h2 class="text-lg font-semibold text-[#6e4d41] mb-2" style="font-family: 'Rubik', sans-serif;">Total Sellers</h2>
      <p class="text-3xl font-bold text-[#333]">{{$users->where('role', 'seller')->count()}}</p>
    </div>

    <!-- Card 2: Total Buyers -->
    <div class="p-5 bg-[#f9f9f9] rounded-lg shadow">
      <h2 class="text-lg font-semibold text-[#6e4d41] mb-2" style="font-family: 'Rubik', sans-serif;">Total Buyers</h2>
      <p class="text-3xl font-bold text-[#333]">{{$users->where('role', 'buyer')->count()}}</p>
    </div>

    <!-- Card 3: Total Artworks -->
    <div class="p-5 bg-[#f9f9f9] rounded-lg shadow">
      <h2 class="text-lg font-semibold text-[#6e4d41] mb-2" style="font-family: 'Rubik', sans-serif;">Total Artworks</h2>
      <p class="text-3xl font-bold text-[#333]">{{$artworks->count()}}</p>
    </div>

    <!-- Card 4: Total Orders -->
    <div class="p-5 bg-[#f9f9f9] rounded-lg shadow">
      <h2 class="text-lg font-semibold text-[#6e4d41] mb-2" style="font-family: 'Rubik', sans-serif;">Total Orders</h2>
      <p class="text-3xl font-bold text-[#333]">{{$orders->whereIn('status_id', [1,2,3,4])->count()}}</p>
    </div>

    <!-- Card 5: Completed Orders -->
    <div class="p-5 bg-[#f9f9f9] rounded-lg shadow">
      <h2 class="text-lg font-semibold text-[#6e4d41] mb-2" style="font-family: 'Rubik', sans-serif;">Completed Orders</h2>
      <p class="text-3xl font-bold text-[#333]">{{$orders->whereIn('status_id', 5)->count()}}</p>
    </div>

    <!-- Card 6: Pending Orders -->
    <div class="p-5 bg-[#f9f9f9] rounded-lg shadow">
      <h2 class="text-lg font-semibold text-[#6e4d41] mb-2" style="font-family: 'Rubik', sans-serif;">Pending Orders</h2>
      <p class="text-3xl font-bold text-[#333]">{{$orders->whereIn('status_id', 1)->count()}}</p>
    </div>

  </div>
  
  <!-- Analytics Section -->
  <div class="bg-[#f9f9f9] p-6 rounded-lg shadow-lg h-[400px] overflow-hidden">
    <h2 class="text-2xl font-bold text-[#6e4d41] mb-4" style="font-family: 'Rubik', sans-serif;">User Analytics (Yearly)</h2>

    <!-- Graph Container -->
    <div class="relative h-[300px]">
      <canvas id="userAnalyticsChart" class="absolute top-0 left-0 w-full h-full"></canvas>
    </div>
  </div>



  <!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Setup -->
<script>
const ctx = document.getElementById('userAnalyticsChart').getContext('2d');
const userAnalyticsChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Number of Users',
            data: @json($monthlyUserCounts),
            backgroundColor: 'rgba(110, 77, 65, 0.2)', 
            borderColor: '#6e4d41', 
            borderWidth: 2,
            fill: true,
            tension: 0.4,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</div>

