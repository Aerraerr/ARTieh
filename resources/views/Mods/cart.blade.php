<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .selected {
            background-color: #fde68a !important;
            border-color: #d97706 !important;
        }
    </style>
</head>
<body class="bg-white text-gray-900">
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
@extends('layouts.forbg')


<section class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg border">

        <!-- Back Button & Title -->
        <div class="flex">
            <div>
                <button onclick="history.back()"   class="text-gray-600 text-xl">&larr;</button>
            </div>
            <div>
                <h2 class="text-4xl font-bold text-[#6e4d41] ml-4">Cart</h2>
            </div>
        </div>
        

        <!-- Product Header -->
        <div class="flex items-center space-x-2 text-gray-700 text-lg mb-2 justify-between">
            <div>
                <label for="selectAll">Product</label>
            </div>
            <div name="header1" class="flex items-center">
                <label class="mr-24" >Art Price</label>
                <label class="mr-10">Action</label>
            </div>
        </div>

        <hr class="mb-4">

        <!-- Cart Item -->  
        @if ($cart && count($cart->items))
            @foreach ($cart->items as $item)
                <div class="cart-item bg-[#FAF5E4] p-4 rounded-lg flex justify-between items-center border shadow-md">
                    <div class="flex items-start w-full">
                        <div class="ml-3 w-full">
                            <div class="flex items-center bg-[#FAF5E4] p-3 rounded-lg mt-2">
                                <img src="{{ asset($item->artwork->image_path) }}" alt="{{ $item->artwork->artwork_title }}" class="w-32 h-32 object-cover rounded-lg">
                                <div class="ml-4 flex-1">
                                    <h3 class="font-semibold text-lg text-gray-900">{{ $item->artwork->artwork_title }}</h3>
                                    <span class="text-2xl text-[#F59E0B] mb-8 mr-4">₱{{ number_format($item->artwork->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <a href="{{ route('product-details', ['id' => $item->artwork->id]) }}">
                            <button class=" text-white px-4 py-2 rounded-md hover:bg-[#5A3E33] transition ml-4 mt-2" >
                            <img src="{{ asset('images/preview.svg') }}" alt="view"></button>
                        </a>
                        <a href="{{ route('checkout', $item->artwork->id) }}">
                            <button class=" text-white px-4 py-2 rounded-md hover:bg-[#5A3E33] transition ml-4 mt-2">
                            <img src="{{ asset('images/buy.svg') }}" alt="checkout"></button>
                        </a>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="ml-4 mt-2">
                            @csrf
                            @method('DELETE')
                            <button class=" text-white px-4 py-2 rounded-md hover:bg-[#5A3E33] transition ml-4 mt-2">
                                <img src="{{ asset('images/delete.svg') }}" alt="delete">
                            </button>
                        </form>
                    </div>
            @endforeach
        @else
            <p class="text-gray-600">Your cart is empty.</p>
        @endif
    </div>
    
</section>

@include('layouts.footer')


</body>
</html>
