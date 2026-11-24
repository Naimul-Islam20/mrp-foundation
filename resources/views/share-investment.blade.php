@extends('layouts.app')

@section('title', 'শেয়ার বিনিয়োগ আবেদন - MRP Foundation')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">শেয়ার বিনিয়োগ আবেদন ফরম</h1>
            <p class="reveal-text delay-100">এমআরপি ফাউন্ডেশনে শেয়ার বিনিয়োগ করতে নিচের ফরমটি পূরণ করুন।</p>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <form id="shareInvestmentForm" novalidate>
                @csrf
                <!-- Photos -->
                <div class="si-photos">
                    <div class="photo-upload-wrapper si-photo reveal-text delay-100">
                        <div class="photo-preview-container">
                            <div class="upload-placeholder">
                                <i class="fas fa-camera"></i>
                                <span>গ্রাহকের ছবি<br>(পাসপোর্ট সাইজ)</span>
                            </div>
                            <img src="" alt="গ্রাহকের ছবি">
                        </div>
                        <label for="customer_photo" class="btn-upload">
                            <i class="fas fa-cloud-upload-alt" style="margin-right: 5px;"></i> ছবি আপলোড করুন
                        </label>
                        <input type="file" id="customer_photo" name="customer_photo" class="si-photo-input" accept="image/png,image/jpeg" required>
                        <p style="font-size: 0.8rem; color: #718096; margin-top: 5px;">সর্বোচ্চ সাইজ: ২ এমবি (JPG, PNG)</p>
                        <div class="error-message" style="width: 100%;">দয়া করে গ্রাহকের ছবি আপলোড করুন।</div>
                    </div>
                    <div class="photo-upload-wrapper si-photo reveal-text delay-100">
                        <div class="photo-preview-container">
                            <div class="upload-placeholder">
                                <i class="fas fa-camera"></i>
                                <span>নমিনির ছবি<br>(পাসপোর্ট সাইজ)</span>
                            </div>
                            <img src="" alt="নমিনির ছবি">
                        </div>
                        <label for="nominee_photo" class="btn-upload">
                            <i class="fas fa-cloud-upload-alt" style="margin-right: 5px;"></i> ছবি আপলোড করুন
                        </label>
                        <input type="file" id="nominee_photo" name="nominee_photo" class="si-photo-input" accept="image/png,image/jpeg" required>
                        <p style="font-size: 0.8rem; color: #718096; margin-top: 5px;">সর্বোচ্চ সাইজ: ২ এমবি (JPG, PNG)</p>
                        <div class="error-message" style="width: 100%;">দয়া করে নমিনির ছবি আপলোড করুন।</div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">সদস্য আইডি নং (যদি থাকে)</label>
                        <input type="text" name="member_id" class="form-control" placeholder="সদস্য আইডি নং">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">আবেদনের তারিখ</label>
                        <input type="text" class="form-control" id="siApplicationDate" readonly>
                    </div>
                </div>

                <!-- 1. Customer -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-user"></i> ১. গ্রাহকের তথ্য (আবেদনকারী)</h3>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাহকের নাম *</label>
                        <input type="text" name="customer_name" class="form-control" placeholder="গ্রাহকের পূর্ণ নাম" required>
                        <div class="error-message">দয়া করে গ্রাহকের নাম লিখুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">মোবাইল নম্বর *</label>
                        <input type="tel" name="customer_phone" class="form-control" placeholder="01XXXXXXXXX" required>
                        <div class="error-message">দয়া করে মোবাইল নম্বর প্রদান করুন।</div>
                    </div>
                </div>
                <h4 class="si-sub-header reveal-text"><i class="fas fa-map-marked-alt"></i> স্থায়ী ঠিকানা</h4>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">হোল্ডিং নং</label>
                        <input type="text" name="customer_permanent_holding_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাম/মহল্লা</label>
                        <input type="text" name="customer_permanent_village" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ওয়ার্ড নং</label>
                        <input type="text" name="customer_permanent_ward_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ইউনিয়ন</label>
                        <input type="text" name="customer_permanent_union" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">থানা</label>
                        <input type="text" name="customer_permanent_thana" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জেলা</label>
                        <input type="text" name="customer_permanent_district" class="form-control">
                    </div>
                </div>
                <h4 class="si-sub-header reveal-text"><i class="fas fa-home"></i> বর্তমান ঠিকানা</h4>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">হোল্ডিং নং</label>
                        <input type="text" name="customer_present_holding_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাম/মহল্লা</label>
                        <input type="text" name="customer_present_village" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ওয়ার্ড নং</label>
                        <input type="text" name="customer_present_ward_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ইউনিয়ন</label>
                        <input type="text" name="customer_present_union" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">থানা</label>
                        <input type="text" name="customer_present_thana" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জেলা</label>
                        <input type="text" name="customer_present_district" class="form-control">
                    </div>
                </div>

                <!-- 2. Nominee -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-user-friends"></i> ২. নমিনির তথ্য</h3>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">নমিনির নাম *</label>
                        <input type="text" name="nominee_name" class="form-control" placeholder="নমিনির পূর্ণ নাম" required>
                        <div class="error-message">দয়া করে নমিনির নাম লিখুন।</div>
                    </div>
                </div>
                <h4 class="si-sub-header reveal-text"><i class="fas fa-map-marked-alt"></i> স্থায়ী ঠিকানা</h4>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">হোল্ডিং নং</label>
                        <input type="text" name="nominee_permanent_holding_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাম/মহল্লা</label>
                        <input type="text" name="nominee_permanent_village" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ওয়ার্ড নং</label>
                        <input type="text" name="nominee_permanent_ward_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ইউনিয়ন</label>
                        <input type="text" name="nominee_permanent_union" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">থানা</label>
                        <input type="text" name="nominee_permanent_thana" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জেলা</label>
                        <input type="text" name="nominee_permanent_district" class="form-control">
                    </div>
                </div>
                <h4 class="si-sub-header reveal-text"><i class="fas fa-home"></i> বর্তমান ঠিকানা</h4>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">হোল্ডিং নং</label>
                        <input type="text" name="nominee_present_holding_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাম/মহল্লা</label>
                        <input type="text" name="nominee_present_village" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ওয়ার্ড নং</label>
                        <input type="text" name="nominee_present_ward_no" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ইউনিয়ন</label>
                        <input type="text" name="nominee_present_union" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">থানা</label>
                        <input type="text" name="nominee_present_thana" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জেলা</label>
                        <input type="text" name="nominee_present_district" class="form-control">
                    </div>
                </div>

                <!-- 3. Investment -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-chart-line"></i> ৩. শেয়ার বিনিয়োগের বিবরণ</h3>
                <div class="form-group reveal-text delay-200">
                    <label class="form-label">বিনিয়োগের ক্যাটাগরি * <span style="font-weight: 400; color: #718096;">(যেকোনো একটি নির্বাচন করুন)</span></label>
                    <div class="si-radio-group">
                            <label class="si-radio">
                                <input type="radio" name="investment_category" value="daily" required>
                                <span>দৈনিক</span>
                            </label>
                            <label class="si-radio">
                                <input type="radio" name="investment_category" value="weekly" required>
                                <span>সাপ্তাহিক</span>
                            </label>
                            <label class="si-radio">
                                <input type="radio" name="investment_category" value="monthly" required>
                                <span>মাসিক</span>
                            </label>
                            <label class="si-radio">
                                <input type="radio" name="investment_category" value="one_time" required>
                                <span>এককালীন</span>
                            </label>
                    </div>
                    <div class="error-message" id="siCategoryError">দয়া করে বিনিয়োগের ক্যাটাগরি নির্বাচন করুন।</div>
                </div>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">বিনিয়োগের মেয়াদকাল *</label>
                        <input type="text" name="investment_duration" class="form-control" placeholder="যেমন: ১২ মাস" required>
                        <div class="error-message">দয়া করে মেয়াদকাল লিখুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">শেয়ারের বিনিয়োগের পরিমাণ (টাকায়) *</label>
                        <input type="number" name="investment_amount" class="form-control" placeholder="যেমন: 50000" min="1" required>
                        <div class="error-message">দয়া করে বিনিয়োগের পরিমাণ লিখুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">বিনিয়োগের পরিমাণ (কথায়) *</label>
                        <input type="text" name="investment_amount_in_words" class="form-control" placeholder="যেমন: পঞ্চাশ হাজার টাকা" required>
                        <div class="error-message">দয়া করে কথায় পরিমাণ লিখুন।</div>
                    </div>
                </div>

                <!-- 4. Sponsor -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-handshake"></i> ৪. স্পন্সরের তথ্য (পরিচয়দানকারী)</h3>
                <div class="form-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">স্পন্সরের নাম</label>
                        <input type="text" name="sponsor_name" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">আইডি / মোবাইল</label>
                        <input type="text" name="sponsor_id_mobile" class="form-control">
                    </div>
                </div>

                <div class="registration-grid" style="margin-top: 2rem;">
                    <div class="signature-container reveal-text delay-200" style="margin-bottom: 0;">
                        <label class="form-label">গ্রাহকের ডিজিটাল স্বাক্ষর <span style="color: red;">*</span></label>
                        <div class="signature-pad-wrapper" style="margin-bottom: 0;">
                            <canvas id="signaturePad" style="background: #fff;"></canvas>
                            <div class="signature-actions">
                                <button type="button" id="clearSignature" class="btn-clear">
                                    <i class="fas fa-trash-alt"></i> মুছুন
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="digital_sign" id="signatureInput" required>
                        <div class="error-message" id="signatureError" style="margin-top: 0;">দয়া করে স্বাক্ষর প্রদান করুন।</div>
                    </div>

                    <div class="submission-actions reveal-text" style="margin-top: 0; height: 100%; display: flex; flex-direction: column; justify-content: flex-end;">
                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label class="checkbox-wrapper reveal-text delay-200" style="margin-top: 0; align-items: flex-start;">
                                <input type="checkbox" id="consent" required>
                                <span class="custom-check" style="width: 20px; height: 20px;"></span>
                                <span class="label-text" style="font-size: 0.85rem; line-height: 1.4;">আমি ঘোষণা করছি যে উপরের সকল তথ্য সঠিক এবং আমি শর্তাবলী মেনে চলছি।</span>
                            </label>
                            <div class="error-message" id="consentError" style="margin-top: 0;">দয়া করে সম্মতি দিন।</div>
                        </div>

                        <button type="submit" class="btn btn-primary reveal-text delay-300" style="width: 100%; padding: 1rem; font-size: 1.1rem; border-radius: 8px; margin-top: 0;">আবেদন জমা দিন</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal-overlay" id="successModal">
        <div class="success-modal">
            <div class="success-icon"><i class="fas fa-check"></i></div>
            <h3>অভিনন্দন!</h3>
            <p>আপনার শেয়ার বিনিয়োগ আবেদন সফলভাবে জমা হয়েছে।<br><span id="siApplicationNo"></span></p>
            <button class="btn-success" onclick="location.href='{{ route('home') }}'">ঠিক আছে</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal-overlay" id="errorModal">
        <div class="error-modal">
            <div class="error-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h3>আবেদন জমা দেওয়া যায়নি</h3>
            <p style="margin-bottom: 10px;">নিচের ত্রুটিগুলো সমাধান করে পুনরায় চেষ্টা করুন:</p>
            <div class="error-details-box" id="errorDetails"></div>
            <button class="btn-error-close" onclick="document.getElementById('errorModal').classList.remove('active')">বন্ধ করুন</button>
        </div>
    </div>
@endsection
