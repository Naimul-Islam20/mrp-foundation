@extends('layouts.app')

@section('title', 'আমাদের সংবাদ - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">সর্বশেষ সংবাদ</h1>
            <p class="reveal-text delay-100" style="color: rgba(255,255,255,0.9); margin-top: 0.5rem;">আমাদের কার্যক্রম এবং অর্জনের সর্বশেষ আপডেট</p>
        </div>
    </div>

    <!-- News Section -->
    <section class="section event-section">
        <div class="container">
            <h2 class="section-title reveal-text">সাম্প্রতিক খবর</h2>
            
            <div class="event-grid">
                <!-- News Card 1 -->
                <div class="event-card reveal-text delay-100">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="News Image">
                        <div class="event-date-badge">
                            <span class="day">12</span>
                            <span class="month">Jan</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <div class="event-category">Announcement</div>
                        <h3 class="event-title">নতুন এজেন্ট নিয়োগ প্রক্রিয়া শুরু</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-user-edit"></i> Admin</span>
                            <span><i class="far fa-eye"></i> 1.2k Views</span>
                        </div>
                        <p class="event-desc">দেশজুড়ে আমাদের নেটওয়ার্ক সম্প্রসারণের লক্ষ্যে নতুন এজেন্ট নিয়োগ দেয়া হচ্ছে। আগ্রহী প্রার্থীদের দ্রুত আবেদন করার আহ্বান জানানো হচ্ছে।</p>
                        <div class="event-footer">
                            <a href="#" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত পড়ুন</a>
                        </div>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="event-card reveal-text delay-200">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="News Image">
                        <div class="event-date-badge">
                            <span class="day">05</span>
                            <span class="month">Jan</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <div class="event-category">Award</div>
                        <h3 class="event-title">এমআরপি ফাউন্ডেশন পেল সেরা সমাজসেবা পুরস্কার</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-user-edit"></i> Reporter</span>
                            <span><i class="far fa-eye"></i> 3.5k Views</span>
                        </div>
                        <p class="event-desc">২০২৫ সালের সেরা সমাজসেবা মূলক প্রতিষ্ঠান হিসেবে এমআরপি ফাউন্ডেশনকে পুরস্কৃত করা হয়েছে।</p>
                        <div class="event-footer">
                            <a href="#" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত পড়ুন</a>
                        </div>
                    </div>
                </div>

                <!-- News Card 3 -->
                <div class="event-card reveal-text delay-300">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1524813686514-a570f9d44bb2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="News Image">
                        <div class="event-date-badge">
                            <span class="day">28</span>
                            <span class="month">Dec</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <div class="event-category">Project Update</div>
                        <h3 class="event-title">উত্তরা প্রজেক্টের সফল সমাপ্তি</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-user-edit"></i> Project Mgr</span>
                            <span><i class="far fa-eye"></i> 900 Views</span>
                        </div>
                        <p class="event-desc">উত্তরায় আমাদের গৃহহীনদের পুনর্বাসন প্রকল্পের প্রথম ধাপ সফলভাবে সম্পন্ন হয়েছে।</p>
                        <div class="event-footer">
                            <a href="#" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত পড়ুন</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
