@extends('layouts.app')

@section('title', 'এজেন্ট যোগ্যতা ও শর্তাবলী - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">এজেন্ট যোগ্যতা ও প্রয়োজনীয় কাগজপত্র</h1>
            <p class="reveal-text delay-100">আমাদের নেটওয়ার্কে যুক্ত হওয়ার জন্য প্রয়োজনীয় নির্দেশিকা।</p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="req-section">
        <div class="container">
            <div class="req-grid reveal-text">
                <!-- Card 1: Documents (কাগজপত্র) -->
                <div class="req-card reveal-text">
                    <h3 class="req-title"><i class="fas fa-file-alt"></i> প্রয়োজনীয় কাগজপত্র</h3>
                    <ul class="req-list">
                        <li class="reveal-text">জন্ সনদ</li>
                        <li class="reveal-text">NID কার্ডের ফটোকপি</li>
                        <li class="reveal-text">এজেন্টের দুই কপি পাসপোর্ট সাইজের ছবি</li>
                        <li class="reveal-text">চেয়ারম্যান সার্টিফিকেট লাগবে</li>
                        <li class="reveal-text">স্বামীর ছবি ও অন্যান্য ডকুমেন্ট (নারীদের ক্ষেত্রে)</li>
                        <li class="reveal-text">এলাকার গণ্যমান্য ব্যক্তির স্বাক্ষর করা ফরম লাগবে (প্রতিষ্ঠান থেকে প্রদান করা হবে)</li>
                        <li class="reveal-text">ব্যাংক চেক লাগবে তিনটা, চুক্তিনামা</li>
                        <li class="reveal-text">ট্রেড লাইসেন্স থাকতে হবে</li>
                    </ul>
                </div>

                <!-- Card 2: Qualifications (যোগ্যতা সমূহ) -->
                <div class="req-card reveal-text delay-200">
                    <h3 class="req-title"><i class="fas fa-user-check"></i> যোগ্যতা ও শর্তাবলী</h3>
                    <ul class="req-list">
                        <li class="reveal-text">SSC পাশ হতে হবে</li>
                        <li class="reveal-text">মানবিক ও সহানুভূতিশীল মানুষ হতে হবে</li>
                        <li class="reveal-text">পরিশ্রমী ও ধৈর্যশীল হতে হবে</li>
                        <li class="reveal-text">কার্ডধারী সেবা গ্রহীতা তৈরি করতে হবে</li>
                    </ul>

                    <div class="highlight-box reveal-text delay-300">
                        <span class="worker-badge">বিশেষ সুবিধা</span>
                        <div class="highlight-title">দক্ষ কর্মী নিয়োগ: ২০ জন</div>
                        <p style="font-size: 0.95rem; color: rgba(255,255,255,0.9);">
                            দক্ষ কর্মী লাগবে ২০ জন।
                            <br><strong style="color: #fff;">দ্রষ্টব্য:</strong> যার বেতন ভাতা ও অন্যান্য সুযোগ-সুবিধা সংস্থা বহন করবে।
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center reveal-text delay-300" style="margin-bottom: 30px;">
                <h3 style="margin-bottom: 1.5rem; color: var(--text-dark);">সবকিছু ঠিক আছে?</h3>
                <a href="{{ route('become-agent') }}" class="btn btn-primary" style="padding: 1rem 2.5rem; font-size: 1.1rem;">
                    এখনই আবেদন করুন <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
