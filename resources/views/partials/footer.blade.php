<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- About -->
            <div class="footer-about reveal-text">
                <div id="footer-logo-container" style="margin-bottom: 1.5rem;"></div>
                <p id="footer-desc"></p>
                <script>
                    (function() {
                        const cached = localStorage.getItem('mrp_details_cache');
                        if (cached) {
                            try {
                                const data = JSON.parse(cached);
                                if (data && data.status && data.data && data.data[0]) {
                                    const info = data.data[0];
                                    const STORAGE_URL = STORAGE_BASE_URL;
                                    
                                    // Logo
                                    if (info.logo) {
                                        const logoUrl = info.logo.startsWith('http') ? info.logo : STORAGE_URL + info.logo;
                                        document.getElementById('footer-logo-container').innerHTML = `<img src="${logoUrl}" alt="MRP Foundation" style="max-height: 60px; width: auto;">`;
                                    } else if (info.title) {
                                        document.getElementById('footer-logo-container').innerHTML = `<h3 id="footer-logo-text"><i class="fas fa-hands-helping"></i> ${info.title}</h3>`;
                                    }
                                    
                                    // Description
                                    if (info.footer_description) {
                                        document.getElementById('footer-desc').textContent = info.footer_description;
                                    }
                                }
                            } catch (e) {}
                        }
                    })();
                </script>
                <p style="margin-top: 1rem; font-size: 0.9rem; color: #a0aec0" id="footer-address"></p>
                <div class="social-links">
                    <a href="#" id="footer-fb" class="social-link reveal-text delay-100"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" id="footer-twitter" class="social-link reveal-text delay-200"><i class="fab fa-twitter"></i></a>
                    <a href="#" id="footer-insta" class="social-link reveal-text delay-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" id="footer-linkedin" class="social-link reveal-text delay-300"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-widget reveal-text delay-100">
                <h4 class="footer-title">প্রয়োজনীয় লিংক</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> হোম</a></li>
                    <li><a href="{{ route('home') }}#about"><i class="fas fa-angle-right"></i> আমাদের সম্পর্কে</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-angle-right"></i> যোগাযোগ</a></li>
                    <li><a href="{{ route('become-member') }}"><i class="fas fa-angle-right"></i> সদস্য আবেদন</a></li>
                    <li><a href="{{ route('become-agent') }}"><i class="fas fa-angle-right"></i> এজেন্ট আবেদন</a></li>
                    <li><a href="{{ route('career') }}"><i class="fas fa-angle-right"></i> ক্যারিয়ার</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-widget reveal-text delay-100">
                <h4 class="footer-title">আপডেট পেতে</h4>
                <p style="color: #a0aec0; margin-bottom: 1rem" class="delay-200 reveal-text">আমাদের সকল কার্যক্রমের আপডেট পেতে আপনার ইমেইল দিয়ে সাবস্ক্রাইব করুন।</p>
                <form id="newsletter-form" class="newsletter-form reveal-text deley-300">
                    <input type="email" id="newsletter-email" name="email" class="newsletter-input" placeholder="আপনার ইমেইল লিখুন" required />
                    <button type="submit" id="newsletter-btn" class="newsletter-btn">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>
                &copy; <span id="currentYear"></span>
                <a href="https://muktodharaltd.com/" target="_blank" style="color: var(--secondary-color); text-decoration: none; border-bottom: 1px dashed rgba(70, 153, 70, 0.3); transition: all 0.3s ease; font-weight: 500;">Muktodhara Technology Limited</a>. All rights reserved.
            </p>
        </div>
    </div>
</footer>
