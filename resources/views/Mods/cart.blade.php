<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Website Icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/websiteicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .selected {
            background-color: #fde68a !important;
            border-color: #d97706 !important;
        }

        @media (max-width: 640px) {
            .cart-header {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-900 h-auto">

<!-- Success Message -->
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

<!-- Navigation -->
@include('layouts.fornav')

<!-- Cart Section -->
<section class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow-lg border">

        <!-- Back Button & Title -->
        <div class="flex items-center">
            <button onclick="history.back()" class="text-gray-600 text-xl">&larr;</button>
            <h2 class="text-2xl md:text-4xl font-bold text-[#6e4d41] ml-4">Cart</h2>
        </div>

        <br>

        <!-- Product Headers (Desktop only) -->
        <div class="cart-header hidden sm:flex items-center text-gray-700 text-lg mb-2 justify-between">
            <label class="ml-[150px] w-2/5 sm:w-1/4">Product</label>
            <label class="ml-[100px] w-1/5 sm:w-1/4 text-center">Category</label>
            <label class="ml-20 w-1/5 sm:w-1/4 text-center">Price</label>
            <label class="w-1/5 mr-20  sm:w-1/4 text-right">Action</label>
        </div>

        <hr class="mb-4">

        <!-- Cart Items -->
        @if ($cart && count($cart->items))
            @foreach ($cart->items as $item)
                <div class="cart-item p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center border shadow-md mb-2 rounded-lg">
                    
                    <!-- Artwork Info -->
                    <div class="flex items-start w-full sm:w-2/5">
                        <!-- Image -->
                        <img src="{{ asset($item->artwork->image_path) }}"
                             alt="{{ $item->artwork->artwork_title }}"
                             class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg">

                        <!-- Title + Artist -->
                        <div class="ml-3 flex flex-col">
                            <span class="text-sm sm:text-base font-medium line-clamp-2">{{ $item->artwork->artwork_title }}</span>
                            <span class="text-xs sm:text-sm text-gray-600">{{ $item->artwork->user->full_name }}</span>
                        </div>
                    </div>

                    <!-- Category (hidden on small screens) -->
                    <div class="hidden sm:block w-1/5 sm:w-1/4 text-center mt-3 sm:mt-0">
                        {{ $item->artwork->category->category_name ?? 'Uncategorized' }}
                    </div>

                    <!-- Price -->
                    <div class="w-1/5 sm:w-1/4 text-center mt-3 sm:mt-0">
                        <span class="font-medium">₱{{ number_format($item->artwork->price, 2) }}</span>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-wrap gap-2 sm:gap-4 justify-end w-full sm:w-1/4 mt-3 sm:mt-0">
                        <a href="{{ route('product-details', ['id' => $item->artwork->id]) }}"
                           class="text-black text-sm sm:text-base font-light px-3 py-1 sm:px-4 sm:py-2 rounded-md border hover:bg-[#5A3E33] hover:text-white transition">
                            View
                        </a>
                        <a href="{{ route('checkout', $item->artwork->id) }}"
                           class="text-black text-sm sm:text-base font-light px-3 py-1 sm:px-4 sm:py-2 rounded-md border hover:bg-[#5A3E33] hover:text-white transition">
                            Buy
                        </a>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-black text-sm sm:text-base font-light px-3 py-1 sm:px-4 sm:py-2 rounded-md border hover:bg-[#5A3E33] hover:text-white transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-600 py-8 text-center">Your cart is empty.</p>
        @endif
    </div>
</section>

<!-- Footer -->
@include('layouts.footer')

</body>
</html>