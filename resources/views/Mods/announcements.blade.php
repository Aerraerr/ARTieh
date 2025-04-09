<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body  class="bg-white text-gray-900 min-h-screen max-h-[100vh]">
    @include('layouts.forNav')
    @extends('layouts.forbg')
    
    <section>    
        <div class="bg-white p-4 rounded shadow-lg border mx-auto max-w-[100%] sm:max-w-[100%]" >
            <h4 class="mt-10 font-semibold text-[#6E4D41] text-3xl sm:text-xl md:text-3xl lg:text-3xl ml-0 sm:ml-6 md:ml-10">Upcoming Fairs and Events</h4>
            <div class="mt-[-50px] line ml-20"><hr></div>



            <!-- Event List -->
            <div class="ml-10 mr-10 grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Event 1 -->
                <div class="p-4 border rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-[#6E4D41]">Local Art & Culture Fair</h5>
                    <p class="text-[#6E4D41]">📅 April 20, 2025 | 📍 Albay Art Center</p>
                    <p class="mt-2 text-[#6E4D41]">A gathering of local artists showcasing paintings, sculptures, and performances. Live art demonstrations and interactive booths await!</p>
                </div>
                
                <!-- Event 2 -->
                <div class="p-4 border rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-[#6E4D41]">Albay Food & Craft Expo</h5>
                    <p class="text-[#6E4D41]">📅 May 15, 2025 | 📍 Legazpi Convention Hall</p>
                    <p class="mt-2 text-[#6E4D41]">A celebration of Albay’s craftsmanship and culinary excellence. Featuring food tastings, handmade products, and local artisanal goods.</p>
                </div>
                
                <!-- Event 3 -->
                <div class="p-4 border rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-[#6E4D41]">Digital Art Exhibition</h5>
                    <p class="text-[#6E4D41]">📅 June 5, 2025 | 📍 Virtual (Online Gallery)</p>
                    <p class="mt-2 text-[#6E4D41]">A digital showcase of modern and futuristic artworks, including 3D modeling, concept art, and AI-generated pieces. Virtual gallery tour available.</p>
                </div>
                
                <!-- Event 4 -->
                <div class="p-4 border rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-[#6E4D41]">Street Mural Festival</h5>
                    <p class="text-[#6E4D41]">📅 July 10, 2025 | 📍 Daraga, Albay</p>
                    <p class="mt-2 text-[#6E4D41]">Watch artists transform blank walls into colorful storytelling murals. Live music, poetry readings, and street performances will also be featured.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-[#6E4D41]">Digital Art Exhibition</h5>
                    <p class="text-[#6E4D41]">📅 June 5, 2025 | 📍 Virtual (Online Gallery)</p>
                    <p class="mt-2 text-[#6E4D41]">A digital showcase of modern and futuristic artworks, including 3D modeling, concept art, and AI-generated pieces. Virtual gallery tour available.</p>
                </div>
                
                <!-- Event 4 -->
                <div class="p-4 border rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-[#6E4D41]">Street Mural Festival</h5>
                    <p class="text-[#6E4D41]">📅 July 10, 2025 | 📍 Daraga, Albay</p>
                    <p class="mt-2 text-[#6E4D41]">Watch artists transform blank walls into colorful storytelling murals. Live music, poetry readings, and street performances will also be featured.</p>
                </div>
            </div>
        





            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">></a></li>
                </ul>
            </nav>
        </div>
    </section>

        



    <div class="flex items-center justify-center min-h-screen bg-transparent">
        <div class="bg-[#F6EBDA] p-8 rounded-lg shadow-md max-w-4xl w-full text-center">
            <h2 class="text-2xl font-bold text-[#6E4D41] mb-6">Share Your Event in Albay</h2>
            <p class="text-gray-600 mb-6">Are you hosting an art fair, gallery, or creative event? Let the community know! Upload your event and bring more people together to celebrate local artistry.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('iconused/host.png') }}" alt="Host Event" class="w-16 h-16 mb-4">
                    <h5 class="font-semibold text-[#6E4D41]">Host an Event</h5>
                    <p class="text-[#6E4D41] text-sm">Organizing an art exhibit or fair? Spread the word to reach more people.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('iconused/upload.png') }}" alt="Upload Details" class="w-16 h-16 mb-4">
                    <h5 class="font-semibold text-[#6E4D41]">Upload Your Event</h5>
                    <p class="text-[#6E4D41] text-sm">Easily submit your event details and get featured on ARTieh.</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('iconused/usernetwork.png') }}" alt="Engage Community" class="w-16 h-16 mb-4">
                    <h5 class="font-semibold text-[#6E4D41]">Engage the Community</h5>
                    <p class="text-[#6E4D41] text-sm">Connect with artists, visitors, and enthusiasts across Albay.</p>
                </div>
            </div>
            <div class="mt-6">
                <a href="#" class="bg-[#6E4D41] text-white py-2 px-6 rounded-lg hover:bg-[#594639] transition">Submit Your Event</a>
            </div>
        </div>
    </div>
@include('layouts.footer')
</html>
</body>
<script>
    document.getElementById("menuBtn").addEventListener("click", function () {
        let mobileMenu = document.getElementById("mobileMenu");
        mobileMenu.classList.toggle("hidden");
    });

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
</script>