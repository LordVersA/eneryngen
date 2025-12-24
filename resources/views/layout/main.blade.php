<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="EnergyNgen delivers advanced engineering, strategy, and energy transition support across Oil & Gas, CCS, and future energy systems." />
    <meta name="keywords" content="energy engineering, oil and gas, carbon capture storage, renewable energy, energy consulting" />
    <meta name="author" content="EnergyNgen" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="@yield('title', 'EnergyNgen - Next Generation Energy Engineering Solutions')" />
    <meta property="og:description" content="EnergyNgen delivers advanced engineering, strategy, and energy transition support across Oil & Gas, CCS, and future energy systems." />
    <meta property="og:type" content="website" />
    <meta name="theme-color" content="#015989" />
    <title>@yield('title', 'EnergyNgen - Next Generation Energy Engineering Solutions')</title>

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
    @include('components.navigation')

    @yield('content')

    @include('components.footer')
</body>
</html>
