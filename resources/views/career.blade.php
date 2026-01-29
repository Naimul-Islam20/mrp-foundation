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

                <div class="benefit-card reveal-text delay-400">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="benefit-title">দলগত পরিবেশ</h3>
                    <p class="benefit-desc">
                        সহযোগিতামূলক এবং বন্ধুত্বপূর্ণ কর্ম পরিবেশ।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-500">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="benefit-title">নমনীয় সময়</h3>
                    <p class="benefit-desc">
                        কাজ এবং জীবনের ভারসাম্যের জন্য নমনীয় কর্মঘণ্টা।
                    </p>
                </div>

                <div class="benefit-card reveal-text delay-600">
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

            <div class="jobs-grid">
                <!-- Job 1 -->
                <div class="job-card reveal-text delay-100">
                    <div class="job-info">
                        <h3 class="job-title">প্রোগ্রাম ম্যানেজার</h3>
                        <div class="job-meta">
                            <span class="job-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                ঢাকা, বাংলাদেশ
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-briefcase"></i>
                                পূর্ণকালীন
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-layer-group"></i>
                                ৩-৫ বছর অভিজ্ঞতা
                            </span>
                        </div>
                        <p class="job-desc">
                            সমাজসেবা প্রকল্প পরিচালনা, টিম ম্যানেজমেন্ট এবং স্টেকহোল্ডার সমন্বয়ের দায়িত্ব। শিক্ষা ও স্বাস্থ্য খাতে অভিজ্ঞতা থাকলে অগ্রাধিকার।
                        </p>
                        <div class="job-tags">
                            <span class="job-tag">Project Management</span>
                            <span class="job-tag">Leadership</span>
                            <span class="job-tag">NGO</span>
                        </div>
                    </div>
                    <div class="job-action">
                        <button class="apply-btn" onclick="scrollToForm()">আবেদন করুন</button>
                        <span class="job-deadline">শেষ তারিখ: ৩১ জানুয়ারি</span>
                    </div>
                </div>

                <!-- Job 2 -->
                <div class="job-card reveal-text delay-200">
                    <div class="job-info">
                        <h3 class="job-title">ফিল্ড অফিসার</h3>
                        <div class="job-meta">
                            <span class="job-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                সারাদেশ
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-briefcase"></i>
                                পূর্ণকালীন
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-layer-group"></i>
                                ১-৩ বছর অভিজ্ঞতা
                            </span>
                        </div>
                        <p class="job-desc">
                            মাঠ পর্যায়ে প্রকল্প বাস্তবায়ন, সুবিধাভোগী চিহ্নিতকরণ এবং মনিটরিং। গ্রামীণ এলাকায় কাজের অভিজ্ঞতা প্রয়োজন।
                        </p>
                        <div class="job-tags">
                            <span class="job-tag">Field Work</span>
                            <span class="job-tag">Community Development</span>
                        </div>
                    </div>
                    <div class="job-action">
                        <button class="apply-btn" onclick="scrollToForm()">আবেদন করুন</button>
                        <span class="job-deadline">শেষ তারিখ: ২৮ জানুয়ারি</span>
                    </div>
                </div>

                <!-- Job 3 -->
                <div class="job-card reveal-text delay-300">
                    <div class="job-info">
                        <h3 class="job-title">অ্যাকাউন্টস অফিসার</h3>
                        <div class="job-meta">
                            <span class="job-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                ঢাকা
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-briefcase"></i>
                                পূর্ণকালীন
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-layer-group"></i>
                                ২-৪ বছর অভিজ্ঞতা
                            </span>
                        </div>
                        <p class="job-desc">
                            আর্থিক হিসাব রক্ষণাবেক্ষণ, বাজেট প্রস্তুতি এবং অডিট সহায়তা। এনজিও অ্যাকাউন্টিং অভিজ্ঞতা থাকলে অগ্রাধিকার।
                        </p>
                        <div class="job-tags">
                            <span class="job-tag">Accounting</span>
                            <span class="job-tag">Finance</span>
                            <span class="job-tag">Audit</span>
                        </div>
                    </div>
                    <div class="job-action">
                        <button class="apply-btn" onclick="scrollToForm()">আবেদন করুন</button>
                        <span class="job-deadline">শেষ তারিখ: ১৫ ফেব্রুয়ারি</span>
                    </div>
                </div>

                <!-- Job 4 -->
                <div class="job-card reveal-text delay-400">
                    <div class="job-info">
                        <h3 class="job-title">কমিউনিকেশন অফিসার</h3>
                        <div class="job-meta">
                            <span class="job-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                ঢাকা
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-briefcase"></i>
                                পূর্ণকালীন
                            </span>
                            <span class="job-meta-item">
                                <i class="fas fa-layer-group"></i>
                                ২-৩ বছর অভিজ্ঞতা
                            </span>
                        </div>
                        <p class="job-desc">
                            সোশ্যাল মিডিয়া ম্যানেজমেন্ট, কন্টেন্ট তৈরি এবং জনসংযোগ। ডিজিটাল মার্কেটিং এবং গ্রাফিক ডিজাইন দক্ষতা প্রয়োজন।
                        </p>
                        <div class="job-tags">
                            <span class="job-tag">Social Media</span>
                            <span class="job-tag">Content Writing</span>
                            <span class="job-tag">PR</span>
                        </div>
                    </div>
                    <div class="job-action">
                        <button class="apply-btn" onclick="scrollToForm()">আবেদন করুন</button>
                        <span class="job-deadline">শেষ তারিখ: ১০ ফেব্রুয়ারি</span>
                    </div>
                </div>
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

            <form class="application-form reveal-text delay-200" onsubmit="event.preventDefault(); alert('আপনার আবেদন সফলভাবে জমা হয়েছে!');">
                <div class="form-group">
                    <label for="fullName">পূর্ণ নাম *</label>
                    <input type="text" id="fullName" required>
                </div>

                <div class="form-group">
                    <label for="email">ইমেইল *</label>
                    <input type="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">মোবাইল নম্বর *</label>
                    <input type="tel" id="phone" required>
                </div>

                <div class="form-group">
                    <label for="position">আবেদনকৃত পদ *</label>
                    <select id="position" required>
                        <option value="">পদ নির্বাচন করুন</option>
                        <option value="program-manager">প্রোগ্রাম ম্যানেজার</option>
                        <option value="field-officer">ফিল্ড অফিসার</option>
                        <option value="accounts-officer">অ্যাকাউন্টস অফিসার</option>
                        <option value="communication-officer">কমিউনিকেশন অফিসার</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">কাজের অভিজ্ঞতা (বছর) *</label>
                    <input type="number" id="experience" min="0" required>
                </div>

                <div class="form-group">
                    <label for="education">শিক্ষাগত যোগ্যতা *</label>
                    <input type="text" id="education" placeholder="যেমন: স্নাতক (সমাজবিজ্ঞান)" required>
                </div>

                <div class="form-group">
                    <label for="coverLetter">কভার লেটার *</label>
                    <textarea id="coverLetter" placeholder="কেন আপনি এই পদের জন্য উপযুক্ত তা সংক্ষেপে লিখুন..." required></textarea>
                </div>

                <div class="form-group">
                    <label>সিভি আপলোড করুন (PDF) *</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="resume" accept=".pdf" required>
                        <label for="resume" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i> ফাইল নির্বাচন করুন
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> আবেদন জমা দিন
                </button>
            </form>
        </div>
    </section>
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
