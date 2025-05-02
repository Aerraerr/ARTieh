<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Become an Art Seller</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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


<section class="flex justify-center items-center min-h-screen bg-white-100 py-12">
<div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-3xl">
  <div class=" border p-4">
      <div class="flex justify-between mb-10">
        <div id="step-indicator-1" class="step-indicator active w-8 h-8 flex items-center justify-center rounded-full border-2 border-blue-500 text-white bg-blue-500">1</div>
        <div class="flex-1 border-t-2 border-gray-300"></div>
        <div id="step-indicator-2" class="step-indicator w-8 h-8 flex items-center justify-center rounded-full border-2 border-gray-300 text-gray-500">2</div>      </div>

    <!-- Step 1 -->
    <div id="step-1" class="form-step">
        <h2 class="text-xl font-bold mb-4">Welcome to ARTieh Seller Side!</h2>
        <div class="mb-4">
          <p>By applying to become a seller on our platform, you agree to the following terms and conditions. Please read them carefully before proceeding.</p>
        </div>
        <div>
          <p>Read the Agreements here <button class="border"  data-bs-toggle="modal" data-bs-target="#terms&conditions">paper</button></p>
        </div>
        <div class="flex items-center mb-6">
          <input type="checkbox" id="terms" class="form-checkbox h-5 w-5 text-blue-600" required>
          <label for="terms" class="ml-3 text-gray-700 text-sm">
            I have read and accepted the Terms and Conditions
          </label>
        </div>
        <button type="button" onclick="nextStep(2)" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Next</button>
    </div>

    <div>
        <!-- Step 2 -->
        <form id="step-2" class="form-step hidden">
            <h2 class="text-xl font-bold mb-4 text-center">Step 2: Artwork Details</h2>
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title of Artwork</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter artwork title">
            </div>
            <div class="mb-4">
                <!-- Personal Information -->
          <div class="space-y-4">
            <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium mb-1">Full Legal Name</label>
                <input type="text" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
              </div>
              <div>
                <label class="block text-sm font-medium mb-1">Contact Number</label>
                <input type="tel" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Email Address</label>
              <input type="email" required 
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]"
                    placeholder="your.email@example.com"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
              <p class="text-xs text-gray-500 mt-1">Must be a valid email address</p>
            </div>
          </div>

          <!-- Artist Profile -->
          <div class="space-y-4">
            <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Artist Profile</h3>
            <div>
              <label class="block text-sm font-medium mb-1">Artist/Brand Name</label>
              <input type="text" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
              <p class="text-xs text-gray-500 mt-1">This will be displayed to buyers</p>
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Artist Bio (150-200 words)</label>
              <textarea rows="3" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]"></textarea>
            </div>
          </div>

          <!-- Art Portfolio -->
          <div class="space-y-4">
            <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Art Portfolio</h3>
            <div>
              <label class="block text-sm font-medium mb-1">Portfolio Samples (3-5 pieces)</label>
              <input type="file" class="file-input w-full" accept="image/*" multiple>
              <p class="text-xs text-gray-500 mt-1">Showcase your best work (JPEG/PNG, max 5MB each)</p>
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Primary Art Medium</label>
              <select required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
                <option value="">Select Medium</option>
                <option>Painting</option>
                <option>Sculpture</option>
                <option>Digital Art</option>
                <option>Photography</option>
                <option>Mixed Media</option>
              </select>
            </div>
          </div>

          <!-- Shop Setup -->
          <div class="space-y-4">
            <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Shop Setup</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium mb-1">Average Price Range</label>
                <select required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
                  <option value="">Select Range</option>
                  <option>₱1,000 - ₱5,000</option>
                  <option>₱5,000 - ₱15,000</option>
                  <option>₱15,000 - ₱30,000</option>
                  <option>₱30,000+</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium mb-1">Production Time</label>
                <select required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
                  <option value="">Select Timeframe</option>
                  <option>1-2 weeks</option>
                  <option>3-4 weeks</option>
                  <option>1-2 months</option>
                  <option>Commission Basis</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Verification -->
          <div class="space-y-4">
            <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Verification</h3>
            <div>
              <label class="block text-sm font-medium mb-1">Government ID</label>
              <input type="file" required class="file-input w-full" accept=".pdf,.jpg,.png">
              <p class="text-xs text-gray-500 mt-1">Upload clear photo of valid ID (e.g., passport, driver's license)</p>
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Artist Statement</label>
              <textarea rows="2" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]" 
                placeholder="Describe your artistic practice and process"></textarea>
            </div>
          </div>

          <!-- Terms -->
          <div class="space-y-4">
            <div class="flex items-start space-x-2">
              <input type="checkbox" required class="mt-1">
              <p class="text-sm text-gray-600">
                I agree to the 
                <a href="#" class="text-[#3A2E2A] hover:underline">Marketplace Terms</a> and confirm that:
                <ul class="list-disc pl-5 mt-2 space-y-1">
                  <li>All artworks are original creations</li>
                  <li>I will fulfill orders promptly</li>
                  <li>I understand the 15% commission fee</li>
                </ul>
              </p>
            </div>
          </div>

          <!-- Submission -->
          <div class="pt-6">
            <button type="submit" class="w-full bg-[#3A2E2A] text-white py-3 rounded-lg hover:bg-[#2E2420] transition-colors">
              Submit Seller Application
            </button>
            <p id="formMessage" class="text-center mt-3 text-sm"></p>
          </div>
              <button type="button" onclick="nextStep(1)" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Back</button>
              <button type="button"  class="px-4 py-2 bg-blue-500 text-white rounded-lg">Next</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="terms&conditions" tabindex="-1" aria-labelledby="terms&conditions" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="terms&conditions">Terms and Conditions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
        <h6>Seller Responsibilities</h6>
        <ul>
          <li>List only original, one-of-a-kind artworks that comply with our platform’s guidelines.</li>
          <li>Accurately describe your artworks, including dimensions, materials, and other relevant details.</li>
          <li>Fulfill orders promptly and ensure proper packaging for safe delivery.</li>
          <li>Respond to buyer inquiries in a timely and professional manner.</li>
        </ul>

        <h6 class="mt-3">Fees and Payments</h6>
        <ul>
          <li>A [percentage]% commission will be deducted from each sale as a platform fee.</li>
          <li>Payments will be processed and transferred to your registered bank account within [X] business days after the order is marked as completed.</li>
        </ul>

        <h6 class="mt-3">Prohibited Activities</h6>
        <ul>
          <li>Selling counterfeit or plagiarized artworks.</li>
          <li>Engaging in fraudulent activities or misrepresenting your identity.</li>
          <li>Violating intellectual property rights or any applicable laws.</li>
        </ul>

        <h6 class="mt-3">Termination</h6>
        <p>We reserve the right to suspend or terminate your seller account if you violate any of these terms or engage in activities that harm the platform or its users.</p>

        <h6 class="mt-3">Agreement Updates</h6>
        <p>This agreement may be updated from time to time. Sellers will be notified of any changes, and continued use of the platform constitutes acceptance of the updated terms.</p>
      </div>
    </div>
  </div>
