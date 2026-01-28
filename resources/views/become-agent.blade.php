@extends('layouts.app')

@section('title', 'এজেন্ট আবেদন - MRP Foundation')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="reveal-text">এজেন্ট রেজিস্ট্রেশন</h1>
            <p class="reveal-text delay-100">আমাদের দেশজুড়ে বিস্তৃত নেটওয়ার্কে যুক্ত হতে নিচের ফর্মটি পূরণ করুন।</p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="section" style="padding-top: 0;">
        <div class="container">
            <div class="form-container reveal-text delay-200">
                <form id="onlyAgentForm" class="reveal-text delay-200" novalidate>
                    @csrf
                    <div class="registration-grid">
                        <!-- Personal Info -->
                        <div class="form-group">
                            <label for="fullName" class="form-label">আপনার নাম <span style="color: red;">*</span></label>
                            <input type="text" id="fullName" name="full_name" class="form-control" placeholder="আপনার পুরো নাম লিখুন" required>
                            <div class="error-message">দয়া করে আপনার পূর্ণ নাম লিখুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="form-label">মোবাইল <span style="color: red;">*</span></label>
                            <input type="tel" id="mobile" name="mobile_no" class="form-control" placeholder="01XXXXXXXXX" required pattern="[0-9]{11}">
                            <div class="error-message">সঠিক মোবাইল নম্বর প্রদান করুন (১১ ডিজিট)।</div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">ইমেইল <span style="color: red;">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com" required>
                            <div class="error-message">সঠিক ইমেইল ঠিকানা প্রদান করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="businessName" class="form-label">প্রতিষ্ঠানের নাম <span style="color: red;">*</span></label>
                            <input type="text" id="businessName" name="business_name" class="form-control" placeholder="আপনার প্রতিষ্ঠানের নাম" required>
                            <div class="error-message">দয়া করে ব্যবসার নাম লিখুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="businessType" class="form-label">ব্যবসার ধরন <span style="color: red;">*</span></label>
                            <select id="businessType" name="business_type" class="form-control" required style="cursor: pointer;">
                                <option value="">নির্বাচন করুন...</option>
                                <option value="retail">খুচরা (Retail)</option>
                                <option value="wholesale">পাইকারি (Wholesale)</option>
                                <option value="online">অনলাইন (Online)</option>
                                <option value="other">অন্যান্য (Other)</option>
                            </select>
                            <div class="error-message">দয়া করে ব্যবসার ধরন নির্বাচন করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="businessYears" class="form-label">অভিজ্ঞতা (বছর) <span style="color: red;">*</span></label>
                            <input type="number" id="businessYears" name="time_of_business" class="form-control" placeholder="উদাহরণ: 5" min="0" required>
                            <div class="error-message">দয়া করে ব্যবসার সময়কাল উল্লেখ করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="district" class="form-label">জেলা <span style="color: red;">*</span></label>
                            <input type="text" id="district" name="district" class="form-control" placeholder="আপনার জেলার নাম" required>
                            <div class="error-message">দয়া করে জেলার নাম লিখুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="nid" class="form-label">NID নম্বর (ঐচ্ছিক)</label>
                            <input type="text" id="nid" name="nid_no" class="form-control" placeholder="NID নম্বর লিখুন">
                        </div>

                        <!-- Documents Upload -->
                        <div class="form-group">
                            <label for="birthCertificate" class="form-label">জন্ সনদ <span style="color: red;">*</span></label>
                            <input type="file" id="birthCertificate" name="birth_certificate" class="form-control" required>
                            <div class="error-message">দয়া করে জন্ সনদ আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="nidPhotocopy" class="form-label">NID ফটোকপি <span style="color: red;">*</span></label>
                            <input type="file" id="nidPhotocopy" name="nid_file" class="form-control" required>
                            <div class="error-message">দয়া করে NID কার্ডের ফটোকপি আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="agentPhotos" class="form-label">ছবি (২ কপি) <span style="color: red;">*</span></label>
                            <input type="file" id="agentPhotos" name="photo_up[]" class="form-control" required multiple>
                            <div class="error-message">দয়া করে দুই কপি ফটো আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="chairmanCertificate" class="form-label">চেয়ারম্যান সনদ <span style="color: red;">*</span></label>
                            <input type="file" id="chairmanCertificate" name="chairman_certificate" class="form-control" required>
                            <div class="error-message">দয়া করে চেয়ারম্যান সার্টিফিকেট আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="husbandDocs" class="form-label">স্বামীর তথ্য (নারীদের জন্য)</label>
                            <input type="file" id="husbandDocs" name="husbands_information" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="signedForm" class="form-label">গণ্যমান্য ব্যক্তির স্বাক্ষরিত ফরম <span style="color: red;">*</span></label>
                            <input type="file" id="signedForm" name="considerable_person_sign" class="form-control" required>
                            <div class="error-message">দয়া করে স্বাক্ষরিত ফরমটি আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="bankChecks" class="form-label">ব্যাংক চেক ও চুক্তিনামা <span style="color: red;">*</span></label>
                            <input type="file" id="bankChecks" name="bank_check" class="form-control" required multiple>
                            <div class="error-message">দয়া করে চেক এবং চুক্তিনামা আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="tradeLicense" class="form-label">ট্রেড লাইসেন্স <span style="color: red;">*</span></label>
                            <input type="file" id="tradeLicense" name="trade_license" class="form-control" required>
                            <div class="error-message">দয়া করে ট্রেড লাইসেন্স আপলোড করুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">ঠিকানা <span style="color: red;">*</span></label>
                            <textarea id="address" name="address" class="form-control" rows="1" placeholder="বাড়ি নং, রোড নং, এলাকা..." required></textarea>
                            <div class="error-message">দয়া করে ঠিকানা লিখুন।</div>
                        </div>

                        <div class="form-group">
                            <label for="reason" class="form-label">আবেদনের কারণ <span style="color: red;">*</span></label>
                            <textarea id="reason" name="description" class="form-control" rows="1" placeholder="সংক্ষেপে আপনার কারণ লিখুন..." required></textarea>
                            <div class="error-message">দয়া করে কারণ লিখুন।</div>
                        </div>

                        <!-- Bottom Section inside same grid -->
                        <div class="signature-container reveal-text">
                            <label class="form-label">আপনার ডিজিটাল স্বাক্ষর <span style="color: red;">*</span></label>
                            <div class="signature-pad-wrapper" style="margin-bottom: 0;">
                                <canvas id="signaturePad" style="background: #fff;"></canvas>
                                <div class="signature-actions">
                                    <button type="button" id="clearSignature" class="btn-clear"><i class="fas fa-trash-alt"></i> মুছুন</button>
                                </div>
                            </div>
                            <input type="hidden" name="digital_sign" id="signatureInput" required>
                            <div class="error-message" id="signatureError" style="margin-top: 0;">দয়া করে স্বাক্ষর প্রদান করুন।</div>
                        </div>

                        <div class="submission-actions reveal-text" style="margin-bottom: 2rem;">
                            <div class="form-group" style="margin-bottom: 1.5rem;">
                                <label class="checkbox-wrapper" style="margin-top: 0; align-items: flex-start; gap: 10px;">
                                    <input type="checkbox" id="consent" required>
                                    <span class="custom-check" style="width: 20px; height: 20px;"></span>
                                    <span class="label-text" style="font-size: 0.85rem; line-height: 1.4;">আমি সকল তথ্য সঠিক বলে নিশ্চিত করছি এবং শর্তাবলী মেনে চলছি।</span>
                                </label>
                                <div class="error-message" id="consentError" style="margin-top: 0;">সম্মতি দিন।</div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem; border-radius: 8px; margin-bottom: 0;">আবেদন জমা দিন</button>
                        </div>
                    </div> <!-- End of form-grid -->
                </form>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal-overlay" id="successModal">
        <div class="success-modal">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h3>অভিনন্দন!</h3>
            <p>আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে।<br>আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।</p>
            <button class="btn-success" onclick="closeModal()">ঠিক আছে</button>
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
        // Modal Helper Functions
        const modal = document.getElementById('successModal');
        
        function showModal() {
            modal.classList.add('active');
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        // Close on outside click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
@endsection
