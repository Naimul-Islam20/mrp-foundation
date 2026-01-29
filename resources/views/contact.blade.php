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
            <div class="full-width-map mt-2 reveal-text delay-300" style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-md); height: 400px;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902442430139!2d90.39108031536267!3d23.75085809467746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b888ad3f983d%3A0x20c70986185ad2ba!2sDhanmondi%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1649934177399!5m2!1sen!2sbd" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
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