</div>

</section>
<script>
function nextStep(step) {

   // Check if we're trying to go from Step 1 to Step 2
  if (step === 2) {
    var termsCheckbox = document.getElementById('terms');
    if (!termsCheckbox.checked) {
      alert('Please accept the Terms and Conditions before proceeding.');
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

{{--
<section class="max-w-2xl mx-auto py-8 px-4">
  <div class="bg-white p-8 rounded-xl shadow-sm">
    <div class="flex items-center gap-2 mb-8">
      <button onclick="history.back()" class="text-[#6E4D41] text-xl">&larr;</button>
      <h2 class="text-2xl font-bold text-[#3A2E2A]">Become an Art Seller</h2>
    </div>

    <form id="sellerRegistration" class="space-y-6">
      <!-- Account Verification -->
      <div class="bg-[#FFF3E0] p-4 rounded-lg">
        <p class="text-sm text-[#3A2E2A]">
          <span class="font-semibold">Note:</span> You must have a verified user account.
          <a href="#" class="text-[#6E4D41] hover:underline">Login first</a> if you haven't
        </p>
      </div>

      <!-- Personal Information -->
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Personal Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium mb-1">Full Legal Name</label>
            <input type="text" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Contact Number</label>
            <input type="tel" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Email Address</label>
          <input type="email" required 
                 class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]"
                 placeholder="your.email@example.com"
                 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
          <p class="text-xs text-gray-500 mt-1">Must be a valid email address</p>
        </div>
      </div>

      <!-- Artist Profile -->
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Artist Profile</h3>
        <div>
          <label class="block text-sm font-medium mb-1">Artist/Brand Name</label>
          <input type="text" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
          <p class="text-xs text-gray-500 mt-1">This will be displayed to buyers</p>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Artist Bio (150-200 words)</label>
          <textarea rows="3" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]"></textarea>
        </div>
      </div>

      <!-- Art Portfolio -->
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Art Portfolio</h3>
        <div>
          <label class="block text-sm font-medium mb-1">Portfolio Samples (3-5 pieces)</label>
          <input type="file" class="file-input w-full" accept="image/*" multiple>
          <p class="text-xs text-gray-500 mt-1">Showcase your best work (JPEG/PNG, max 5MB each)</p>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Primary Art Medium</label>
          <select required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
            <option value="">Select Medium</option>
            <option>Painting</option>
            <option>Sculpture</option>
            <option>Digital Art</option>
            <option>Photography</option>
            <option>Mixed Media</option>
          </select>
        </div>
      </div>

      <!-- Shop Setup -->
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Shop Setup</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium mb-1">Average Price Range</label>
            <select required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
              <option value="">Select Range</option>
              <option>₱1,000 - ₱5,000</option>
              <option>₱5,000 - ₱15,000</option>
              <option>₱15,000 - ₱30,000</option>
              <option>₱30,000+</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Production Time</label>
            <select required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]">
              <option value="">Select Timeframe</option>
              <option>1-2 weeks</option>
              <option>3-4 weeks</option>
              <option>1-2 months</option>
              <option>Commission Basis</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Verification -->
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-[#3A2E2A] border-b pb-2">Verification</h3>
        <div>
          <label class="block text-sm font-medium mb-1">Government ID</label>
          <input type="file" required class="file-input w-full" accept=".pdf,.jpg,.png">
          <p class="text-xs text-gray-500 mt-1">Upload clear photo of valid ID (e.g., passport, driver's license)</p>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Artist Statement</label>
          <textarea rows="2" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-[#3A2E2A]" 
            placeholder="Describe your artistic practice and process"></textarea>
        </div>
      </div>

      <!-- Terms -->
      <div class="space-y-4">
        <div class="flex items-start space-x-2">
          <input type="checkbox" required class="mt-1">
          <p class="text-sm text-gray-600">
            I agree to the 
            <a href="#" class="text-[#3A2E2A] hover:underline">Marketplace Terms</a> and confirm that:
            <ul class="list-disc pl-5 mt-2 space-y-1">
              <li>All artworks are original creations</li>
              <li>I will fulfill orders promptly</li>
              <li>I understand the 15% commission fee</li>
            </ul>
          </p>
        </div>
      </div>

      <!-- Submission -->
      <div class="pt-6">
        <button type="submit" class="w-full bg-[#3A2E2A] text-white py-3 rounded-lg hover:bg-[#2E2420] transition-colors">
          Submit Seller Application
        </button>
        <p id="formMessage" class="text-center mt-3 text-sm"></p>
      </div>
    </form>
  </div>
</section>

<script>
document.getElementById('sellerRegistration').addEventListener('submit', function(e) {
  e.preventDefault();
  const messageEl = document.getElementById('formMessage');
  const requiredFields = this.querySelectorAll('[required]');
  let isValid = true;

  // Validate all required fields
  requiredFields.forEach(field => {
    const isEmailValid = field.type === 'email' ? field.checkValidity() : true;
    
    if (!field.value || !isEmailValid) {
      isValid = false;
      field.classList.add('border-red-500');
      if(field.type === 'email' && !field.checkValidity()) {
        field.nextElementSibling.textContent = 'Please enter a valid email address';
      }
    } else {
      field.classList.remove('border-red-500');
      if(field.type === 'email') {
        field.nextElementSibling.textContent = 'Must be a valid email address';
      }
    }
  });

  // Validate file inputs
  const fileInputs = this.querySelectorAll('input[type="file"]');
  fileInputs.forEach(input => {
    if(!input.files.length) {
      isValid = false;
      input.parentElement.classList.add('border-red-500');
    } else {
      input.parentElement.classList.remove('border-red-500');
    }
  });

  if (isValid) {
    messageEl.textContent = 'Application submitted! We will review your submission within 3 business days.';
    messageEl.classList.add('text-green-600');
    messageEl.classList.remove('text-red-600');
    this.reset();
  } else {
    messageEl.textContent = 'Please complete all required fields marked in red';
    messageEl.classList.add('text-red-600');
    messageEl.classList.remove('text-green-600');
  }
});
</script>--}}


@include('layouts.footer')

</body>
</html>