@extends('layouts.app')

@section('title', 'ফটো গ্যালারি - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">ফটো গ্যালারি</h1>
            <p class="reveal-text delay-100" style="color: rgba(255,255,255,0.9); margin-top: 0.5rem;">আমাদের কিছু বিশেষ মুহূর্তের ছবি</p>
        </div>
    </div>

    <!-- Gallery Section -->
    <section class="section gallery-section">
        <div class="container">
            <div class="gallery-grid">
                <!-- Gallery Item 1 -->
                <div class="gallery-item reveal-text delay-100">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Clothes Distribution">
                    <div class="gallery-overlay">
                        <div class="gallery-title">বস্ত্র বিতরণ কর্মসূচি</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> জানুয়ারি ১৫, ২০২৬</div>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="gallery-item reveal-text delay-200">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Medical Camp">
                    <div class="gallery-overlay">
                        <div class="gallery-title">ফ্রি মেডিকেল ক্যাম্প</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> ফেব্রুয়ারি ০২, ২০২৬</div>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="gallery-item reveal-text delay-300">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Agent Conference">
                    <div class="gallery-overlay">
                        <div class="gallery-title">এজেন্ট সম্মেলন</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> মার্চ ১০, ২০২৬</div>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="gallery-item reveal-text delay-100">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Volunteers">
                    <div class="gallery-overlay">
                        <div class="gallery-title">স্বেচ্ছাসেবক দল</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> ডিসেম্বর ২০, ২০২৫</div>
                    </div>
                </div>

                <!-- Gallery Item 5 -->
                <div class="gallery-item reveal-text delay-200">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Education Support">
                    <div class="gallery-overlay">
                        <div class="gallery-title">প্রাথমিক শিক্ষা সহায়তা</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> নভেম্বর ১০, ২০২৫</div>
                    </div>
                </div>

                <!-- Gallery Item 6 -->
                <div class="gallery-item reveal-text delay-300">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Tree Plantation">
                    <div class="gallery-overlay">
                        <div class="gallery-title">বৃক্ষরোপণ অভিযান</div>
                        <div class="gallery-date"><i class="far fa-calendar-alt"></i> আগস্ট ১৫, ২০২৫</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <div class="lightbox-content-wrapper">
            <img class="lightbox-image" id="lightbox-image" src="">
            <div class="lightbox-caption" id="caption"></div>
        </div>
        <a class="lightbox-prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="lightbox-next" onclick="changeSlide(1)">&#10095;</a>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/gallery.js') }}"></script>
@endsection
