@extends('layouts.app')

@section('title', 'আমাদের সাথে যোগ দিন - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/career.css') }}">
    <style>
        .role-highlight {
            background: #f8fafc;
            padding: 4rem 0;
            border-bottom: 1px solid #edf2f7;
        }
        .role-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 3rem;
            border: 1px solid #edf2f7;
            transition: transform 0.3s ease;
        }
        .role-card:hover {
            transform: translateY(-5px);
        }
        .role-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 1rem;
        }
        .role-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
        }
        .role-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-dark);
        }
        .benefit-list-new {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .benefit-item-new {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }
        .benefit-item-new i {
            margin-top: 5px;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }
        .benefit-item-new h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: var(--primary-dark);
        }
        .benefit-item-new p {
            font-size: 0.95rem;
            color: var(--text-light);
            line-height: 1.5;
        }
        .action-btns {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">আমাদের সাথে যুক্ত হোন</h1>
            <p class="reveal-text delay-100">এমআরপি ফাউন্ডেশনের নেটওয়ার্কে অংশ নিয়ে সমাজ পরিবর্তন ও নিজের উন্নতি নিশ্চিত করুন।</p>
        </div>
    </div>

    <section class="role-highlight">
        <div class="container">
            <!-- Agent Section -->
            <div class="role-card reveal-text">
                <div class="role-header">
                    <div class="role-icon"><i class="fas fa-user-tie"></i></div>
                    <div class="role-title">এজেন্ট হওয়ার সুবিধাসমূহ</div>
                </div>
                <div class="benefit-list-new">
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>সর্বোচ্চ কমিশন</h4>
                            <p>প্রতিটি সেবায় ফাউন্ডেশনের পক্ষ থেকে আকর্ষণীয় লভ্যাংশ সরাসরি আপনার একাউন্টে।</p>
                        </div>
                    </div>
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>বিজনেস সাপোর্ট</h4>
                            <p>আপনার এলাকায় ব্যবসা প্রসারে ফাউন্ডেশন থেকে মার্কেটিং ও লজিস্টিক সাপোর্ট প্রদান।</p>
                        </div>
                    </div>
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>আবাসিক বিমা সুবিধা</h4>
                            <p>তদন্ত সাপেক্ষে এজেন্টের পরিবারের জন্য বিশেষ আবাসিক বিমা ও আর্থিক সহায়তার সুযোগ।</p>
                        </div>
                    </div>
                </div>
                <div class="action-btns">
                    <a href="{{ route('become-agent') }}" class="btn btn-primary">এজেন্ট হিসেবে আবেদন করুন</a>
                    <a href="{{ route('agent-requirements') }}" class="btn btn-secondary" style="border: 1px solid #ddd; background: #fff; color: #333;">যোগ্যতা দেখুন</a>
                </div>
            </div>

            <!-- Sub-Agent Section -->
            <div class="role-card reveal-text delay-100">
                <div class="role-header">
                    <div class="role-icon"><i class="fas fa-users-cog"></i></div>
                    <div class="role-title">সাব-এজেন্ট হওয়ার সুবিধাসমূহ</div>
                </div>
                <div class="benefit-list-new">
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>সহজ প্রবেশাধিকার</h4>
                            <p>অল্প পুঁজিতে নিজের এলাকায় ফাউন্ডেশনের কার্যক্রম শুরু করার সুবর্ণ সুযোগ।</p>
                        </div>
                    </div>
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>প্রশিক্ষণ ও দক্ষতা</h4>
                            <p>ভেষজ ও কৃষি পণ্য বিপণনে ফাউন্ডেশনের পক্ষ থেকে বিশেষ প্রশিক্ষণ প্রদান করা হয়।</p>
                        </div>
                    </div>
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>সরাসরি তদারকি</h4>
                            <p>প্রধান এজেন্ট ও ফাউন্ডেশন থেকে সার্বক্ষণিক গাইডলাইন এবং কাজের স্বীকৃতি।</p>
                        </div>
                    </div>
                </div>
                <div class="action-btns">
                    <a href="{{ route('become-sub-agent') }}" class="btn btn-primary">সাব-এজেন্ট হিসেবে যুক্ত হোন</a>
                </div>
            </div>

            <!-- Member Section -->
            <div class="role-card reveal-text delay-200">
                <div class="role-header">
                    <div class="role-icon"><i class="fas fa-id-card"></i></div>
                    <div class="role-title">সাধারণ সদস্য হওয়ার সুবিধাসমূহ</div>
                </div>
                <div class="benefit-list-new">
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>মানবিক সহায়তা</h4>
                            <p>ফাউন্ডেশনের সকল মানবিক ও সামাজিক কার্যক্রমে সরাসরি অংশগ্রহণ ও অবদান রাখার সুযোগ।</p>
                        </div>
                    </div>
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>নেটওয়ার্কিং সুবিধা</h4>
                            <p>সারা দেশের বিশাল নেটওয়ার্কের সাথে যুক্ত হয়ে পেশাগত ও ব্যক্তিগত সম্পর্ক উন্নয়ন।</p>
                        </div>
                    </div>
                    <div class="benefit-item-new">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>বিশেষ সম্মাননা</h4>
                            <p>বার্ষিক সভায় সক্রিয় সদস্যদের কাজের স্বীকৃতিস্বরূপ সম্মাননা ও পুরস্কার প্রদান।</p>
                        </div>
                    </div>
                </div>
                <div class="action-btns">
                    <a href="{{ route('become-member') }}" class="btn btn-primary" style="background: var(--primary-color);">সদস্য পদের আবেদন করুন</a>
                </div>
            </div>
        </div>
    </section>
@endsection
