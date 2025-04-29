<!-- Chat Button -->
<div>
  <button id="chatButton" class="fixed bottom-5 right-5 z-50 bg-white p-3 rounded-full shadow-lg hover:bg-gray-700 transition">
    <img src="{{ asset('images/Message.svg') }}" class="w-7 h-7">
  </button>
</div>

<!-- Chat Modal -->
<div id="chatModal" class="hidden fixed bottom-10  right-5 z-50 bg-white p-4 rounded-lg shadow-lg w-[650px] h-[530px] flex flex-col">
  <div class="flex justify-between items-center mb-2 border-b pb-2">
    <h1 class="text-[#6E4D41] text-lg font-semibold">Chat</h1>
    <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
  </div>

  <!-- Two-column layout -->
  <div class="flex flex-1 overflow-hidden">
    <!-- Chat list column -->
    <div class="w-2/3 border-r pr-3 overflow-y-auto">
      <div class="flex items-center p-1 gap-2 mb-3">
        <input type="text" placeholder="Search name" class="border border-gray-300 rounded-md px-3 py-2 text-sm w-full max-w-xs focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        <select class="border border-gray-300 rounded-md px-2 py-2 text-sm w-28 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option>All</option>
          <option>Unread</option>
          <option>Latest</option>
          <option>Oldest</option>
        </select>
      </div>

      <!-- Chat heads -->
      <div class="chat-head flex items-center gap-2 p-1 hover:bg-gray-100 rounded cursor-pointer" data-target="chat-ivan">
        <img src="{{ asset('images/Vakla.jpg') }}" class="rounded-full object-cover aspect-square w-12 h-12" alt="Ivan">
        <div class="flex-1">
          <div class="flex justify-between items-center">
            <span class="font-medium text-sm text-gray-900">Ivan</span>
            <span class="text-xs text-gray-400 whitespace-nowrap">17/03/25</span>
          </div>
          <p class="text-sm text-gray-500 truncate w-full">please kim kahit pict...</p>
        </div>
      </div>

      <div class="chat-head flex items-center gap-2 p-1 hover:bg-gray-100 rounded cursor-pointer" data-target="chat-bob">
        <img src="{{ asset('images/Bobross.jpg') }}" class="rounded-full object-cover aspect-square w-12 h-12" alt="Bob Ross">
        <div class="flex-1">
          <div class="flex justify-between items-center">
            <span class="font-medium text-sm text-gray-900">Bob Ross</span>
            <span class="text-xs text-gray-400 whitespace-nowrap">17/03/25</span>
          </div>
          <p class="text-sm text-gray-500 truncate w-full">Thank you po</p>
        </div>
      </div>
    </div>

    <!-- Chat box column -->
    <div class="w-2/3 flex flex-col pl-2">
      <div class="p-1 bg-white">
        <h2 id="chatHeader" class="text-base border-b pl-2 text-gray-800">Ivan</h2>
      </div>

      <!-- Chat with Ivan -->
      <div id="chat-ivan" class="flex-1 p-2 overflow-y-auto">
        <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">H</p></div>
        <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Hi yan naiwan yung i</p></div>
        <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">iloveu</p></div>
        <div class="mb-2 text-right"><p class="bg-blue-500 text-white p-2 rounded-lg text-sm w-fit ml-auto">???</p></div>
        <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Please Kim kahit picture lang</p></div>
      </div>

      <!-- Chat with Bob -->
      <div id="chat-bob" class="hidden flex-1 p-2 overflow-y-auto">
        <div class="mb-2"><p class="bg-gray-100 p-2 rounded-lg text-sm w-fit">Hi, how are you?</p></div>
        <div class="mb-2 text-right"><p class="bg-blue-500 text-white p-2 rounded-lg text-sm w-fit ml-auto">I'm great thanks!</p></div>
      </div>

      <!-- Message input -->
      <div class="text-start border-t mt-auto flex items-center gap-2 p-2 bg-white">
        <button id="UploadButton" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/UploadImage1.svg') }}" class="w-7 h-7">
        </button>
        <input type="text" placeholder="Type a message..." class="flex-1 p-2 text-sm focus:outline-none">
        <button id="SendButton" class="hover:opacity-80 transition-opacity">
          <img src="{{ asset('images/send.svg') }}" class="w-7 h-7">
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Chat Modal Script -->
<script>
  document.getElementById('chatButton')?.addEventListener('click', () => {
    document.getElementById('chatModal')?.classList.toggle('hidden');
    document.getElementById('chatButton')?.classList.add('hidden');
  });

  document.getElementById('closeModal')?.addEventListener('click', () => {
    document.getElementById('chatModal')?.classList.add('hidden');
    document.getElementById('chatButton')?.classList.remove('hidden');
  });

  const chatHeads = document.querySelectorAll(".chat-head");
  const chatBoxes = document.querySelectorAll("#chat-ivan, #chat-bob");
  const chatHeader = document.getElementById("chatHeader");

  chatHeads.forEach(head => {
    head.addEventListener("click", () => {
      chatBoxes.forEach(box => box.classList.add("hidden"));
      const targetId = head.getAttribute("data-target");
      document.getElementById(targetId)?.classList.remove("hidden");

      const name = head.querySelector("span.font-medium")?.textContent;
      chatHeader.textContent = name;
    });
  });
</script>
