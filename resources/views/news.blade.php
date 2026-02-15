@extends('layouts.app')

@section('title', 'আমাদের সংবাদ - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">সর্বশেষ সংবাদ</h1>
            <p class="reveal-text delay-100" style="color: rgba(255,255,255,0.9); margin-top: 0.5rem;">আমাদের কার্যক্রম এবং অর্জনের সর্বশেষ আপডেট</p>
        </div>
    </div>

    <!-- News Section -->
    <section class="section event-section">
        <div class="container">
            <h2 class="section-title reveal-text">সাম্প্রতিক খবর</h2>
            
            <div class="event-grid" id="news-container">
                <script>
                    if (localStorage.getItem('mrp_news_cache_v1')) {
                        document.write('<style>#news-container .skeleton-item { display: none !important; }</style>');
                    }
                </script>
                <!-- Skeletons will be cleared by JS if cache exists -->
                <div class="event-card skeleton-item" style="height: 400px; background: #eee;"></div>
                <div class="event-card skeleton-item" style="height: 400px; background: #eee;"></div>
                <div class="event-card skeleton-item" style="height: 400px; background: #eee;"></div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsContainer = document.getElementById('news-container');
            const apiUrl = `${API_BASE_URL}/news`;
            const storageUrl = STORAGE_BASE_URL;
            const CACHE_KEY = 'mrp_news_cache_v1';

            // Function to render news cards
            function renderNews(data, isCached = false) {
                if (!newsContainer) return;
                newsContainer.innerHTML = '';
                
                data.forEach((news, index) => {
                    const delay = isCached ? 0 : (index + 1) * 100;
                    const imageUrl = news.image 
                        ? (news.image.startsWith('http') ? news.image : storageUrl + news.image) 
                        : '';
                    
                    let day = '', month = '';
                    if (news.date) {
                        const newsDate = new Date(news.date);
                        day = newsDate.getDate();
                        month = newsDate.toLocaleString('en-US', { month: 'short' });
                    }

                    // For cached items, we don't use 'reveal-text' to avoid movement
                    const animationClass = isCached ? '' : 'reveal-text active';
                    const delayStyle = isCached ? '' : `style="transition-delay: ${delay}ms; opacity: 1; transform: translateY(0);"`;

                    const card = `
                        <div class="event-card ${animationClass}" ${delayStyle} style="opacity: 1; transform: none;">
                            <div class="event-image">
                                <img src="${imageUrl}" alt="${news.title || ''}" loading="eager">
                                <div class="event-date-badge">
                                    <span class="day">${day}</span>
                                    <span class="month">${month}</span>
                                </div>
                            </div>
                            <div class="event-details">
                                <div class="event-category">${news.type_name || 'সংবাদ'}</div>
                                <h3 class="event-title">${news.title || ''}</h3>
                                <div class="event-meta">
                                    <span><i class="fas fa-user-edit"></i> ${news.post_by || 'Admin'}</span>
                                    <span><i class="far fa-calendar-alt"></i> ${news.date || ''}</span>
                                </div>
                                <p class="event-desc">${news.description ? (news.description.length > 120 ? news.description.substring(0, 120) + '...' : news.description) : ''}</p>
                                <div class="event-footer">
                                    <a href="#" class="btn btn-outline" style="color: var(--secondary-color); border-color: var(--secondary-color); width: 100%; text-align: center;">বিস্তারিত পড়ুন</a>
                                </div>
                            </div>
                        </div>
                    `;
                    newsContainer.insertAdjacentHTML('beforeend', card);
                });
            }

            // Stale-While-Revalidate Logic
            async function fetchNews() {
                // 1. Load from Cache immediately
                const cachedDataStr = localStorage.getItem(CACHE_KEY);
                if (cachedDataStr) {
                    try {
                        const cachedData = JSON.parse(cachedDataStr);
                        console.log('Serving News from cache...');
                        renderNews(cachedData, true); // True means isCached
                    } catch(e) {
                         console.error('Cache parse error:', e);
                    }
                }

                // 2. Fetch from API in background
                try {
                    const response = await fetch(apiUrl);
                    if (!response.ok) throw new Error('API Sync Failed');
                    
                    const result = await response.json();
                    const newData = result.data || result;

                    if (Array.isArray(newData)) {
                        const newDataStr = JSON.stringify(newData);
                        
                        // 3. Compare and Update if different
                        if (newDataStr !== cachedDataStr) {
                            console.log('News updated! Refreshing UI...');
                            renderNews(newData);
                            localStorage.setItem(CACHE_KEY, newDataStr);
                        } else {
                            console.log('News is already up to date.');
                        }
                    }
                } catch (error) {
                    console.error('❌ News Background Fetch Error:', error);
                    if (!cachedDataStr) {
                        newsContainer.innerHTML = '<div class="text-center" style="grid-column: 1/-1;"><p style="color: red;">ডেটা লোড করতে সমস্যা হয়েছে।</p></div>';
                    }
                }
            }

            fetchNews();
        });
    </script>
@endsection
