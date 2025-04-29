<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-white text-gray-900">

@include('layouts.forNav')
@extends('layouts.forbg')

<section class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg border">

        <!-- Back Button & Title -->
        <div class="flex">
            <div>
                <button onclick="history.back()"   class="text-gray-600 text-xl">&larr;</button>
            </div>
            <div>
                <h2 class="text-4xl font-bold text-[#6e4d41] ml-4">Checkout</h2>
            </div>
        </div>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <input type="hidden" name="artwork_id" value="{{ $artwork->id }}">
        <input type="hidden" name="item_total" value="{{ $artwork->price }}">
        <!-- Delivery Address -->
        <div class="mt-4 p-3 border rounded-lg bg-[#FAF5E4]">
            <p class="text-sm text-gray-700">
                <strong>📍Delivery Address</strong>
            </p>
            <p> <strong>{{ $user->full_name }}</strong>  {{ $user->phone }} - {{ $user->address }}
            <a href="#">change</a></p>
        </div>

        <!-- Product Ordered -->
        <div class="mt-4 p-4 border rounded-lg bg-[#FAF5E4]">
            <div class="flex items-center space-x-2 text-gray-700 text-lg mb-2 justify-between">
                <h4 class="text-gray-800">Products Ordered</h4>
            </div>
            @if(isset($artwork))
                {{-- sarong aytem checkout--}}
                <div class="flex flex-col md:flex-row items-start md:items-center mt-3">
                    <img src="{{ asset($artwork->image_path) }}" alt="ARCANE Anomaly Painting" class="w-20 h-20 object-cover rounded">
                    <div class="ml-0 md:ml-4 mt-2 md:mt-0">
                        <h3 class="font-semibold text-lg text-gray-900">{{ $artwork->artwork_title }}</h3>
                        <p class="text-gray-600">Seller: {{ $artwork->user->full_name }}</p>
                        <p class="text-[#F59E0B] font-bold">Price: {{ $artwork->price}}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Message & Total -->
        <div class="mt-4 flex flex-col md:flex-row justify-between">
            <input type="text" placeholder="Dili na dali dali tabi" class="w-full md:w-3/4 p-2 border rounded focus:outline-none">
            <p id="orderTotal" class="text-lg font-semibold text-[#F59E0B] mt-2 md:mt-0">₱ {{ $artwork->price}}</p>
        </div>

        <!-- Payment Method -->
        <h3 class="text-xl font-semibold mt-6">Payment Method</h3>
        <div class="mt-3 flex gap-2 ">
            <div class="mb-2 flex w-full text-center">
                <label class="cursor-pointer flex-1 inline-flex items-center">
                    <input type="radio" name="payment_method" value="cod" class="form-radio sr-only peer" checked>
                    <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">
                    Cash on Delivery</div>
                </label>
            </div>
            <div class="flex  w-full text-center">
                <label class="cursor-pointer flex-1 inline-flex items-center">
                    <input type="radio" name="payment_method" value="gcash" class="form-radio sr-only peer">
                    <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">
                    Gcash</div>
                </label>
            </div>
      </div>

        <!-- Delivery Method -->
        <h3 class="text-xl font-semibold mt-6">Delivery Method</h3>
        <div class="mt-3 flex gap-2">
            <div class="mb-2 flex w-full text-center">
                <label class="cursor-pointer flex-1 inline-flex items-center">
                    <input type="radio" name="delivery_method" value="request delivery" class="form-radio sr-only peer" checked>
                    <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">
                    Request Delivery (₱58)</div>
                </label>
            </div>
            <div class="flex  w-full text-center">
                <label class="cursor-pointer flex-1 inline-flex items-center">
                    <input type="radio" name="delivery_method" value="self pickup" class="form-radio sr-only peer">
                    <div class="w-full text-center px-4 py-2 rounded-lg border peer-checked:bg-[#6E4D41] peer-checked:text-white text-[#6E4D41] border-[#6E4D41]">
                    Self-Pickup (Free)</div>
                </label>
            </div>
      </div>

        <!-- Payment Summary -->
        <div class="mt-6 text-gray-800">
            <p>Payment Method: <span id="paymentMethodDisplay">Cash on Delivery</span></p>
            <p>Delivery Method: <span id="deliveryMethodDisplay">Request Delivery</span></p>
            <p>Item Total: ₱{{ $artwork->price }}</p>
            <p>Delivery Fee: <span id="deliveryFeeDisplay">₱58</span></p>
            <p class="font-bold text-[#F59E0B]">Total Payment: <span id="totalPaymentDisplay">₱{{ $artwork->price + 58 }}</span></p>
        </div>

            
            <!-- Place Order Button -->
            <button type="submit" class="w-full bg-[#6E4D41] text-white py-3 px-6 rounded-lg mt-6 hover:bg-[#6E4D41] transition">
                Place Order
            </button>
    </form>    

    </div>
</section>

@include('layouts.footer')

{{--<script>
    // Mobile Menu Toggle (If applicable)
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeMenu = document.getElementById("closeMenu");

    if (menuBtn && mobileMenu && closeMenu) {
        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.remove("hidden");
        });

        closeMenu.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
        });
    }
</script>--}}
<script>
  // Get references to the radio buttons and display elements
  const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
  const deliveryRadios = document.querySelectorAll('input[name="delivery_method"]');
  const paymentMethodDisplay = document.getElementById('paymentMethodDisplay');
  const deliveryMethodDisplay = document.getElementById('deliveryMethodDisplay');
  const deliveryFeeDisplay = document.getElementById('deliveryFeeDisplay');
  const totalPaymentDisplay = document.getElementById('totalPaymentDisplay');
  const itemPrice = {{ $artwork->price }};
  
  // Add event listeners to the payment method radio buttons
  paymentRadios.forEach(radio => {
    radio.addEventListener('change', function() {
      // Update the payment method display
      paymentMethodDisplay.textContent = this.value === 'cod' ? 'Cash on Delivery' : 'Gcash';
    });
  });
  
  // Add event listeners to the delivery method radio buttons
  deliveryRadios.forEach(radio => {
    radio.addEventListener('change', function() {

      // Update the delivery fee and total based on selection
      if (this.value === 'request delivery') {
        deliveryFeeDisplay.textContent = '₱58';
        totalPaymentDisplay.textContent = '₱' + (itemPrice + 58);
        deliveryMethodDisplay.textContent = 'Request Delivery'
      } else { // self-pickup
        deliveryFeeDisplay.textContent = '₱0';
        totalPaymentDisplay.textContent = '₱' + itemPrice;
        deliveryMethodDisplay.textContent = 'Self Pickup'
      }
    });
  });
</script>

</body>
</html>
