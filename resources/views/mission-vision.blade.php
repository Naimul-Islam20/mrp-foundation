@extends('layouts.app')

@section('title', 'মিশন ও ভিশন - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/mission.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">আমাদের মিশন ও ভিশন</h1>
            <p class="reveal-text delay-100">জাতির উন্নয়নে আমাদের লক্ষ্য ও উদ্দেশ্য</p>
        </div>
    </div>

    <!-- Mission & Vision Content -->
    <section class="mission-section">
        <div class="container">
            <!-- Mission Row -->
            <div class="mission-row reveal-text">
                <div class="mission-image">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Our Mission">
                </div>
                <div class="mission-content">
                    <h2>আমাদের মিশন</h2>
                    <p>আমাদের মূল লক্ষ্য হলো সমাজের সুবিধাবঞ্চিত মানুষের পাশে দাঁড়ানো এবং তাদের মৌলিক চাহিদা পূরণে সহায়তা করা। শিক্ষা, স্বাস্থ্য, এবং কর্মসংস্থানের মাধ্যমে একটি স্বনির্ভর ও সমৃদ্ধ সমাজ গড়ে তোলা।</p>
                    <ul class="mission-list">
                        <li><i class="fas fa-check-circle"></i> মানসম্মত শিক্ষা নিশ্চিতকরণ</li>
                        <li><i class="fas fa-check-circle"></i> স্বাস্থ্যসেবা সহজলভ্য করা</li>
                        <li><i class="fas fa-check-circle"></i> দরিদ্রদের পুনর্বাসন ও সহায়তা</li>
                    </ul>
                </div>
            </div>

            <!-- Vision Row -->
            <div class="mission-row reverse reveal-text delay-200">
                <div class="mission-image">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Our Vision">
                </div>
                <div class="mission-content">
                    <h2>আমাদের ভিশন</h2>
                    <p>একটি বৈষম্যহীন সমাজ ব্যবস্থা যেখানে প্রতিটি মানুষ তার সম্ভাবনার সর্বোচ্চ বিকাশ ঘটাতে পারবে। আমাদের ভিশন হলো এমন একটি ভবিষ্যতে পৌঁছানো যেখানে দারিদ্র্য থাকবে না এবং সবাই মর্যাদার সাথে বাঁচতে পারবে।</p>
                    <ul class="mission-list">
                        <li><i class="fas fa-check-circle"></i> সামাজিক ন্যায়বিচার প্রতিষ্ঠা</li>
                        <li><i class="fas fa-check-circle"></i> টেকসই উন্নয়ন লক্ষ্যমাত্রা অর্জন</li>
                        <li><i class="fas fa-check-circle"></i> নারীর ক্ষমতায়ন ও সমঅধিকার</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Core Values -->
    <section class="values-section">
        <div class="container">
            <div class="text-center reveal-text">
                <h2 class="section-title" style="margin-bottom: 1rem;">আমাদের মূলমন্ত্র</h2>
                <p style="color: var(--text-light); max-width: 600px; margin: 0 auto;">যে আদর্শগুলো আমাদের পথচলার শক্তি</p>
            </div>
            
            <div class="values-grid">
                <!-- Value 1 -->
                <div class="value-card reveal-text delay-100">
                    <div class="value-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3 class="value-title">সেবা</h3>
                    <p class="value-desc">নিস্বার্থ সেবা আমাদের প্রধান ব্রত। মানুষের কল্যাণে কাজ করাই আমাদের আনন্দ।</p>
                </div>

                <!-- Value 2 -->
                <div class="value-card reveal-text delay-200">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="value-title">একতা</h3>
                    <p class="value-desc">আমরা বিশ্বাস করি, সম্মিলিত প্রচেষ্টাই পারে বড় পরিবর্তন আনতে।</p>
                </div>

                <!-- Value 3 -->
                <div class="value-card reveal-text delay-300">
                    <div class="value-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3 class="value-title">সততা</h3>
                    <p class="value-desc">প্রতিটি কার্যক্রমে স্বচ্ছতা ও জবাবদিহিতা নিশ্চিত করতে আমরা অঙ্গীকারবদ্ধ।</p>
                </div>

                <!-- Value 4 -->
                <div class="value-card reveal-text delay-400">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="value-title">উদ্ভাবন</h3>
                    <p class="value-desc">সমস্যা সমাধানে নতুন ও কার্যকরী উপায় খুঁজে বের করাই আমাদের লক্ষ্য।</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section" style="background: var(--primary-color); color: white; text-align: center;">
        <div class="container">
            <h2 style="color: white; margin-bottom: 1.5rem;">আমাদের যাত্রার সাথী হোন</h2>
            <p style="max-width: 700px; margin: 0 auto 2rem; font-size: 1.1rem; opacity: 0.9;">
                আপনার একটি ছোট পদক্ষেপ বদলে দিতে পারে অনেকের জীবন। আজই যোগ দিন আমাদের ভিশন বাস্তবায়নে।
            </p>
            <div style="display: flex; justify-content: center; gap: 20px;">
                <a href="{{ route('become-member') }}" class="btn btn-secondary-white">সদস্য হোন</a>
                <a href="{{ route('become-agent') }}" class="btn btn-primary" style="border: 2px solid white;">এজেন্ট হোন</a>
            </div>
        </div>
    </section>
@endsection
