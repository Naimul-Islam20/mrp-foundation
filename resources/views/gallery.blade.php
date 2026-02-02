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
            <div class="gallery-grid" id="gallery-container">
                <!-- Skeleton Loaders -->
                <div class="gallery-item skeleton-item" style="height: 250px; background: #eee;"></div>
                <div class="gallery-item skeleton-item" style="height: 250px; background: #eee;"></div>
                <div class="gallery-item skeleton-item" style="height: 250px; background: #eee;"></div>
                <div class="gallery-item skeleton-item" style="height: 250px; background: #eee;"></div>
                <div class="gallery-item skeleton-item" style="height: 250px; background: #eee;"></div>
                <div class="gallery-item skeleton-item" style="height: 250px; background: #eee;"></div>
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
