<!-- Notification Button -->
<div>
  <button id="notificationButton" class="fixed bottom-20 right-5 z-40 bg-white p-3 rounded-full shadow-lg hover:bg-gray-100 transition w-auto h-auto">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#6e4d41]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.50"
        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
    </svg>
    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center" id="notifBadge">
      {{ count($notifications) }}
    </span>
  </button>
</div>

<!-- Notification Modal -->
<div id="notificationModal" class="hidden fixed bottom-0 left-1/2 -translate-x-1/2 z-50 bg-white p-4 rounded-t-lg shadow-lg w-full max-w-[95%] sm:max-w-[400px] h-[90vh] sm:h-[530px] flex flex-col transition-all duration-300 origin-bottom transform-gpu scale-95 opacity-0 sm:right-5 sm:left-auto sm:translate-x-0">

  <div class="flex justify-between items-center border-b mb-2 pb-2">
    <h3 class="text-[#6E4D41] text-lg font-semibold">Notifications</h3>
    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-700 transition" title="Close">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <div class="overflow-y-auto text-sm text-[#3A2E2A]" id="notificationList">
    @forelse ($notifications as $notification)
      <div class="border-b p-3 rounded flex justify-between items-start">
        <p class="w-full pr-2">{{ $notification->message ?? 'No message' }}</p>
        <button class="text-white hover:text-white removeNotification" title="Remove">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    @empty
      <p class="border-b p-3 rounded text-center">No Notification.</p>
    @endforelse
  </div>
</div>

<!-- JavaScript -->
<script>
const notifBtn = document.getElementById('notificationButton');
const notifModal = document.getElementById('notificationModal');
const notifBadge = document.getElementById('notifBadge');
const closeModalBtn = document.getElementById('closeModalBtn');

// Toggle modal open/close
notifBtn.addEventListener('click', function (e) {
  e.stopPropagation();
  if (notifModal.classList.contains('hidden')) {
    notifModal.classList.remove('hidden');
    setTimeout(() => {
      notifModal.classList.remove('scale-95', 'opacity-0');
      notifModal.classList.add('scale-100', 'opacity-100');
    }, 10);
  } else {
    closeModal();
  }
});

// Close modal via close icon
closeModalBtn.addEventListener('click', function () {
  closeModal();
});

// Close modal clicking outside
document.addEventListener('click', function (e) {
  if (!notifModal.contains(e.target) && !notifBtn.contains(e.target)) {
    closeModal();
  }
});

function closeModal() {
  notifModal.classList.remove('scale-100', 'opacity-100');
  notifModal.classList.add('scale-95', 'opacity-0');
  setTimeout(() => {
    notifModal.classList.add('hidden');
  }, 300);
}

// Remove individual notification
document.querySelectorAll('.removeNotification').forEach(button => {
  button.addEventListener('click', function (e) {
    e.stopPropagation();
    const notifItem = this.closest('div');
    notifItem.remove();

    // Update badge
    const remaining = document.querySelectorAll('.removeNotification').length;
    if (notifBadge) {
      notifBadge.textContent = remaining;
      if (remaining === 0) notifBadge.classList.add('hidden');
    }

    // Show "No Notification" if all removed
    if (remaining === 0) {
      const notificationList = document.getElementById('notificationList');
      notificationList.innerHTML = `<p class="border-b p-3 rounded text-center">No Notification.</p>`;
    }
  });
});
</script>
