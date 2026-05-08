document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.dot');
    let current = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? '1' : '0';
            slide.style.zIndex = i === index ? '10' : '0';
        });

        dots.forEach((dot, i) => {
            dot.classList.remove('bg-white', 'bg-white/40');
            dot.classList.add(i === index ? 'bg-white' : 'bg-white/40');
        });
    }

    document.getElementById('nextSlide').onclick = () => {
        current = (current + 1) % slides.length;
        showSlide(current);
    };

    document.getElementById('prevSlide').onclick = () => {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    };

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            current = index;
            showSlide(current);
        });
    });

    setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
    }, 10000);

    showSlide(0);
});
