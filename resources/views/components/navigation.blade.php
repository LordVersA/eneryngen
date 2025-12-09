<!-- NAVIGATION -->
<nav class="navbar">
    <div class="nav-container">
        <a href="/" class="logo">
            <img src="/logo.png" alt="EnergyNgen" class="logo-icon" width="32" height="32">
            <span class="tracking-wide">EnergyNgen</span>
            <div class="logo-dot"></div>
        </a>

        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="{{ route('home') }}#about">About</a></li>
            <li><a href="{{ route('home') }}#industries">Industries</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="#contact" class="nav-btn">Contact</a></li>
        </ul>
    </div>
</nav>
