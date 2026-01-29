<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- About -->
            <div class="footer-about reveal-text">
                <h3><i class="fas fa-hands-helping"></i> MRP Foundation</h3>
                <p>মানবতার সেবায় নিবেদিত একটি প্রতিষ্ঠান। আমরা বিশ্বাস করি একত্রিত প্রচেষ্টাই পারে সমাজকে বদলে দিতে। আমাদের সাথে যুক্ত হয়ে আপনিও অবদান রাখতে পারেন।</p>
                <p style="margin-top: 1rem; font-size: 0.9rem; color: #a0aec0" id="footer-address">
                    <i class="fas fa-map-marker-alt" style="color: var(--secondary-color); margin-right: 5px"></i>
                    হাউজ #১/এ, রোড #৬, সেক্টর #৩, উত্তরা মডেল টাউন, উত্তরা, ঢাকা-১২৩০
                </p>
                <div class="social-links">
                    <a href="#" class="social-link reveal-text delay-100"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link reveal-text delay-200"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link reveal-text delay-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link reveal-text delay-300"><i class="fab fa-linkedin-in"></i></a>
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
                <form class="newsletter-form reveal-text deley-300" onsubmit="event.preventDefault();">
                    <input type="email" class="newsletter-input" placeholder="আপনার ইমেইল লিখুন" />
                    <button type="submit" class="newsletter-btn">
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
