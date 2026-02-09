@extends('layouts.app')

@section('title', 'ক্যারিয়ার - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/career.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">আমাদের সাথে যোগ দিন</h1>
            <p class="reveal-text delay-100">এমআরপি ফাউন্ডেশনে ক্যারিয়ার গড়ুন এবং সমাজ পরিবর্তনের অংশীদার হন।</p>
        </div>
    </div>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="section-header">
                <h2 class="reveal-text">কেন আমাদের সাথে কাজ করবেন?</h2>
                <p class="reveal-text delay-100">আমরা আপনার ক্যারিয়ার এবং ব্যক্তিগত উন্নয়নে প্রতিশ্রুতিবদ্ধ</p>
            </div>

            <div class="benefits-grid">
                <div class="benefit-card reveal-text delay-200">
                    <div class="benefit-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h3 class="benefit-title">প্রতিযোগিতামূলক বেতন</h3>
                    <p class="benefit-desc">
                        বাজার অনুযায়ী প্রতিযোগিতামূলক বেতন এবং বার্ষিক বৃদ্ধির সুযোগ।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-200">
                    <div class="benefit-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="benefit-title">প্রশিক্ষণ ও উন্নয়ন</h3>
                    <p class="benefit-desc">
                        নিয়মিত প্রশিক্ষণ এবং দক্ষতা উন্নয়নের সুযোগ।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-300">
                    <div class="benefit-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="benefit-title">স্বাস্থ্য বীমা</h3>
                    <p class="benefit-desc">
                        কর্মচারী এবং পরিবারের জন্য স্বাস্থ্য বীমা সুবিধা।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-100">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="benefit-title">দলগত পরিবেশ</h3>
                    <p class="benefit-desc">
                        সহযোগিতামূলক এবং বন্ধুত্বপূর্ণ কর্ম পরিবেশ।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-200">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="benefit-title">নমনীয় সময়</h3>
                    <p class="benefit-desc">
                        কাজ এবং জীবনের ভারসাম্যের জন্য নমনীয় কর্মঘণ্টা।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-300">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="benefit-title">ক্যারিয়ার বৃদ্ধি</h3>
                    <p class="benefit-desc">
                        দ্রুত ক্যারিয়ার বৃদ্ধি এবং পদোন্নতির সুযোগ।
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions Section -->
    <section class="jobs-section">
        <div class="container">
            <div class="section-header">
                <h2 class="reveal-text">বর্তমান খালি পদসমূহ</h2>
                <p class="reveal-text delay-100">আপনার উপযুক্ত পদে আবেদন করুন</p>
            </div>

            <div class="jobs-grid" id="jobs-container">
                <!-- Skeleton Loading State -->
                @for ($i = 0; $i < 3; $i++)
                <div class="job-card" style="opacity: 1; transform: none;">
                    <div class="job-info">
                        <div class="skeleton skeleton-title"></div>
                        <div class="job-meta">
                            <div class="skeleton skeleton-meta"></div>
                            <div class="skeleton skeleton-meta"></div>
                            <div class="skeleton skeleton-meta"></div>
                        </div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text" style="width: 80%;"></div>
                        <div class="job-tags" style="margin-top: 1rem;">
                            <div class="skeleton skeleton-tag"></div>
                            <div class="skeleton skeleton-tag"></div>
                        </div>
                    </div>
                    <div class="job-action">
                        <div class="skeleton skeleton-btn"></div>
                        <div class="skeleton skeleton-meta" style="width: 80px;"></div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="application-section" id="applicationForm">
        <div class="container">
            <div class="section-header">
                <h2 class="reveal-text">অনলাইন আবেদন</h2>
                <p class="reveal-text delay-100">নিচের ফর্মটি পূরণ করে আবেদন করুন</p>
            </div>

            <form id="jobApplicationForm" class="application-form reveal-text delay-200">
                <div class="form-group">
                    <label for="fullName">পূর্ণ নাম *</label>
                    <input type="text" id="fullName" name="full_name" required>
                </div>

                <div class="form-group">
                    <label for="email">ইমেইল *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">মোবাইল নম্বর *</label>
                    <input type="tel" id="phone" name="mobile_no" required>
                </div>

                <div class="form-group">
                    <label for="position">আবেদনকৃত পদ *</label>
                    <select id="position" name="apply_for_post" required>
                        <option value="">পদ নির্বাচন করুন</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">কাজের অভিজ্ঞতা (বছর) *</label>
                    <input type="number" id="experience" name="experience" min="0" required>
                </div>

                <div class="form-group">
                    <label for="education">শিক্ষাগত যোগ্যতা *</label>
                    <input type="text" id="education" name="educational_qualifications" placeholder="যেমন: স্নাতক (সমাজবিজ্ঞান)" required>
                </div>

                <div class="form-group">
                    <label for="coverLetter">কভার লেটার *</label>
                    <textarea id="coverLetter" name="cover_letter" placeholder="কেন আপনি এই পদের জন্য উপযুক্ত তা সংক্ষেপে লিখুন..." required></textarea>
                </div>

                <div class="form-group">
                    <label>সিভি আপলোড করুন (PDF) *</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="resume" name="cv_upload" accept=".pdf" required>
                        <label for="resume" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i> ফাইল নির্বাচন করুন
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-paper-plane"></i> <span class="btn-text">আবেদন জমা দিন</span>
                </button>
            </form>
        </div>
    </section>
    <!-- Success Modal -->
    <div class="modal-overlay" id="successModal">
        <div class="success-modal">
            <div class="success-icon"><i class="fas fa-check"></i></div>
            <h3>ধন্যবাদ!</h3>
            <p>আপনার আবেদনটি সফলভাবে জমা হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।</p>
            <button class="btn-success" onclick="document.getElementById('successModal').classList.remove('active')">ঠিক আছে</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal-overlay" id="errorModal">
        <div class="error-modal">
            <div class="error-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h3>আবেদন জমা দেওয়া যায়নি</h3>
            <p style="margin-bottom: 10px;">নিচের ত্রুটিগুলো সমাধান করে পুনরায় চেষ্টা করুন:</p>
            <div class="error-details-box" id="errorDetails" style="background: #fff5f5; border: 1px solid #feb2b2; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; text-align: left; max-height: 200px; overflow-y: auto; color: #c53030; user-select: all;"></div>
            <button class="btn-error-close" onclick="document.getElementById('errorModal').classList.remove('active')" style="margin-top: 20px; width: 100%; padding: 12px; background: #e53e3e; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">বন্ধ করুন</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function scrollToForm() {
            document.getElementById('applicationForm').scrollIntoView({ behavior: 'smooth' });
        }

        // File input display
        document.getElementById('resume').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const label = document.querySelector('.file-input-label');
                label.innerHTML = `<i class="fas fa-check-circle"></i> ${fileName}`;
            }
        });
    </script>
@endsection
