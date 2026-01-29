/* 
 * MRP Foundation - Global Script
 * Handles mobile menu toggle and basic interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    // Fetch and Update 'Our Details' from API
    async function fetchOurDetails() {
        try {

            const response = await fetch('https://admin.mrpfoundation.net/api/our-details', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error('Network response was not ok');
            
            const result = await response.json();


            if (result.status && result.data && result.data.length > 0) {
                const apiData = result.data[0];
                
                // Map fields from API
                const address = apiData.our_address || '';
                // Split phone by comma or replace with <br>
                const phone = apiData.our_phone ? apiData.our_phone.split(',').join('<br>') : '';
                const email = apiData.our_email || '';

                // Update Contact Page Elements
                const contactAddr = document.getElementById('contact-address');
                const contactPhone = document.getElementById('contact-phone');
                const contactEmail = document.getElementById('contact-email');

                if (contactAddr) contactAddr.innerHTML = address;
                if (contactPhone) contactPhone.innerHTML = phone;
                if (contactEmail) contactEmail.innerText = email;

                // Update Home Page Elements
                const homeAddr = document.getElementById('home-address');
                const homePhone = document.getElementById('home-phone');
                const homeEmail = document.getElementById('home-email');

                if (homeAddr) homeAddr.innerHTML = address;
                if (homePhone) homePhone.innerHTML = phone;
                if (homeEmail) homeEmail.innerText = email;

                // Update Footer
                const footerAddr = document.getElementById('footer-address');
                if (footerAddr) {
                    footerAddr.innerHTML = `<i class="fas fa-map-marker-alt" style="color: var(--secondary-color); margin-right: 5px"></i> ${address}`;
                }

                // Update Social Links if any
                const updateSocialLink = (iconClass, link) => {
                    if (!link) return;
                    document.querySelectorAll(`.social-link i.${iconClass}`).forEach(icon => {
                        const anchor = icon.closest('a');
                        if (anchor) anchor.href = link;
                    });
                };

                updateSocialLink('fa-facebook-f', apiData.fb_link);
                updateSocialLink('fa-facebook', apiData.fb_link);
                updateSocialLink('fa-twitter', apiData.twitter_link);
                updateSocialLink('fa-instagram', apiData.insta_link);
                updateSocialLink('fa-linkedin-in', apiData.linkedin_link);
                updateSocialLink('fa-linkedin', apiData.linkedin_link);
            }

        } catch (error) {

        }
    }

    // Call it immediately
    fetchOurDetails();

    // Fetch and Populate 'Vacancies'
    async function fetchVacancies() {
        const jobsContainer = document.getElementById('jobs-container');
        const positionSelect = document.getElementById('position');
        if (!jobsContainer && !positionSelect) return;

        try {

            const response = await fetch('https://admin.mrpfoundation.net/api/vacancies');
            const result = await response.json();


            if (result.status && result.data) {
                // Populate Jobs Grid
                if (jobsContainer) {
                    if (result.data.length === 0) {
                        jobsContainer.innerHTML = '<div class="text-center" style="grid-column: 1/-1; padding: 3rem;"><p>বর্তমানে কোনো খালি পদ নেই।</p></div>';
                    } else {
                        jobsContainer.innerHTML = ''; // Clear loader
                        
                        result.data.forEach((job, index) => {
                            const delay = (index + 1) * 100;
                            const deadline = new Date(job.last_date_of_apply);
                            const formattedDate = deadline.toLocaleDateString('bn-BD', { day: 'numeric', month: 'long' });

                            const jobCard = `
                                <div class="job-card reveal-text" style="transition-delay: ${delay}ms">
                                    <div class="job-info">
                                        <h3 class="job-title">${job.title}</h3>
                                        <div class="job-meta">
                                            <span class="job-meta-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                ${job.workplace}
                                            </span>
                                            <span class="job-meta-item">
                                                <i class="fas fa-briefcase"></i>
                                                ${job.worktime}
                                            </span>
                                            <span class="job-meta-item">
                                                <i class="fas fa-layer-group"></i>
                                                ${job.experience}
                                            </span>
                                        </div>
                                        <p class="job-desc">${job.description}</p>
                                        <div class="job-tags">
                                            ${job.skills.map(skill => `<span class="job-tag">${skill}</span>`).join('')}
                                        </div>
                                    </div>
                                    <div class="job-action">
                                        <button class="apply-btn" onclick="scrollToForm()">আবেদন করুন</button>
                                        <span class="job-deadline">শেষ তারিখ: ${formattedDate}</span>
                                    </div>
                                </div>
                            `;
                            jobsContainer.insertAdjacentHTML('beforeend', jobCard);
                            
                            // Re-observe for animation
                            const newCard = jobsContainer.lastElementChild;
                            if (typeof observer !== 'undefined') observer.observe(newCard);
                        });
                    }
                }

                // Populate Position Dropdown
                if (positionSelect) {
                    positionSelect.innerHTML = '<option value="">পদ নির্বাচন করুন</option>';
                    result.data.forEach(job => {
                        const option = document.createElement('option');
                        option.value = job.title; // Using title as value
                        option.textContent = job.title;
                        positionSelect.appendChild(option);
                    });
                }
            }
        } catch (error) {

            if (jobsContainer) {
                jobsContainer.innerHTML = '<div class="text-center" style="grid-column: 1/-1; padding: 3rem;"><p style="color: red;">সার্ভার থেকে তথ্য পাওয়া যায়নি। অনুগ্রহ করে আবার চেষ্টা করুন।</p></div>';
            }
        }
    }
    fetchVacancies();

    // Mobile Menu Toggle
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Mobile Dropdown Toggle
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            const dropdownLink = dropdown.querySelector('.nav-link');
            if(dropdownLink) {
                dropdownLink.addEventListener('click', (e) => {
                    // Only prevent default and toggle if on mobile/tablet view
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        dropdown.classList.toggle('active');
                        
                        const menu = dropdown.querySelector('.dropdown-menu');
                        if (dropdown.classList.contains('active')) {
                            menu.style.maxHeight = menu.scrollHeight + "px";
                        } else {
                            menu.style.maxHeight = null;
                        }
                    }
                });
            }
        });

        // Close menu/dropdowns when clicking a link (that isn't a dropdown toggle)
        document.querySelectorAll('.nav-link:not(.dropdown > .nav-link)').forEach(n => n.addEventListener('click', () => {
             // Logic remains same for non-toggle links
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        }));
        
        // Also close mobile menu if a dropdown item is clicked
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', () => {
                 hamburger.classList.remove('active');
                 navMenu.classList.remove('active');
            });
        });
    }

    // Dynamic Year
    const yearElement = document.getElementById('currentYear');
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }

    // Common Signature Pad Logic
    function initSignaturePad(canvasId, inputId, clearBtnId) {
        const canvas = document.getElementById(canvasId);
        const signatureInput = document.getElementById(inputId);
        const clearBtn = document.getElementById(clearBtnId);
        
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let signatureDrawing = false;

        const resizeCanvas = () => {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            
            // Get dimensions - use a slightly more robust check
            let width = canvas.offsetWidth;
            let height = canvas.offsetHeight;

            // Fallback if the element isn't fully rendered yet
            if (width === 0 || height === 0) {
                const parent = canvas.parentElement;
                width = parent.clientWidth || 300;
                height = 200; // Force a default height if it's 0
            }
            
            canvas.style.display = 'block';
            canvas.width = width * ratio;
            canvas.height = height * ratio;
            ctx.scale(ratio, ratio);
            
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#000';
            
            // Fill background white explicitly
            ctx.fillStyle = "#fff";
            ctx.fillRect(0, 0, width, height);
            
            // Redraw if data exists
            if (signatureInput && signatureInput.value) {
                const img = new Image();
                img.onload = () => ctx.drawImage(img, 0, 0, width, height);
                img.src = signatureInput.value;
            }
        };

        // Try initializing multiple times to handle animations/slow rendering
        setTimeout(resizeCanvas, 100);
        setTimeout(resizeCanvas, 500); 
        setTimeout(resizeCanvas, 1000); 

        window.addEventListener('resize', resizeCanvas);

        const getPos = (e) => {
            const rect = canvas.getBoundingClientRect();
            const clientX = e.clientX || (e.touches && e.touches[0].clientX);
            const clientY = e.clientY || (e.touches && e.touches[0].clientY);
            return {
                x: (clientX - rect.left) * (canvas.width / (rect.width * ratio())),
                y: (clientY - rect.top) * (canvas.height / (rect.height * ratio()))
            };
            
            function ratio() { return Math.max(window.devicePixelRatio || 1, 1); }
        };

        // Simplified position for drawing
        const getSimplePos = (e) => {
            const rect = canvas.getBoundingClientRect();
            const x = (e.clientX || (e.touches && e.touches[0].clientX)) - rect.left;
            const y = (e.clientY || (e.touches && e.touches[0].clientY)) - rect.top;
            return { x, y };
        };

        const startDrawing = (e) => {
            signatureDrawing = true;
            const pos = getSimplePos(e);
            ctx.beginPath();
            ctx.moveTo(pos.x, pos.y);
        };

        const draw = (e) => {
            if (!signatureDrawing) return;
            const pos = getSimplePos(e);
            ctx.lineTo(pos.x, pos.y);
            ctx.stroke();
            signatureInput.value = canvas.toDataURL();
            
            const sigWrapper = canvas.closest('.signature-pad-wrapper');
            const sigError = document.getElementById('signatureError');
            if (sigWrapper) sigWrapper.style.borderColor = '';
            if (sigError) sigError.style.display = 'none';
        };

        const stopDrawing = () => {
            signatureDrawing = false;
        };

        // Web Mouse Events
        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', draw);
        window.addEventListener('mouseup', stopDrawing);

        // Mobile Touch Events - Essential for Safari/Chrome on iOS
        canvas.addEventListener('touchstart', (e) => { 
            const pos = getSimplePos(e);
            startDrawing(e); 
        }, { passive: false });
        
        canvas.addEventListener('touchmove', (e) => { 
            e.preventDefault(); 
            draw(e); 
        }, { passive: false });
        
        canvas.addEventListener('touchend', stopDrawing);

        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                ctx.fillStyle = "#fff";
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                signatureInput.value = '';
            });
        }
    }

    // Agent Form Submission Logic
    const agentForm = document.getElementById('onlyAgentForm');
    if (agentForm) {
        initSignaturePad('signaturePad', 'signatureInput', 'clearSignature');

        agentForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const canvas = document.getElementById('signaturePad');
            const signatureInput = document.getElementById('signatureInput');
            
            let isValid = true;
            const controls = agentForm.querySelectorAll('.form-control, #consent');
            
            controls.forEach(control => {
                if (control.id === 'consent') {
                    const consentError = document.getElementById('consentError');
                    if (!control.checked) {
                        if (consentError) consentError.style.display = 'block';
                        isValid = false;
                    } else {
                        if (consentError) consentError.style.display = 'none';
                    }
                } else {
                    const value = control.value.trim();
                    if (control.hasAttribute('required') && value === '') {
                        control.classList.add('error');
                        isValid = false;
                    } else {
                        control.classList.remove('error');
                    }
                }
            });
            // Custom validation for photos (max 2)
            const photoInput = agentForm.querySelector('#agentPhotos');
            if (photoInput && photoInput.files.length > 2) {
                alert('আপনি ২টির বেশি ছবি আপলোড করতে পারবেন না।');
                photoInput.classList.add('error');
                isValid = false;
            }

            // Signature validation
            if (signatureInput && signatureInput.hasAttribute('required') && signatureInput.value === '') {
                const sigWrapper = document.querySelector('.signature-pad-wrapper');
                const sigError = document.getElementById('signatureError');
                if (sigWrapper) sigWrapper.style.borderColor = 'var(--error)';
                if (sigError) sigError.style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                const submitBtn = agentForm.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.textContent;
                
                try {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> প্রসেসিং হচ্ছে...';
                    
                    const formData = new FormData(agentForm);
                    
                    // Manually handle multiple photo_up files to ensure array format
                    const photoInput = agentForm.querySelector('#agentPhotos');
                    if (photoInput && photoInput.files.length > 0) {
                        formData.delete('photo_up[]'); // Clear existing if any
                        for (let i = 0; i < photoInput.files.length; i++) {
                            formData.append('photo_up[]', photoInput.files[i]);
                        }
                    }

                    // Manually handle bank_check multiple files if any
                    const bankCheckInput = agentForm.querySelector('#bankChecks');
                    if (bankCheckInput && bankCheckInput.files.length > 0) {
                        formData.delete('bank_check'); 
                        for (let i = 0; i < bankCheckInput.files.length; i++) {
                            formData.append('bank_check', bankCheckInput.files[i]);
                        }
                    }
                    
                    // Convert signature Base64 to PNG File
                    const signatureData = signatureInput.value;
                    if (signatureData) {
                        try {
                            const blob = await (await fetch(signatureData)).blob();
                            formData.delete('digital_sign'); 
                            formData.append('digital_sign', blob, 'signature.png'); 
                        } catch (sigErr) {

                        }
                    }
                    
                    const response = await fetch('https://admin.mrpfoundation.net/api/agent-registration', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const result = await response.json().catch(() => ({}));

                    if (response.ok) {
                        if (typeof showModal === 'function') {
                            showModal();
                        } else {
                            alert('আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে!');
                        }
                        agentForm.reset();
                        // Reset canvas
                        if (canvas) {
                            const ctx = canvas.getContext('2d');
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                        }
                    } else {
                        let errorMsg = result.message || 'সার্ভার ভ্যালিডেশন এরর।';
                        if (result.errors) {
                            // Detailed breakdown: Field Name -> Message
                            const errorDetails = Object.entries(result.errors).map(([field, msgs]) => {
                                return `[${field}] : ${msgs.join(', ')}`;
                            }).join('\n');
                            errorMsg = errorDetails;
                        }
                        
                        // Show Error in Modal instead of alert
                        const errorModal = document.getElementById('errorModal');
                        const errorDetailsBox = document.getElementById('errorDetails');
                        if (errorModal && errorDetailsBox) {
                            errorDetailsBox.innerText = errorMsg;
                            errorModal.classList.add('active');
                        } else {
                            alert('ত্রুটিঃ\n' + errorMsg);
                        }
                    }
                } catch (error) {

                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.textContent = error.message;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ ' + error.message);
                    }
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;
                }
            }
        });

        // Real-time validation removal
        agentForm.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
            });
        });
    }

    // Sub-Agent Form Submission
    const subAgentForm = document.getElementById('onlySubAgentForm');
    if (subAgentForm) {
        initSignaturePad('signaturePad', 'signatureInput', 'clearSignature');

        subAgentForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const canvas = document.getElementById('signaturePad');
            const signatureInput = document.getElementById('signatureInput');
            
            let isValid = true;
            const controls = subAgentForm.querySelectorAll('.form-control, #consent');
            
            controls.forEach(control => {
                if (control.id === 'consent') {
                    const consentError = document.getElementById('consentError');
                    if (!control.checked) {
                        if (consentError) consentError.style.display = 'block';
                        isValid = false;
                    } else {
                        if (consentError) consentError.style.display = 'none';
                    }
                } else {
                    const value = control.value.trim();
                    if (control.hasAttribute('required') && value === '') {
                        control.classList.add('error');
                        isValid = false;
                    } else {
                        control.classList.remove('error');
                    }
                }
            });

            // Signature validation
            if (signatureInput && signatureInput.hasAttribute('required') && signatureInput.value === '') {
                const sigWrapper = canvas.closest('.signature-pad-wrapper');
                const sigError = document.getElementById('signatureError');
                if (sigWrapper) sigWrapper.style.borderColor = 'var(--error)';
                if (sigError) sigError.style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                const submitBtn = subAgentForm.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.textContent;
                
                try {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> প্রসেসিং হচ্ছে...';
                    
                    const formData = new FormData(subAgentForm);

                    // Manually handle multiple photo_up files to ensure array format
                    const subPhotoInput = subAgentForm.querySelector('#agentPhotos');
                    if (subPhotoInput && subPhotoInput.files.length > 0) {
                        formData.delete('photo_up[]'); 
                        for (let i = 0; i < subPhotoInput.files.length; i++) {
                            formData.append('photo_up[]', subPhotoInput.files[i]);
                        }
                    }

                    // Manually handle bank_check multiple files if any
                    const subBankCheckInput = subAgentForm.querySelector('#bankChecks');
                    if (subBankCheckInput && subBankCheckInput.files.length > 0) {
                        formData.delete('bank_check'); 
                        for (let i = 0; i < subBankCheckInput.files.length; i++) {
                            formData.append('bank_check', subBankCheckInput.files[i]);
                        }
                    }

                    // Convert signature Base64 to PNG File
                    const signatureData = signatureInput.value;
                    if (signatureData) {
                        try {
                            const blob = await (await fetch(signatureData)).blob();
                            formData.delete('digital_sign'); 
                            formData.append('digital_sign', blob, 'signature.png'); 
                        } catch (sigErr) {
                            console.error("❌ Signature conversion failed:", sigErr);
                        }
                    }
                    
                    const response = await fetch('https://admin.mrpfoundation.net/api/sub-agent-registration', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const result = await response.json().catch(() => ({}));

                    if (response.ok) {
                        if (typeof showModal === 'function') {
                            showModal();
                        } else {
                            alert('আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে!');
                        }
                        subAgentForm.reset();
                        if (canvas) {
                            const ctx = canvas.getContext('2d');
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                        }
                    } else {
                        let errorMsg = result.message || 'সার্ভার ভ্যালিডেশন এরর।';
                        if (result.errors) {
                            const errorDetails = Object.entries(result.errors).map(([field, msgs]) => {
                                return `[${field}] : ${msgs.join(', ')}`;
                            }).join('\n');
                            errorMsg = errorDetails;
                        }
                        
                        const errorModal = document.getElementById('errorModal');
                        const errorDetailsBox = document.getElementById('errorDetails');
                        if (errorModal && errorDetailsBox) {
                            errorDetailsBox.innerText = errorMsg;
                            errorModal.classList.add('active');
                        } else {
                            alert('ত্রুটিঃ\n' + errorMsg);
                        }
                    }
                } catch (error) {

                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.textContent = error.message;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ ' + error.message);
                    }
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;
                }
            }
        });

        subAgentForm.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
            });
        });
    }

    // Generic forms (Local/Demo behavior)
    const genericAgentForm = document.getElementById('agentForm');
    if (genericAgentForm) {
        genericAgentForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (typeof showModal === 'function') {
                showModal();
            }
            genericAgentForm.reset();
        });
    }

    // Member Form Submission
    const memberForm = document.getElementById('memberForm');
    if (memberForm) {
        initSignaturePad('signaturePad', 'signatureInput', 'clearSignature');

        memberForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const canvas = document.getElementById('signaturePad');
            const signatureInput = document.getElementById('signatureInput');
            
            const submitBtn = memberForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;
            
            // Simple validation
            let isValid = true;
            const requiredFields = memberForm.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (field.id === 'consent') {
                    const consentError = document.getElementById('consentError');
                    if (!field.checked) {
                        if (consentError) consentError.style.display = 'block';
                        isValid = false;
                    } else {
                        if (consentError) consentError.style.display = 'none';
                    }
                } else if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });

            // Signature validation
            if (signatureInput && signatureInput.hasAttribute('required') && signatureInput.value === '') {
                const sigWrapper = canvas.closest('.signature-pad-wrapper');
                const sigError = document.getElementById('signatureError');
                if (sigWrapper) sigWrapper.style.borderColor = 'var(--error)';
                if (sigError) sigError.style.display = 'block';
                isValid = false;
            }

            if (!isValid) {
                alert('দয়া করে সকল প্রয়োজনীয় তথ্য পূরণ করুন।');
                return;
            }
            
            try {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> প্রসেসিং হচ্ছে...';
                
                // For member form, we use FormData because it includes a photo
                const formData = new FormData(memberForm);

                // Convert signature Base64 to PNG File
                const signatureData = signatureInput.value;
                if (signatureData) {
                    try {
                        const blob = await (await fetch(signatureData)).blob();
                        formData.delete('digital_sign'); 
                        formData.append('digital_sign', blob, 'signature.png'); 
                    } catch (sigErr) {

                    }
                }
                
                const response = await fetch('https://admin.mrpfoundation.net/api/member-registration', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json().catch(() => ({}));

                if (response.ok) {
                    const modal = document.getElementById('successModal');
                    if (modal) {
                        modal.classList.add('active');
                    } else {
                        alert('আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে!');
                    }
                    memberForm.reset();
                    // Reset canvas
                    if (canvas) {
                        const ctx = canvas.getContext('2d');
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                    }
                    // Reset photo preview if exists
                    const previewImg = document.getElementById('previewImg');
                    const uploadPlaceholder = document.querySelector('.upload-placeholder');
                    if (previewImg) previewImg.style.display = 'none';
                    if (uploadPlaceholder) uploadPlaceholder.style.display = 'flex';
                } else {
                    let errorMsg = result.message || 'সার্ভার ভ্যালিডেশন এরর।';
                    if (result.errors) {
                        const errorDetails = Object.entries(result.errors).map(([field, msgs]) => {
                            return `[${field}] : ${msgs.join(', ')}`;
                        }).join('\n');
                        errorMsg = errorDetails;
                    }
                    
                    // Show Error in Modal instead of alert
                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.innerText = errorMsg;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ\n' + errorMsg);
                    }
                }
            } catch (error) {

                const errorModal = document.getElementById('errorModal');
                const errorDetailsBox = document.getElementById('errorDetails');
                if (errorModal && errorDetailsBox) {
                    errorDetailsBox.textContent = error.message;
                    errorModal.classList.add('active');
                } else {
                    alert('ত্রুটিঃ ' + error.message);
                }
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        });

        // Real-time validation removal for member form
        memberForm.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
            });
        });
    }

    // Contact Form Submission
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;
            
            // Simple validation
            let isValid = true;
            const requiredFields = contactForm.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });

            if (!isValid) {
                alert('দয়া করে সকল প্রয়োজনীয় তথ্য পূরণ করুন।');
                return;
            }
            
            try {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> পাঠানো হচ্ছে...';
                
                const formDataObj = new FormData(contactForm);
                const data = {};
                formDataObj.forEach((value, key) => data[key] = value);
                
                const response = await fetch('https://admin.mrpfoundation.net/api/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json().catch(() => ({}));

                if (response.ok) {
                    const modal = document.getElementById('successModal');
                    if (modal) {
                        modal.classList.add('active');
                    } else {
                        alert('আপনার বার্তা সফলভাবে পাঠানো হয়েছে!');
                    }
                    contactForm.reset();
                } else {
                    let errorMsg = result.message || 'সার্ভার ভ্যালিডেশন এরর।';
                    if (result.errors) {
                        const errorDetails = Object.entries(result.errors).map(([field, msgs]) => {
                            return `[${field}] : ${msgs.join(', ')}`;
                        }).join('\n');
                        errorMsg = errorDetails;
                    }
                    
                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.innerText = errorMsg;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ\n' + errorMsg);
                    }
                }
            } catch (error) {

                const errorModal = document.getElementById('errorModal');
                const errorDetailsBox = document.getElementById('errorDetails');
                if (errorModal && errorDetailsBox) {
                    errorDetailsBox.textContent = error.message;
                    errorModal.classList.add('active');
                } else {
                    alert('ত্রুটিঃ ' + error.message);
                }
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        });

        contactForm.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
            });
        });
    }

    // Job Application Form Submission
    const jobApplicationForm = document.getElementById('jobApplicationForm');
    if (jobApplicationForm) {
        jobApplicationForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const submitBtn = jobApplicationForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.querySelector('.btn-text').textContent;
            
            // Validation
            let isValid = true;
            const requiredFields = jobApplicationForm.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });

            if (!isValid) {
                alert('দয়া করে সকল প্রয়োজনীয় তথ্য পূরণ করুন।');
                return;
            }
            
            try {
                submitBtn.disabled = true;
                submitBtn.querySelector('.btn-text').textContent = 'প্রসেসিং হচ্ছে...';
                
                const formData = new FormData(jobApplicationForm);
                
                const response = await fetch('https://admin.mrpfoundation.net/api/apply-for-vacancy', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                        // No Content-Type header needed for FormData; browser sets it with boundary
                    },
                    body: formData
                });

                const result = await response.json().catch(() => ({}));

                if (response.ok) {
                    const modal = document.getElementById('successModal');
                    if (modal) {
                        modal.classList.add('active');
                    } else {
                        alert('আপনার আবেদন সফলভাবে জমা হয়েছে!');
                    }
                    jobApplicationForm.reset();
                    // Reset file input label if exists
                    const fileLabel = jobApplicationForm.querySelector('.file-input-label');
                    if (fileLabel) fileLabel.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> ফাইল নির্বাচন করুন';
                } else {
                    let errorMsg = result.message || 'সার্ভার ভ্যালিডেশন এরর।';
                    if (result.errors) {
                        const errorDetails = Object.entries(result.errors).map(([field, msgs]) => {
                            return `[${field}] : ${msgs.join(', ')}`;
                        }).join('\n');
                        errorMsg = errorDetails;
                    }
                    
                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.innerText = errorMsg;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ\n' + errorMsg);
                    }
                }
            } catch (error) {

                const errorModal = document.getElementById('errorModal');
                const errorDetailsBox = document.getElementById('errorDetails');
                if (errorModal && errorDetailsBox) {
                    errorDetailsBox.textContent = error.message;
                    errorModal.classList.add('active');
                } else {
                    alert('ত্রুটিঃ ' + error.message);
                }
            } finally {
                submitBtn.disabled = false;
                submitBtn.querySelector('.btn-text').textContent = originalBtnText;
            }
        });

        // Real-time validation removal
        jobApplicationForm.querySelectorAll('.form-control, input, select, textarea').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('error');
            });
        });
    }

    // Scroll Animation Observer
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target); // Only animate once
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll(`
        .hero-text h1, .hero-text p, .hero-text .btn,
        .section-title,
        .about-content h3, .about-content p, .benefits-list li, .about-content .btn,
        .contact-item,
        .footer-about h3, .footer-about p, .social-link,
        .footer-widget h4, .footer-links li, .newsletter-form, .newsletter-form p,
        .form-group, .page-header h1, .page-header p,
        .req-card, .req-title, .req-list li, .highlight-box, .text-center h3, .text-center .btn,
        .partner-card, .benefit-card, .job-card, .benefit-item,
        .reveal-text
    `);
    
    revealElements.forEach(el => {
        el.classList.add('reveal-text');
        
        const hasManualDelay = Array.from(el.classList).some(cls => cls.startsWith('delay-'));
        
        if (!hasManualDelay) {
            if (el.tagName === 'LI') {
                const index = Array.from(el.parentNode.children).indexOf(el);
                if (index < 12) {
                    el.style.transitionDelay = `${(index + 1) * 0.1}s`;
                }
            }
            
            if (el.classList.contains('social-link') || el.classList.contains('contact-item')) {
                const index = Array.from(el.parentNode.children).indexOf(el);
                el.style.transitionDelay = `${(index + 1) * 0.1}s`;
            }

            const parent = el.parentElement;
            if (parent && (parent.classList.contains('hero-text') || parent.classList.contains('about-content') || parent.classList.contains('benefits-grid') || parent.classList.contains('partner-grid') || parent.classList.contains('jobs-grid'))) {
                 const index = Array.from(parent.children).indexOf(el);
                 el.style.transitionDelay = `${(index + 1) * 0.15}s`;
            }
        }

        observer.observe(el);
    });
});
