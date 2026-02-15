<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'MRP Foundation - মানুষের সেবায় সর্বদা')</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <!-- CSS and other head content per page -->
    @yield('styles')
    
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const DETAILS_API = `${API_BASE_URL}/our-details`;
            const STORAGE_URL = STORAGE_BASE_URL;
            const CACHE_KEY = 'mrp_details_cache';

            function updateFooterUI(data) {
                if (!data || !data.status || !data.data || data.data.length === 0) return;
                const info = data.data[0];

                // Logo
                const logoContainer = document.getElementById('footer-logo-container');
                const logoText = document.getElementById('footer-logo-text');
                if (logoContainer && info.logo) {
                    const logoUrl = info.logo.startsWith('http') ? info.logo : STORAGE_URL + info.logo;
                    logoContainer.innerHTML = `<img src="${logoUrl}" alt="MRP Foundation" style="max-height: 60px; width: auto;">`;
                } else if (logoText && info.title) {
                    logoText.innerHTML = `<i class="fas fa-hands-helping"></i> ${info.title}`;
                }

                // Description
                const footerDesc = document.getElementById('footer-desc');
                if (footerDesc && info.footer_description) {
                    footerDesc.textContent = info.footer_description;
                }

                // Address
                const footerAddress = document.getElementById('footer-address');
                if (footerAddress && info.our_address) {
                    footerAddress.innerHTML = `<i class="fas fa-map-marker-alt" style="color: var(--secondary-color); margin-right: 5px"></i> ${info.our_address}`;
                }

                // Social Links
                if (info.fb_link) document.getElementById('footer-fb').href = info.fb_link;
                if (info.twitter_link) document.getElementById('footer-twitter').href = info.twitter_link;
                if (info.insta_link) document.getElementById('footer-insta').href = info.insta_link;
                if (info.linkedin_link) document.getElementById('footer-linkedin').href = info.linkedin_link;

                // Contact Page elements if they exist
                const contactAddress = document.getElementById('contact-address');
                const contactPhone = document.getElementById('contact-phone');
                const contactEmail = document.getElementById('contact-email');

                if (contactAddress && info.our_address) contactAddress.textContent = info.our_address;
                if (contactPhone && info.our_phone) contactPhone.innerHTML = info.our_phone.split(',').join('<br>');
                if (contactEmail && info.our_email) contactEmail.textContent = info.our_email;

                // Home Page contact elements if they exist
                const homeAddress = document.getElementById('home-address');
                const homePhone = document.getElementById('home-phone');
                const homeEmail = document.getElementById('home-email');

                if (homeAddress && info.our_address) {
                    homeAddress.innerHTML = `<i class="fas fa-map-marker-alt" style="color: var(--secondary-color); margin-right: 5px"></i> ${info.our_address}`;
                }
                if (homePhone && info.our_phone) homePhone.innerHTML = info.our_phone.split(',').join('<br>');
                if (homeEmail && info.our_email) homeEmail.textContent = info.our_email;
            }

            // Load from cache
            const cached = localStorage.getItem(CACHE_KEY);
            if (cached) {
                try { updateFooterUI(JSON.parse(cached)); } catch(e) {}
            }

            // Fetch from API
            fetch(DETAILS_API)
                .then(res => res.json())
                .then(data => {
                    console.log('Global Details Data:', data);
                    updateFooterUI(data);
                    localStorage.setItem(CACHE_KEY, JSON.stringify(data));
                })
                .catch(err => console.error('Error fetching global details:', err));
        });
    </script>
    @yield('scripts')
</body>
</html>
