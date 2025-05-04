<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Become an Art Seller</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .file-input::-webkit-file-upload-button { visibility: hidden; }
    .file-input::before {
      content: 'Upload File';
      background: #3A2E2A;
      color: white;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body class="bg-[#F8F7F4] text-gray-900">

@include('layouts.forNav')
@extends('layouts.forbg')


<section class="flex justify-center items-center min-h-screen bg-gray-50 py-12">
  <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-3xl border">
  @if($user->sampleArt && $user->validId && $user->gcash_no)
    <div id="step-1" class="form-step bg-white p-6 rounded-xl shadow-md text-center">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">🎨 Welcome to ARTieh Seller Side!</h2>
      <p class="text-gray-600 text-lg">
        Your application has been submitted successfully.<br>
        Please wait while the admin reviews and approves your request.
      </p>
    </div>
  @else
    <!-- Step Indicators -->
    <div class="flex items-center justify-between mb-10">
      <div id="step-indicator-1" class="w-8 h-8 flex items-center justify-center rounded-full border-2 text-white bg-blue-500 border-blue-500">1</div>
      <div class="flex-1 border-t-2 border-gray-300 mx-2"></div>
      <div id="step-indicator-2" class="w-8 h-8 flex items-center justify-center rounded-full border-2 text-gray-500 border-gray-300">2</div>
    </div>

    <!-- Step 1 -->
    <div id="step-1" class="form-step">
      <h2 class="text-2xl font-semibold mb-4">🎨 Welcome to ARTieh Seller Side!</h2>
      <p class="mb-4">By applying to become a seller on our platform, you agree to the following terms and conditions. Please read them carefully before proceeding.</p>
      <p class="mb-4">
        Read the agreements here
        <button class=" cursor-pointer text-blue-600 " data-bs-toggle="modal" data-bs-target="#termsConditions">Terms & Conditions</button>
      </p>
      <div class="flex items-center mb-6">
        <input type="checkbox" id="terms" class="h-5 w-5 text-blue-600" required>
        <label for="terms" class="ml-3 text-gray-700 text-sm">
          I have read and accepted the Terms and Conditions
        </label>
      </div>
      <button onclick="nextStep(2)" class="w-full py-3 bg-[#3A2E2A] hover:bg-[#2E2420] text-white rounded-lg transition">Next</button>
    </div>

    <!-- Step 2 -->
    <form id="step-2" method="POST" action="{{route('beASeller', $user->id)}}" enctype="multipart/form-data" class="form-step hidden">
      @csrf
      @method('PATCH')
      <h2 class="text-2xl font-semibold text-center mb-6">Step 2: Artwork Details</h2>

      <!-- Personal Information -->
      <div class="space-y-4 mb-8">
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Artist Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium mb-1">First Name</label>
            <input type="text" name="first_name" placeholder="{{$user->first_name ?? 'First Name'}}" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800">
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Last Name</label>
            <input type="text" name="last_name" placeholder="{{$user->last_name ?? 'Last Name'}}" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800">
          </div>
        </div>
       
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium mb-1">Contact Number</label>
            <input type="text" name="phone" placeholder="{{$user->phone ?? 'Number'}}" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800">
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Gcash Number</label>
            <input type="text" name="gcash_no" placeholder="For payment transaction" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800">
          </div>
        </div>

        <div>

          <label class="block text-sm font-medium mb-1">Address</label>
          <input type="text" name="address" placeholder="{{$user->address ?? 'house-no, Barangay, City, Province'}}" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800 mb-4">

          
          <label class="block text-sm font-medium mb-1">Email Address</label>
          <input type="email" name="email" placeholder="{{$user->email ?? 'Email'}}" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800"
            placeholder="your.email@example.com"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
          <p class="text-xs text-gray-500 mt-1">Must be a valid email address</p>

          <div>
          <label class="block text-sm font-medium mb-1">Artist Bio</label>
          <textarea name="biography" placeholder="Write about your self and works" rows="4" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-gray-800"></textarea>
          </div>
      </div>

      <!-- Verification -->
      <div class="space-y-4 mb-8">
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Verification</h3>
        <div>
          <label class="block text-sm font-medium mb-1">Sample Artwork</label>
          <input type="file" name="sampleArt" class="w-full p-2 border rounded-lg" required>
          <p class="text-xs text-gray-500 mt-1">1 sample of your artwork JPEG/PNG, max 5MB </p>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Valid ID</label>
          <input type="file" required name="validId" class="w-full p-2 border rounded-lg" required>
          <p class="text-xs text-gray-500 mt-1">Valid ID (e.g., passport, driver’s license)</p>
        </div>
      </div>

      <!-- Terms Agreement -->
      <div class="flex items-start mb-6">
        <input type="checkbox" required class="mt-1">
        <div class="ml-3 text-sm text-gray-600">
          I agree to the 
          <a href="#" class="text-blue-600 hover:underline">Marketplace Terms</a> and confirm that:
          <ul class="list-disc pl-5 mt-2 space-y-1">
            <li>All artworks are original creations</li>
            <li>I will fulfill orders promptly</li>
            <li>I understand the 15% commission fee</li>
          </ul>
        </div>
      </div>

      <div class="flex justify-between space-x-2 pt-4">
        <button type="button" onclick="nextStep(1)" class="w-1/2 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg transition">Back</button>
        <button type="submit" class="w-1/2 py-2 bg-[#3A2E2A] hover:bg-[#2E2420] text-white rounded-lg transition">Submit Application</button>
      </div>

      <p id="formMessage" class="text-center mt-4 text-sm text-green-600"></p>
    </form>
  </div>


<!-- Modal -->
<div class="modal fade" id="termsConditions" tabindex="-1" aria-labelledby="termsConditionsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="termsConditionsLabel">Terms and Conditions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body space-y-4 text-sm text-gray-700">
        <h6 class="font-semibold text-base">Seller Responsibilities</h6>
        <ul class="list-disc pl-5 space-y-1">
          <li>List only original, one-of-a-kind artworks that comply with our platform’s guidelines.</li>
          <li>Accurately describe your artworks, including dimensions, materials, and other relevant details.</li>
          <li>Fulfill orders promptly and ensure proper packaging for safe delivery.</li>
          <li>Respond to buyer inquiries in a timely and professional manner.</li>
        </ul>

        <h6 class="font-semibold text-base">Platform Policies</h6>
        <ul class="list-disc pl-5 space-y-1">
          <li>All sellers must adhere to community guidelines regarding content and conduct.</li>
          <li>A 15% commission fee is applied to each successful sale.</li>
          <li>Violations of policies may lead to suspension or termination of your seller account.</li>
        </ul>

        <h6 class="font-semibold text-base">Legal Compliance</h6>
        <ul class="list-disc pl-5 space-y-1">
          <li>Sellers are responsible for ensuring compliance with local laws and regulations.</li>
          <li>Provide accurate identity and tax-related documents when requested.</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endif
</section>
@include('layouts.footer')

<script>
function nextStep(step) {

   // Check if we're trying to go from Step 1 to Step 2
  if (step === 2) {
    var termsCheckbox = document.getElementById('terms');
    if (!termsCheckbox.checked) {
      Swal.fire({
                title: "Please accept the Terms and Conditions before proceeding.",
                icon: "warning",
                timer: 800,
                showConfirmButton: false
            });
      return; // Stop here, don't move to the next step
    }
  }
  // Hide all steps
  document.querySelectorAll('.form-step').forEach(function(formStep) {
    formStep.classList.add('hidden');
  });

  // Remove 'active' class from all indicators
  document.querySelectorAll('.step-indicator').forEach(function(indicator) {
    indicator.classList.remove('bg-blue-500', 'text-white', 'border-blue-500');
    indicator.classList.add('border-gray-300', 'text-gray-500');
  });

  // Show the selected step
  document.getElementById('step-' + step).classList.remove('hidden');

  // Update the selected step indicator
  var activeIndicator = document.getElementById('step-indicator-' + step);
  activeIndicator.classList.remove('border-gray-300', 'text-gray-500');
  activeIndicator.classList.add('bg-blue-500', 'text-white', 'border-blue-500');
}
</script>
</body>
</html>