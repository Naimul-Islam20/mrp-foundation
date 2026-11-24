<header class="navbar">
    <div class="container nav-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="MRP Foundation" />
        </a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">হোম</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link">আমাদের সম্পর্কে
                    <i class="fas fa-chevron-down" style="font-size: 0.8em; margin-left: 4px"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('our-inception') }}" class="dropdown-item">আমাদের সূচনা</a></li>
                    <li><a href="{{ route('mission-vision') }}" class="dropdown-item">আমাদের লক্ষ্য ও দৃষ্টিভঙ্গি</a></li>
                    <li><a href="{{ route('certification') }}" class="dropdown-item">সনদপত্র</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link">মিডিয়া
                    <i class="fas fa-chevron-down" style="font-size: 0.8em; margin-left: 4px"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('event') }}" class="dropdown-item">ইভেন্ট</a></li>
                    <li><a href="{{ route('news') }}" class="dropdown-item">সংবাদ</a></li>
                    <li><a href="{{ route('gallery') }}" class="dropdown-item">গ্যালারি</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('our-partner') }}" class="nav-link">আমাদের অংশীদাররা</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('career') }}" class="nav-link">ক্যারিয়ার</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact') }}" class="nav-link">যোগাযোগ</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('agent-requirements') }}" class="nav-link">যোগ্যতা সমূহ</a>
            </li>
            <li class="nav-item nav-actions">
                <a href="{{ route('become-agent') }}" class="btn btn-primary">এজেন্ট হোন</a>
                <a href="{{ route('become-member') }}" class="btn btn-secondary-white active">সদস্য হোন</a>
                <a href="{{ route('become-sub-agent') }}" class="btn btn-primary btn-sub-agent">সাব এজেন্ট</a>
                <a href="{{ route('share-investment') }}" class="btn btn-secondary-white">শেয়ার বিনিয়োগ</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</header>
