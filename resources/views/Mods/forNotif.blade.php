    <div>
      <button id="notificationButton" class="fixed bottom-20 border right-5 z-40 bg-white p-3 rounded-full shadow-lg hover:bg-gray-700 transition w-auto h-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#6e4d41]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.50"
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
      </button>
    </div>
          <!-- Modal NOTIFICATION -->
          <div id="notificationModal" class="hidden fixed origin-bottom bottom-0 right-5 z-50 bg-white p-4 rounded-t-lg shadow-lg w-full max-w-[400px] h-[90vh] sm:h-[530px] flex flex-col transition-all duration-300 scale-95 opacity-0 sm:right-5">

              <div class="border-b mb-2 pb-2">
                <h3 class="text-[#6E4D41] text-lg font-semibold">Notifications</h3>
              </div>

              <div class=" overflow-y-auto text-sm text-[#3A2E2A]">
                 @forelse ($notifications as $notification)
                  <p class="border-b p-3 rounded">{{ $notification->message ?? 'No message' }}</p>
                @empty
                   <p class="border-b p-3 rounded">No Notification.</p>
                @endempty
              </div>
            </div>

            <div id="chat-bob" class="chat-content hidden flex-1 p-2 overflow-y-auto">
              <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Hi, how are you?</p></div>
              <div class="mb-2 text-right"><p class="bg-blue-500 text-white p-2 rounded-lg text-sm w-fit ml-auto">I'm great thanks!</p></div>
            </div>
          </div>


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