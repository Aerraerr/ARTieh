<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body  class="bg-white text-gray-900">

    
<nav class="fixed left-0 top-0 w-56 h-full bg-white shadow-md flex flex-col items-center py-6">
    <!-- Logo -->
    <div class="mb-6">
        <img src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="h-12">
    </div>

    <!-- Navigation Links -->
    <div id="forNav" class="flex flex-col items-center justify-center space-y-4 w-full text-center">
        <a href="{{ route('admin') }}" class="menu-link  opacity-50 text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-4 transition duration-300">DASHBOARD</a>
        <a href="{{ route('management') }}" class="text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300">MANAGEMENT</a>
    </div>


<!-- Login/Register Buttons -->
<div class="mt-auto mb-6 flex flex-col items-center space-y-3 w-full text-center">
    @auth
        <!-- Display user email or name -->
        <span class="px-5 py-2 text-[#6e4d41]"> {{ explode('@', Auth::user()->email)[0] }} </span>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" class="w-28 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition">
            @csrf
            <button class="btn">LOGOUT</button>
        </form>
    @endauth

    @guest
        <!-- Login Button -->
        <a id="loginbtn" href="{{ route('show.login') }}" class="px-5 py-2 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition">
            LOGIN
        </a>

        <!-- Register Button -->
        <a href="{{ route('show.register') }}" class="px-5 py-2 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">
            REGISTER
        </a>
    @endguest
</div>
</nav>
</div>

