<div class="flex sm:mt-[-200px] mt-10 items-center justify-center min-h-screen bg-transparent">
  <div class="bg-[#F6EBDA] p-8 rounded-lg shadow-md max-w-4xl w-full text-center opacity-0 translate-y-12 transition-all duration-1000 ease-out" id="how-to-get-artworks">
    <h2 class="text-2xl font-bold text-[#6E4D41] mb-6">How to Get Artworks</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="flex flex-col items-center">
        <img src="{{ asset('images/painting.png') }}" alt="Artwork" class="w-16 h-16 mb-4">
        <h5 class="font-semibold text-[#6E4D41]">Explore unique Artwork</h5>
        <p class="text-gray-500 text-sm">Discover a diverse collection of stunning creations by talented artists.</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="{{ asset('images/palette.png') }}" alt="Choose Artwork" class="w-16 h-16 mb-4">
        <h5 class="font-semibold text-[#6E4D41]">Choose Artwork</h5>
        <p class="text-gray-500 text-sm">Find the perfect artwork that speaks to your style and vision.</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="{{ asset('images/house.png') }}" alt="Bring Art to Life" class="w-16 h-16 mb-4">
        <h5 class="font-semibold text-[#6E4D41]">Bring Art to Life</h5>
        <p class="text-gray-500 text-sm">Make it yours and add a touch of creativity to your space.</p>
      </div>
    </div>
  </div>
</div>

<script>
  // Intersection Observer to trigger animation when the "How to Get Artworks" section is in view
  document.addEventListener('DOMContentLoaded', function () {
    const howToGetArtworksSection = document.getElementById('how-to-get-artworks');

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Add classes to animate the section when it is in view
          entry.target.classList.add('opacity-100', 'translate-y-0');
          observer.unobserve(entry.target); // Stop observing once the animation is triggered
        }
      });
    }, {
      threshold: 0.5 // Trigger animation when 50% of the section is in view
    });

    // Observe the "How to Get Artworks" section
    observer.observe(howToGetArtworksSection);
  });
</script>
