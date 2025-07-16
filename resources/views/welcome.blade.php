@extends('layouts.app')

@section('welcome-page-content')
    <style>
        .carousel-container {
            perspective: 1000px;
            touch-action: pan-y pinch-zoom;
        }

        .carousel-track {
            transform-style: preserve-3d;
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .carousel-item {
            backface-visibility: hidden;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .carousel-item.active {
            opacity: 1;
            transform: scale(1) translateZ(0);
        }

        @media (max-width: 640px) {
            .carousel-item.prev {
                opacity: 0;
                transform: scale(0.8) translateX(-50%) translateZ(-100px);
            }

            .carousel-item.next {
                opacity: 0;
                transform: scale(0.8) translateX(50%) translateZ(-100px);
            }
        }

        @media (min-width: 641px) {
            .carousel-item.prev {
                opacity: 0.7;
                transform: scale(0.9) translateX(-100%) translateZ(-100px);
            }

            .carousel-item.next {
                opacity: 0.7;
                transform: scale(0.9) translateX(100%) translateZ(-100px);
            }
        }

        .carousel-item.hidden {
            opacity: 0;
            transform: scale(0.8) translateZ(-200px);
        }

        .nav-button {
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        @media (hover: hover) {
            .nav-button:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: scale(1.1);
            }
        }

        .nav-button:active {
            transform: scale(0.95);
        }

        .progress-bar {
            transition: width 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
    </style>

    <div class="h-[calc(100vh-80px)] overflow-hidden">



        <!-- Main container -->
        <div class="w-full max-w-6xl mx-auto">

            <!-- Carousel container -->
            <div class="carousel-container relative">

                <!-- Progress bar -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-white/10 rounded-full overflow-hidden z-20">
                    <div class="progress-bar absolute top-0 left-0 h-full w-1/3 bg-gradient-to-r from-red-500 to-blue-500">
                    </div>
                </div>

                <!-- Navigation buttons -->
                <button
                    class="nav-button absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center z-20 text-white touch-manipulation"
                    onclick="prevSlide()" title="Previous slide">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button
                    class="nav-button absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center z-20 text-white touch-manipulation"
                    onclick="nextSlide()" title="Next slide">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Carousel track (all slides inside here) -->
                <div class="carousel-track relative h-[400px] sm:h-[500px] md:h-[600px] overflow-hidden">

                    @for ($i = 1; $i <= 6; $i++)
                        <div class="carousel-item {{ $i === 1 ? 'active' : 'hidden' }} absolute top-0 left-0 w-full h-full">
                            <div class="w-full h-full p-4 sm:p-8">
                                <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                    <img src="{{ asset("images/carousel/carousel-image$i.jpg") }}"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-pink-500/40 to-rose-500/40 mix-blend-overlay">
                                    </div>
                                    <div
                                        class="absolute inset-x-0 bottom-0 p-4 sm:p-8 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                                        @switch($i)
                                            @case(1)
                                                <h3 class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">ACL
                                                    Project Balochistan</h3>
                                                <p class="text-gray-200">Orientation Workshop</p>
                                            @break

                                            @case(2)
                                                <h3 class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">LSBE
                                                    Pilot Roll-out</h3>
                                                <p class="text-gray-200">Showcasing Event</p>
                                            @break

                                            @case(3)
                                                <h3 class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">TOT
                                                    Training of PGGA</h3>
                                                <p class="text-gray-200">Resilience Building</p>
                                            @break

                                            @case(4)
                                                <h3 class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">
                                                    National Youth Summit 2024</h3>
                                                <p class="text-gray-200">NYS 2024</p>
                                            @break

                                            @case(5)
                                                <h3 class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">
                                                    Training on CPD Module</h3>
                                                <p class="text-gray-200">School Management Council</p>
                                            @break

                                            @case(6)
                                                <h3 class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">A
                                                    Guidebook for Protecting Children from Danger</h3>
                                                <p class="text-gray-200">We Are Safe</p>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Indicators -->
                <div class="absolute bottom-2 sm:bottom-4 left-1/2 -translate-x-1/2 flex gap-1 sm:gap-2 z-20">
                    @for ($i = 0; $i < 6; $i++)
                        <button
                            class="w-8 sm:w-12 h-1 sm:h-1.5 rounded-full bg-white/20 hover:bg-white/60 transition-colors"
                            title="Go to slide {{ $i + 1 }}"></button>
                    @endfor
                </div>
            </div>
        </div>

        <script>
            let currentSlide = 0;
            const slides = document.querySelectorAll('.carousel-item');
            const indicators = document.querySelectorAll('.carousel-container .absolute.bottom-2 button');
            const progressBar = document.querySelector('.progress-bar');
            let autoAdvanceTimer;
            let touchStartX = 0;
            let touchEndX = 0;
            const carousel = document.querySelector('.carousel-track');

            carousel.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            }, {
                passive: true
            });

            carousel.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {
                passive: true
            });

            function handleSwipe() {
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) nextSlide();
                    else prevSlide();
                }
            }

            function updateSlides() {
                slides.forEach((slide, index) => {
                    slide.className = 'carousel-item absolute top-0 left-0 w-full h-full';
                    if (index === currentSlide) slide.classList.add('active');
                    else if (index === (currentSlide + 1) % slides.length) slide.classList.add('next');
                    else if (index === (currentSlide - 1 + slides.length) % slides.length) slide.classList.add('prev');
                    else slide.classList.add('hidden');
                });

                indicators.forEach((indicator, index) => {
                    indicator.className = `w-8 sm:w-12 h-1 sm:h-1.5 rounded-full transition-colors ${
                        index === currentSlide ? 'bg-white/40' : 'bg-white/20'
                    } hover:bg-white/60`;
                });

                progressBar.style.width = `${((currentSlide + 1) / slides.length) * 100}%`;
            }

            function resetAutoAdvance() {
                clearInterval(autoAdvanceTimer);
                autoAdvanceTimer = setInterval(nextSlide, 5000);
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                updateSlides();
                resetAutoAdvance();
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                updateSlides();
                resetAutoAdvance();
            }

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    updateSlides();
                    resetAutoAdvance();
                });
            });

            resetAutoAdvance();
            updateSlides();
        </script>
    </div>
@endsection
