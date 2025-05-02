<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-white text-gray-900">

@include('layouts.forNav')
@extends('layouts.forbg')


<section class="max-w-7xl mx-auto py-8 px-4">
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
        <div class="mt-4 p-3 border ">
            <p class="text-sm text-gray-700">
                <strong>📍Delivery Address</strong>
            </p>
            <div>
                <span class="ml-4"><strong>{{ $user->full_name }} </strong></span>
                <span class="mr-4"><strong>{{ $user->phone }}</strong></span>
                <span>{{ $user->address }}</span>
                <span class="ml-2"><a href="#">change</a></span>
            </div>
        </div>

        <!-- Product Ordered -->
        <div class="mt-6 p-6 border border-gray-200 rounded-lg shadow-sm bg-white w-full">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-xl font-semibold text-[#6E4D41]">Products Ordered</h4>

                <!-- Header Labels -->
                <div class="flex items-center gap-8 pr-6 text-sm text-gray-500 font-medium">
                    <span class="w-40">Dimension</span>
                    <span class="w-1/3 text-center">Category</span>
                    <span class="w-28 text-right">Price</span>
                </div>
            </div>

            @if(isset($artwork))
                <div class="ml-3 w-full">
                    <!-- Seller Info -->
                    <div class="flex items-center space-x-4 mb-2">
                        <img src="{{ $artwork->user->profile_pic ? asset('storage/' . $artwork->user->profile_pic) : asset('images/user.png') }}" class="w-6 h-6 rounded-full">
                        <h4 class="font-light text-lg text-gray-900">{{ $artwork->user->full_name }}</h4>
                    </div>

                    <!-- Artwork Info -->
                    <div class="flex items-center p-3 rounded-lg">
                        <img src="{{ asset($artwork->image_path) }}" alt="{{ $artwork->artwork_title }}" class="w-20 h-20 object-cover rounded-lg">
                        <span class="flex-1 ml-4 text-gray-800">{{ $artwork->artwork_title }}</span>
                        <span class="w-1/3 text-right mr-24 text-gray-800">{{ $artwork->dimension }}</span>
                        <span class=" text-right mr-12 ml-8 text-gray-600">{{ $artwork->category->category_name ?? 'Uncategorized' }}</span>
                        <span class="text-right text-gray-600 w-28">₱{{ number_format($artwork->price, 2) }}</span>
                    </div>
                </div>
            @endif
        </div>

        <!-- Message & Total -->
        <div class="mt-4 flex flex-col md:flex-row justify-between">
            <span class="flex-1 mt-2 text-gray-800">Message for Seller:</span>
            <input type="text" placeholder="Dili na dali dali tabi" class="w-full md:w-3/4 p-2 border rounded focus:outline-none">
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
