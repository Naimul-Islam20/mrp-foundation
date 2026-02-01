@extends('layouts.app')

@section('title', 'ইভেন্টের বিস্তারিত - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
    <style>
        /* Main Content Styles */
        .event-meta-row {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }
        .meta-tag {
            background: rgba(255, 255, 255, 0.1);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .category-pill {
            display: inline-block;
            background: var(--secondary-color);
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: white;
        }
        .content-section {
            padding: 5rem 0;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 3.5rem;
        }
        .main-text {
            font-size: 1.1rem;
            line-height: 1.9;
            color: var(--text-dark);
        }
        .main-text h3 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 12px;
            color: var(--primary-dark);
        }
        .main-text h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--secondary-color);
            border-radius: 2px;
        }
        .sidebar-card {
            background: var(--white);
            padding: 2.2rem;
            border-radius: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.06);
            border: 1px solid #edf2f7;
            position: sticky;
            top: 120px;
        }
        .info-list-item {
            display: flex;
            gap: 12px;
            margin-bottom: 1.2rem;
            align-items: flex-start;
        }
        .info-list-item i {
            width: 35px;
            height: 35px;
            background: #f0fdf4;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 1rem;
            flex-shrink: 0;
        }
        .info-list-item h5 { margin: 0; font-size: 0.95rem; color: var(--text-dark); }
        .info-list-item p { margin: 0; font-size: 0.9rem; color: var(--text-light); }

        /* Registration Form Section */
        .registration-section {
            background: #f8fafc;
            padding: 5rem 0;
        }
        .registration-container {
            max-width: 850px;
            margin: 0 auto;
            background: white;
            padding: 3.5rem;
            border-radius: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.05);
        }
        .form-header { text-align: center; margin-bottom: 3rem; }
        .form-header h2 { font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 0.5rem; }

        /* Slider Styles */
        .slider-wrapper {
            position: relative;
            margin-top: 3rem;
        }
        .slider-container {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0;
            scrollbar-width: none;
        }
        .slider-container::-webkit-scrollbar {
            display: none;
        }
        .slider-item {
            flex: 0 0 calc(50% - 0.75rem);
            height: 250px;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: transform 0.3s ease;
        }
        .slider-item:hover {
            transform: translateY(-5px);
        }
        .slider-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .slider-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 45px;
            height: 45px;
            background: white;
            border: none;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            color: var(--primary-color);
            transition: all 0.3s;
        }
        .slider-control:hover {
            background: var(--secondary-color);
            color: white;
        }
        .slider-control.prev { left: -22px; }
        .slider-control.next { right: -22px; }

        /* Modal Gallery / Lightbox */
        .modal-gallery {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.95);
            z-index: 100000;
            align-items: center;
            justify-content: center;
        }
        .modal-content-container {
            max-width: 90%;
            max-height: 85vh;
            position: relative;
            text-align: center;
        }
        .modal-content-container img {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 12px;
            box-shadow: 0 0 50px rgba(0,0,0,0.5);
            animation: zoom 0.3s ease;
        }
        @keyframes zoom {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .modal-close {
            position: absolute;
            top: 30px;
            right: 40px;
            color: white;
            font-size: 40px;
            cursor: pointer;
        }
        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.1);
            color: white;
            border: none;
            padding: 20px 15px;
            font-size: 30px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        .modal-nav:hover { background: var(--secondary-color); }
        .modal-nav.prev { left: 40px; }
        .modal-nav.next { right: 40px; }
        #modalCaption {
            color: white;
            margin-top: 15px;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .page-header h1 { font-size: 2.2rem; }
            .event-meta-row { gap: 0.8rem; }
            .registration-container { padding: 2.5rem 1.5rem; }
            .slider-item { flex: 0 0 85%; }
            .slider-control.prev { left: -10px; }
            .slider-control.next { right: -10px; }
        }

        /* Skeleton Loading Styles */
        .skeleton {
            background-color: #e2e8f0 !important;
            background-image: linear-gradient(90deg, #e2e8f0 0px, #f8fafc 40px, #e2e8f0 80px) !important;
            background-size: 200% 100% !important;
            animation: skeleton-shimmer 1.5s infinite linear !important;
            border-radius: 4px;
            display: inline-block;
            color: transparent !important;
            border: none !important;
        }

        @keyframes skeleton-shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .skeleton-text { height: 1.2rem; margin-bottom: 0.5rem; width: 100%; min-width: 100px; }
        .skeleton-title { height: 3.5rem; width: 80%; margin: 0 auto; display: block; }
        .skeleton-pill { height: 25px; width: 120px; border-radius: 50px; display: block; margin: 0 auto 1rem; }
        .skeleton-meta { height: 35px; width: 160px; border-radius: 50px; }
        .skeleton-image { width: 100%; height: 250px; border-radius: 16px; }
        .skeleton-desc { height: 200px; width: 100%; display: block; }
        .skeleton-list-item { height: 25px; width: 90%; margin-bottom: 15px; display: block; }
    </style>
@endsection

@section('content')
    <!-- Page Header (Universal Style) -->
    <section class="page-header">
        <div class="container" style="position: relative; z-index: 1;">
            <span class="category-pill skeleton skeleton-pill" id="event-type"></span>
            <h1 class="reveal-text skeleton skeleton-title" id="event-title" style="font-size: 3rem; margin-bottom: 0;"></h1>
            <div class="event-meta-row reveal-text delay-100">
                <div class="meta-tag skeleton skeleton-meta"><span id="event-date-top"></span></div>
                <div class="meta-tag skeleton skeleton-meta"><span id="event-time-top"></span></div>
                <div class="meta-tag skeleton skeleton-meta"><span id="event-address-top"></span></div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <div class="container">
        <div class="content-section">
            <!-- Left Side- Main Content -->
            <div class="main-text">
                <h3>ইভেন্টের বিস্তারিত বর্ণনা</h3>
                <div id="event-description">
                    <div class="skeleton skeleton-desc"></div>
                </div>

                <h4 style="margin: 2.5rem 0 1.5rem; color: var(--primary-dark); font-size: 1.5rem;">কেন অংশগ্রহণ করবেন?</h4>
                <ul class="req-list" id="event-reasons">
                    <li class="skeleton skeleton-list-item"></li>
                    <li class="skeleton skeleton-list-item"></li>
                    <li class="skeleton skeleton-list-item"></li>
                </ul>

                <h4 style="margin: 2.5rem 0 1.5rem; color: var(--primary-dark); font-size: 1.5rem;">কার্যক্রম সূচি:</h4>
                <div style="background: #f8fafc; padding: 2rem;">
                    <ul style="list-style: none;" id="event-schedule">
                        <li class="skeleton skeleton-list-item" style="height: 40px;"></li>
                        <li class="skeleton skeleton-list-item" style="height: 40px;"></li>
                    </ul>
                </div>

                <div class="slider-wrapper">
                    <div class="slider-container" id="eventSlider">
                        <div class="skeleton skeleton-image" style="flex: 0 0 calc(50% - 0.75rem);"></div>
                        <div class="skeleton skeleton-image" style="flex: 0 0 calc(50% - 0.75rem);"></div>
                    </div>
                    <button class="slider-control prev" onclick="moveSlider(-1)"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-control next" onclick="moveSlider(1)"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Right Side - Sidebar -->
            <div class="sidebar">
                <div class="sidebar-card">
                    <h4 style="font-size: 1.5rem; color: var(--primary-dark); margin-bottom: 1rem; text-align: center;">ইভেন্ট তথ্য</h4>
                    <div class="info-list">
                        <div class="info-list-item">
                            <i class="fas fa-calendar-check"></i>
                            <div>
                                <h5>তারিখ</h5>
                                <p id="event-date-sidebar" class="skeleton skeleton-text" style="width: 120px;"></p>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h5>সময়</h5>
                                <p id="event-time-sidebar" class="skeleton skeleton-text" style="width: 120px;"></p>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <i class="fas fa-map-marked-alt"></i>
                            <div>
                                <h5>স্থান</h5>
                                <p id="event-address-sidebar" class="skeleton skeleton-text" style="width: 150px;"></p>
                            </div>
                        </div>
                        <div class="info-list-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <h5>লক্ষ্যমাত্রা</h5>
                                <p>১০০০+ পরিবার</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#register" class="btn btn-primary" style="width: 100%; text-align: center; margin-bottom: 1rem; padding: 1rem;">রেজিস্ট্রেশন করুন</a>
                    <a href="{{ route('contact') }}" class="btn btn-secondary-white" style="width: 100%; text-align: center; padding: 1rem;">যোগাযোগ করুন</a>

                    <div style="margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid #eee;">
                        <h5 style="margin-bottom: 1rem;">শেয়ার করুন:</h5>
                        <div style="display: flex; gap: 15px;">
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: #3b5998; color: white; display: flex; align-items: center; justify-content: center;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center;"><i class="fab fa-twitter"></i></a>
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: #0077b5; color: white; display: flex; align-items: center; justify-content: center;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: #25d366; color: white; display: flex; align-items: center; justify-content: center;"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Section -->
    <section class="registration-section" id="register">
        <div class="container">
            <div class="registration-container reveal-text">
                <div class="form-header">
                    <h2>ইভেন্টে অংশগ্রহণ করুন</h2>
                    <p>স্বেচ্ছাসেবী হিসেবে যোগ দিতে বা অংশগ্রহণের জন্য নিচের ফর্মটি পূরণ করুন</p>
                </div>
                
                <form id="eventRegistrationForm">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">আপনার নাম</label>
                            <input type="text" class="form-control" name="name" placeholder="পূর্ণ নাম লিখুন" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">ফোন নম্বর</label>
                            <input type="tel" class="form-control" name="phone" placeholder="01XXXXXXXXX" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">ইমেইল</label>
                            <input type="email" class="form-control" name="email" placeholder="example@mail.com" required>
                        </div>
                    </div>
                    
                    <div class="form-grid mt-1">
                        <div class="form-group">
                            <label class="form-label">লিঙ্গ</label>
                            <select class="form-control" name="gender">
                                <option value="male">পুরুষ</option>
                                <option value="female">মহিলা</option>
                                <option value="other">অন্যান্য</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">কি হিসেবে যোগ দিতে চান?</label>
                            <select class="form-control" name="role">
                                <option value="volunteer">স্বেচ্ছাসেবী</option>
                                <option value="guest">অতিথি</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">বর্তমান অবস্থান</label>
                            <input type="text" class="form-control" name="location" placeholder="শহর/এলাকার নাম" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">অতিরিক্ত তথ্য বা বার্তা (যদি থাকে)</label>
                        <textarea class="form-control" name="message" rows="4" placeholder="আপনার কোনো বিশেষ অনুরোধ বা তথ্য থাকলে এখানে লিখুন..."></textarea>
                    </div>

                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.1rem; border-radius: 50px;">রেজিস্ট্রেশন সম্পন্ন করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="eventLightbox" class="modal-gallery">
        <span class="modal-close" onclick="closeEventLightbox()">&times;</span>
        <div class="modal-content-container">
            <img id="modalImg" src="">
            <div id="modalCaption"></div>
        </div>
        <button class="modal-nav prev" onclick="changeModalSlide(-1)">&#10094;</button>
        <button class="modal-nav next" onclick="changeModalSlide(1)">&#10095;</button>
    </div>
@endsection

@section('scripts')
    <script>
        // --- Slider Logic ---
        function moveSlider(direction) {
            const container = document.getElementById('eventSlider');
            const scrollAmount = container.clientWidth * 0.8;
            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        // --- Lightbox Logic ---
        let currentImgIndex = 0;
        const sliderImages = document.querySelectorAll('.slider-item img');
        const modal = document.getElementById('eventLightbox');
        const modalImg = document.getElementById('modalImg');
        const modalCaption = document.getElementById('modalCaption');

        sliderImages.forEach((img, index) => {
            img.addEventListener('click', () => {
                currentImgIndex = index;
                openModal(img.src, img.alt);
            });
        });

        function openModal(src, caption) {
            modal.style.display = 'flex';
            modalImg.src = src;
            modalCaption.innerText = caption;
            document.body.style.overflow = 'hidden';
        }

        function closeEventLightbox() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function changeModalSlide(direction) {
            currentImgIndex += direction;
            if (currentImgIndex >= sliderImages.length) currentImgIndex = 0;
            if (currentImgIndex < 0) currentImgIndex = sliderImages.length - 1;
            
            const nextImg = sliderImages[currentImgIndex];
            modalImg.src = nextImg.src;
            modalCaption.innerText = nextImg.alt;
        }

        // Close modal on background click
        window.onclick = function(event) {
            if (event.target == modal) {
                closeEventLightbox();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (modal.style.display === 'flex') {
                if (e.key === 'ArrowLeft') changeModalSlide(-1);
                if (e.key === 'ArrowRight') changeModalSlide(1);
                if (e.key === 'Escape') closeEventLightbox();
            }
        });

        // Registration form handler
        document.getElementById('eventRegistrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('আপনার রেজিস্ট্রেশন সফলভাবে সম্পন্ন হয়েছে! আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।');
            this.reset();
        });
    </script>
@endsection
