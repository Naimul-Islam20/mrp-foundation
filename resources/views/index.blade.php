@extends('layouts.app')

@section('title', 'MRP Foundation - মানুষের সেবায় সর্বদা')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
      <div class="container hero-container">
        <div class="hero-text">
          <h1 class="reveal-text delay-100">
            আমাদের দেশজুড়ে এজেন্ট নেটওয়ার্কে যোগ দিন
          </h1>
          <p class="reveal-text delay-200">
            MRP Foundation এর সাথে আপনার ব্যবসা সম্প্রসারণ করুন। আমরা দিচ্ছি
            আকর্ষণীয় লাভে এজেন্টশিপের সুযোগ। সুবিধাবঞ্চিত মানুষের সেবার
            পাশাপাশি নিশ্চিত করুন নিজের আর্থিক সমৃদ্ধি।
          </p>
          <a
            href="{{ route('become-agent') }}"
            class="btn btn-primary reveal-text delay-300"
            >এজেন্টশিপের জন্য আবেদন করুন</a
          >
          <a
            href="{{ route('become-member') }}"
            class="btn btn-secondary-white reveal-text delay-300"
            style="margin-left: 14px"
            >সদস্য হোন</a
          >
        </div>
        <div class="hero-image">
          <img
            src="{{ asset('assets/images/hero-side.png') }}"
            alt="Volunteers helping community"
          />
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section about-section">
      <div class="container">
        <h2 class="section-title reveal-text">কেন আমাদের সাথে কাজ করবেন?</h2>

        <div class="about-container">
          <div class="about-image reveal-text">
            <img
              src="{{ asset('assets/images/about-dealer.png') }}"
              alt="Business Partnership"
            />
          </div>
          <div class="about-content">
            <h3
              class="mb-1 reveal-text delay-100"
              style="color: var(--primary-dark)"
            >
              উজ্জ্বল ভবিষ্যতের পথে আপনার বিশ্বস্ত সঙ্গী
            </h3>
            <p class="mb-1 reveal-text delay-200">
              এমআরপি ফাউন্ডেশন দীর্ঘ এক দশক ধরে সুনামের সাথে কার্যক্রম পরিচালনা
              করে আসছে। আমাদের উৎপাদিত পণ্য গুণগত মানের দিক থেকে সর্বদা সেরা।
              আমরা বিশ্বাস করি পারস্পরিক সহযোগিতার ভিত্তিতেই একটি শক্তিশালী
              ব্যবসায়িক সম্পর্ক গড়ে ওঠে।
            </p>

            <ul class="benefits-list reveal-text delay-200">
              <li class="">
                <i class="fas fa-check-circle"></i> সর্বোচ্চ কমিশন ও আকর্ষণীয়
                ইনসেনটিভ
              </li>
              <li class="">
                <i class="fas fa-check-circle"></i> নিয়মিত পণ্য সরবরাহ ও
                লজিস্টিক সাপোর্ট
              </li>
              <li class="">
                <i class="fas fa-check-circle"></i> এলাকাভিত্তিক একচেটিয়া
                এজেন্ট সুবিধা
              </li>
              <li class="">
                <i class="fas fa-check-circle"></i> বার্ষিক ব্যবসায়িক সম্মেলন ও
                বিদেশ ভ্রমণ
              </li>
            </ul>

            <a
              href="{{ route('become-agent') }}"
              class="btn btn-primary mt-1 reveal-text delay-400"
              >আজই যুক্ত হোন</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
      <div class="container">
        <h2 class="section-title reveal-text">যোগাযোগ করুন</h2>
        <div class="contact-container">
          <!-- Contact Info -->
          <div class="contact-info">
            <div class="contact-item reveal-text delay-100">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-details">
                <h4>আমাদের ঠিকানা</h4>
                <p id="home-address">
                    <i class="fas fa-map-marker-alt" style="color: var(--secondary-color); margin-right: 5px"></i>
                    হাউজ #১/এ, রোড #৬, সেক্টর #৩, উত্তরা মডেল টাউন, উত্তরা, ঢাকা-১২৩০
                </p>
              </div>
            </div>

            <div class="contact-item reveal-text delay-200">
              <div class="contact-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="contact-details">
                <h4>ফোন নম্বর</h4>
                <p id="home-phone">+৮৮০ ১২৩৪ ৫৬৭৮৯০<br />+৮৮০ ৯৮৭৬ ৫৪৩২১০</p>
              </div>
            </div>

            <div class="contact-item reveal-text delay-300">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-details">
                <h4>ইমেইল</h4>
                <p id="home-email">mrpfoundation19@gmail.com</p>
              </div>
            </div>
          </div>

          <!-- Map -->
          <div class="contact-map reveal-text delay-200">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902442430139!2d90.39108031536267!3d23.75085809467746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b888ad3f983d%3A0x20c70986185ad2ba!2sDhanmondi%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1649934177399!5m2!1sen!2sbd"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </section>
@endsection
