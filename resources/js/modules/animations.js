// Smooth scroll to sections
export function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '#!') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const headerOffset = 80; // Account for fixed header
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Scroll-triggered reveals using Intersection Observer
export function initScrollReveal() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px',
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                // Optional: unobserve after reveal to improve performance
                // observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Elements to animate
    const elementsToReveal = document.querySelectorAll(`
        .service-large,
        .service-card,
        .excellence-card,
        .about-content-opc,
        .about-image-opc,
        .global-reach-content,
        .global-reach-map,
        section
    `);

    elementsToReveal.forEach(el => {
        el.classList.add('reveal');
        observer.observe(el);
    });
}

// Button ripple effects
export function initButtonRipples() {
    const buttons = document.querySelectorAll(`
        .hero-btn-primary,
        .hero-btn-secondary,
        .service-btn,
        .explore-btn,
        .learn-more-btn,
        .contact-btn-opc,
        .learn-more-link
    `);

    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');

            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';

            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });
}

// Page transitions (for future use with navigation)
export function initPageTransitions() {
    // Add fade-in on page load
    document.body.classList.add('page-loaded');

    // Optional: Add transition effects for internal navigation
    const internalLinks = document.querySelectorAll('a:not([href^="#"]):not([target="_blank"])');
    internalLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href && !href.startsWith('http') && !href.startsWith('mailto') && !href.startsWith('tel')) {
                // Optionally add fade-out effect before navigation
                // e.preventDefault();
                // document.body.classList.add('page-transition');
                // setTimeout(() => window.location.href = href, 300);
            }
        });
    });
}

// Initialize all animations
export function initAnimations() {
    initSmoothScroll();
    initScrollReveal();
    initButtonRipples();
    initPageTransitions();
}
