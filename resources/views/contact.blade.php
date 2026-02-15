@extends('layouts.app')

@section('title', 'যোগাযোগ করুন - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="reveal-text">যোগাযোগ করুন</h1>
            <p class="reveal-text delay-100">যে কোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করুন</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="section contact-page-section">
        <div class="container">
            <div class="contact-container reveal-text delay-200">
                <!-- Contact Info -->
                <div class="contact-info">
                    <h3 style="margin-bottom: 2rem; color: var(--primary-dark);">সরাসরি যোগাযোগ</h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>আমাদের ঠিকানা</h4>
                            <p id="contact-address">হাউজ #১/এ, রোড #৬, সেক্টর #৩<br>উত্তরা মডেল টাউন, উত্তরা, ঢাকা-১২৩০</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>ফোন নম্বর</h4>
                            <p id="contact-phone">+৮৮০ ১২৩৪ ৫৬৭৮৯০<br>+৮৮০ ৯৮৭৬ ৫৪৩২১০</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>ইমেইল</h4>
                            <p id="contact-email">mrpfoundation19@gmail.com</p>
                        </div>
                    </div>

                    <div class="social-connect mt-2">
                        <h4 style="margin-bottom: 1rem;">সোশ্যাল মিডিয়া</h4>
                        <div class="social-links" style="display: flex; gap: 1rem;">
                            <a href="#" class="social-link" style="width: 40px; height: 40px; border-radius: 50%; background: var(--off-white); display: flex; align-items: center; justify-content: center; color: var(--primary-color); transition: var(--transition);"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link" style="width: 40px; height: 40px; border-radius: 50%; background: var(--off-white); display: flex; align-items: center; justify-content: center; color: var(--primary-color); transition: var(--transition);"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link" style="width: 40px; height: 40px; border-radius: 50%; background: var(--off-white); display: flex; align-items: center; justify-content: center; color: var(--primary-color); transition: var(--transition);"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link" style="width: 40px; height: 40px; border-radius: 50%; background: var(--off-white); display: flex; align-items: center; justify-content: center; color: var(--primary-color); transition: var(--transition);"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper" style="flex: 1; padding: 2.5rem; background: #f8fafc;">
                    <h3 style="margin-bottom: 2rem; color: var(--primary-dark);">বার্তা পাঠান</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <label class="form-label">আপনার নাম</label>
                            <input type="text" name="name" class="form-control" placeholder="সম্পূর্ণ নাম লিখুন" required>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">ফোন নম্বর</label>
                                <input type="tel" name="phone" class="form-control" placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">ইমেইল (ঐচ্ছিক)</label>
                                <input type="email" name="email" class="form-control" placeholder="example@email.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">বিষয়</label>
                            <input type="text" name="subject" class="form-control" placeholder="কিসের জন্য যোগাযোগ করছেন?" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">বার্তা</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="আপনার বিস্তারিত বার্তা লিখুন..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">বার্তা পাঠান</button>
                    </form>
                </div>
            </div>

            <!-- Map Section -->
            <div class="full-width-map mt-2 reveal-text delay-300" style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-md); height: 400px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; position: relative;">
                <iframe 
                    id="contact-map"
                    src="" 
                    width="100%" 
                    height="100%" 
                    style="border:0; display: none; position: absolute; top: 0; left: 0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div id="map-placeholder" style="text-align: center; color: #999;">
                    <i class="fas fa-map-marked-alt" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                    <p>ম্যাপ লোড হচ্ছে...</p>
                </div>
            </div>
            
            <script>
                // Update map from cached API data
                function loadMap() {
                    const mapIframe = document.getElementById('contact-map');
                    const placeholder = document.getElementById('map-placeholder');
                    
                    const cached = localStorage.getItem('mrp_details_cache');
                    if (cached) {
                        try {
                            const cachedData = JSON.parse(cached);
                            // Handle both formats: direct object or wrapped in result.data[0]
                            const data = (cachedData.status && cachedData.data && cachedData.data[0]) ? cachedData.data[0] : cachedData;
                            
                            if (data && data.map_url) {
                                let embedUrl = data.map_url;
                                
                                // If it's a regular Google Maps URL, convert to embed URL
                                if (embedUrl.includes('google.com/maps') && !embedUrl.includes('/embed')) {
                                    // Extract coordinates or place info from URL
                                    const placeMatch = embedUrl.match(/place\/([^\/]+)/);
                                    const coordMatch = embedUrl.match(/@(-?\d+\.\d+),(-?\d+\.\d+)/);
                                    
                                    if (coordMatch) {
                                        // Use coordinates
                                        const lat = coordMatch[1];
                                        const lng = coordMatch[2];
                                        embedUrl = `https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.0!2d${lng}!3d${lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1`;
                                    } else if (placeMatch) {
                                        // Use place name
                                        const place = placeMatch[1];
                                        
                                        embedUrl = `https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=${encodeURIComponent(place.replace(/\+/g, ' '))}`;
                                    }
                                }
                                
                                // Set map URL and show it
                                mapIframe.src = embedUrl;
                                mapIframe.style.display = 'block';
                                if (placeholder) placeholder.style.display = 'none';
                                return true; // Successfully loaded
                            }
                        } catch (e) {
                            console.error('Map URL update error:', e);
                        }
                    }
                    return false;
                }
                
                document.addEventListener('DOMContentLoaded', function() {
                    const placeholder = document.getElementById('map-placeholder');
                    
                    // Try to load map immediately
                    let loaded = loadMap();
                    
                    // If not loaded, keep trying with polling
                    if (!loaded) {
                        let attempts = 0;
                        const maxAttempts = 10; // Try for 5 seconds
                        
                        const pollInterval = setInterval(() => {
                            attempts++;
                            loaded = loadMap();
                            
                            if (loaded || attempts >= maxAttempts) {
                                clearInterval(pollInterval);
                                
                                // If still not loaded after all attempts, show error
                                if (!loaded && placeholder) {
                                    placeholder.innerHTML = '<i class="fas fa-map-marked-alt" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i><p>ম্যাপ URL পাওয়া যায়নি</p>';
                                }
                            }
                        }, 500); // Check every 500ms
                    }
                });
            </script>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal-overlay" id="successModal">
        <div class="success-modal">
            <div class="success-icon"><i class="fas fa-check"></i></div>
            <h3>ধন্যবাদ!</h3>
            <p>আপনার বার্তাটি সফলভাবে পাঠানো হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।</p>
            <button class="btn-success" onclick="document.getElementById('successModal').classList.remove('active')">ঠিক আছে</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal-overlay" id="errorModal">
        <div class="error-modal">
            <div class="error-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h3>বার্তা পাঠানো যায়নি</h3>
            <p style="margin-bottom: 10px;">নিচের ত্রুটিগুলো সমাধান করে পুনরায় চেষ্টা করুন:</p>
            <div class="error-details-box" id="errorDetails"></div>
            <button class="btn-error-close" onclick="document.getElementById('errorModal').classList.remove('active')">বন্ধ করুন</button>
        </div>
    </div>
@endsection
