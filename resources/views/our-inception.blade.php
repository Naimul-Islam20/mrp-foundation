@extends('layouts.app')

@section('title', 'আমাদের পথচলা - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inception.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">আমাদের পথচলা</h1>
            <p class="reveal-text delay-100">স্বপ্ন থেকে বাস্তবে - একটি সফল যাত্রার গল্প</p>
        </div>
    </div>

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="story-wrapper">
                <div class="story-image reveal-text">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="আমাদের শুরুর গল্প">
                </div>
                <div class="story-content reveal-text delay-100">
                    <h2>আমাদের শুরুর গল্প</h2>
                    <p class="story-text">
                        ২০১৮ সালে উত্তরা, ঢাকার একটি ছোট্ট অফিস থেকে শুরু হয়েছিল এমআরপি ফাউন্ডেশনের যাত্রা। মাত্র পাঁচজন স্বপ্নবাজ মানুষের হাত ধরে যে স্বপ্ন দেখা শুরু হয়েছিল, আজ তা হাজার হাজার মানুষের জীবনে আলো ছড়াচ্ছে।
                    </p>
                    <p class="story-text">
                        আমাদের লক্ষ্য ছিল সহজ কিন্তু শক্তিশালী - প্রতিটি মানুষের মৌলিক অধিকার নিশ্চিত করা এবং একটি বৈষম্যহীন সমাজ গড়ে তোলা। শিক্ষা, স্বাস্থ্য এবং কর্মসংস্থান - এই তিনটি মূল স্তম্ভের উপর দাঁড়িয়ে আমরা এগিয়ে চলেছি প্রতিদিন।
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Inception Stats Section -->
    <section class="inception-stats-section">
        <div class="container">
            <div class="inception-stats reveal-text">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number" data-target="6" data-suffix="+">0</span>
                        <span class="stat-label">বছর সেবায়</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="50000" data-suffix="K+">0</span>
                        <span class="stat-label">সদস্য</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="1000" data-suffix="+">0</span>
                        <span class="stat-label">এজেন্ট</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="100" data-suffix="+">0</span>
                        <span class="stat-label">প্রকল্প সম্পন্ন</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="container">
            <div class="section-header">
                <h2 class="reveal-text">আমাদের মাইলস্টোন</h2>
                <p class="reveal-text delay-100">যেভাবে আমরা এগিয়ে এসেছি</p>
            </div>

            <div class="timeline-horizontal">
                <!-- Timeline Card 1 -->
                <div class="timeline-card reveal-text delay-100">
                    <span class="timeline-year">২০১৮</span>
                    <h3 class="timeline-title">যাত্রার শুরু</h3>
                    <p class="timeline-desc">
                        উত্তরা, ঢাকায় মাত্র ৫ জন সদস্য নিয়ে প্রতিষ্ঠানের যাত্রা শুরু। প্রথম লক্ষ্য ছিল সুবিধাবঞ্চিত শিশুদের শিক্ষা সহায়তা।
                    </p>
                </div>

                <!-- Timeline Card 2 -->
                <div class="timeline-card reveal-text delay-200">
                    <span class="timeline-year">২০১৯</span>
                    <h3 class="timeline-title">প্রথম বড় প্রজেক্ট</h3>
                    <p class="timeline-desc">
                        'সবার জন্য শিক্ষা' প্রজেক্ট চালু। ৫০০ জন শিক্ষার্থীকে বৃত্তি প্রদান এবং শিক্ষা সামগ্রী বিতরণ।
                    </p>
                </div>

                <!-- Timeline Card 3 -->
                <div class="timeline-card reveal-text delay-300">
                    <span class="timeline-year">২০২০</span>
                    <h3 class="timeline-title">মহামারীতে সেবা</h3>
                    <p class="timeline-desc">
                        কোভিড-১৯ এর সময় ১০,০০০+ পরিবারকে খাদ্য ও চিকিৎসা সহায়তা প্রদান। জরুরি ত্রাণ কার্যক্রম পরিচালনা।
                    </p>
                </div>


                <!-- Timeline Card 5 -->
                <div class="timeline-card reveal-text delay-500">
                    <span class="timeline-year">২০২৫</span>
                    <h3 class="timeline-title">বর্তমান অবস্থা</h3>
                    <p class="timeline-desc">
                        ১০০০+ এজেন্ট, ৫০,০০০+ সদস্য এবং ১০০+ সফল প্রকল্প। স্বাস্থ্য, শিক্ষা ও কর্মসংস্থানে ব্যাপক কার্যক্রম।
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <h2 class="reveal-text">আমাদের নেতৃত্ব</h2>
                <p class="reveal-text delay-100">যারা এই স্বপ্নকে বাস্তবে রূপ দিয়েছেন</p>
            </div>

            <div class="team-grid">
                <!-- Team Member 1 -->
                <div class="team-card reveal-text delay-100">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Chairman">
                    </div>
                    <div class="team-info">
                        <h3 class="team-name">মোঃ আব্দুল করিম</h3>
                        <span class="team-role">প্রতিষ্ঠাতা ও চেয়ারম্যান</span>
                        <p class="team-bio">
                            সমাজসেবায় ২০+ বছরের অভিজ্ঞতা। দেশের প্রান্তিক মানুষের উন্নয়নে নিবেদিত।
                        </p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card reveal-text delay-200">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Executive Director">
                    </div>
                    <div class="team-info">
                        <h3 class="team-name">ফাতেমা আক্তার</h3>
                        <span class="team-role">নির্বাহী পরিচালক</span>
                        <p class="team-bio">
                            উন্নয়ন কর্মকাণ্ডে দক্ষ পেশাদার। প্রকল্প ব্যবস্থাপনায় বিশেষজ্ঞ।
                        </p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card reveal-text delay-300">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Program Director">
                    </div>
                    <div class="team-info">
                        <h3 class="team-name">রফিকুল ইসলাম</h3>
                        <span class="team-role">প্রোগ্রাম পরিচালক</span>
                        <p class="team-bio">
                            শিক্ষা ও স্বাস্থ্য প্রকল্পের সমন্বয়কারী। মাঠ পর্যায়ে কাজের অভিজ্ঞতা।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Animated Counter for Statistics
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const suffix = element.getAttribute('data-suffix') || '';
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                
                // Format the number
                let displayValue = Math.floor(current);
                if (suffix === 'K+' && target >= 1000) {
                    displayValue = Math.floor(current / 1000);
                    element.textContent = displayValue + suffix;
                } else {
                    element.textContent = displayValue + suffix;
                }
            }, 16);
        }
        
        // Intersection Observer for triggering animation when visible
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        animateCounter(counter);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe the stats grid
        const statsGrid = document.querySelector('.stats-grid');
        if (statsGrid) {
            observer.observe(statsGrid);
        }
    </script>
@endsection
