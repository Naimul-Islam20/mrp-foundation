@extends('layouts.app')

@section('title', 'সার্টিফিকেশন ও অনুমোদন - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/certification.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">সার্টিফিকেশন ও অনুমোদন</h1>
            <p class="reveal-text delay-100">আমাদের বৈধতা ও যোগ্যতার সনদপত্রসমূহ</p>
        </div>
    </div>

    <!-- Certification Section -->
    <section class="cert-section">
        <div class="container">
            <!-- Category Filter -->
            <div class="cert-filter reveal-text">
                <button class="filter-btn active" data-category="all">সকল সার্টিফিকেট</button>
                <button class="filter-btn" data-category="legal">আইনি দলিল</button>
                <button class="filter-btn" data-category="registration">নিবন্ধন</button>
                <button class="filter-btn" data-category="tax">কর সংক্রান্ত</button>
            </div>

            <!-- Certificate Grid -->
            <div class="cert-grid">
                <!-- Certificate 1 -->
                <div class="cert-card reveal-text delay-100" data-category="legal">
                    <div class="cert-card-image">
                        <img src="https://dummyimage.com/600x400/eeeeee/469946&text=Trade+License" alt="Trade License">
                    </div>
                    <div class="cert-card-body">
                        <span class="cert-category">আইনি দলিল</span>
                        <h3 class="cert-card-title">ট্রেড লাইসেন্স</h3>
                        <div class="cert-card-meta">
                            <span><i class="fas fa-hashtag"></i> 12345/2020</span>
                            <span><i class="far fa-calendar-alt"></i> ২০২০</span>
                        </div>
                        <p class="cert-card-desc">
                            বাংলাদেশ সরকার অনুমোদিত বৈধ ব্যবসায়িক লাইসেন্স। সকল নিয়ম মেনে পরিচালিত।
                        </p>
                        <div class="cert-card-action">
                            <button class="view-btn" onclick="openModal(this)">
                                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
                            </button>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Certificate 2 -->
                <div class="cert-card reveal-text delay-200" data-category="registration">
                    <div class="cert-card-image">
                        <img src="https://dummyimage.com/600x400/eeeeee/469946&text=NGO+Registration" alt="NGO Registration">
                    </div>
                    <div class="cert-card-body">
                        <span class="cert-category">নিবন্ধন</span>
                        <h3 class="cert-card-title">এনজিও ব্যুরো নিবন্ধন</h3>
                        <div class="cert-card-meta">
                            <span><i class="fas fa-hashtag"></i> NGO-9876</span>
                            <span><i class="far fa-calendar-alt"></i> ২০২১</span>
                        </div>
                        <p class="cert-card-desc">
                            এনজিও বিষয়ক ব্যুরো কর্তৃক নিবন্ধিত। স্বচ্ছ ও জবাবদিহিমূলক কার্যক্রম।
                        </p>
                        <div class="cert-card-action">
                            <button class="view-btn" onclick="openModal(this)">
                                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
                            </button>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Certificate 3 -->
                <div class="cert-card reveal-text delay-300" data-category="tax">
                    <div class="cert-card-image">
                        <img src="https://dummyimage.com/600x400/eeeeee/469946&text=TIN+Certificate" alt="TIN Certificate">
                    </div>
                    <div class="cert-card-body">
                        <span class="cert-category">কর সংক্রান্ত</span>
                        <h3 class="cert-card-title">টিন সার্টিফিকেট</h3>
                        <div class="cert-card-meta">
                            <span><i class="fas fa-hashtag"></i> 1122334455</span>
                            <span><i class="far fa-calendar-alt"></i> সক্রিয়</span>
                        </div>
                        <p class="cert-card-desc">
                            নিয়মিত কর প্রদানকারী প্রতিষ্ঠান। আর্থিক লেনদেন সম্পূর্ণ স্বচ্ছ।
                        </p>
                        <div class="cert-card-action">
                            <button class="view-btn" onclick="openModal(this)">
                                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
                            </button>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Certificate 4 -->
                <div class="cert-card reveal-text delay-400" data-category="tax">
                    <div class="cert-card-image">
                        <img src="https://dummyimage.com/600x400/eeeeee/469946&text=VAT+Registration" alt="VAT Registration">
                    </div>
                    <div class="cert-card-body">
                        <span class="cert-category">কর সংক্রান্ত</span>
                        <h3 class="cert-card-title">ভ্যাট নিবন্ধন</h3>
                        <div class="cert-card-meta">
                            <span><i class="fas fa-hashtag"></i> 000123456-7890</span>
                            <span><i class="far fa-calendar-alt"></i> যাচাইকৃত</span>
                        </div>
                        <p class="cert-card-desc">
                            ব্যবসায়িক আইনি কাঠামো মেনে চলার অংশ হিসেবে ভ্যাট নিবন্ধন।
                        </p>
                        <div class="cert-card-action">
                            <button class="view-btn" onclick="openModal(this)">
                                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
                            </button>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Certificate 5 -->
                <div class="cert-card reveal-text delay-500" data-category="registration">
                    <div class="cert-card-image">
                        <img src="https://dummyimage.com/600x400/eeeeee/469946&text=Company+Registration" alt="Company Registration">
                    </div>
                    <div class="cert-card-body">
                        <span class="cert-category">নিবন্ধন</span>
                        <h3 class="cert-card-title">কোম্পানি নিবন্ধন</h3>
                        <div class="cert-card-meta">
                            <span><i class="fas fa-hashtag"></i> C-123456</span>
                            <span><i class="far fa-calendar-alt"></i> ২০১৮</span>
                        </div>
                        <p class="cert-card-desc">
                            রেজিস্ট্রার অফ জয়েন্ট স্টক কোম্পানিজ কর্তৃক নিবন্ধিত।
                        </p>
                        <div class="cert-card-action">
                            <button class="view-btn" onclick="openModal(this)">
                                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
                            </button>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Certificate 6 -->
                <div class="cert-card reveal-text delay-600" data-category="legal">
                    <div class="cert-card-image">
                        <img src="https://dummyimage.com/600x400/eeeeee/469946&text=Fire+License" alt="Fire License">
                    </div>
                    <div class="cert-card-body">
                        <span class="cert-category">আইনি দলিল</span>
                        <h3 class="cert-card-title">ফায়ার লাইসেন্স</h3>
                        <div class="cert-card-meta">
                            <span><i class="fas fa-hashtag"></i> FL-7890</span>
                            <span><i class="far fa-calendar-alt"></i> ২০২২</span>
                        </div>
                        <p class="cert-card-desc">
                            অগ্নি নিরাপত্তা বিধি মেনে চলার সার্টিফিকেট। নিরাপদ কর্মপরিবেশ।
                        </p>
                        <div class="cert-card-action">
                            <button class="view-btn" onclick="openModal(this)">
                                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
                            </button>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Certificate View -->
    <div class="cert-modal" id="certModal">
        <button class="modal-close" onclick="closeModal()">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal-content">
            <img src="" alt="Certificate" class="modal-image" id="modalImage">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Category Filter
        const filterBtns = document.querySelectorAll('.filter-btn');
        const certCards = document.querySelectorAll('.cert-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                btn.classList.add('active');

                const category = btn.dataset.category;

                certCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Modal Functions
        function openModal(btn) {
            const card = btn.closest('.cert-card');
            const img = card.querySelector('.cert-card-image img');
            const modal = document.getElementById('certModal');
            const modalImg = document.getElementById('modalImage');
            
            modalImg.src = img.src;
            modal.classList.add('active');
        }

        function closeModal() {
            const modal = document.getElementById('certModal');
            modal.classList.remove('active');
        }

        // Close modal on outside click
        document.getElementById('certModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
