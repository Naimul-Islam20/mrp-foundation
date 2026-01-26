/* 
 * MRP Foundation - Global Script
 * Handles mobile menu toggle and basic interactions
 */

document.addEventListener('DOMContentLoaded', () => {
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
            // Get dimensions from computed style or fallback
            const width = canvas.offsetWidth || 300;
            const height = canvas.offsetHeight || 150;
            
            canvas.width = width * ratio;
            canvas.height = height * ratio;
            ctx.scale(ratio, ratio);
            
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#000';
            
            // Fill background white explicitly
            ctx.fillStyle = "#fff";
            ctx.fillRect(0, 0, width, height);
            
            // If there's already data in input, redraw it (optional, but good for persistence)
            if (signatureInput && signatureInput.value) {
                const img = new Image();
                img.onload = () => ctx.drawImage(img, 0, 0, width, height);
                img.src = signatureInput.value;
            }
        };

        // Delay initialization to ensure layout is ready (fixes issues with reveal animations)
        setTimeout(resizeCanvas, 200);
        window.addEventListener('resize', resizeCanvas);

        const getPos = (e) => {
            const rect = canvas.getBoundingClientRect();
            const clientX = e.clientX || (e.touches && e.touches[0].clientX);
            const clientY = e.clientY || (e.touches && e.touches[0].clientY);
            return {
                x: clientX - rect.left,
                y: clientY - rect.top
            };
        };

        const startDrawing = (e) => {
            signatureDrawing = true;
            const pos = getPos(e);
            ctx.beginPath();
            ctx.moveTo(pos.x, pos.y);
        };

        const draw = (e) => {
            if (!signatureDrawing) return;
            const pos = getPos(e);
            ctx.lineTo(pos.x, pos.y);
            ctx.stroke();
            signatureInput.value = canvas.toDataURL();
            
            // Remove error if drawing
            const sigWrapper = canvas.closest('.signature-pad-wrapper');
            const sigError = document.getElementById('signatureError');
            if (sigWrapper) sigWrapper.style.borderColor = '';
            if (sigError) sigError.style.display = 'none';
        };

        const stopDrawing = () => {
            signatureDrawing = false;
        };

        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', draw);
        window.addEventListener('mouseup', stopDrawing);

        canvas.addEventListener('touchstart', (e) => { e.preventDefault(); startDrawing(e); }, { passive: false });
        canvas.addEventListener('touchmove', (e) => { e.preventDefault(); draw(e); }, { passive: false });
        canvas.addEventListener('touchend', stopDrawing);

        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                ctx.fillStyle = "#fff";
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Standard clear
                ctx.fillRect(0, 0, canvas.width, canvas.height); // Fill white again
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
                    
                    const response = await fetch('http://192.168.68.112:8001/api/agent-registration', {
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
                            const errorDetails = Object.values(result.errors).flat().join('\n');
                            errorMsg = errorDetails;
                        }
                        
                        // Show Error in Modal instead of alert
                        const errorModal = document.getElementById('errorModal');
                        const errorDetailsBox = document.getElementById('errorDetails');
                        if (errorModal && errorDetailsBox) {
                            errorDetailsBox.textContent = errorMsg;
                            errorModal.classList.add('active');
                        } else {
                            alert('ত্রুটিঃ\n' + errorMsg);
                        }
                    }
                } catch (error) {
                    console.error('Submission Error:', error);
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
                    
                    const response = await fetch('http://192.168.68.112:8001/api/sub-agent-registration', {
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
                            const errorDetails = Object.values(result.errors).flat().join('\n');
                            errorMsg = errorDetails;
                        }
                        
                        const errorModal = document.getElementById('errorModal');
                        const errorDetailsBox = document.getElementById('errorDetails');
                        if (errorModal && errorDetailsBox) {
                            errorDetailsBox.textContent = errorMsg;
                            errorModal.classList.add('active');
                        } else {
                            alert('ত্রুটিঃ\n' + errorMsg);
                        }
                    }
                } catch (error) {
                    console.error('Submission Error:', error);
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
                        console.error("❌ Signature conversion failed:", sigErr);
                    }
                }
                
                const response = await fetch('http://192.168.68.112:8001/api/member-registration', {
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
                        const errorDetails = Object.values(result.errors).flat().join('\n');
                        errorMsg = errorDetails;
                    }
                    
                    // Show Error in Modal instead of alert
                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.textContent = errorMsg;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ\n' + errorMsg);
                    }
                }
            } catch (error) {
                console.error('Member Submission Error:', error);
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
                
                const response = await fetch('http://192.168.68.112:8001/api/contact', {
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
                        const errorDetails = Object.values(result.errors).flat().join('\n');
                        errorMsg = errorDetails;
                    }
                    
                    const errorModal = document.getElementById('errorModal');
                    const errorDetailsBox = document.getElementById('errorDetails');
                    if (errorModal && errorDetailsBox) {
                        errorDetailsBox.textContent = errorMsg;
                        errorModal.classList.add('active');
                    } else {
                        alert('ত্রুটিঃ\n' + errorMsg);
                    }
                }
            } catch (error) {
                console.error('Contact Submission Error:', error);
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
        .reveal-text
    `);
    
    revealElements.forEach(el => {
        el.classList.add('reveal-text');
        
        // Skip automatic delay if manual delay is set in HTML
        const hasManualDelay = Array.from(el.classList).some(cls => cls.startsWith('delay-'));
        
        if (!hasManualDelay) {
            // Add staggered delays for regular lists
            if (el.tagName === 'LI') {
                const index = Array.from(el.parentNode.children).indexOf(el);
                if (index < 10) {
                    el.style.transitionDelay = `${(index + 1) * 0.1}s`;
                }
            }
            
            // Add staggered delays for social links
            if (el.classList.contains('social-link')) {
                const index = Array.from(el.parentNode.children).indexOf(el);
                el.style.transitionDelay = `${(index + 1) * 0.1}s`;
            }

            // Add staggered delays for contact items
            if (el.classList.contains('contact-item')) {
                const index = Array.from(el.parentNode.children).indexOf(el);
                el.style.transitionDelay = `${(index + 1) * 0.1}s`;
            }

            // Add staggered delays for Hero and About text content
            const parent = el.parentElement;
            if (parent && (parent.classList.contains('hero-text') || parent.classList.contains('about-content'))) {
                 const index = Array.from(parent.children).indexOf(el);
                 el.style.transitionDelay = `${(index + 1) * 0.15}s`;
            }
        }

        observer.observe(el);
    });
});
