@extends('layout.main')

@section('title', 'OPC - Upstream Energy Experts')

@section('content')
    <!-- HERO SECTION -->
    @if ($hero)
    <section class="hero-opc">
        <div class="hero-bg-opc">
            @if ($hero->background_image)
                @if (str_starts_with($hero->background_image, 'http'))
                    <img loading="lazy" src="{{ $hero->background_image }}" alt="{{ $hero->title }}" />
                @else
                    <img loading="lazy" src="{{ \Illuminate\Support\Facades\Storage::url($hero->background_image) }}" alt="{{ $hero->title }}" />
                @endif
            @else
                <img loading="lazy" src="https://images.unsplash.com/photo-1629792921074-1ec53065b222?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBlbmVyZ3klMjBhcmNoaXRlY3R1cmV8ZW58MXx8fHwxNzY1MTM5NjE4fDA&ixlib=rb-4.0&q=80&w=1080" alt="{{ $hero->title }}" />
            @endif
        </div>
        <div class="hero-overlay-opc"></div>

        <div class="hero-content-opc">
            @if ($hero->badge_text)
            <div class="hero-badge" style="display: inline-block; padding: 0.5rem 1rem; background: rgba(20, 184, 166, 0.1); border: 1px solid rgba(20, 184, 166, 0.3); border-radius: 2rem; margin-bottom: 1.5rem;">
                <span style="color: #14b8a6; font-size: 0.875rem; font-weight: 600; letter-spacing: 0.1em;">{{ $hero->badge_text }}</span>
            </div>
            @endif
            <h1>{!! nl2br(e($hero->title)) !!}</h1>
            <p class="hero-subtitle">{{ $hero->subtitle }}</p>

            @if ($hero->highlight_heading || $hero->highlight_text)
            <div class="hero-section-highlight">
                @if ($hero->highlight_heading)
                    <h3>{{ $hero->highlight_heading }}</h3>
                @endif
                @if ($hero->highlight_text)
                    <p>{{ $hero->highlight_text }}</p>
                @endif
            </div>
            @endif

            <div class="hero-buttons">
                @if ($hero->cta_text && $hero->cta_url)
                    <a href="{{ $hero->cta_url }}" class="hero-btn-primary">{{ $hero->cta_text }}</a>
                @else
                    <a href="#about" class="hero-btn-primary">About us</a>
                @endif
                <a href="#contact" class="hero-btn-secondary">Contact us</a>
            </div>
        </div>
    </section>
    @else
    <section class="hero-opc">
        <div class="hero-bg-opc">
            <img loading="lazy" src="https://images.unsplash.com/photo-1629792921074-1ec53065b222?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBlbmVyZ3klMjBhcmNoaXRlY3R1cmV8ZW58MXx8fHwxNzY1MTM5NjE4fDA&ixlib=rb-4.0&q=80&w=1080" alt="Upstream Energy" />
        </div>
        <div class="hero-overlay-opc"></div>

        <div class="hero-content-opc">
            <h1>Upstream<br>Energy Experts</h1>
            <p class="hero-subtitle">Over 35 years of energy experience</p>

            <div class="hero-buttons">
                <a href="#about" class="hero-btn-primary">About us</a>
                <a href="#contact" class="hero-btn-secondary">Contact us</a>
            </div>
        </div>
    </section>
    @endif

    <!-- ABOUT SECTION -->
    <section class="about-opc" id="about">
        <div class="section-inner">
            <div class="about-grid-opc">
                <div class="about-image-opc">
                    @if($aboutSection && $aboutSection->image)
                        <img loading="lazy" src="{{ \Illuminate\Support\Facades\Storage::url($aboutSection->image) }}" alt="{{ $aboutSection->title }}" />
                    @else
                        <img loading="lazy" src="https://images.unsplash.com/photo-1758429291507-5b5d14000f86?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmR1c3RyaWFsJTIwZW5lcmd5JTIwaW5mcmFzdHJ1Y3R1cmV8ZW58MXx8fHwxNzY1MTM5MDQzfDA&ixlib=rb-4.1.0&q=80&w=1080" alt="Industrial Energy Infrastructure" />
                    @endif
                </div>

                <div class="about-content-opc">
                    @if($aboutSection)
                        <h2>{{ $aboutSection->title }}</h2>
                        <div class="about-description">
                            {!! $aboutSection->description !!}
                        </div>

                        <a href="{{ $aboutSection->button_url }}" class="learn-more-btn">{{ $aboutSection->button_text }}</a>
                    @else
                        <!-- Fallback: Show static content if no about section exists -->
                        <h2>About Us</h2>
                        <p>Established in 1988, OPC is a leading global energy consultancy specializing in providing clients with top-tier expertise and innovative solutions across the upstream E&P sector. OPC has built upon its reputation with a diverse and fully integrated team of experienced technical staff covering the subsurface, wells, process & facilities and commercial disciplines, providing specialist consultants for clients to tap into. Our extensive client list comprises with a Flexible and highly skilled resource base to accelerate upstream projects and maximize return on investment. Headquartered in London, OPC has a strong global presence with eight international offices, including regional hubs in Dubai, Kuala and Singapore.</p>

                        <a href="#learn-more" class="learn-more-btn">Learn more</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services-opc">
        <div class="section-inner">
            <div class="services-grid-opc">
                <!-- Left Column - On Demand Support -->
                @if($technicalSupportTile)
                    <div class="service-large"
                         style="background: {{ $technicalSupportTile->background_color }};
                                --accent-color: {{ $technicalSupportTile->border_accent_color }};">

                        @if($technicalSupportTile->icon_type === 'svg' && $technicalSupportTile->icon_svg)
                            <div class="service-large-icon">{!! $technicalSupportTile->icon_svg !!}</div>
                        @elseif($technicalSupportTile->icon_type === 'image' && $technicalSupportTile->icon_image)
                            <div class="service-large-icon">
                                <img src="{{ Storage::url($technicalSupportTile->icon_image) }}" alt="{{ $technicalSupportTile->title }}">
                            </div>
                        @endif

                        <h2>{!! nl2br(e($technicalSupportTile->title)) !!}</h2>
                        <p>{{ $technicalSupportTile->description }}</p>
                        <a href="{{ $technicalSupportTile->button_url }}" class="service-btn">
                            {{ $technicalSupportTile->button_text }}
                        </a>
                    </div>
                @else
                    <!-- Fallback: existing static content -->
                    <div class="service-large">
                        <h2>On Demand<br>Technical<br>Support</h2>
                        <p>Our approach is to offer clients with a diverse, proven and highly skilled technical capability we have built over more than 35 years in the E&P, Energy Advisory, CCS and Gas Storage domains. Our expertise can be accessed on an hourly, day rate, or monthly basis.</p>
                        <a href="#contact" class="service-btn">Contact us</a>
                    </div>
                @endif

                <!-- Right Column - Service Cards -->
                <div class="service-cards-grid">
                    @forelse($serviceCards as $card)
                        <div class="service-card" style="background-color: {{ $card->background_color }};">
                            @if($card->icon_type === 'svg' && $card->icon_svg)
                                <div class="service-icon">
                                    {!! $card->icon_svg !!}
                                </div>
                            @elseif($card->icon_type === 'image' && $card->icon_image)
                                <div class="service-icon">
                                    <img src="{{ Storage::url($card->icon_image) }}" alt="{{ $card->title }}">
                                </div>
                            @endif

                            <h4>{!! $card->title !!}</h4>
                            <p>{{ $card->description }}</p>
                            <a href="{{ $card->button_url }}" class="explore-btn">{{ $card->button_text }}</a>
                        </div>
                    @empty
                        <!-- Fallback: Show static content if no cards exist -->
                        <div class="service-card service-card-teal">
                            <div class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h4>Projects, Studies &<br>Advisory</h4>
                            <p>OPC's work is completed by seasoned professionals with OPC advisory expertise in a specific discipline.</p>
                            <a href="#explore" class="explore-btn">Explore here</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- GLOBAL REACH SECTION -->
    <section class="global-reach-opc">
        <div class="section-inner">
            <div class="global-reach-grid">
                <div class="global-reach-content">
                    <h2>Our Global<br>Reach</h2>
                    <p>We have offices on five continents and have supported projects in 45 countries. We bring local knowledge with global expertise. Wherever you have a need, we can help.</p>
                    <p>Click on an office flag for contact details or get in touch below.</p>
                    <a href="#contact" class="contact-btn-opc">Contact Us</a>
                </div>

                <div class="global-reach-map" id="globalReachMap" data-map-locations='@json($mapLocations)'>
                    <div class="map-loading">
                        <svg class="animate-spin h-8 w-8 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <p>Loading map...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INTEGRATED EXCELLENCE SECTION -->
    <section class="integrated-excellence-opc">
        <div class="section-inner">
            <h2 class="section-title-center">Integrated Excellence</h2>
            <p class="section-description-center">We cover a broad range of Upstream E&P disciplines and provide integrated study teams to execute a broad spectrum of E&P projects.</p>

            <div class="excellence-carousel" data-carousel="excellence">
                <button class="carousel-btn prev" data-carousel-prev aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <div class="excellence-cards-wrapper">
                    <div class="excellence-cards" data-carousel-track>
                        @forelse($excellenceItems as $item)
                            <div class="excellence-card" data-carousel-slide>
                                <div class="excellence-icon {{ $item->icon_primary_style ? 'excellence-icon-primary' : '' }}">
                                    @if($item->icon_type === 'svg' && $item->icon_svg)
                                        {!! $item->icon_svg !!}
                                    @elseif($item->icon_type === 'image' && $item->icon_image)
                                        <img src="{{ Storage::url($item->icon_image) }}" alt="{{ $item->title }}">
                                    @endif
                                </div>
                                <h3>{!! nl2br(e($item->title)) !!}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        @empty
                            <!-- Fallback: Show static content if no items exist -->
                            <div class="excellence-card" data-carousel-slide>
                                <div class="excellence-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                                <h3>Well Testing</h3>
                                <p>Well Test Planning, Design, Execution, Advanced PTA and Technology</p>
                                <a href="#learn-more" class="learn-more-link">Learn more</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <button class="carousel-btn next" data-carousel-next aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <div class="carousel-dots" data-carousel-dots>
                <!-- Dots will be generated dynamically by JavaScript -->
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact" id="contact">
        <div class="contact-shape-1"></div>
        <div class="contact-shape-2"></div>
        <div class="contact-shape-3"></div>
        <div class="contact-grid"></div>

        <div class="contact-content">
            <div class="section-label">
                <div class="line"></div>
                <span>GET IN TOUCH</span>
                <div class="line"></div>
            </div>

            <h2>Partner with us to engineer the energy systems of tomorrow</h2>
            <p>Let's discuss how our expertise can support your next energy project.</p>

            <x-contact-form />
        </div>
    </section>
@endsection
