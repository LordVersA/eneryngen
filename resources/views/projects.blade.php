@extends('layout.main')

@section('title', 'Our Projects - EnergyNgen')

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
                <span>OUR WORK</span>
            </div>
            <h1>{{ $hero->title ?? 'Selected Projects' }}</h1>
            <p>{{ $hero->subtitle ?? 'Showcasing our most impactful energy engineering solutions' }}</p>
        </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section class="projects-page" id="projects">
        <div class="project-shape-1"></div>
        <div class="project-shape-2"></div>

        <div class="section-inner">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="project-card group">
                        <div class="project-image">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" />
                            <div class="project-overlay"></div>
                            @if($project->project_number)
                                <div class="project-number">{{ $project->project_number }}</div>
                            @endif
                        </div>
                        <div class="project-content">
                            <div class="project-accent"></div>
                            <div class="project-category">{{ $project->category }}</div>
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            <div class="project-cta">View Case Study</div>
                        </div>
                    </div>
                @empty
                    <p>No projects available at this time.</p>
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

            <h2>Partner with us to engineer the energy systems of tomorrow</h2>
            <p>Let's discuss how our expertise can support your next energy project.</p>

            <div class="contact-buttons">
                <a href="mailto:{{ $settings['contact_email'] ?? 'contact@energyngen.co.uk' }}" class="contact-btn contact-btn-primary">Contact Our Team</a>
                <a href="{{ route('home') }}" class="contact-btn contact-btn-secondary">Back to Home</a>
            </div>
        </div>
    </section>
@endsection
