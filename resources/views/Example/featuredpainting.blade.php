<style>
        /* Custom Styling */
        .carousel-item img {
            max-height: 450px;  /* Limit height for consistency */
            object-fit: cover;  /* Keep aspect ratio */
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5); /* Dark overlay for better text visibility */
            padding: 15px;
            border-radius: 5px;
        }

        .carousel-control-prev, .carousel-control-next {

            color: #030202 !important; /* Brown color */
        }
        .carousel-indicators button {
            width: 2px; 
            height: 2px;
            border-radius: 20%; 
            background-color: #030202 !important;
            border: none;
            opacity: 10%; 
            transition: opacity 0.3s ease-in-out; 
        }

        .carousel-indicators .active {
            opacity: 1;
            background-color: #6E4D41 !important;
        }

    </style>    
    <!-- Featured Paintings--> 
    <section class="mt-20 bg-[#F6EBDA] py-5 w-[80%] mx-auto shadow-md " style="border-radius:20px; max-width: 90%;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Carousel Column -->
            <div  class="col-md-5 mx-auto ">
                <div id="paintingsCarousel" class="carousel slide " data-bs-ride="carousel">
                    <div style="border-radius:10px;" class="carousel-inner ">
                        <div class="carousel-item active">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting1.png') }}" class="card-img-top" alt="Wallowing Breeze">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Flora Flore Nomi</h5>
                                    <p class="text-muted">Aeron Jead Marquez</p>
                                    <p class="text-muted fst-italic">Oil on canvas, 2008</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting2.png') }}" class="card-img-top" alt="Wallowing Breeze">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Tuxedo Cat</h5>
                                    <p class="text-muted">Aeron Jead Marquez</p>
                                    <p class="text-muted fst-italic">Oil on canvas, 2008</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting3.png') }}" class="card-img-top" alt="Golden Horizon">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Golden Horizon</h5>
                                    <p class="text-muted">Ria Arante</p>
                                    <p class="text-muted fst-italic">Acrylic on canvas, 2015</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/painting4.png') }}" class="card-img-top" alt="Serene Dusk">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">Serene Dusk</h5>
                                    <p class="text-muted">Lorenzo Mendez</p>
                                    <p class="text-muted fst-italic">Watercolor, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Indicators -->
                    <div class=" carousel-indicators">
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" style="background-color: brown;"></button>
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: brown;"></button>
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="2" aria-label="Slide 3" style="background-color: brown;"></button>
                        <button type="button" data-bs-target="#paintingsCarousel" data-bs-slide-to="3" aria-label="Slide 4" style="background-color: brown;"></button>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="mr-10 carousel-control-prev" type="button" data-bs-target="#paintingsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#paintingsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>



                </div>
            </div>

            <!-- Description Column -->
            <div class="col-md-6 mr-10 align-self-start">
                <h1 class="fw-bold text-[50px] text-[#6E4D41] mt-20">Featured Paintings</h1>
                <h2 class="fw-semibold text-[20px] text-[#6E4D41] mt-10">Discover a collection of exceptional artworks from talented local artists in Albay. </h2>

                <p class="text-[#8D6E63] text-[15px]  text-justify mb-30">
                    Immerse yourself in a world of color, emotion, and creativity with our handpicked selection of featured paintings. From stunning landscapes to expressive portraits, each piece is a testament to the talent of Albay’s local artists. Find the perfect artwork to inspire your space and be part of the growing art community.
                </p>
                <a href="{{ route('paintings') }}" class="btn" style="font-family:rubik; border: 2px solid #6E4D41; color: #6E4D41; background: transparent; border-radius: 10px; padding: 10px 20px; margin-top: 40px; display: inline-block;">
                    Explore Paintings >>>
                </a>



            </div>

        </div>
    </div>
</section>