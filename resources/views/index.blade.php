@extends('layouts.app')

@section('title', 'MRP Foundation - মানুষের সেবায় সর্বদা')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
    <style>
        .image-skeleton-wrapper {
            width: 100%;
            height: 100%;
            min-height: 300px;
            border-radius: 12px;
            overflow: hidden;
            background: #f1f5f9;
        }
        .image-skeleton-wrapper.skeleton img {
            opacity: 0;
        }
        .image-skeleton-wrapper img {
            transition: opacity 0.3s ease-in;
            opacity: 1;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
      <script>
        (function() {
            const cached = localStorage.getItem('mrp_home_cache');
            if (cached) {
                try {
                    const data = JSON.parse(cached);
                    const STORAGE_URL = STORAGE_BASE_URL;
                    
                    // Hero Data
                    const heroData = data.find(item => item.id === 1);
                    if (heroData) {
                        document.write('<style>#hero-title, #hero-description, #hero-image-src { visibility: hidden; }</style>');
                        document.addEventListener('DOMContentLoaded', () => {
                            const title = document.getElementById('hero-title');
                            const desc = document.getElementById('hero-description');
                            const img = document.getElementById('hero-image-src');
                            
                            if (title) title.textContent = heroData.title;
                            if (desc) desc.textContent = heroData.description;
                            if (img && heroData.image) {
                                img.src = heroData.image.startsWith('http') ? heroData.image : STORAGE_URL + heroData.image;
                                // Skeleton will be removed by onload attribute on img
                            }
                            
                            if (title) title.style.visibility = 'visible';
                            if (desc) desc.style.visibility = 'visible';
                            if (img) img.style.visibility = 'visible';
                        });
                    }

                    // About Data
                    const aboutData = data.find(item => item.id === 2);
                    if (aboutData) {
                        document.write('<style>#about-subtitle, #about-description, #about-image-src { visibility: hidden; }</style>');
                        document.addEventListener('DOMContentLoaded', () => {
                            const title = document.getElementById('about-subtitle');
                            const desc = document.getElementById('about-description');
                            const img = document.getElementById('about-image-src');
                            
                            if (title) title.textContent = aboutData.title;
                            if (desc) desc.textContent = aboutData.description;
                            if (img && aboutData.image) {
                                img.src = aboutData.image.startsWith('http') ? aboutData.image : STORAGE_URL + aboutData.image;
                            }
                            
                            if (title) title.style.visibility = 'visible';
                            if (desc) desc.style.visibility = 'visible';
                            if (img) img.style.visibility = 'visible';
                        });
                    }
                } catch (e) {}
            }
        })();
      </script>
      <div class="container hero-container">
        <div class="hero-text">
          <h1 class="reveal-text delay-100" id="hero-title"></h1>
          <p class="reveal-text delay-200" id="hero-description"></p>
          <a
            href="{{ route('become-agent') }}"
            class="btn btn-primary reveal-text delay-300"
            >এজেন্টশিপের জন্য আবেদন করুন</a
          >
          <a
            href="{{ route('become-member') }}"
            class="btn btn-secondary-white reveal-text delay-300"
            style="margin-left: 14px"
            >সদস্য হোন</a
          >
        </div>
        <div class="hero-image">
          <div class="image-skeleton-wrapper skeleton" id="hero-skeleton">
            <img
              id="hero-image-src"
              src="{{ asset('assets/images/placeholder-transparent.png') }}"
              alt="Volunteers helping community"
              onload="this.parentElement.classList.remove('skeleton')"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section about-section">
      <div class="container">
        <h2 class="section-title reveal-text">কেন আমাদের সাথে কাজ করবেন?</h2>

        <div class="about-container">
          <div class="about-image reveal-text">
            <div class="image-skeleton-wrapper skeleton" id="about-skeleton">
              <img
                id="about-image-src"
                src="{{ asset('assets/images/placeholder-transparent.png') }}"
                alt="Business Partnership"
                onload="this.parentElement.classList.remove('skeleton')"
              />
            </div>
          </div>
          <div class="about-content">
            <h3
              id="about-subtitle"
              class="mb-1 reveal-text delay-100"
              style="color: var(--primary-dark)"
            ></h3>
            <p id="about-description" class="mb-1 reveal-text delay-200"></p>

            <ul id="about-benefits-list" class="benefits-list reveal-text delay-200"></ul>

            <a
              href="{{ route('become-agent') }}"
              class="btn btn-primary mt-1 reveal-text delay-400"
              >আজই যুক্ত হোন</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
      <div class="container">
        <h2 class="section-title reveal-text">যোগাযোগ করুন</h2>
        <div class="contact-container">
          <!-- Contact Info -->
          <div class="contact-info">
            <div class="contact-item reveal-text delay-100">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-details">
                <h4>আমাদের ঠিকানা</h4>
                <p id="home-address"></p>
              </div>
            </div>

            <div class="contact-item reveal-text delay-200">
              <div class="contact-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="contact-details">
                <h4>ফোন নম্বর</h4>
                <p id="home-phone"></p>
              </div>
            </div>

            <div class="contact-item reveal-text delay-300">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-details">
                <h4>ইমেইল</h4>
                <p id="home-email"></p>
              </div>
            </div>
          </div>

          <!-- Map -->
          <div class="contact-map reveal-text delay-200" style="position: relative; overflow: hidden; background: #eee; display: flex; align-items: center; justify-content: center; min-height: 350px; border-radius: 12px;">
            <iframe
              id="home-contact-map"
              src=""
              loading="lazy"
              style="border:0; display: none; width: 100%; height: 100%; position: absolute; top: 0; left: 0;"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
            <div id="home-map-placeholder" style="text-align: center; color: #999;">
                <i class="fas fa-map-marked-alt" style="font-size: 2.5rem; margin-bottom: 1rem; display: block;"></i>
                <p>ম্যাপ লোড হচ্ছে...</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const API_URL = `${API_BASE_URL}/homes`;
            const STORAGE_URL = STORAGE_BASE_URL;
            const CACHE_KEY = 'mrp_home_cache';

            function updateHomeUI(data) {
                if (!data) return;

                // Hero Data (Usually id 1)
                const heroData = data.find(item => item.id === 1);
                if (heroData) {
                    const heroTitle = document.getElementById('hero-title');
                    const heroDesc = document.getElementById('hero-description');
                    const heroImg = document.getElementById('hero-image-src');

                    if (heroTitle) heroTitle.textContent = heroData.title;
                    if (heroDesc) heroDesc.textContent = heroData.description;
                    if (heroImg && heroData.image) {
                        heroImg.src = heroData.image.startsWith('http') ? heroData.image : STORAGE_URL + heroData.image;
                    }
                }

                // About Data (Usually id 2)
                const aboutData = data.find(item => item.id === 2);
                if (aboutData) {
                    const aboutSubtitle = document.getElementById('about-subtitle');
                    const aboutDesc = document.getElementById('about-description');
                    const aboutImg = document.getElementById('about-image-src');
                    const aboutBenefitsList = document.getElementById('about-benefits-list');

                    if (aboutSubtitle) aboutSubtitle.textContent = aboutData.title;
                    if (aboutDesc) aboutDesc.textContent = aboutData.description;
                    if (aboutImg && aboutData.image) {
                        aboutImg.src = aboutData.image.startsWith('http') ? aboutData.image : STORAGE_URL + aboutData.image;
                    }

                    if (aboutBenefitsList && aboutData.points && aboutData.points.length > 0) {
                        aboutBenefitsList.innerHTML = aboutData.points.map(point => `
                            <li>
                                <i class="fas fa-check-circle"></i> ${point}
                            </li>
                        `).join('');
                    }
                }
            }

            // Load from cache first
            const cachedData = localStorage.getItem(CACHE_KEY);
            if (cachedData) {
                try {
                    updateHomeUI(JSON.parse(cachedData));
                } catch (e) {
                    console.error('Cache parse error:', e);
                }
            }

            // Fetch from API
            fetch(API_URL)
                .then(response => response.json())
                .then(data => {
                    updateHomeUI(data);
                    localStorage.setItem(CACHE_KEY, JSON.stringify(data));
                })
                .catch(error => console.error('Error fetching home data:', error));

            // Map Logic from Cache
            function loadHomeMap() {
                const mapIframe = document.getElementById('home-contact-map');
                const placeholder = document.getElementById('home-map-placeholder');
                if (!mapIframe) return false;
                
                const cached = localStorage.getItem('mrp_details_cache');
                if (cached) {
                    try {
                        const cachedData = JSON.parse(cached);
                        const info = (cachedData.status && cachedData.data && cachedData.data[0]) ? cachedData.data[0] : cachedData;
                        
                        if (info && info.map_url) {
                            let embedUrl = info.map_url;
                            
                            if (embedUrl.includes('google.com/maps') && !embedUrl.includes('/embed')) {
                                const coordMatch = embedUrl.match(/@(-?\d+\.\d+),(-?\d+\.\d+)/);
                                if (coordMatch) {
                                    embedUrl = `https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.0!2d${coordMatch[2]}!3d${coordMatch[1]}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1`;
                                }
                            }
                            
                            mapIframe.src = embedUrl;
                            mapIframe.style.display = 'block';
                            if (placeholder) placeholder.style.display = 'none';
                            return true;
                        }
                    } catch (e) {}
                }
                return false;
            }

            let mapLoaded = loadHomeMap();
            if (!mapLoaded) {
                let attempts = 0;
                const poll = setInterval(() => {
                    attempts++;
                    mapLoaded = loadHomeMap();
                    if (mapLoaded || attempts > 10) clearInterval(poll);
                }, 1000);
            }
        });
    </script>
@endsection

