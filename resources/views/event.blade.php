@extends('layouts.app')

@section('title', 'আমাদের ইভেন্টসমূহ - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
    <style>
        /* Skeleton Loading Styles */
        .skeleton {
            background-color: #e2e8f0 !important;
            background-image: linear-gradient(90deg, #e2e8f0 0px, #f8fafc 40px, #e2e8f0 80px) !important;
            background-size: 200% 100% !important;
            animation: skeleton-shimmer 1.5s infinite linear !important;
            border-radius: 12px;
            display: inline-block;
            color: transparent !important;
            border: none !important;
        }

        @keyframes skeleton-shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        .skeleton-card { 
            height: 450px; 
            width: 100%; 
            border-radius: 16px;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">আমাদের ইভেন্টসমূহ</h1>
            <p class="reveal-text delay-100" style="color: rgba(255,255,255,0.9); margin-top: 0.5rem;">সমাজের উন্নয়নে আমাদের ক্ষুদ্র প্রচেষ্টা</p>
        </div>
    </div>

    <!-- Upcoming Events Section -->
    <section class="section event-section">
        <div class="container">
            <h2 class="section-title reveal-text">আসন্ন ইভেন্ট</h2>
            
            <div class="event-grid" id="events-container">
                <!-- Skeleton Placeholders -->
                <div class="skeleton skeleton-card"></div>
                <div class="skeleton skeleton-card"></div>
                <div class="skeleton skeleton-card"></div>
            </div>
        </div>
    </section>

    <!-- Past Events Section -->
    <section class="section past-events-section">
        <div class="container">
            <h2 class="section-title reveal-text">পূর্ববর্তী সফল ইভেন্টসমূহ</h2>
            
            <div class="past-events-list">
                <!-- Past Event 1 -->
                <div class="past-event-item reveal-text delay-100">
                    <div class="past-event-image">
                        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tree Plantation">
                    </div>
                    <div class="past-event-content">
                        <div class="past-event-date"><i class="far fa-calendar-alt"></i> ১০ ডিসেম্বর, ২০২৫</div>
                        <h3>বৃক্ষরোপণ কর্মসূচি - সবুজ পৃথিবী</h3>
                        <p style="color: var(--text-light); margin-bottom: 1rem;">পরিবেশ রক্ষায় আমাদের ক্ষুদ্র প্রয়াস। প্রায় ৫০০০ চারা রোপণ করা হয়।</p>
                        <a href="#" style="color: var(--primary-color); font-weight: 600; font-size: 0.9rem;">আরও দেখুন <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i></a>
                    </div>
                </div>

                <!-- Past Event 2 -->
                <div class="past-event-item reveal-text delay-200">
                    <div class="past-event-image">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Flood Relief">
                    </div>
                    <div class="past-event-content">
                        <div class="past-event-date"><i class="far fa-calendar-alt"></i> ১৫ আগস্ট, ২০২৫</div>
                        <h3>বন্যা দুর্গতদের মাঝে ত্রাণ বিতরণ</h3>
                        <p style="color: var(--text-light); margin-bottom: 1rem;">সিলেট অঞ্চলের বন্যাকবলিত মানুষের পাশে এমআরপি ফাউন্ডেশন।</p>
                        <a href="#" style="color: var(--primary-color); font-weight: 600; font-size: 0.9rem;">আরও দেখুন <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
