@extends('layouts.app')

@section('title', 'আমাদের ইভেন্টসমূহ - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
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
            
            <div class="event-grid">
                <!-- Event Card 1 -->
                <div class="event-card reveal-text delay-100">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Winter Clothes Distribution">
                        <div class="event-date-badge">
                            <span class="day">15</span>
                            <span class="month">Jan</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <div class="event-category">Social Welfare</div>
                        <h3 class="event-title">শীতার্তদের মাঝে বস্ত্র বিতরণ কর্মসূচি ২০২৬</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-map-marker-alt"></i> উত্তরা মডেল টাউন</span>
                            <span><i class="far fa-clock"></i> সকাল ১০:০০ টা</span>
                        </div>
                        <p class="event-desc">এই শীতে কোনো অসহায় মানুষ যেন কষ্টে না থাকে। আমাদের এই উদ্যোগে শামিল হোন আপনিও।</p>
                        <div class="event-footer">
                            <a href="{{ route('event-details') }}" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="event-card reveal-text delay-200">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1581594658553-359424894291?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Free Medical Camp">
                        <div class="event-date-badge">
                            <span class="day">02</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <div class="event-category">Health Care</div>
                        <h3 class="event-title">ফ্রি মেডিকেল ক্যাম্প ও ঔষধ বিতরণ</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-map-marker-alt"></i> মিরপুর ১০</span>
                            <span><i class="far fa-clock"></i> সকাল ০৯:০০ টা</span>
                        </div>
                        <p class="event-desc">বিনামূল্যে স্বাস্হ সেবা এবং ঔষধ বিতরণ কর্মসূচি। অভিজ্ঞ ডাক্তারদের দ্বারা পরিচালিত।</p>
                        <div class="event-footer">
                            <a href="{{ route('event-details') }}" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="event-card reveal-text delay-300">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Dealer Conference">
                        <div class="event-date-badge">
                            <span class="day">10</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <div class="event-category">Business</div>
                        <h3 class="event-title">বার্ষিক এজেন্ট সম্মেলন ও পুরস্কার বিতরণী</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-map-marker-alt"></i> ইন্টারন্যাশনাল কনভেনশন সিটি</span>
                            <span><i class="far fa-clock"></i> বিকাল ০৩:০০ টা</span>
                        </div>
                        <p class="event-desc">আমাদের সফল এজেন্টদের সম্মাননা প্রদান এবং ভবিষ্যৎ পরিকল্পনা নিয়ে আলোচনা সভা।</p>
                        <div class="event-footer">
                            <a href="{{ route('event-details') }}" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>
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
