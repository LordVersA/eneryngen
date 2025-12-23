@extends('layout.main')

@section('title', 'EnergyNgen - Next Generation Energy Engineering Solutions')

@section('content')
    <!-- HERO SECTION -->
    @if ($hero)
    <section class="hero">
        <div class="hero-bg">
            @if ($hero->background_image)
                <img loading="lazy" src="{{ \Illuminate\Support\Facades\Storage::url($hero->background_image) }}" alt="{{ $hero->title }}" />
            @else
                <img loading="lazy" src="https://images.unsplash.com/photo-1629792921074-1ec53065b222?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBlbmVyZ3klMjBhcmNoaXRlY3R1cmV8ZW58MXx8fHwxNzY1MTM5NjE4fDA&ixlib=rb-4.0&q=80&w=1080" alt="Energy Architecture" />
            @endif
        </div>
        <div class="hero-overlay"></div>

        <div class="hero-geometric">
            <div class="box-1"></div>
            <div class="box-2"></div>
            <div class="dot-1"></div>
            <div class="dot-2"></div>
            <div class="dot-3"></div>
        </div>

        <div class="hero-content">
            @if ($hero->badge_text)
            <div class="hero-badge">
                <span>{{ $hero->badge_text }}</span>
            </div>
            @endif
            <h1>{{ $hero->title }}</h1>
            <p>{{ $hero->subtitle }}</p>
            @if ($hero->cta_text && $hero->cta_url)
            <a href="{{ $hero->cta_url }}" class="hero-cta">{{ $hero->cta_text }}</a>
            @endif
        </div>

        <div class="hero-line"></div>
    </section>
    @endif


    <!-- ABOUT SECTION -->
    <section class="about" id="about">
        <div class="about-number">01</div>
        <div class="about-shape"></div>
        <div class="about-dot"></div>

        <div class="section-inner">
            <div class="about-grid">
                <div class="about-content">
                    <div class="section-label mb-6">
                        <div class="line"></div>
                        <span>ABOUT US</span>
                    </div>

                    <h2>Who We Are</h2>

                    <div class="space-y-6">
                        <p class="about-text">
                            EnergyNgen is a UK-based energy engineering consultancy specializing in next-generation solutions for the evolving energy landscape. Our team combines deep technical expertise with strategic insight to deliver exceptional outcomes across Oil & Gas, Carbon Capture & Storage, and emerging energy systems.
                        </p>

                        <p class="about-text">
                            We partner with major operators, developers, and government bodies to engineer sustainable, efficient, and commercially robust energy infrastructure. Our approach is rooted in precision engineering, regulatory excellence, and a commitment to the energy transition.
                        </p>

                        <div class="about-stats">
                            @foreach($stats as $stat)
                                <div class="stat">
                                    <div class="stat-number">{{ $stat->value }}</div>
                                    <div class="stat-label">{{ $stat->label }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="about-image">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1758429291507-5b5d14000f86?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmR1c3RyaWFsJTIwZW5lcmd5JTIwaW5mcmFzdHJ1Y3R1cmV8ZW58MXx8fHwxNzY1MTM5MDQzfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" alt="Industrial Energy Infrastructure" />
                    <div class="about-overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- INDUSTRIES SECTION -->
    <section class="industries" id="industries">
        <div class="section-inner">
            <div class="section-header">
                <div class="section-label">
                    <div class="line"></div>
                    <span>SECTORS</span>
                    <div class="line"></div>
                </div>
                <h2>Industries & Markets</h2>
            </div>

            <div class="industry-grid">
                @foreach($industries as $industry)
                    <div class="industry-item group">
                        <div class="industry-icon">
                            {!! $industry->icon_svg !!}
                        </div>
                        <span class="industry-label">{{ $industry->name }}</span>
                        <div class="industry-corner top"></div>
                        <div class="industry-corner bottom"></div>
                    </div>
                @endforeach
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
