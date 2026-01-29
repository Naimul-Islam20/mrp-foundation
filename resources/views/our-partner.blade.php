@extends('layouts.app')

@section('title', 'আমাদের পার্টনার - MRP Foundation')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/partner.css') }}" />
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
      <div class="container">
        <h1 class="reveal-text">আমাদের পার্টনার</h1>
        <p class="reveal-text delay-100">
          সফলতার পথে আমাদের বিশ্বস্ত সহযোগীরা
        </p>
      </div>
    </div>

    <!-- Partner Section -->
    <section class="section">
      <div class="container">
        <div class="text-center reveal-text">
          <h2 class="section-title" style="margin-bottom: 2rem">
            আমাদের সম্মানিত পার্টনাররা
          </h2>
          <p style="margin-bottom: 2rem">
            আমাদের যাত্রায় যারা আমাদের পাশে থেকে সহযোগিতা করছেন
          </p>
        </div>

        <div class="partner-grid">
          <!-- Partner 1 -->
          <div class="partner-card reveal-text delay-100">
            <div class="partner-logo">
              <i class="fas fa-building"></i>
            </div>
            <h3>মুক্তধারা টেকনোলজি লিমিটেড</h3>
            <p>
              ওয়েবসাইট ডেভেলপমেন্ট ও টেকনিক্যাল সাপোর্টে আমাদের প্রধান
              পার্টনার। তাদের কারিকারি দক্ষতা আমাদের ডিজিটাল উপস্থিতি শক্তিশালী
              করেছে।
            </p>
          </div>

          <!-- Partner 2 -->
          <div class="partner-card reveal-text delay-200">
            <div class="partner-logo">
              <i class="fas fa-hand-holding-heart"></i>
            </div>
            <h3>সমাজ কল্যাণ পরিষদ</h3>
            <p>
              সামাজিক কার্যক্রম পরিচালনায় আমাদের মূল্যবান সহযোগী। তাদের
              অভিজ্ঞতা ও নেটওয়ার্ক আমাদের সেবা কার্যক্রমকে আরও বিস্তৃত করেছে।
            </p>
          </div>

          <!-- Partner 3 -->
          <div class="partner-card reveal-text delay-300">
            <div class="partner-logo">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <h3>শিক্ষা উন্নয়ন ফাউন্ডেশন</h3>
            <p>
              শিক্ষামূলক কর্মসূচিতে আমাদের অন্যতম পার্টনার। তাদের সহযোগিতায়
              আমরা শিক্ষা সহায়তা প্রোগ্রাম সফলভাবে পরিচালনা করছি।
            </p>
          </div>

          <!-- Partner 4 -->
          <div class="partner-card reveal-text delay-100">
            <div class="partner-logo">
              <i class="fas fa-heartbeat"></i>
            </div>
            <h3>স্বাস্থ্য সেবা অধিদপ্তর</h3>
            <p>
              স্বাস্থ্যসেবা কার্যক্রমে আমাদের গুরুত্বপূর্ণ পার্টনার। তাদের
              পেশাদার সহায়তায় আমরা মানসম্মত স্বাস্থ্যসেবা নিশ্চিত করছি।
            </p>
          </div>

          <!-- Partner 5 -->
          <div class="partner-card reveal-text delay-200">
            <div class="partner-logo">
              <i class="fas fa-chart-line"></i>
            </div>
            <h3>আর্থিক প্রতিষ্ঠান সমিতি</h3>
            <p>
              আর্থিক স্বচ্ছতা ও হিসাবরক্ষণে আমাদের বিশ্বস্ত পার্টনার। তাদের
              নিয়মিত অডিট ও পরামর্শ আমাদের কার্যক্রমকে আরও স্বচ্ছ করেছে।
            </p>
          </div>

          <!-- Partner 6 -->
          <div class="partner-card reveal-text delay-300">
            <div class="partner-logo">
              <i class="fas fa-users"></i>
            </div>
            <h3>যুব উন্নয়ন পরিষদ</h3>
            <p>
              যুব সমাজের কর্মসংস্থান ও দক্ষতা উন্নয়নে আমাদের সহযোগী। তাদের সাথে
              মিলে আমরা যুবদের জন্য বিভিন্ন প্রশিক্ষণ প্রোগ্রাম চালাচ্ছি।
            </p>
          </div>
        </div>

        <!-- Partnership Benefits -->
        <div class="partnership-benefits">
          <h2 class="text-center reveal-text">পার্টনারশিপের সুবিধা</h2>
          <div class="benefits-grid">
            <div class="benefit-item reveal-text delay-100">
              <i class="fas fa-handshake"></i>
              <h4>পারস্পরিক সহযোগিতা</h4>
              <p>একসাথে কাজ করে বৃহত্তর সাফল্য অর্জন</p>
            </div>
            <div class="benefit-item reveal-text delay-200">
              <i class="fas fa-network-wired"></i>
              <h4>নেটওয়ার্ক সম্প্রসারণ</h4>
              <p>ব্যবসায়িক ও সামাজিক নেটওয়ার্ক বৃদ্ধি</p>
            </div>
            <div class="benefit-item reveal-text delay-300">
              <i class="fas fa-trophy"></i>
              <h4>সুনাম অর্জন</h4>
              <p>সামাজিক দায়িত্ব পালনে স্বীকৃতি</p>
            </div>
            <div class="benefit-item reveal-text delay-400">
              <i class="fas fa-chart-line"></i>
              <h4>সামগ্রিক উন্নতি</h4>
              <p>ব্যক্তিগত ও প্রাতিষ্ঠানিক প্রবৃদ্ধি</p>
            </div>
          </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center reveal-text" style="margin-top: 3rem">
          <h2>আমাদের সাথে পার্টনার হোন</h2>
          <p style="margin-bottom: 2rem">
            আপনিও হতে পারেন আমাদের যাত্রার অংশ। সমাজের উন্নয়নে আপনার অবদান
            রাখুন।
          </p>
          <div class="cta-buttons">
            <a href="{{ route('become-member') }}" class="btn btn-primary">সদস্য হোন</a>
            <a href="{{ route('become-agent') }}" class="btn btn-secondary">পার্টনারশিপের জন্য যোগাযোগ</a>
          </div>
        </div>
      </div>
    </section>
@endsection
