<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
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
    @include('layouts.fornav')
@extends('layouts.forbg')


<section class="max-w-7xl mx-auto py-8 px-4">
    <div class="bg-white p-6  rounded-lg shadow-lg border">

        <!-- Back Button & Title -->
        <div class="flex">
            <div>
                <button onclick="history.back()"   class="text-gray-600 text-xl">&larr;</button>
            </div>
            <div>
                <h2 class="text-4xl font-bold text-[#6e4d41] ml-4">Cart</h2>
            </div>
        </div>
        <br>

        <!-- Product Header -->
        <div class="flex items-center text-gray-700 text-lg mb-2 justify-between">
            <label for="selectAll" class="flex-1 ml-16">Product</label>
                <label class="flex-1 ml-20" >Category</label>
                <label class="flex-1 ml-12">Price</label>
                <label class="flex-1 ml-12">Action</label>
            
        </div>

        <hr class="mb-4">

        <!-- Cart Item -->  
        @if ($cart && count($cart->items))
            @foreach ($cart->items as $item)
                <div class="cart-item p-4 flex justify-between items-center border shadow-md mb-2">
                    <div class="flex items-start w-full">
                        <div class="ml-3 w-full">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item->artwork->user->profile_pic ? asset('storage/' . $item->artwork->user->profile_pic) : asset('images/user.png') }}" class="w-6 h-6 rounded-full">
                            <span class="font-light text-lg text-gray-800">{{ $item->artwork->user->full_name }}</span>
                        </div>
                        <div class="flex items-center p-3 mt-2">
                            <img src="{{ asset($item->artwork->image_path) }}" alt="{{ $item->artwork->artwork_title }}" class="w-20 h-20 object-cover rounded-lg">
                            <span class="flex-1 ml-4 mb-8 mr-4">{{ $item->artwork->artwork_title }}</span>
                            <span class=" mb-8 mr-4 text-center w-1/3">{{ $item->artwork->category->category_name ?? 'Uncategorized' }}</span>
                            <span class=" mb-8 mr-20">₱{{ number_format($item->artwork->price, 2) }}</span>
                            
                        <a href="{{ route('product-details', ['id' => $item->artwork->id]) }}">
                            <button class=" text-black font-light px-4 py-2 rounded-md border hover:bg-[#5A3E33] transition ml-4 mb-7" >
                            view
                            </button>
                        </a>
                        <a href="{{ route('checkout', $item->artwork->id) }}">
                            <button class=" text-black font-light px-4 py-2 rounded-md border hover:bg-[#5A3E33] transition ml-4 mb-7">
                            buy
                            </button>
                        </a>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="ml-4 mb-7">
                            @csrf
                            @method('DELETE')
                            <button class=" text-black font-light px-4 py-2 rounded-md border hover:bg-[#5A3E33] transition ">
                                delete
                            </button>
                        </form>
                        </div>
                        </div>
                    </div>    
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
