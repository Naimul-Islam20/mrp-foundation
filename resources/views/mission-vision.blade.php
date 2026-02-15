@extends('layouts.app')

@section('title', 'মিশন ও ভিশন - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/mission.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">আমাদের লক্ষ্য ও দৃষ্টিভঙ্গ</h1>
            <p class="reveal-text delay-100">জাতির উন্নয়নে আমাদের মিশন এবং ভিশন</p>
        </div>
    </div>

    <!-- Mission & Vision Content -->
    <section class="mission-section">
        <div class="container">
            <!-- Vision Row -->
            <div class="mission-row reverse reveal-text" id="vision-row-container">
                <div class="mission-image" id="vision-image-wrapper">
                    <div class="skeleton skeleton-image"></div>
                    <img id="vision-image" src="" alt="Our Vision" style="display: none;">
                </div>
                <div class="mission-content">
                    <div id="vision-skeleton-content">
                        <div class="skeleton skeleton-title"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text" style="width: 80%;"></div>
                    </div>
                    <h2 id="vision-title" style="display: none;"></h2>
                    <div id="vision-desc-container" style="display: none;"></div>
                    <ul class="mission-list" id="vision-list" style="display: none;"></ul>
                </div>
            </div>

            <!-- Mission Row -->
            <div class="mission-row reveal-text delay-200" id="mission-row-container">
                <div class="mission-image" id="mission-image-wrapper">
                    <div class="skeleton skeleton-image"></div>
                    <img id="mission-image" src="" alt="Our Mission" style="display: none;">
                </div>
                <div class="mission-content">
                    <div id="mission-skeleton-content">
                        <div class="skeleton skeleton-title"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text" style="width: 80%;"></div>
                    </div>
                    <h2 id="mission-title" style="display: none;"></h2>
                    <div id="mission-desc-container" style="display: none;"></div>
                    <ul class="mission-list" id="mission-list" style="display: none;"></ul>
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

@section('scripts')
    <script>
        async function fetchMissionData() {
            const apiUrl = `${API_BASE_URL}/our-missions`;
            const storageUrl = STORAGE_BASE_URL;
            const MISSION_CACHE_KEY = 'mrp_mission_cache';
            const VISION_CACHE_KEY = 'mrp_vision_cache';

            const updateSectionUI = (type, data, isCached = false) => {
                if (!data) return;
                
                const prefix = type === 'mission' ? 'mission' : 'vision';
                const container = document.getElementById(`${prefix}-row-container`);
                const titleEl = document.getElementById(`${prefix}-title`);
                const descContainer = document.getElementById(`${prefix}-desc-container`);
                const listEl = document.getElementById(`${prefix}-list`);
                const imgEl = document.getElementById(`${prefix}-image`);
                const skeletonContent = document.getElementById(`${prefix}-skeleton-content`);
                const skeletonImage = document.querySelector(`#${prefix}-image-wrapper .skeleton-image`);

                // 1. Hide Skeletons
                if (skeletonContent) skeletonContent.style.display = 'none';
                if (skeletonImage) skeletonImage.style.display = 'none';

                // 2. Update Content
                if (titleEl && data.title) {
                    titleEl.textContent = data.title;
                    titleEl.style.display = 'block';
                }
                
                if (descContainer && data.description) {
                    const originalDesc = data.description;
                    const paragraphs = originalDesc.split('\n').filter(p => p.trim() !== '');
                    descContainer.innerHTML = paragraphs.map(p => `<p style="margin-bottom: 1rem;">${p}</p>`).join('');
                    descContainer.style.display = 'block';
                }

                if (imgEl && data.image) {
                    const imgPath = data.image;
                    imgEl.src = imgPath.startsWith('http') ? imgPath : storageUrl + imgPath;
                    imgEl.style.display = 'block';
                }

                if (listEl && data.points) {
                    const pointsArray = Array.isArray(data.points) ? data.points : 
                                      (typeof data.points === 'string' ? data.points.split('\n').filter(p => p.trim() !== '') : []);
                    
                    if (pointsArray.length > 0) {
                        listEl.innerHTML = pointsArray.map(p => {
                            const pointText = typeof p === 'object' ? (p.text || p.title || p.point) : p;
                            return `<li><i class="fas fa-check-circle"></i> ${pointText}</li>`;
                        }).join('');
                        listEl.style.display = 'block';
                    }
                }

                // 3. Finalize Animations
                if (container) {
                    container.classList.add('active');
                    const reveals = container.querySelectorAll('.reveal-text');
                    reveals.forEach(el => {
                        el.classList.add('active');
                        el.style.opacity = '1';
                        el.style.transform = isCached ? 'none' : 'translateY(0)';
                    });
                }
            };

            // 1. Try Cache Immediately (No Skeleton if Cache Exists)
            const cachedMission = localStorage.getItem(MISSION_CACHE_KEY);
            const cachedVision = localStorage.getItem(VISION_CACHE_KEY);
            
            if (cachedMission) {
                try { updateSectionUI('mission', JSON.parse(cachedMission), true); } catch (e) {}
            }
            if (cachedVision) {
                try { updateSectionUI('vision', JSON.parse(cachedVision), true); } catch (e) {}
            }

            // 2. Fetch API
            try {
                const response = await fetch(apiUrl);
                if (response.ok) {
                    const data = await response.json();
                    
                    const missionData = data.find(item => item.title.includes('মিশন'));
                    const visionData = data.find(item => item.title.includes('ভিশন'));

                    if (missionData) {
                        updateSectionUI('mission', missionData, false);
                        localStorage.setItem(MISSION_CACHE_KEY, JSON.stringify(missionData));
                    }
                    if (visionData) {
                        updateSectionUI('vision', visionData, false);
                        localStorage.setItem(VISION_CACHE_KEY, JSON.stringify(visionData));
                    }
                }
            } catch (error) {
                console.error('Mission/Vision Fetch Error:', error);
                // On error, if no cache, we should at least stop skeleton animation or show something
            }
        }

        document.addEventListener('DOMContentLoaded', fetchMissionData);
    </script>
@endsection
