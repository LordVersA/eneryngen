@extends('layout.main')

@section('title', 'Our Services - EnergyNgen')

@section('content')
    <div style="padding-top: 3rem;"></div>
    <!-- HERO SECTION -->
    @if ($hero)
    <section class="projects-hero" @if ($hero->background_image) style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($hero->background_image) }}')" @endif>
        @if ($hero->background_image)
        <div class="hero-bg" style="position: absolute; inset: 0; z-index: 0;">
            <img loading="lazy" src="{{ \Illuminate\Support\Facades\Storage::url($hero->background_image) }}" alt="{{ $hero->title }}" style="width: 100%; height: 100%; object-fit: cover;" />
        </div>
        @endif
        <div class="hero-overlay" style="position: absolute; inset: 0; z-index: 1;"></div>

        <div class="hero-geometric" style="position: absolute; inset: 0; z-index: 2;">
            <div class="box-1"></div>
            <div class="box-2"></div>
            <div class="dot-1"></div>
            <div class="dot-2"></div>
            <div class="dot-3"></div>
        </div>

        <div class="hero-content" style="position: relative; z-index: 10;">
            @if ($hero->badge_text)
            <div class="hero-badge">
                <span>{{ $hero->badge_text }}</span>
            </div>
            @endif
            <h1>{{ $hero->title }}</h1>
            <p>{{ $hero->subtitle }}</p>
        </div>
    </section>
    @endif

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
                <a href="mailto:{{ $settings['contact_email'] ?? 'contact@energyngen.com' }}" class="contact-btn contact-btn-primary">Contact Our Team</a>
                <a href="{{ route('home') }}" class="contact-btn contact-btn-secondary">Back to Home</a>
            </div>
        </div>
    </section>
@endsection
