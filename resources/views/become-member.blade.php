@extends('layouts.app')

@section('title', 'সাধারণ সদস্য আবেদন - MRP Foundation')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">সাধারণ সদস্য আবেদন ফরম</h1>
            <p class="reveal-text delay-100">আমাদের ফাউন্ডেশনের সদস্য হয়ে মানবতার সেবায় অংশ নিন।</p>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <form id="memberForm" novalidate>
                @csrf
                <!-- Personal Information -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-user"></i> ব্যক্তিগত তথ্য</h3>
                
                <!-- Photo Upload Section -->
                <div class="photo-upload-wrapper reveal-text delay-100">
                    <div class="photo-preview-container" id="photoPreview">
                        <div class="upload-placeholder">
                            <i class="fas fa-camera"></i>
                            <span>পাসপোর্ট সাইজ ছবি</span>
                        </div>
                        <img src="" alt="Preview" id="previewImg" style="display: none;">
                    </div>
                    <label for="photoInput" class="btn-upload">
                        <i class="fas fa-cloud-upload-alt" style="margin-right: 5px;"></i> ছবি আপলোড করুন
                    </label>
                    <input type="file" id="photoInput" name="image" accept="image/*" required>
                    <p style="font-size: 0.8rem; color: #718096; margin-top: 5px;">গরিষ্ট সাইজ: ২ এমবি (JPG, PNG)</p>
                    <div class="error-message" style="width: 100%;">দয়া করে ছবি আপলোড করুন।</div>
                </div>

                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">নাম *</label>
                        <input type="text" name="name" class="form-control" placeholder="আপনার পূর্ণ নাম" required>
                        <div class="error-message">দয়া করে আপনার পূর্ণ নাম লিখুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">পিতার নাম *</label>
                        <input type="text" name="father_name" class="form-control" placeholder="পিতার নাম লিখুন" required>
                        <div class="error-message">দয়া করে পিতার নাম লিখুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">মাতার নাম *</label>
                        <input type="text" name="mother_name" class="form-control" placeholder="মাতার নাম লিখুন" required>
                        <div class="error-message">দয়া করে মাতার নাম লিখুন।</div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ফ্যামিলি সদস্য সংখ্যা *</label>
                        <input type="number" name="family_member_num" class="form-control" placeholder="সদস্য সংখ্যা" required>
                        <div class="error-message">দয়া করে পরিবারের সদস্য সংখ্যা উল্লেখ করুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ভোটার আইডি (NID) নম্বর *</label>
                        <input type="text" name="nid_no" class="form-control" placeholder="NID নম্বর" required>
                        <div class="error-message">দয়া করে NID নম্বর প্রদান করুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">মোবাইল নম্বর *</label>
                        <input type="tel" name="phone" class="form-control" placeholder="০১৮XXXXXXXX" required>
                        <div class="error-message">দয়া করে মোবাইল নম্বর প্রদান করুন।</div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ধর্ম *</label>
                        <select name="religion" class="form-control" required>
                            <option value="">নির্বাচন করুন</option>
                            <option value="Islam">ইসলাম</option>
                            <option value="Hindu">হিন্দু</option>
                            <option value="Christian">খ্রিস্টান</option>
                            <option value="Buddhist">বৌদ্ধ</option>
                            <option value="Other">অন্যান্য</option>
                        </select>
                        <div class="error-message">দয়া করে ধর্ম নির্বাচন করুন।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জাতীয়তা *</label>
                        <input type="text" name="nationality" class="form-control" value="বাংলাদেশী" required>
                        <div class="error-message">জাতীয়তা আবশ্যক।</div>
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">বৈবাহিক অবস্থা *</label>
                        <select name="merital_status" class="form-control" required>
                            <option value="">নির্বাচন করুন</option>
                            <option value="Single">অবিবাহিত</option>
                            <option value="Married">বিবাহিত</option>
                            <option value="Divorced">বিপত্নীক/বিধবা</option>
                        </select>
                        <div class="error-message">দয়া করে বৈবাহিক অবস্থা নির্বাচন করুন।</div>
                    </div>
                </div>

                <!-- Permanent Address -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-map-marked-alt"></i> স্থায়ী ঠিকানা</h3>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাম/সড়ক</label>
                        <input type="text" name="village_permanent" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">পোস্ট</label>
                        <input type="text" name="post_name_permanent" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">থানা/উপজেলা</label>
                        <input type="text" name="thana_upozilla_permanent" class="form-control">
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ব্লক/সেকশন</label>
                        <input type="text" name="block_permanent" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জেলা</label>
                        <input type="text" name="district_permanent" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">পোস্ট কোড</label>
                        <input type="text" name="post_code_permanent" class="form-control">
                    </div>
                </div>

                <!-- Current Address -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-home"></i> বর্তমান ঠিকানা</h3>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">গ্রাম/সড়ক</label>
                        <input type="text" name="road_present" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">পোস্ট</label>
                        <input type="text" name="post_name_present" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">থানা/উপজেলা</label>
                        <input type="text" name="thana_upozilla_present" class="form-control">
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">ব্লক/সেকশন</label>
                        <input type="text" name="block_present" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">জেলা</label>
                        <input type="text" name="district_present" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">পোস্ট কোড</label>
                        <input type="text" name="post_code_present" class="form-control">
                    </div>
                </div>

                <!-- Sponsor Info -->
                <h3 class="form-section-header reveal-text"><i class="fas fa-handshake"></i> স্পনসর তথ্য</h3>
                <div class="form-grid" style="grid-template-columns: repeat(2, 1fr);">
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">স্পনসর এর নাম</label>
                        <input type="text" name="sponsor_name" class="form-control">
                    </div>
                    <div class="form-group reveal-text delay-200">
                        <label class="form-label">স্পনসর এর মোবাইল নাম্বার</label>
                        <input type="tel" name="sponsor_phone" class="form-control">
                    </div>
                </div>

                <div class="registration-grid" style="margin-top: 2rem;">
                    <!-- Digital Signature -->
                    <div class="signature-container reveal-text delay-200" style="margin-bottom: 0;">
                        <label class="form-label">আপনার ডিজিটাল স্বাক্ষর <span style="color: red;">*</span></label>
                        <div class="signature-pad-wrapper" style="margin-bottom: 0;">
                            <canvas id="signaturePad" style="background: #fff;"></canvas>
                            <div class="signature-actions">
                                <button type="button" id="clearSignature" class="btn-clear">
                                    <i class="fas fa-trash-alt"></i> মুছুন
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="digital_sign" id="signatureInput" required>
                        <div class="error-message" id="signatureError" style="margin-top: 0;">দয়া করে স্বাক্ষর প্রদান করুন।</div>
                    </div>

                    <div class="submission-actions reveal-text" style="margin-top: 0; height: 100%; display: flex; flex-direction: column; justify-content: flex-end;">
                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label class="checkbox-wrapper reveal-text delay-200" style="margin-top: 0; align-items: flex-start;">
                                <input type="checkbox" id="consent" required>
                                <span class="custom-check" style="width: 20px; height: 20px;"></span>
                                <span class="label-text" style="font-size: 0.85rem; line-height: 1.4;">আমি ঘোষণা করছি যে উপরের সকল তথ্য সঠিক এবং আমি শর্তাবলী মেনে চলছি।</span>
                            </label>
                            <div class="error-message" id="consentError" style="margin-top: 0;">দয়া করে সম্মতি দিন।</div>
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
            <p>আপনার সদস্যপদ আবেদন সফলভাবে জমা হয়েছে।</p>
            <button class="btn-success" onclick="location.href='{{ route('home') }}'">ঠিক আছে</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal-overlay" id="errorModal">
        <div class="error-modal">
            <div class="error-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h3>আবেদন জমা দেওয়া যায়নি</h3>
            <p style="margin-bottom: 10px;">নিচের ত্রুটিগুলো সমাধান করে পুনরায় চেষ্টা করুন:</p>
            <div class="error-details-box" id="errorDetails"></div>
            <button class="btn-error-close" onclick="document.getElementById('errorModal').classList.remove('active')">বন্ধ করুন</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Photo Preview Logic
        const photoInput = document.getElementById('photoInput');
        const previewImg = document.getElementById('previewImg');
        const uploadPlaceholder = document.querySelector('.upload-placeholder');

        if (photoInput) {
            photoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                        uploadPlaceholder.style.display = 'none';
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    </script>
@endsection
