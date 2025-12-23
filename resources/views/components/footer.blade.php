<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="logo mb-6">
                    <img src="/logo.png" alt="EnergyNgen" class="logo-icon" width="40" height="40">
                    <span>EnergyNgen Ltd</span>
                    <div class="logo-dot"></div>
                </div>
                <p>Next Generation Energy Solutions</p>
            </div>

            <div class="footer-col">
                <h4>Services</h4>
                <ul>
                    <li><a href="#capabilities">Energy Systems Engineering</a></li>
                    <li><a href="#capabilities">Oil & Gas Consultancy</a></li>
                    <li><a href="#capabilities">Carbon Capture & Storage</a></li>
                    <li><a href="#capabilities">Energy Strategy</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Contact</h4>
                <div class="footer-contact">
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>{{ \App\Models\SiteSetting::getSetting('company_address', 'London, United Kingdom') }}</span>
                    </div>
                    @if(\App\Models\SiteSetting::getSetting('company_branch'))
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>Branch: {{ \App\Models\SiteSetting::getSetting('company_branch') }}</span>
                    </div>
                    @endif
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 7-10 5L2 7"></path></svg>
                        <a href="mailto:{{ \App\Models\SiteSetting::getSetting('contact_email', 'contact@energyngen.com') }}">{{ \App\Models\SiteSetting::getSetting('contact_email', 'contact@energyngen.com') }}</a>
                    </div>
                    @if(\App\Models\SiteSetting::getSetting('contact_phone'))
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <a href="tel:{{ \App\Models\SiteSetting::getSetting('contact_phone') }}">{{ \App\Models\SiteSetting::getSetting('contact_phone') }}</a>
                    </div>
                    @endif
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        <a href="{{ \App\Models\SiteSetting::getSetting('company_linkedin', '#') }}" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">
                <p>&copy; 2025 EnergyNgen Ltd. All rights reserved.</p>
            </div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <span>|</span>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
