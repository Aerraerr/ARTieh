<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Purchases</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .tab {
           
            opacity: 0.5;
        }
        .tab.active { 
            opacity: 1; 
            font-weight: bold; 
            border-bottom: 4px solid #6e4d41; 
        }
        .tab:hover {
            opacity: 0.8;
        }
        .order-details { 
            display: none; 
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /*.order-card {
            transition: transform 0.2s ease;
        }
        .order-card:hover {
            transform: translateY(-2px);
        }*/
        .btn-primary {
            background-color: #d4a373;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #c49567;
        }
        .btn-outline {
            border: 1px solid #d4a373;
            color: #d4a373;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.3s;
        }
        .btn-outline:hover {
            background-color: #d4a373;
            color: white;
        }
        .cancel-reason {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            margin-top: 0.5rem;
        }
       
    </style>
</head>
<body  class="bg-white text-gray-900 font-rubik " >
@include('layouts.forNav')
@extends('layouts.forbg')
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
<section>
    <div class="container-fluid py-5 px-1 " style="max-width: 100%;">
        <div class="bg-white p-4 rounded shadow-lg border mx-auto" style="max-width: 100%;">
            
            <!-- Purchase Status Tabs -->
            <div class="flex overflow-x-auto sm:justify-between border-b pb-2 text-gray-500 text-sm scrollbar-hide">
        <div class="tab flex flex-col items-center cursor-pointer active min-w-[80px] px-2" data-tab="to-pay">
            <img src="{{ asset('images/topay.png') }}" class="w-7 h-7 sm:w-8 sm:h-8" alt="To Pay">
            <span>To Pay</span>
        </div>
        <div class="tab flex flex-col items-center cursor-pointer min-w-[80px] px-2" data-tab="to-pickup">
            <img src="{{ asset('images/topickup.png') }}" class="w-7 h-7 sm:w-8 sm:h-8" alt="To Pickup">
            <span>To Pickup</span>
        </div>
        <div class="tab flex flex-col items-center cursor-pointer min-w-[80px] px-2" data-tab="to-receive">
            <img src="{{ asset('images/toreceive.png') }}" class="w-7 h-7 sm:w-8 sm:h-8" alt="To Receive">
            <span>To Receive</span>
        </div>
        <div class="tab flex flex-col items-center cursor-pointer min-w-[80px] px-2 text-center" data-tab="completed-orders">
            <img src="{{ asset('images/completed.png') }}" class="w-7 h-7 sm:w-8 sm:h-8" alt="Completed Orders">
            <span class="leading-tight">Completed</span>
        </div>
        <div class="tab flex flex-col items-center cursor-pointer min-w-[80px] px-2 text-center" data-tab="cancelled-items">
            <img src="{{ asset('images/cancelled.png') }}" class="w-7 h-7 sm:w-8 sm:h-8" alt="Cancelled Items">
            <span class="leading-tight">Cancelled</span>
        </div>
    </div>

            <!-- to pay -->
            <div class="tab-content to-pay mt-6">
            <h3 class="text-xl font-bold text-[#d4a373] text-center mb-4">TO PAY</h3>
            @if($topay->isNotEmpty())
                @foreach($topay as $order)
                    @php $item = $order->items->first(); @endphp
                    @if($item)
                        <div class="order-card bg-white shadow-lg p-4 rounded-lg border mb-4">
                        <div class="flex flex-col md:flex-row">
                            <img src="{{ asset($item->artwork->image_path) }}" class="w-full md:w-36 h-36 object-cover rounded-lg" alt="Artwork">
                            <div class="ml-0 md:ml-4 mt-4 md:mt-0">
                                <h2 class="text-lg font-bold text-[#6e4d41]">{{$item->artwork->artwork_title}}</h2>
                                <p class="text-sm text-gray-500">{{$item->artwork->user->full_name}}</p>
                                <span class="text-lg font-bold text-[#d4a373]">${{$item->price}}</span>
                                <div class="mt-2">
                                    <button class="view-details-btn btn-outline text-[#6E4D41]">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="order-details mt-4 text-sm space-y-4">
    <!-- Grid Layout for Order Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="space-y-1">
            <p><strong class="text-gray-700">Date of Purchase:</strong> {{ $order->ordered_at }}</p>
            <p><strong class="text-gray-700">Seller:</strong> {{ $item->artwork->user->full_name }}</p>
            <p><strong class="text-gray-700">Price:</strong> ${{ $item->price }}</p>
        </div>
        <div class="space-y-1">
            <p><strong class="text-gray-700">Delivery Method:</strong> {{ $order->delivery_method }}</p>
            @if($order->delivery_method === 'request delivery')
                <p><strong class="text-gray-700">Delivery Fee:</strong> $58</p>
            @endif
            <p><strong class="text-gray-700">Total:</strong> ${{ $order->total_amount }}</p>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-end sm:space-x-2 space-y-2 sm:space-y-0 mt-4">
        @if($order->payment->payment_method === 'gcash')
            <button class="btn-primary w-full sm:w-auto" data-bs-toggle="modal" data-bs-target="#pay{{ $order->id }}">Pay Now</button>
        @else
            <span class="text-gray-500 sm:self-center">Waiting for Seller's Approval...</span>
        @endif
        <button class="btn-outline w-full sm:w-auto" data-bs-toggle="modal" data-bs-target="#cancel{{ $order->id }}">Cancel Order</button>
        <button class="btn-outline w-full sm:w-auto">Contact Seller</button>
    </div>
</div>

                    </div>
                    @if($topay->isNotEmpty())
                    {{-- PAY MODAL ======== --}}
                    <div class="modal fade" id="pay{{$order->id}}" tabindex="-1" aria-labelledby="paylabel{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-4 border border-gray-300 rounded-lg">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title font-bold text-lg text-[#1f2937]" id="paylabel{{$order->id}}">Mode of Payment: <span class="text-[#0f172a]">{{$order->payment->payment_method}}</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body px-4 py-2">
                                    <p class="mb-3">Please ensure that you make a payment of <span class="text-[#dc2626] font-semibold">${{$order->total_amount}}</span> to <strong>{{$item->artwork->user->full_name}}</strong>, and remember to provide accurate information.</p>
                                    <div class="mb-3">
                                        <label class="form-label text-gray-800">Pay to this GCash Number:</label>
                                        <input type="text" class="form-control text-sm" placeholder="{{$item->artwork->user->gcash_acc ?? '09123456789 - ST**P CU**Y"'}}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-gray-800">Reference Number</label>
                                        <input type="text" name="payment_reference" id="refNumberInput{{ $order->id }}" class="form-control text-sm" placeholder="Enter reference number" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label text-gray-800">Proof of Payment</label>
                                        <input type="file" name="proof" id="proofInput{{ $order->id }}" class="form-control text-sm" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button data-bs-toggle="modal" data-bs-target="#payconfirm{{$order->id}}" class="btn btn-primary bg-[#d4a373] hover:bg-[#c49767] text-white">Confirm Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- confirm modal-->
                    <div class="modal fade" id="payconfirm{{$order->id}}" tabindex="-1" aria-labelledby="paylabel{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-4 border border-gray-300 rounded-lg">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body px-4 py-2">
                                    <h3 class="mb-3 text-center">Are the inputed information correct?</h3>
                                </div>

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form method="POST">
                                            @csrf
                                            <input type="hidden" name="reference_number" id="hiddenRefNumber{{ $order->id }}">
                                            <input type="hidden" name="proof" id="hiddenProof{{ $order->id }}">
                                            <button type="submit" class="btn btn-primary bg-[#d4a373] hover:bg-[#c49767] text-white">Confirm Payment</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--CANCEL ORDER MODAL --}}
                    <div class="modal fade" id="cancel{{$order->id}}" tabindex="-1" aria-labelledby="cancelLabel{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-4">
                                <div class="modal-header">
                                    <h5 class="modal-title font-bold" id="cancelLabel{{$order->id}}">Cancel Order</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form  method="POST" action="{{route('cancel-order', $order->id)}}" class="mt-4">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Reason for cancellation of this order?</p>
                                            <textarea name="cancel_reason" rows="3" class="w-full border rounded p-2" placeholder="Optional: Reason for cancellation..."></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Go Back</button>
                                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-600 text-white">Confirm Cancel</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <script>//para sa payment modal copy data
                        document.addEventListener('DOMContentLoaded', function () {
                            const confirmBtn = document.querySelector('#pay{{ $order->id }} .btn.btn-primary');
                            confirmBtn.addEventListener('click', function () {
                                const refVal = document.getElementById('refNumberInput{{ $order->id }}').value;
                                const proofVal = document.getElementById('proofInput{{ $order->id }}').value;

                                document.getElementById('hiddenRefNumber{{ $order->id }}').value = refVal;
                                document.getElementById('hiddenProof{{ $order->id }}').value = proofVal;
                            });
                        });
                    </script>
                    @endif
                    @endif
                @endforeach
            @else
                <div class="text-center">NO TO PAY ORDER!</div>
            @endif
            </div>

            <!-- TO PICKUP -->
            <div class="tab-content to-pickup hidden mt-6">
                <h3 class="text-xl font-bold text-[#d4a373] text-center mb-4">READY FOR PICKUP</h3>
                @if($topickup->isNotEmpty())
                @foreach($topickup as $order)
                    @php $item = $order->items->first(); @endphp
                    @if($item)
                    <div class="order-card bg-white shadow-lg p-4 rounded-lg border mb-4">
                        <div class="flex flex-col md:flex-row">
                            <img src="{{ asset($item->artwork->image_path) }}" class="w-full md:w-36 h-36 object-cover rounded-lg" alt="Artwork">
                            <div class="ml-0 md:ml-4 mt-4 md:mt-0">
                                <h2 class="text-lg font-bold text-[#6e4d41]">{{$item->artwork->artwork_title}}</h2>
                                <p class="text-sm text-gray-500">{{$item->artwork->user->full_name}}</p>
                                <p class="text-sm text-gray-500">Pickup Location: {{$item->artwork->user->address}}</p>
                                <span class="text-lg font-bold text-[#d4a373]">${{$order->total_amount}}</span>
                                <div class="mt-2">
                                    <button class="view-details-btn btn-outline">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="order-details mt-4 text-sm space-y-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p><strong class="text-gray-700">Date of Purchase:</strong>{{$order->ordered_at}}</p>
                                    <p><strong class="text-gray-700">Seller:</strong> {{$item->artwork->user->full_name}}</p>
                                    <p><strong class="text-gray-700">Price:</strong> ${{$order->total_amount}}</p>
                                </div>
                                <div>
                                    <p><strong class="text-gray-700">Pickup Address:</strong> {{$item->artwork->user->address}}</p>
                                    <p><strong class="text-gray-700">Pickup Hours:</strong> 9AM-5PM, Mon-Fri</p>
                                    <p><strong class="text-gray-700">Contact Number:</strong> {{$item->artwork->user->phone}}</p>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2 mt-4">
                                <form  action="{{ route('received-order', $order->id) }}" method="POST">
                                    @csrf   
                                    @method('PATCH')
                                    <button class="btn-primary" type="submit">Receive Order</button>
                                </form>
                                <button class="btn-outline">Contact Seller</button>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @else
                <div class="text-center">NO TO PICKUP ORDER!</div>
                @endif
            </div>

            <!-- TO RECEIVE -->
            <div class="tab-content to-receive hidden mt-6">
                <h3 class="text-xl font-bold text-[#d4a373] text-center mb-4">TO RECEIVE</h3>
                @if($toreceive->isNotEmpty())
                @foreach($toreceive as $order)
                    @php $item = $order->items->first(); @endphp
                    @if($item)
                    <div class="order-card bg-white shadow-lg p-4 rounded-lg border mb-4">
                    <div class="flex flex-col md:flex-row">
                        <img src="{{ asset($item->artwork->image_path) }}" class="w-full md:w-36 h-36 object-cover rounded-lg" alt="Artwork">
                        <div class="ml-0 md:ml-4 mt-4 md:mt-0">
                            <h2 class="text-lg font-bold text-[#6e4d41]">{{$item->artwork->artwork_title}}</h2>
                            <p class="text-sm text-gray-500">Delivery by: Conquest</p>
                            <span class="text-lg font-bold text-[#d4a373]">${{$order->total_amount}}</span>
                            <div class="mt-2">
                                <button class="view-details-btn btn-outline">View Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="order-details mt-4 text-sm space-y-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p><strong class="text-gray-700">Date of Purchase:</strong> {{$order->ordered_at}}</p>
                                <p><strong class="text-gray-700">Seller:</strong>{{$item->artwork->user->full_name}}</p>
                                <p><strong class="text-gray-700">Price:</strong> ${{$order->total_amount}}</p>
                            </div>
                            <div>
                                <p><strong class="text-gray-700">Delivery Service:</strong> Conquest</p>
                                <p><strong class="text-gray-700">Tracking Number:</strong> CNQ123456789</p>
                                <p><strong class="text-gray-700">Estimated Delivery:</strong> May 15, 2023</p>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2 mt-4">
                            <form method="POST" action="{{ route('received-order', $order->id) }}">
                            @csrf
                            @method('PATCH')
                                <button type="submit" class="btn-primary">Receive Order</button>
                            </form>
                            <button class="btn-outline">Contact Seller</button>
                        </div>
                    </div>
                </div>
                 @endif
                @endforeach
                @else
                <div class="text-center">NO TO RECEIVE ORDER!</div>
                @endif
            </div>

            <!-- COMPLETED ORDERS -->
            <div class="tab-content completed-orders hidden mt-6">
                <h3 class="text-xl font-bold text-[#d4a373] text-center mb-4">COMPLETED ORDERS</h3>
            @if($completed->isNotEmpty())
                @foreach($completed as $order)
                    @php $item = $order->items->first();  @endphp
                    @if($item)
                    <div class="order-card bg-white shadow-lg p-4 rounded-lg border mb-4">
                        <div class="flex flex-col md:flex-row">
                            <img src="{{ asset($item->artwork->image_path) }}" class="w-full md:w-36 h-36 object-cover rounded-lg" alt="Artwork">
                            <div class="ml-0 md:ml-4 mt-4 md:mt-0">
                                <h2 class="text-lg font-bold text-[#6e4d41]">{{$item->artwork->artwork_title}}</h2>
                                <p class="text-sm text-gray-500">{{$item->artwork->user->full_name}}</p>
                                <p class="text-sm text-green-500">Delivered on {{$order->updated_at}}</p>
                                <div class="mt-2">
                                    <button class="view-details-btn btn-outline">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="order-details mt-4 text-sm space-y-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p><strong class="text-gray-700">Date of Purchase:</strong> {{$order->created_at}}</p>
                                    <p><strong class="text-gray-700">Seller:</strong> {{$item->artwork->artwork_title}}</p>
                                    <p><strong class="text-gray-700">Price:</strong> ${{$order->payment->amount}}</p>
                                </div>
                                <div>
                                    @if($order->delivery_method === 'request delivery')
                                        <p><strong class="text-gray-700">Delivery Service:</strong> {{$order->delivery_method}}: Conquest</p>
                                        <p><strong class="text-gray-700">Delivery Fee:</strong> $58</p>
                                        <p><strong class="text-gray-700">Total Paid:</strong> ${{$order->total_amount}}</p>
                                    @else
                                        <p><strong class="text-gray-700">Receive on:</strong> {{$order->updated_at}}</p>
                                        <p><strong class="text-gray-700">Delivery Method:</strong> {{$order->delivery_method}}</p>
                                        <p><strong class="text-gray-700">Total Paid:</strong> ${{$order->total_amount}}</p>
                                    @endif
                                </div>
                            </div>
                           
                            <div class="flex justify-end space-x-2 mt-4">
                                @if($order->review)
                                    <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#viewReview{{$order->id}}">View Review</button>
                                @else
                                    <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#rate{{$order->id}}">Review Order</button>
                                @endif
                                    <button class="btn-outline">Contact Seller</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- RATE MODAL ======== --}}
                    <div class="modal fade" id="rate{{$order->id}}" tabindex="-1" aria-labelledby="rate{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-4">
                                <div class="modal-header">
                                    <h3 class="modal-title font-bold" id="rate{{$order->id}}">Rate your purchase!</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('review-order')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id}}">
                                    <input type="hidden" name="artwork_id" value="{{ $item->artwork->id }}">
                                    <div class="modal-body">
                                        <div class="mt-4">
                                            <div class="mb-2">
                                                <div>
                                                    <label for="artist_rating" class="block mb-2 font-semibold">Artist rating:</label>
                                                    <div class="flex flex-row-reverse justify-center gap-1">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <input type="radio" id="artist_star{{$i}}_{{$order->id}}" name="artist_rating" value="{{$i}}" class="hidden peer" required />
                                                            <label for="artist_star{{$i}}_{{$order->id}}" class="text-4xl text-gray-300 cursor-pointer peer-checked:text-yellow-400 hover:text-yellow-300">★</label>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="artwork_rating" class="block mb-2 font-semibold">Artwork rating:</label>
                                                    <div class="flex flex-row-reverse justify-center gap-1">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <input type="radio" id="artwork_star{{$i}}_{{$order->id}}" name="artwork_rating" value="{{$i}}" class="hidden peer" required />
                                                            <label for="artwork_star{{$i}}_{{$order->id}}" class="text-4xl text-gray-300 cursor-pointer peer-checked:text-yellow-400 hover:text-yellow-300">★</label>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <textarea name="comment" class="w-full p-2 border rounded" placeholder="Write your review about the artist and artwork..."></textarea>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary bg-[#d4a373] hover:bg-[#c49767] text-white">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($order->review)
                        <div class="modal fade" id="viewReview{{$order->id}}" tabindex="-1" aria-labelledby="viewReview{{$order->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-4">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-bold">Your Review</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4 class="font-bold mb-2">Artist Rating:</h4>
                                        <p class="text-yellow-400 text-3xl">{{ str_repeat('★', $order->review->artist_rating) }}</p>

                                        <h4 class="font-bold mt-4 mb-2">Artwork Rating:</h4>
                                        <p class="text-yellow-400 text-3xl">{{ str_repeat('★', $order->review->artwork_rating) }}</p>

                                        <h4 class="font-bold mt-4 mb-2">Comment:</h4>
                                        <p class="text-gray-600">{{ $order->review->comment ?? 'No comment provided.' }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="text-center">NO COMPLETED ORDER!</div>
            @endif
            </div>

            <!-- CANCELLED ORDERS -->
            <div class="tab-content cancelled-items hidden mt-6">
                <h3 class="text-xl font-bold text-[#d4a373] text-center mb-4">CANCELLED ORDERS</h3>
                @if($cancelled->isNotEmpty())
                @foreach($cancelled as $order)
                    @php $item = $order->items->first(); @endphp
                    @if($item)
                    <div class="order-card bg-white shadow-lg p-4 rounded-lg border mb-4">
                        <div class="flex flex-col md:flex-row">
                            <img src="{{ asset($item->artwork->image_path) }}" class="w-full md:w-36 h-36 object-cover rounded-lg" alt="Artwork">
                            <div class="ml-0 md:ml-4 mt-4 md:mt-0">
                                <h2 class="text-lg font-bold text-[#6e4d41]">{{ $item->artwork->artwork_title }}</h2>
                                <p class="text-sm text-gray-500">{{ $item->artwork->user->full_name }}</p>
                                <span class="text-lg font-bold text-red-500">CANCELLED</span>
                                <p class="text-sm text-gray-500">Cancelled on {{ $order->updated_at }}</p>
                                <div class="mt-2">
                                    <button class="view-details-btn btn-outline">View Details</button>
                                </div>
                            </div>
                        </div>
                        <div class="order-details mt-4 text-sm space-y-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p><strong class="text-gray-700">Date of Purchase:</strong> {{ $order->ordered_at }}</p>
                                    <p><strong class="text-gray-700">Seller:</strong> {{ $item->artwork->user->full_name }}</p>
                                    <p><strong class="text-gray-700">Price:</strong> ${{ $item->price}}</p>
                                </div>
                                <div>
                                    <p><strong class="text-gray-700">Cancellation Date:</strong> {{ $order->updated_at }}</p>
                                    <p><strong class="text-gray-700">Reason:</strong> {{$order->cancel_reason ?? 'N/A'}}</p>
                                    <p><strong class="text-gray-700">Refund Status:</strong> Processing</p>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2 mt-4">
                                <button class="btn-outline">Contact Seller</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                <div class="text-center">NO CANCELLED ORDER!</div>
                @endif
            </div>

        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function () {
                // Remove active class from all tabs
                document.querySelectorAll('.tab').forEach(t => {
                    t.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(tc => {
                    tc.classList.add('hidden');
                });
                
                // Show the selected tab content
                document.querySelector('.' + this.dataset.tab).classList.remove('hidden');
            });
        });

        // View Details functionality
        document.querySelectorAll('.view-details-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Find the order details section
                const details = this.closest('.order-card').querySelector('.order-details');
                
                // Toggle visibility
                if (details.style.display === 'none' || details.style.display === '') {
                    details.style.display = 'block';
                    this.textContent = 'Hide Details';
                } else {
                    details.style.display = 'none';
                    this.textContent = 'View Details';
                }
            });
        });

        // Initially hide all order details sections
        document.querySelectorAll('.order-details').forEach(details => {
            details.style.display = 'none';
        });
    });
</script>
<script>
function setRating(inputName, rating) {
    // Set the rating value to the hidden input field
    document.querySelector(`input[name=${inputName}]`).value = rating;

    // Highlight stars
    for (let i = 1; i <= 5; i++) {
        let star = document.getElementById(`star-${inputName}-${i}`);
        if (i <= rating) {
            star.classList.remove('text-gray-300');
            star.classList.add('text-yellow-400');
        } else {
            star.classList.remove('text-yellow-400');
            star.classList.add('text-gray-300');
        }
    }
}
</script>



</body>
<footer>
    @include('layouts.footer')
</footer>
</html>