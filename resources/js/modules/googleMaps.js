export class GlobalReachMap {
    constructor(element) {
        this.element = element;
        this.map = null;
        this.markers = [];
        this.locations = this.getLocations();

        this.init();
    }

    getLocations() {
        try {
            const data = this.element.dataset.mapLocations;
            return data ? JSON.parse(data) : [];
        } catch (e) {
            console.error('Failed to parse map locations:', e);
            return [];
        }
    }

    init() {
        if (this.locations.length === 0) {
            this.showError('No locations to display');
            return;
        }

        // Wait for Leaflet to be available
        if (typeof L === 'undefined') {
            console.error('Leaflet library not loaded');
            this.showError('Map library not loaded');
            return;
        }

        this.initMap();
    }

    initMap() {
        // Calculate center point
        const center = this.calculateCenter();

        // Create map with OpenStreetMap tiles
        this.map = L.map(this.element, {
            center: [center.lat, center.lng],
            zoom: this.calculateZoom(),
            zoomControl: true,
            scrollWheelZoom: true,
        });

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19,
        }).addTo(this.map);

        // Add markers
        this.addMarkers();

        // Hide loading indicator
        const loading = this.element.querySelector('.map-loading');
        if (loading) loading.style.display = 'none';
    }

    calculateCenter() {
        if (this.locations.length === 1) {
            return {
                lat: parseFloat(this.locations[0].latitude),
                lng: parseFloat(this.locations[0].longitude),
            };
        }

        const avgLat = this.locations.reduce((sum, loc) => sum + parseFloat(loc.latitude), 0) / this.locations.length;
        const avgLng = this.locations.reduce((sum, loc) => sum + parseFloat(loc.longitude), 0) / this.locations.length;

        return { lat: avgLat, lng: avgLng };
    }

    calculateZoom() {
        // Zoom level adjusted for better overview
        // Lower number = more zoomed out
        if (this.locations.length <= 2) return 3;
        return 2;
    }

    addMarkers() {
        this.locations.forEach(location => {
            const position = [
                parseFloat(location.latitude),
                parseFloat(location.longitude)
            ];

            // Custom marker icon with brand color
            const markerColor = location.marker_color || '#00b3c1';

            // Create custom pin-style icon using divIcon
            const customIcon = L.divIcon({
                className: 'custom-marker',
                html: `
                    <svg width="32" height="42" viewBox="0 0 32 42" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 0C7.163 0 0 7.163 0 16c0 12 16 26 16 26s16-14 16-26c0-8.837-7.163-16-16-16z"
                              fill="${markerColor}"
                              stroke="#ffffff"
                              stroke-width="2"/>
                        <circle cx="16" cy="16" r="6" fill="#ffffff"/>
                    </svg>
                `,
                iconSize: [32, 42],
                iconAnchor: [16, 42],
                popupAnchor: [0, -42],
            });

            const marker = L.marker(position, {
                icon: customIcon,
                title: location.name,
            }).addTo(this.map);

            // Add popup if content exists
            if (location.info_window_content) {
                marker.bindPopup(`
                    <div class="map-info-window" style="
                        font-family: system-ui, -apple-system, sans-serif;
                        padding: 8px;
                        min-width: 150px;
                    ">
                        ${location.info_window_content}
                    </div>
                `);
            }

            this.markers.push(marker);
        });
    }

    showError(message) {
        const loading = this.element.querySelector('.map-loading');
        if (loading) {
            loading.innerHTML = `<p style="color: #ef4444;">${message}</p>`;
        }
    }
}

// Initialize map
export function initGlobalReachMap() {
    const mapElement = document.getElementById('globalReachMap');
    if (!mapElement) return;

    new GlobalReachMap(mapElement);
}
