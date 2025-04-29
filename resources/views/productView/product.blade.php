<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="font-family:rubik;" class="h-[600px] bg-[#EEEEEE] text-gray-900">
@extends('layouts.forbg')
    <div class="flex justify-center items-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="mt-2 h-12 sm:h-15 max-w-[150px]">
        </a>
    </div>
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


    <div class="  max-w-6xl mx-auto p-4">

        <!-- Artwork Details Section -->
        <div class="bg-white pl-14 pr-14 p-14 rounded shadow-xl flex flex-wrap md:flex-nowrap gap-6">
            <!-- Artwork Image Section -->
            <div class="w-full md:w-3/5 relative">
            <button onclick="history.back()"   style="font-family: Rubik;" class="text-[#6e4d41] opacity-60 ml-1 mt-[-45px]
                absolute top-0 left-0 -translate-x-10 no-underline text-inherit"> &larr; BACK
              </button>

            <!-- Main Image -->
            <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-full rounded-lg object-cover">
            
            <!-- Thumbnail Navigation with Arrows -->
            <div class=" flex items-center justify-center gap-2 mt-3 relative">
                <!-- Left Arrow -->
                <button class="ml-10 absolute left-0 -translate-x-10 bg-gray-300 hover:bg-gray-400 p-2 rounded-full">
                    &#9664;
                </button>

                <!-- Thumbnails -->
                <div class="flex gap-2">
                    <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-16 h-14 object-cover rounded cursor-pointer">
                    <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-16 h-14 object-cover rounded cursor-pointer">
                    <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-16 h-14 object-cover rounded cursor-pointer">
                    <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-16 h-14 object-cover rounded cursor-pointer">
                </div>

                <!-- Right Arrow -->
                <button class="mr-10 absolute right-0 translate-x-10 bg-gray-300 hover:bg-gray-400 p-2 rounded-full">
                    &#9654;
                </button>
            </div>
        </div>



            <!-- Artwork Information Section -->
            <div style class="mt-3 w-full md:w-3/5 space-y-4">
                <h2 class="text-[#6e4d41] text-4xl font-bold">{{ $artwork->artwork_title }}</h2>
                <div class="mb-5 text-[#6e4d41] text-xl font-semibold">₱ {{ number_format($artwork->price, 2) }}</div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 mt-20">
                    @auth
                        <a href="{{ route('checkout', $artwork->id) }}" class="px-6 py-2 bg-[#6e4d41] text-white rounded hover:bg-[#A99476] transition duration-300">
                            Buy Now
                        </a>

                        <form action="{{ route('cart.add', $artwork->id) }}" method="POST">
                        @csrf
                            <button type="submit" class="px-6 py-2 border border-[#6e4d41] text-[#6e4d41] rounded hover:bg-[#A99476] hover:border-[#A99476] transition duration-200">
                                Add to Cart
                            </button>
                        </form>
                    @endauth

                    @guest
                         <a href="{{ route('show.login') }}" class="px-6 py-2 bg-[#6e4d41] text-white rounded hover:bg-[#A99476] transition duration-300">
                            Buy Now
                        </a>

                        <a href="{{ route('show.login') }}" class="px-6 py-2 border border-[#6e4d41] text-[#6e4d41] rounded hover:bg-[#A99476] hover:border-[#A99476] transition duration-200">
                            Add to Cart
                        </a>
                    @endguest   
                </div>
                
                <hr class="">
                <!-- Artwork Details -->
                <div style="color:#6e4d41;" class=" grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
                    <strong>Dimension:</strong> <span>{{ $artwork->dimension ?? 'No Dimension Set'}}</span>
                    <strong>Category:</strong> <span>{{ $artwork->category->category_name ?? 'Uncategorized' }}</span>
                    <strong>Artist:</strong> <span>{{ $artwork->user?->full_name ?? 'Unknown Artist' }}</span> <!-- palitan nalang yan na email pag may name na ok? ok-->
                </div>

                <hr class="">
                <!-- Description -->
                <p class="text-[#6e4d41] text-sm leading-relaxed">Description: <br> {{ $artwork->description }} </p>
            </div>
        </div>

        <!-- More Works Section -->
        <div class="mt-8 flex justify-between items-center">
            <h3 class="text-[#6e4d41] text-lg font-semibold">More Works by {{ $artwork->user->full_name ?? 'Unknown Artist' }}</h3>
            <!-- dgd so sa profile na kang seller/artist-->           
            <a href="{{ route('profile') }}" class="border border-[#6e4d41] text-[#6e4d41] rounded hover:bg-[#FFE0B2] hover:border-[#FFE0B2]  px-3 py-2 rounded ">View All</a>
        </div>

        <!-- More Works by Seleer -->
        <div class="card-container flex flex-wrap gap-3 p-6">
        @forelse($moreWorks as $work)
            <div class="card group relative bg-white border rounded-lg shadow-md w-[250px] overflow-hidden">
                <a href="{{ route('product-details', ['id' => $work->id]) }}" class="block relative">
                    <img src="{{ asset($work->image_path) }}" alt="{{ $work->artwork_title }}" class="w-full h-60 object-cover rounded-t-lg transition-transform duration-300 group-hover:scale-105">

                    <!-- FULL Overlay -->
                    <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center text-center text-white opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out rounded-t-lg">
                        <h4 class="text-lg font-bold mb-2">{{ $work->artwork_title }}</h4>
                        <p class="text-sm px-4">{{ Str::limit($work->description, 50) }}</p>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-center col-span-4">No other works by this artist.</p>
        @endforelse    
    </div>

        <!-- More Works Section -->
        <div class="mt-8 flex justify-between items-center">
            <h3 class="text-[#6e4d41] text-lg font-semibold">Explore More </h3>        
        </div>

        <!-- More Works Grid -->
        <div class="card-container flex flex-wrap gap-3 p-6">
            @foreach($otherArtworks as $other)
                <div class="card group relative bg-white border rounded-lg shadow-md w-[250px] overflow-hidden">
                    <a href="{{ route('product-details', ['id' => $other->id]) }}" class="block relative">
                        <img src="{{ asset($other->image_path) }}" alt="{{ $other->artwork_title }}" class="w-full h-60 object-cover rounded-t-lg transition-transform duration-300 group-hover:scale-105">

                        <!-- FULL Overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center text-center text-white opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out rounded-t-lg">
                            <h4 class="text-lg font-bold mb-2">{{ $other->artwork_title }}</h4>
                            <p class="text-sm px-4">{{ Str::limit($other->description, 50) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
