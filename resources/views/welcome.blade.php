<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTieh - Where Creativity Finds Its Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-white text-gray-900">
    

    <!-- Navbar -->
    <nav class="flex justify-between items-center p-6">
        <div>
            <img src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTiehLogo" id="ARTiehlogo" class="h-12">

        </div>
            <div id="nav" class="space-x-6">
                <a href="#" class="hover:text-gray-500">PAINTINGS</a>
                <a href="#" class="hover:text-gray-500">DRAWINGS</a>
                <a href="#" class="hover:text-gray-500">SCULPTURE</a>
                <a href="#" class="hover:text-gray-500">ARTISTS</a>
                <a href="#" class="hover:text-gray-500"> 

            </div>
        </nav>

    <!-- Hero Section -->
    <section class="flex justify-between items-center p-20">
        <div class="max-w-lg">
            <h1 class="text-6xl font-extrabold">WELCOME!</h1>
            <p class="text-3xl font-light mt-3">Where Creativity <br> Finds Its Home.</p>
            <p class="text-gray-600 mt-4">
                Discover unique artworks, connect with Albay's local artists, 
                and bring creativity into your space.
            </p>
        </div>
        <div>
            <img src="{{ asset('storage/featured-art.jpg') }}" alt="Featured Art" class="w-96 shadow-lg rounded-lg">
        </div>
    </section>

    <!-- Featured Paintings -->
    <section class="text-center p-10">
        <h2 class="text-4xl font-bold">Featured Paintings</h2>
        <div class="flex justify-center mt-6">
            <div class="p-4 bg-white shadow-lg rounded-lg">
                <img src="{{ asset('storage/featured-art.jpg') }}" alt="Wallowing Breeze" class="w-64 h-80 object-cover rounded-md">
                <p class="font-semibold mt-2">Wallowing Breeze</p>
                <p class="text-gray-500">Aeron Jead Marquez</p>
                <p class="text-gray-500 text-sm">Oil on canvas, 2008</p>
            </div>
        </div>
    </section>

</body>
</html>
