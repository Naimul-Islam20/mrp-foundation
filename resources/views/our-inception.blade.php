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
        <div class="container" id="inception-story-container">
            <script>
                // Zero-flicker: If cache exists, we hide placeholders immediately
                if (localStorage.getItem('mrp_inception_cache')) {
                    document.write('<style>#inception-story-container .story-wrapper { opacity: 0; }</style>');
                }
            </script>
            <div class="story-wrapper">
                <div class="story-image reveal-text" id="inception-image-container">
                    <img id="inception-image" src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="আমাদের শুরুর গল্প">
                </div>
                <div class="story-content reveal-text delay-100">
                    <h2 id="inception-title">আমাদের শুরুর গল্প</h2>
                    <div id="inception-desc">
                        <p class="story-text">
                            ২০১৮ সালে উত্তরা, ঢাকার একটি ছোট্ট অফিস থেকে শুরু হয়েছিল এমআরপি ফাউন্ডেশনের যাত্রা। মাত্র পাঁচজন স্বপ্নবাজ মানুষের হাত ধরে যে স্বপ্ন দেখা শুরু হয়েছিল, আজ তা হাজার হাজার মানুষের জীবনে আলো ছড়াচ্ছে।
                        </p>
                        <p class="story-text">
                            আমাদের লক্ষ্য ছিল সহজ কিন্তু শক্তিশালী - প্রতিটি মানুষের মৌলিক অধিকার নিশ্চিত করা এবং একটি বৈষম্যহীন সমাজ গড়ে তোলা। শিক্ষা, স্বাস্থ্য এবং কর্মসংস্থান - এই তিনটি মূল স্তম্ভের উপর দাঁড়িয়ে আমরা এগিয়ে চলেছি প্রতিদিন।
                        </p>
                    </div>
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

            <div class="timeline-horizontal" id="milestones-container">
                <script>
                    if (localStorage.getItem('mrp_milestones_cache')) {
                        document.write('<style>#milestones-container .timeline-card { visibility: hidden; }</style>');
                    }
                </script>
                <!-- Initial Static Content (Fallback) -->
                <div class="timeline-card reveal-text delay-100">
                    <span class="timeline-year">২০১৮</span>
                    <h3 class="timeline-title">যাত্রার শুরু</h3>
                    <p class="timeline-desc">উত্তরা, ঢাকায় মাত্র ৫ জন সদস্য নিয়ে প্রতিষ্ঠানের যাত্রা শুরু।</p>
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

            <div class="team-grid" id="team-grid">
                <script>
                    if (localStorage.getItem('mrp_leadership_cache')) {
                        document.write('<style>#team-grid .team-card { visibility: hidden; }</style>');
                    }
                </script>
                <!-- Initial Static Content (Fallback) -->
                <div class="team-card reveal-text delay-100">
                    <div class="team-img">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Chairman">
                    </div>
                    <div class="team-info">
                        <h3 class="team-name">মোঃ আব্দুল করিম</h3>
                        <span class="team-role">প্রতিষ্ঠাতা ও চেয়ারম্যান</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Fetch and Populate Inception Story
        async function fetchInceptionData() {
            const apiUrl = `${API_BASE_URL}/our-initials`;
            const storageUrl = STORAGE_BASE_URL;
            const CACHE_KEY = 'mrp_inception_cache';
            
            const titleEl = document.getElementById('inception-title');
            const descEl = document.getElementById('inception-desc');
            const imgEl = document.getElementById('inception-image');
            const wrapper = document.querySelector('.story-wrapper');

            const updateUI = (data, isCached = false) => {
                if (!data) return;
                
                // Handle different response structures (Array, Object with data key, etc.)
                let item = null;
                if (Array.isArray(data)) {
                    item = data[0];
                } else if (data.data) {
                    item = Array.isArray(data.data) ? data.data[0] : data.data;
                } else {
                    item = data;
                }

                if (!item) return;
                console.log('Inception Item Data:', item);

                if (titleEl && item.title) titleEl.textContent = item.title;
                
                if (descEl && (item.description || item.desc)) {
                    const originalDesc = item.description || item.desc;
                    // Split description by newlines into paragraphs
                    const paragraphs = originalDesc.split('\n').filter(p => p.trim() !== '');
                    descEl.innerHTML = paragraphs.map(p => `<p class="story-text">${p}</p>`).join('');
                }

                if (imgEl && (item.image || item.photo || item.img)) {
                    const imgPath = item.image || item.photo || item.img;
                    const fullImgUrl = imgPath.startsWith('http') ? imgPath : storageUrl + imgPath;
                    imgEl.src = fullImgUrl;
                }

                if (wrapper) {
                    wrapper.style.opacity = '1';
                    wrapper.style.transition = 'opacity 0.3s ease-in-out';
                    
                    const reveals = wrapper.parentElement.querySelectorAll('.reveal-text');
                    reveals.forEach(el => {
                        el.classList.add('active');
                        el.style.opacity = '1';
                        el.style.transform = isCached ? 'none' : 'translateY(0)';
                    });
                }
            };

            // 1. Try Cache
            const cached = localStorage.getItem(CACHE_KEY);
            if (cached) {
                try {
                    const cachedParsed = JSON.parse(cached);
                    updateUI(cachedParsed, true);
                } catch (e) { console.error('Cache error:', e); }
            }

            // 2. Fetch API
            try {
                const response = await fetch(apiUrl);
                if (response.ok) {
                    const result = await response.json();
                    console.log('API Raw Result:', result);
                    const newData = result.data || result;
                    
                    if (JSON.stringify(newData) !== cached) {
                        updateUI(newData, false);
                        localStorage.setItem(CACHE_KEY, JSON.stringify(newData));
                    }
                } else {
                    throw new Error('Server returned error');
                }
            } catch (error) {
                console.error('Inception Fetch Error:', error);
                // Fallback: Make existing content visible if no cache and API fails
                if (!cached && wrapper) wrapper.style.opacity = '1';
            }
        }

        // Animated Counter for Statistics
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const suffix = element.getAttribute('data-suffix') || '';
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                let displayValue = Math.floor(current);
                if (suffix === 'K+' && target >= 1000) {
                    displayValue = Math.floor(current / 1000);
                    element.textContent = displayValue + suffix;
                } else {
                    element.textContent = displayValue + suffix;
                }
            }, 16);
        }

        // Fetch and Populate Milestones Timeline
        async function fetchMilestones() {
            const apiUrl = `${API_BASE_URL}/our-milestones`;
            const CACHE_KEY = 'mrp_milestones_cache';
            const container = document.getElementById('milestones-container');
            if (!container) return;

            const renderMilestones = (data, isCached = false) => {
                if (!Array.isArray(data) || data.length === 0) return;
                
                container.innerHTML = ''; // Start clean
                
                data.forEach((item, index) => {
                    const year = item.year || '';
                    const title = item.title || '';
                    const desc = item.description || item.desc || '';
                    const delay = isCached ? 0 : (index + 1) * 100;
                    const animationClass = isCached ? '' : 'reveal-text active';
                    const delayStyle = isCached ? 'style="transform: none; opacity: 1; transition: none;"' : `style="transition-delay: ${delay}ms; opacity: 1;"`;

                    const card = `
                        <div class="timeline-card ${animationClass}" ${delayStyle}>
                            <span class="timeline-year">${year}</span>
                            <h3 class="timeline-title">${title}</h3>
                            <p class="timeline-desc">${desc}</p>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', card);
                });
            };

            // 1. Try Cache
            const cached = localStorage.getItem(CACHE_KEY);
            if (cached) {
                try {
                    renderMilestones(JSON.parse(cached), true);
                } catch (e) { console.error('Milestones cache error:', e); }
            }

            // 2. Fetch API
            try {
                const response = await fetch(apiUrl);
                if (response.ok) {
                    const result = await response.json();
                    const newData = result.data || result;
                    if (Array.isArray(newData) && JSON.stringify(newData) !== cached) {
                        renderMilestones(newData, false);
                        localStorage.setItem(CACHE_KEY, JSON.stringify(newData));
                    }
                }
            } catch (error) {
                console.error('Milestones Fetch Error:', error);
            }
        }

        // Fetch and Populate Leadership Team
        async function fetchLeadershipData() {
            const apiUrl = `${API_BASE_URL}/our-leaderships`;
            const storageUrl = STORAGE_BASE_URL;
            const CACHE_KEY = 'mrp_leadership_cache';
            const container = document.getElementById('team-grid');
            if (!container) return;

            const renderTeam = (data, isCached = false) => {
                const teamData = Array.isArray(data) ? data : (data.data || []);
                if (teamData.length === 0) return;

                container.innerHTML = '';
                teamData.forEach((member, index) => {
                    const delay = isCached ? 0 : (index + 1) * 100;
                    const animationClass = isCached ? '' : 'reveal-text active';
                    const delayStyle = isCached ? 'style="transform: none; opacity: 1; transition: none;"' : `style="transition-delay: ${delay}ms; opacity: 1;"`;
                    
                    const imageUrl = member.image 
                        ? (member.image.startsWith('http') ? member.image : storageUrl + member.image)
                        : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';

                    const card = `
                        <div class="team-card ${animationClass}" ${delayStyle}>
                            <div class="team-img">
                                <img src="${imageUrl}" alt="${member.name || ''}" loading="eager">
                            </div>
                            <div class="team-info">
                                <h3 class="team-name">${member.name || ''}</h3>
                                <span class="team-role">${member.designation || member.role || ''}</span>
                                <p class="team-bio">${member.description || member.bio || ''}</p>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', card);
                });
            };

            // 1. Try Cache
            const cached = localStorage.getItem(CACHE_KEY);
            if (cached) {
                try {
                    renderTeam(JSON.parse(cached), true);
                } catch (e) { console.error('Leadership cache error:', e); }
            }

            // 2. Fetch API
            try {
                const response = await fetch(apiUrl);
                if (response.ok) {
                    const result = await response.json();
                    const newData = result.data || result;
                    if (JSON.stringify(newData) !== cached) {
                        renderTeam(newData, false);
                        localStorage.setItem(CACHE_KEY, JSON.stringify(newData));
                    }
                }
            } catch (error) {
                console.error('Leadership Fetch Error:', error);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchInceptionData();
            fetchMilestones();
            fetchLeadershipData();

            // Stats Counter logic
            const observerOptions = { threshold: 0.5 };
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = entry.target.querySelectorAll('.stat-number');
                        counters.forEach(counter => animateCounter(counter));
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const statsGrid = document.querySelector('.stats-grid');
            if (statsGrid) statsObserver.observe(statsGrid);
        });
    </script>
@endsection
