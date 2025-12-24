export class ExcellenceCarousel {
    constructor(element) {
        this.carousel = element;
        this.track = element.querySelector('[data-carousel-track]');
        this.slides = Array.from(element.querySelectorAll('[data-carousel-slide]'));
        this.prevBtn = element.querySelector('[data-carousel-prev]');
        this.nextBtn = element.querySelector('[data-carousel-next]');
        this.dotsContainer = document.querySelector('[data-carousel-dots]');

        this.currentIndex = 0;
        this.slidesPerView = this.getSlidesPerView();
        this.autoplayInterval = null;
        this.autoplayDelay = 5000; // 5 seconds

        this.init();
    }

    getSlidesPerView() {
        const width = window.innerWidth;
        if (width >= 1024) return 5; // Desktop: 5 slides
        if (width >= 768) return 3;  // Tablet: 3 slides
        if (width >= 640) return 2;  // Small tablet: 2 slides
        return 1;                     // Mobile: 1 slide
    }

    getTotalPages() {
        return Math.ceil(this.slides.length / this.slidesPerView);
    }

    init() {
        if (this.slides.length === 0) return;

        this.createDots();
        this.setupEventListeners();
        this.updateCarousel();
        this.startAutoplay();

        // Handle window resize
        window.addEventListener('resize', this.handleResize.bind(this));
    }

    createDots() {
        if (!this.dotsContainer) return;

        this.dotsContainer.innerHTML = '';
        const totalPages = this.getTotalPages();

        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => this.goToPage(i));
            this.dotsContainer.appendChild(dot);
        }

        this.dots = Array.from(this.dotsContainer.querySelectorAll('.dot'));
    }

    setupEventListeners() {
        this.prevBtn?.addEventListener('click', () => this.prev());
        this.nextBtn?.addEventListener('click', () => this.next());

        // Touch/swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        this.track.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            this.stopAutoplay();
        });

        this.track.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX);
            this.startAutoplay();
        });

        // Pause autoplay on hover
        this.carousel.addEventListener('mouseenter', () => this.stopAutoplay());
        this.carousel.addEventListener('mouseleave', () => this.startAutoplay());
    }

    handleSwipe(startX, endX) {
        const threshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                this.next();
            } else {
                this.prev();
            }
        }
    }

    prev() {
        const totalPages = this.getTotalPages();
        this.currentIndex = (this.currentIndex - 1 + totalPages) % totalPages;
        this.updateCarousel();
    }

    next() {
        const totalPages = this.getTotalPages();
        this.currentIndex = (this.currentIndex + 1) % totalPages;
        this.updateCarousel();
    }

    goToPage(index) {
        this.currentIndex = index;
        this.updateCarousel();
        this.stopAutoplay();
        this.startAutoplay();
    }

    updateCarousel() {
        // Calculate transform
        const offset = -this.currentIndex * 100;
        this.track.style.transform = `translateX(${offset}%)`;

        // Update dots
        this.dots?.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
        });

        // Update button states
        const totalPages = this.getTotalPages();
        if (this.prevBtn) {
            this.prevBtn.style.opacity = this.currentIndex === 0 ? '0.5' : '1';
        }
        if (this.nextBtn) {
            this.nextBtn.style.opacity = this.currentIndex === totalPages - 1 ? '0.5' : '1';
        }
    }

    handleResize() {
        const newSlidesPerView = this.getSlidesPerView();
        if (newSlidesPerView !== this.slidesPerView) {
            this.slidesPerView = newSlidesPerView;
            this.currentIndex = 0;
            this.createDots();
            this.updateCarousel();
        }
    }

    startAutoplay() {
        this.stopAutoplay();
        this.autoplayInterval = setInterval(() => this.next(), this.autoplayDelay);
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }

    destroy() {
        this.stopAutoplay();
        window.removeEventListener('resize', this.handleResize.bind(this));
    }
}

// Initialize all carousels
export function initCarousels() {
    const carousels = document.querySelectorAll('[data-carousel="excellence"]');
    carousels.forEach(carousel => new ExcellenceCarousel(carousel));
}
