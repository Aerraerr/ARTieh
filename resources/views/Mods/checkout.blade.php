<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .selected {
            background-color: #6E4D41 !important;
            border-color: #d97706 !important;
        }
    </style>
</head>
<body style="height:auto;" class="bg-white text-gray-900">

@include('layouts.forNav')
@extends('layouts.forbg')

<section class="max-w-7xl mx-auto py-8 px-4">
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg border">

        <!-- Back Button & Title -->
        <div class="flex items-center space-x-4">
            <button onclick="history.back()" class="text-gray-600 text-xl">&larr;</button>
            <h2 class="text-2xl sm:text-4xl font-bold text-[#6e4d41]">Checkout</h2>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form mt-6 space-y-6">
            @csrf
            <input type="hidden" name="artwork_id" value="{{ $artwork->id }}">
            <input type="hidden" name="item_total" value="{{ $artwork->price }}">

            <!-- Delivery Address -->
            <div class="p-4 border rounded-md">
                <p class="text-sm text-gray-700 font-medium mb-2">📍 Delivery Address</p>
                <div class="space-y-1 text-sm">
                    <p><strong>{{ $user->full_name }}</strong> | <strong>{{ $user->phone }}</strong></p>
                    <p>{{ $user->address }} <a href="#" class="ml-2 text-blue-500 underline">change</a></p>
                </div>
            </div>

            <!-- Product Ordered -->
            <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-white">
                <h4 class="text-xl font-semibold text-[#6E4D41] mb-4">Products Ordered</h4>

                @if(isset($artwork))
                <div class="space-y-4">
                    <!-- Seller Info -->
                    <div class="flex items-center space-x-2">
                        <img src="{{ $artwork->user->profile_pic ? asset('storage/' . $artwork->user->profile_pic) : asset('images/user.png') }}" class="w-6 h-6 rounded-full">
                        <h4 class="text-base text-gray-900">{{ $artwork->user->full_name }}</h4>
                    </div>

                    <!-- Product Info Table -->
                    <div class="overflow-x-auto">
                        <div class="min-w-[500px] flex items-center space-x-4 p-3 rounded-lg">
                            <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-20 h-20 object-cover rounded-lg">
                            <span class="flex-1 text-gray-800">{{ $artwork->artwork_title }}</span>
                            <span class="w-1/4 text-right text-gray-800">{{ $artwork->dimension }}</span>
                            <span class="w-1/4 text-right text-gray-600">{{ $artwork->category->category_name ?? 'Uncategorized' }}</span>
                            <span class="w-1/4 text-right text-gray-600">₱{{ number_format($artwork->price, 2) }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Message to Seller -->
            <div class="flex flex-col space-y-2">
                <label class="text-gray-800">Message for Seller:</label>
                <input type="text" placeholder="Dili na dali dali tabi" class="w-full p-2 border rounded focus:outline-none">
            </div>

            <!-- Payment Method -->
            <div>
                <h3 class="text-xl font-semibold">Payment Method</h3>
                <div class="mt-3 flex flex-col sm:flex-row gap-2">
                    <label class="cursor-pointer flex-1">
                        <input type="radio" name="payment_method" value="cod" class="sr-only peer" checked>
                        <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">Cash on Delivery</div>
                    </label>
                    <label class="cursor-pointer flex-1">
                        <input type="radio" name="payment_method" value="gcash" class="sr-only peer">
                        <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">Gcash</div>
                    </label>
                </div>
            </div>

            <!-- Delivery Method -->
            <div>
                <h3 class="text-xl font-semibold">Delivery Method</h3>
                <div class="mt-3 flex flex-col sm:flex-row gap-2">
                    <label class="cursor-pointer flex-1">
                        <input type="radio" name="delivery_method" value="request delivery" class="sr-only peer" checked>
                        <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">Request Delivery (₱58)</div>
                    </label>
                    <label class="cursor-pointer flex-1">
                        <input type="radio" name="delivery_method" value="self pickup" class="sr-only peer">
                        <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">Self-Pickup (Free)</div>
                    </label>
                </div>
            </div>

            <!-- Payment Summary -->
            <div class="text-gray-800 space-y-1">
                <p>Payment Method: <span id="paymentMethodDisplay">Cash on Delivery</span></p>
                <p>Delivery Method: <span id="deliveryMethodDisplay">Request Delivery</span></p>
                <p>Item Total: ₱{{ $artwork->price }}</p>
                <p>Delivery Fee: <span id="deliveryFeeDisplay">₱58</span></p>
                <p class="font-bold text-[#F59E0B]">Total Payment: <span id="totalPaymentDisplay">₱{{ $artwork->price + 58 }}</span></p>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-[#6E4D41] text-white py-3 px-6 rounded-lg hover:bg-[#55382f] transition">
                Place Order
            </button>
        </form>
    </div>
</section>

@include('layouts.footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const receiveForms = document.querySelectorAll('.checkout-form');
    receiveForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are the inputed information correct?',
                text: "This action will send the information to the seller.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    const deliveryRadios = document.querySelectorAll('input[name="delivery_method"]');
    const paymentMethodDisplay = document.getElementById('paymentMethodDisplay');
    const deliveryMethodDisplay = document.getElementById('deliveryMethodDisplay');
    const deliveryFeeDisplay = document.getElementById('deliveryFeeDisplay');
    const totalPaymentDisplay = document.getElementById('totalPaymentDisplay');
    const itemPrice = {{ $artwork->price }};

    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            paymentMethodDisplay.textContent = this.value === 'cod' ? 'Cash on Delivery' : 'Gcash';
        });
    });

    deliveryRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'request delivery') {
                deliveryFeeDisplay.textContent = '₱58';
                totalPaymentDisplay.textContent = '₱' + (itemPrice + 58);
                deliveryMethodDisplay.textContent = 'Request Delivery';
            } else {
                deliveryFeeDisplay.textContent = '₱0';
                totalPaymentDisplay.textContent = '₱' + itemPrice;
                deliveryMethodDisplay.textContent = 'Self Pickup';
            }
        });
    });
});
</script>

</body>
</html>
