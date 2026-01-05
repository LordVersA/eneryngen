<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Basic SEO Meta Tags --}}
    <title>@yield('title', $seo?->site_title ?? 'EnergyNgen - Next Generation Energy Engineering Solutions')</title>
    <meta name="description" content="@yield('description', $seo?->site_description ?? 'EnergyNgen delivers advanced engineering, strategy, and energy transition support across Oil & Gas, CCS, and future energy systems.')" />
    @if($seo?->site_keywords)
        <meta name="keywords" content="{{ $seo->site_keywords }}" />
    @endif
    @if($seo?->author)
        <meta name="author" content="{{ $seo->author }}" />
    @endif
    @if($seo?->canonical_url)
        <link rel="canonical" href="{{ $seo->canonical_url }}" />
    @endif

    {{-- Favicon --}}
    @if($seo?->favicon)
        <link rel="icon" type="image/x-icon" href="{{ Storage::url($seo->favicon) }}" />
    @endif

    {{-- Robots Meta Tags --}}
    @if($seo?->robots_meta)
        <meta name="robots" content="{{ $seo->robots_meta }}" />
    @endif
    @if($seo?->googlebot_meta)
        <meta name="googlebot" content="{{ $seo->googlebot_meta }}" />
    @endif

    {{-- Open Graph Meta Tags --}}
    @if($seo?->og_title)
        <meta property="og:title" content="@yield('og_title', $seo->og_title)" />
    @endif
    @if($seo?->og_description)
        <meta property="og:description" content="@yield('og_description', $seo->og_description)" />
    @endif
    @if($seo?->og_type)
        <meta property="og:type" content="{{ $seo->og_type }}" />
    @endif
    @if($seo?->og_locale)
        <meta property="og:locale" content="{{ $seo->og_locale }}" />
    @endif
    @if($seo?->og_image)
        <meta property="og:image" content="{{ Storage::url($seo->og_image) }}" />
    @endif
    <meta property="og:url" content="{{ url()->current() }}" />

    {{-- Twitter Card Meta Tags --}}
    @if($seo?->twitter_card_type)
        <meta name="twitter:card" content="{{ $seo->twitter_card_type }}" />
    @endif
    @if($seo?->twitter_site)
        <meta name="twitter:site" content="{{ $seo->twitter_site }}" />
    @endif
    @if($seo?->twitter_creator)
        <meta name="twitter:creator" content="{{ $seo->twitter_creator }}" />
    @endif
    @if($seo?->og_title)
        <meta name="twitter:title" content="@yield('twitter_title', $seo->og_title)" />
    @endif
    @if($seo?->og_description)
        <meta name="twitter:description" content="@yield('twitter_description', $seo->og_description)" />
    @endif
    @if($seo?->og_image)
        <meta name="twitter:image" content="{{ Storage::url($seo->og_image) }}" />
    @endif

    {{-- Theme Color --}}
    @if($seo?->theme_color)
        <meta name="theme-color" content="{{ $seo->theme_color }}" />
    @endif

    {{-- Google Analytics --}}
    @if($seo?->google_analytics_id)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $seo->google_analytics_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $seo->google_analytics_id }}');
        </script>
    @endif

    {{-- Google Tag Manager --}}
    @if($seo?->google_tag_manager_id)
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ $seo->google_tag_manager_id }}');</script>
    @endif

    {{-- Facebook Pixel --}}
    @if($seo?->facebook_pixel_id)
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $seo->facebook_pixel_id }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ $seo->facebook_pixel_id }}&ev=PageView&noscript=1"
        /></noscript>
    @endif

    {{-- Schema.org Organization Markup --}}
    @if($seo?->organization_name)
        @php
            $schema = [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => $seo->organization_name,
            ];
            if ($seo->canonical_url) {
                $schema['url'] = $seo->canonical_url;
            }
            if ($seo->organization_logo) {
                $schema['logo'] = Storage::url($seo->organization_logo);
            }
            if ($seo->organization_description) {
                $schema['description'] = $seo->organization_description;
            }
        @endphp
        <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
    @endif

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
</head>
<body>
    {{-- Google Tag Manager (noscript) --}}
    @if($seo?->google_tag_manager_id)
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $seo->google_tag_manager_id }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif

    @include('components.navigation')

    @yield('content')

    @include('components.footer')
</body>
</html>
