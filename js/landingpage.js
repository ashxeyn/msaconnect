
    document.addEventListener('DOMContentLoaded', () => {
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');

        function showSlide(index) {
            // Hide all slides
            slides.forEach((slide) => slide.classList.remove('active'));
            // Show the current slide
            slides[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Automatically change slides every 5 seconds
        setInterval(nextSlide, 5000);

        // Show the first slide initially
        showSlide(currentSlide);
    });