<div id="mobileMenu" class="hidden fixed inset-0 bg-white flex flex-col items-center justify-top space-y-7  shadow-md z-40">
            <a id="navmobi" href="{{ route('paintings') }}" class="menu-link">PAINTINGS</a>
            <a id="navmobi" href="{{ route('drawings') }}" class="menu-link">DRAWINGS</a>
            <a id="navmobi" href="{{ route('sculptures') }}" class="menu-link">SCULPTURE</a>
            <a id="navmobi" href="{{ route('artists') }}" class="menu-link">ARTISTS</a>

            <a href="{{ route('show.login') }}" class="w-28 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
            <a href="{{ route('show.register') }}" class="w-28 h-10 flex items-center justify-center bg-[#6e4d41] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
            <button id="closeMenu" class="absolute top-3 right-4 text-2xl text-gray-800">
                &times;
            </button>
        </div>
    
    

    <div class="bgpaint opacity-45 sm:opacity-30">
        <svg id="blob3" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	        <path fill="#A99476" d="M344.5,254Q327,268,318.5,279.5Q310,291,329.5,341Q349,391,330.5,426Q312,461,276,399.5Q240,338,212.5,374Q185,410,166.5,388.5Q148,367,148.5,336.5Q149,306,103,302.5Q57,299,46.5,269.5Q36,240,89.5,224.5Q143,209,118.5,171.5Q94,134,135.5,143.5Q177,153,181,111Q185,69,212.5,66.5Q240,64,265.5,74Q291,84,286.5,133Q282,182,337.5,155.5Q393,129,374,166Q355,203,358.5,221.5Q362,240,344.5,254Z" />
        </svg>
        <svg id="blobout2" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	        <path fill="none" stroke="#A99476" stroke-width="0.5px" d="M344.5,254Q327,268,318.5,279.5Q310,291,329.5,341Q349,391,330.5,426Q312,461,276,399.5Q240,338,212.5,374Q185,410,166.5,388.5Q148,367,148.5,336.5Q149,306,103,302.5Q57,299,46.5,269.5Q36,240,89.5,224.5Q143,209,118.5,171.5Q94,134,135.5,143.5Q177,153,181,111Q185,69,212.5,66.5Q240,64,265.5,74Q291,84,286.5,133Q282,182,337.5,155.5Q393,129,374,166Q355,203,358.5,221.5Q362,240,344.5,254Z" />
        </svg>
        <svg id="blob1" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="#6e4d41" d="M459,272.5Q440,305,401,317Q362,329,330.5,325Q299,321,292.5,351.5Q286,382,263,404Q240,426,223.5,383Q207,340,162,374.5Q117,409,83.5,393.5Q50,378,86.5,328Q123,278,100,259Q77,240,62.5,209Q48,178,88,168.5Q128,159,144,144.5Q160,130,165.5,79.5Q171,29,205.5,56.5Q240,84,269,72.5Q298,61,328,69Q358,77,359,115Q360,153,377,171.5Q394,190,436,215Q478,240,459,272.5Z" />
        </svg>
        <svg id="blobout1" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	        <path fill="none" stroke="#A99476" stroke-width="0.5px" d="M423.5,263.5Q386,287,394.5,322.5Q403,358,371.5,368Q340,378,316.5,391Q293,404,266.5,363Q240,322,216,354.5Q192,387,192.5,346Q193,305,121.5,341.5Q50,378,61.5,336Q73,294,110.5,267Q148,240,101.5,210Q55,180,111.5,184Q168,188,137.5,122Q107,56,153.5,86.5Q200,117,220,140.5Q240,164,257,150.5Q274,137,309,117Q344,97,386,100.5Q428,104,398.5,151Q369,198,415,219Q461,240,423.5,263.5Z" />
        </svg>
        <svg id="blob2" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	        <path fill="#FFE0B2" d="M423.5,263.5Q386,287,394.5,322.5Q403,358,371.5,368Q340,378,316.5,391Q293,404,266.5,363Q240,322,216,354.5Q192,387,192.5,346Q193,305,121.5,341.5Q50,378,61.5,336Q73,294,110.5,267Q148,240,101.5,210Q55,180,111.5,184Q168,188,137.5,122Q107,56,153.5,86.5Q200,117,220,140.5Q240,164,257,150.5Q274,137,309,117Q344,97,386,100.5Q428,104,398.5,151Q369,198,415,219Q461,240,423.5,263.5Z" />
        </svg>
        <svg id="blob5" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="#A99476" d="M406,276Q463,312,448.5,346.5Q434,381,391.5,385.5Q349,390,309,360Q269,330,254.5,337.5Q240,345,226.5,334.5Q213,324,181,344.5Q149,365,145,338.5Q141,312,79.5,312Q18,312,38,276Q58,240,93,222Q128,204,153,199.5Q178,195,157.5,146.5Q137,98,164,93.5Q191,89,215.5,70.5Q240,52,271.5,49Q303,46,308.5,92Q314,138,334,147.5Q354,157,371.5,174.5Q389,192,369,216Q349,240,406,276Z" />
        </svg>
        <svg id="blob6" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="#FFE0B2" d="M440,273.5Q446,307,386,304.5Q326,302,311.5,310.5Q297,319,286,333.5Q275,348,257.5,405Q240,462,222,406Q204,350,200,325.5Q196,301,141.5,326Q87,351,58,330Q29,309,100,274.5Q171,240,124.5,213.5Q78,187,110,178Q142,169,129.5,120Q117,71,142,42.5Q167,14,203.5,80Q240,146,257,141Q274,136,295.5,134.5Q317,133,367,122.5Q417,112,357.5,166.5Q298,221,366,230.5Q434,240,440,273.5Z" />
        </svg>
        <svg id="blobout4" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="none" stroke="#6e4d41" stroke-width="0.5px" d="M440,273.5Q446,307,386,304.5Q326,302,311.5,310.5Q297,319,286,333.5Q275,348,257.5,405Q240,462,222,406Q204,350,200,325.5Q196,301,141.5,326Q87,351,58,330Q29,309,100,274.5Q171,240,124.5,213.5Q78,187,110,178Q142,169,129.5,120Q117,71,142,42.5Q167,14,203.5,80Q240,146,257,141Q274,136,295.5,134.5Q317,133,367,122.5Q417,112,357.5,166.5Q298,221,366,230.5Q434,240,440,273.5Z" />
        </svg>
        <svg id="blob7" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="#FFE0B2" d="M353.5,263Q381,286,377.5,311.5Q374,337,357,357.5Q340,378,309.5,369Q279,360,259.5,328Q240,296,203,382Q166,468,134,449Q102,430,110,379.5Q118,329,88.5,314Q59,299,78.5,269.5Q98,240,118.5,223.5Q139,207,169,208.5Q199,210,196,192.5Q193,175,209,184.5Q225,194,232.5,100Q240,6,262,55.5Q284,105,286,139.5Q288,174,348.5,145.5Q409,117,413,150Q417,183,371.5,211.5Q326,240,353.5,263Z" />
        </svg>
        <svg id="blob4" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="#6e4d41" d="M459,272.5Q440,305,401,317Q362,329,330.5,325Q299,321,292.5,351.5Q286,382,263,404Q240,426,223.5,383Q207,340,162,374.5Q117,409,83.5,393.5Q50,378,86.5,328Q123,278,100,259Q77,240,62.5,209Q48,178,88,168.5Q128,159,144,144.5Q160,130,165.5,79.5Q171,29,205.5,56.5Q240,84,269,72.5Q298,61,328,69Q358,77,359,115Q360,153,377,171.5Q394,190,436,215Q478,240,459,272.5Z" />
        </svg>
        <svg id="blobout3" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="none" stroke="#FFE0B2" stroke-width="1px" d="M459,272.5Q440,305,401,317Q362,329,330.5,325Q299,321,292.5,351.5Q286,382,263,404Q240,426,223.5,383Q207,340,162,374.5Q117,409,83.5,393.5Q50,378,86.5,328Q123,278,100,259Q77,240,62.5,209Q48,178,88,168.5Q128,159,144,144.5Q160,130,165.5,79.5Q171,29,205.5,56.5Q240,84,269,72.5Q298,61,328,69Q358,77,359,115Q360,153,377,171.5Q394,190,436,215Q478,240,459,272.5Z" />
        </svg>
        <svg id="blob8" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="#6E4D41" d="M344.5,254Q327,268,318.5,279.5Q310,291,329.5,341Q349,391,330.5,426Q312,461,276,399.5Q240,338,212.5,374Q185,410,166.5,388.5Q148,367,148.5,336.5Q149,306,103,302.5Q57,299,46.5,269.5Q36,240,89.5,224.5Q143,209,118.5,171.5Q94,134,135.5,143.5Q177,153,181,111Q185,69,212.5,66.5Q240,64,265.5,74Q291,84,286.5,133Q282,182,337.5,155.5Q393,129,374,166Q355,203,358.5,221.5Q362,240,344.5,254Z" />
        </svg>
        <svg id="blobout5" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
            <path fill="none" stroke="#FFE0B2" stroke-width="0.5px" d="M344.5,254Q327,268,318.5,279.5Q310,291,329.5,341Q349,391,330.5,426Q312,461,276,399.5Q240,338,212.5,374Q185,410,166.5,388.5Q148,367,148.5,336.5Q149,306,103,302.5Q57,299,46.5,269.5Q36,240,89.5,224.5Q143,209,118.5,171.5Q94,134,135.5,143.5Q177,153,181,111Q185,69,212.5,66.5Q240,64,265.5,74Q291,84,286.5,133Q282,182,337.5,155.5Q393,129,374,166Q355,203,358.5,221.5Q362,240,344.5,254Z" />
        </svg>
        <?xml version="1.0" encoding="utf-8"?>
        <!-- License: Apache. Made by googlefonts: https://github.com/googlefonts/noto-emoji -->
        <svg id="paintbrush" width="350px" height="350px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet"><path d="M119.88 54.21c-.12.06-.25.12-.37.19" fill="none"></path><path d="M39.85 84.34c-7.99 5.29-19.23.44-27.01 12.41c-1.26 1.94-2.39 5.34-3.84 10.3c-1.14 3.88-7.26 6.61-7.26 6.61s5.27 5.58 10.24 6.65c7.19 1.56 17.52 2.34 24.52-5.29c7.98-8.7 4.41-16.73 11.44-21.56c-.01 0-.1-14.42-8.09-9.12z" fill="#f09300"></path><path d="M33.92 86.82c-.8.7-1.01 1.86-.98 2.92c.13 4.03 3.35 7.75 7.32 8.44c1.61.28 3.49.01 4.48-1.29c1.11-1.45.69-3.55-.09-5.2c-.86-1.81-2.09-3.44-3.61-4.74" fill="#c67100"></path><path d="M122.3 6.51s-1.98-2.66-7.05.31c-6.89 4.03-29.19 20.63-55.94 48.19c-6.02 6.2-8.39 9.77-8.39 9.77s-1.49 2.28 4.22 7.99c5.7 5.7 10.99 6.86 10.99 6.86l4.52-4.65c32.26-33.22 48.5-54.52 51.57-61.4c2.38-5.37.08-7.07.08-7.07z" fill="#1565c0"></path><path d="M58.08 72.66c-5.71-5.55-6.58-8.47-6.58-8.47s-1.71 1.11-2.74 2.43c-1.56 2-1.73 3.44-1.73 3.44l-12.8 16.03s-1.63 3.04 3.25 7.77c4.87 4.73 7.87 3.02 7.87 3.02L61 83.63s1.43-.21 3.39-1.83c1.29-1.07 2.35-2.81 2.35-2.81s-2.95-.79-8.66-6.33z" fill="#bdbdbd"></path><path d="M55.13 72.76c-.02.02-.03.04-.05.06c-.35.4-.96.41-1.49.31c-1.92-.37-3.25-1.65-3.94-3.41c-.32-.83-.38-1.79.01-2.59c.71-1.44 1.75-.47 2.55.33a18.37 18.37 0 0 1 2.65 3.38c.18.3.36.62.43.97c.07.33.04.69-.16.95z" fill="#eee"></path><path d="M61.59 59.56c1.8 4.01 17-11.78 20.85-15.88c1.92-2.04 15.19-13.98 12.19-14.48s-9.83 5.38-12.09 7.18c-4.52 3.59-10.31 9.26-14.78 13.92c-2.19 2.27-6.85 7.75-6.17 9.26z" fill="#2196f3"></path><path d="M43.73 76.94c.41-.43.9-.9 1.54-.9c.6 0 1.1.42 1.51.82c1.35 1.32 2.6 3.15 1.87 4.8c-.3.67-.88 1.19-1.45 1.69l-6.68 5.9c-1.34 1.18-2.61-.36-3.11-1.54c-.45-1.08-.11-1.94.47-2.89c1.67-2.79 3.59-5.47 5.85-7.88z" fill="#eee"></path><path d="M59.48 82.62c.23.16.48.38.45.65a.6.6 0 0 1-.13.28c-.53.73-1.6.88-2.46.59c-.85-.29-1.54-.92-2.2-1.53c-2.51-2.36-4.99-4.81-6.79-7.75c-.28-.45-1.73-3.06-.73-3.31c.64-.16 2.08 2.16 2.49 2.64a53.64 53.64 0 0 0 5.79 5.69c1.16.96 2.35 1.88 3.58 2.74z" fill="#9e9e9e"></path><path d="M36.49 115.02s-9.59 5.38-19.79 3.86c0 0 8.07-1.47 11.49-12.4c0 0-7.77 8.09-14.79 8.64c0 0 6.7-3.49 7.13-14.07c-3.58 6.38-5.93 9.57-11.63 11.5c6.13-6.59 3.9-15.75 3.9-15.75c-1.25 1.95-2.37 5.32-3.81 10.24c-1.14 3.88-7.26 6.61-7.26 6.61s5.27 5.58 10.24 6.65c7.19 1.57 17.53 2.34 24.52-5.28z" fill="#c67100"></path></svg>
        <?xml version="1.0" encoding="UTF-8"?>
        <!-- License: MIT. Made by Andreas Mehlsen: https://github.com/andreasbm/web-skills/ -->
        <svg id="paint2" width="500px" height="500px" viewBox="0 0 73 73" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>progressive-webapps/loading-performance/first-meaningful-paint</title>
            <desc>Created with Sketch.</desc>
            <defs>
                <rect id="path-1" x="0" y="0" width="69" height="69" rx="14">
        </rect>
            </defs>
            <g id="progressive-webapps/loading-performance/first-meaningful-paint" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="container" transform="translate(2.000000, 2.000000)" fill-rule="nonzero" stroke-width="0
                "><g id="mask"><rect stroke="#EBD1B6" x="-1" y="-1" width="71" height="71" rx="14"> </rect></g></g>
                <g id="palette" transform="translate(16.000000, 13.000000)" fill-rule="nonzero">
                    <path d="M38.7410457,20.4451637 C34.3873121,15.3685429 29.8435806,14.1883701 29.8435806,8.59032606 C29.8435806,2.4890679 24.8078935,-2.18970458 15.9942129,1.06762545 C6.54408553,4.56015545 0,12.9844876 0,23.4800021 C0,36.4696797 10.2907525,47 22.985118,47 C25.0729638,47 27.0959322,46.7151045 29.0186188,46.1813523 L29.0180627,46.1788865 C38.7410457,43.3012907 46.7116914,29.7393564 38.7410457,20.4451637 Z M28.963195,17.9899794 C27.6192144,19.7497115 23.8964594,18.7209013 22.4597042,16.231006 C21.1932983,14.0364385 21.6567079,10.8980362 23.8488209,9.51433952 C25.1194901,8.71228863 26.795272,9.5015363 27.1140979,10.9940129 C27.3736073,12.2085173 27.9058796,13.7131333 28.9898874,15.0898119 C29.6505242,15.9291344 29.6117831,17.1407937 28.963195,17.9899794 Z" id="Shape" fill="#E6BE94">
        </path><circle id="Oval" fill="#6E4D41" cx="13.5" cy="12.5" r="4.5"></circle><circle id="Oval" fill="#A99476" cx="14.5" cy="12.5" r="1.5"></circle><circle id="Oval" fill="#A99476" cx="9.5" cy="23.5" r="4.5"></circle>
        <circle id="Oval" fill="#6E4D41" cx="9.5" cy="22.5" r="1.5"></circle><circle id="Oval" fill="#FFE0B2" cx="13.5" cy="35.5" r="4.5"></circle><circle id="Oval" fill="#A99476" cx="15.5" cy="33.5" r="1.5"></circle><circle id="Oval" fill="#A99476" cx="25.5" cy="37.5" r="4.5"></circle><circle id="Oval" fill="#FFE0B2" cx="27.5" cy="36.5" r="1.5">
        </circle><circle id="Oval" fill="#6E4D41" cx="33.5" cy="30.5" r="4.5"></circle><circle id="Oval" fill="#FFE0B2" cx="34.5" cy="29.5" r="1.5"></circle>
                </g>
            </g>
        </svg>
    </div>
    <section>
        <!--<div class="section2">-->
        <p>paintings</p>
        </div>

    </section>


    


    


    <!-- Featured Paintings 
    <section class="text-center px-10 py-16 bg-gray-100">
        <h2 class="text-4xl font-bold">Featured Paintings</h2>
        <div class="flex justify-center mt-6">
            <div class="p-4 bg-white shadow-lg rounded-lg max-w-xs">
                <img src="{{ asset('storage/featured-art.jpg') }}" alt="Wallowing Breeze" class="w-full h-80 object-cover rounded-md">
                <p class="font-semibold mt-2">Wallowing Breeze</p>
                <p class="text-gray-500">Aeron Jead Marquez</p>
                <p class="text-gray-500 text-sm">Oil on canvas, 2008</p>
            </div>
        </div>
    </section>-->
</body>
</html>
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

    $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>