<!-- Chat Button -->
<div>
  <button id="chatButton" class="fixed bottom-4 border right-5 z-40 bg-white p-3 rounded-full shadow-lg hover:bg-gray-700 transition w-auto h-auto">
    <img src="{{ asset('images/Message.svg') }}" class="w-7 h-7">
  </button>
</div>


<!-- Chat Modal -->
<!-- Chat Modal -->
<div id="chatModal" class="hidden fixed bottom-0 right-0 z-50 bg-white p-4 rounded-t-lg shadow-lg w-full max-w-[400px] h-[90vh] sm:h-[530px] flex flex-col transition-all duration-300 scale-95 opacity-0 sm:right-5">

  <div class="flex justify-between items-center mb-2 border-b pb-2">
    <h1 class="text-[#6E4D41] text-lg font-semibold">Chat</h1>
    <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
  </div>

  <!-- Chat List View -->
  <div id="chatListView" class="flex flex-col overflow-y-auto">
    <div class="flex items-center p-1 gap-2 mb-3">
      <input type="text" placeholder="Search name" class="border border-gray-300 rounded-md px-3 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-400"/>
      <select class="border border-gray-300 rounded-md px-2 py-2 text-sm w-28 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option>All</option>
        <option>Unread</option>
        <option>Latest</option>
        <option>Oldest</option>
      </select>
    </div>

    <div class="chat-head flex items-center gap-2 p-1 hover:bg-gray-100 rounded cursor-pointer" data-target="chat-ivan">
      <img src="{{ asset('images/Vakla.jpg') }}" class="rounded-full w-12 h-12" alt="Ivan">
      <div class="flex-1">
        <div class="flex justify-between items-center">
          <span class="font-medium text-sm">Ivan</span>
          <span class="text-xs text-gray-400">17/03/25</span>
        </div>
        <p class="text-sm text-gray-500 truncate">please kim kahit pict...</p>
      </div>
    </div>

    <div class="chat-head flex items-center gap-2 p-1 hover:bg-gray-100 rounded cursor-pointer" data-target="chat-bob">
      <img src="{{ asset('images/Bobross.jpg') }}" class="rounded-full w-12 h-12" alt="Bob">
      <div class="flex-1">
        <div class="flex justify-between items-center">
          <span class="font-medium text-sm">Bob Ross</span>
          <span class="text-xs text-gray-400">17/03/25</span>
        </div>
        <p class="text-sm text-gray-500 truncate">Thank you po</p>
      </div>
    </div>
  </div>

  <!-- Chat Box View -->
  <div id="chatBoxView" class="hidden flex flex-col flex-1">
    <div class="flex items-center gap-2 border-b p-2">
      <button id="backToList" class="">
      <img src="{{ asset('images/BACK.svg') }}" class="w-7 h-7">
      </button>
      <h2 id="chatHeader" class="text-base font-semibold text-gray-800 ml-2">Chat</h2>
    </div>

    <!-- Dynamic Chat Boxes -->
    <div id="chat-ivan" class="chat-content hidden flex-1 p-2 overflow-y-auto">
      <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">H</p></div>
      <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Hi yan naiwan yung i</p></div>
      <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">iloveu</p></div>
      <div class="mb-2 text-right"><p class="bg-blue-500 text-white p-2 rounded-lg text-sm w-fit ml-auto">???</p></div>
      <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Please Kim kahit picture lang</p></div>
    </div>

    <div id="chat-bob" class="chat-content hidden flex-1 p-2 overflow-y-auto">
      <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Hi, how are you?</p></div>
      <div class="mb-2 text-right"><p class="bg-blue-500 text-white p-2 rounded-lg text-sm w-fit ml-auto">I'm great thanks!</p></div>
    </div>

    <div class="border-t flex items-center gap-2 p-2 bg-white">
      <input type="text" placeholder="Type a message..." class="flex-1 p-2 text-sm focus:outline-none">
      <button id="SendButton" class="hover:opacity-80">
        <img src="{{ asset('images/send.svg') }}" class="w-7 h-7">
      </button>
    </div>
  </div>
</div>


<!-- Chat Modal Script -->
<script>
  document.querySelectorAll('.chat-head').forEach(head => {
  head.addEventListener('click', () => {
    const targetId = head.dataset.target;

    // Hide list, show chat box
    document.getElementById('chatListView').classList.add('hidden');
    document.getElementById('chatBoxView').classList.remove('hidden');

    // Hide all chat contents
    document.querySelectorAll('.chat-content').forEach(chat => chat.classList.add('hidden'));

    // Show selected chat
    document.getElementById(targetId).classList.remove('hidden');

    // Update header
    const name = head.querySelector('span.font-medium').textContent;
    document.getElementById('chatHeader').textContent = name;
  });
});

document.getElementById('backToList').addEventListener('click', () => {
  document.getElementById('chatBoxView').classList.add('hidden');
  document.getElementById('chatListView').classList.remove('hidden');
});
</script>

<!-- Image Upload Script -->
<script>
  const uploadBtn = document.getElementById('UploadButton');
  const fileInput = document.getElementById('fileInput');

  if (uploadBtn && fileInput) {
    uploadBtn.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        console.log("Selected file:", file.name);
      }
    });
  }
</script>
<script>
  const chatButton = document.getElementById('chatButton');
  const chatModal = document.getElementById('chatModal');
  const closeModal = document.getElementById('closeModal');

  chatButton.addEventListener('click', () => {
    chatModal.classList.remove('hidden', 'opacity-0', 'scale-95');
    chatModal.classList.add('opacity-100', 'scale-100');
  });

  closeModal.addEventListener('click', () => {
    chatModal.classList.add('opacity-0', 'scale-95');
    setTimeout(() => {
      chatModal.classList.add('hidden');
    }, 300); // matches your transition duration
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const chatButton = document.getElementById('chatButton');
    const chatModal = document.getElementById('chatModal');
    const closeModal = document.getElementById('closeModal');

    if (chatButton && chatModal && closeModal) {
      chatButton.addEventListener('click', () => {
        chatModal.classList.remove('hidden', 'opacity-0', 'scale-95');
        chatModal.classList.add('opacity-100', 'scale-100');
      });

      closeModal.addEventListener('click', () => {
        chatModal.classList.remove('opacity-100', 'scale-100');
        chatModal.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
          chatModal.classList.add('hidden');
        }, 300);
      });
    }
  });
</script>
