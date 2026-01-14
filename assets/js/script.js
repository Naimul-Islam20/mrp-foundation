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

    // Dealer Form Validation
    const dealerForm = document.getElementById('dealerForm');
    if (dealerForm) {
        dealerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            let isValid = true;
            
            // Full Name Validation
            const fullName = document.getElementById('fullName');
            if (fullName.value.trim() === '') {
                fullName.classList.add('error');
                isValid = false;
            } else {
                fullName.classList.remove('error');
            }

            // Mobile Validation
            const mobile = document.getElementById('mobile');
            const mobilePattern = /^[0-9]{11}$/;
            if (!mobilePattern.test(mobile.value.trim())) {
                mobile.classList.add('error');
                isValid = false;
            } else {
                mobile.classList.remove('error');
            }

            // Email Validation (Now Required)
            const email = document.getElementById('email');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value.trim())) {
                email.classList.add('error');
                isValid = false;
            } else {
                email.classList.remove('error');
            }

            // Business Name Validation
            const businessName = document.getElementById('businessName');
            if (businessName.value.trim() === '') {
                businessName.classList.add('error');
                isValid = false;
            } else {
                businessName.classList.remove('error');
            }

            // Business Type Validation
            const businessType = document.getElementById('businessType');
            if (businessType.value === '') {
                businessType.classList.add('error');
                isValid = false;
            } else {
                businessType.classList.remove('error');
            }

            // Business Years Validation
            const businessYears = document.getElementById('businessYears');
            if (businessYears.value.trim() === '') {
                businessYears.classList.add('error');
                isValid = false;
            } else {
                businessYears.classList.remove('error');
            }

            // Address Validation
            const address = document.getElementById('address');
            if (address.value.trim() === '') {
                address.classList.add('error');
                isValid = false;
            } else {
                address.classList.remove('error');
            }

            // District Validation
            const district = document.getElementById('district');
            if (district.value.trim() === '') {
                district.classList.add('error');
                isValid = false;
            } else {
                district.classList.remove('error');
            }

            // Reason Validation
            const reason = document.getElementById('reason');
            if (reason.value.trim() === '') {
                reason.classList.add('error');
                isValid = false;
            } else {
                reason.classList.remove('error');
            }

            // Consent Validation
            const consent = document.getElementById('consent');
            const consentError = document.getElementById('consentError');
            if (!consent.checked) {
                consentError.style.display = 'block';
                isValid = false;
            } else {
                consentError.style.display = 'none';
            }

            if (isValid) {
                // Show Custom Modal instead of Alert
                if (typeof showModal === 'function') {
                    showModal();
                } else {
                    // Fallback if function not defined in current scope (though it should be)
                    alert('আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে! আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।');
                }
                dealerForm.reset();
            }
        });

        // Real-time validation removal
        document.querySelectorAll('.form-control').forEach(input => {
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
