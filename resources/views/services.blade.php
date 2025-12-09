@extends('layout.main')

@section('title', 'Our Services - EnergyNgen')

@section('content')
    <div style="padding-top: 3rem;"></div>
    <!-- HERO SECTION -->
    <section class="projects-hero">
        <div class="hero-geometric">
            <div class="box-1"></div>
            <div class="box-2"></div>
            <div class="dot-1"></div>
            <div class="dot-2"></div>
            <div class="dot-3"></div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <span>WHAT WE DO</span>
            </div>
            <h1>{{ $hero->title ?? 'Our Services' }}</h1>
            <p>{{ $hero->subtitle ?? 'Comprehensive energy engineering solutions tailored to your needs' }}</p>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="capabilities" id="services">
        <div class="section-inner">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                @forelse($services as $service)
                    <div class="capability-item group">
                        <div class="capability-icon">
                            {!! $service->icon_svg !!}
                            @if($service->badge_number)
                                <div class="capability-number">{{ $service->badge_number }}</div>
                            @endif
                        </div>
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                    </div>
                @empty
                    <p>No services available at this time.</p>
                @endforelse
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

            <h2>Ready to discuss your energy needs?</h2>
            <p>Let's explore how our services can help your organization achieve its goals.</p>

            <div class="contact-buttons">
                <a href="mailto:{{ $settings['contact_email'] ?? 'contact@energyngen.co.uk' }}" class="contact-btn contact-btn-primary">Contact Our Team</a>
                <a href="{{ route('home') }}" class="contact-btn contact-btn-secondary">Back to Home</a>
            </div>
        </div>
    </section>
@endsection
