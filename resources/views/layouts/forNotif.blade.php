
      <div class="flex items-center space-x-2">
        <div class="relative">
          <button id="notificationButton" class="p-2 hover:bg-gray-100 rounded-full relative focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#6e4d41]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
          </button>
          <!-- Modal NOTIFICATION -->
          <div id="notificationModal" class="hidden transform scale-y-0 opacity-0 transition duration-300 origin-top absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 z-50">
            <div class="p-4">
              <h3 class="text-lg font-semibold mb-4 text-[#3A2E2A]">Notifications</h3>
              <ul class="space-y-3 max-h-60 overflow-y-auto text-sm text-[#3A2E2A]">
                <li class="bg-[#FFF3E0] p-3 rounded">🎨 You have a new order for “Custom Digital Portrait”</li>
                <li class="bg-[#FFF3E0] p-3 rounded">📦 Order #2341 has been shipped</li>
                <li class="bg-[#FFF3E0] p-3 rounded">💬 New message from buyer “jane_doe”</li>
                <li class="bg-[#FFF3E0] p-3 rounded">✅ Your return request for “Wooden Sculpture” was approved</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <button id="menuBtn" class="md:hidden mr-[-25px] block text-[#6e4d41] focus:outline-none text-2xl">☰</button>


  <!-- JavaScript for modal toggle -->
  <script>
  const notifBtn = document.getElementById('notificationButton');
  const notifModal = document.getElementById('notificationModal');

  notifBtn.addEventListener('click', function () {
    if (notifModal.classList.contains('hidden')) {
      notifModal.classList.remove('hidden');
      setTimeout(() => {
        notifModal.classList.remove('scale-y-0', 'opacity-0');
        notifModal.classList.add('scale-y-100', 'opacity-100');
      }, 10);
    } else {
      notifModal.classList.remove('scale-y-100', 'opacity-100');
      notifModal.classList.add('scale-y-0', 'opacity-0');
      setTimeout(() => {
        notifModal.classList.add('hidden');
      }, 300); // match the transition duration
    }
  });

  // Close modal if clicking outside
  window.addEventListener('click', function (e) {
    if (!notifModal.contains(e.target) && !notifBtn.contains(e.target)) {
      notifModal.classList.remove('scale-y-100', 'opacity-100');
      notifModal.classList.add('scale-y-0', 'opacity-0');
      setTimeout(() => {
        notifModal.classList.add('hidden');
      }, 300);
    }
  });
  </script>