@extends('layouts.FontEndApps')
@section('title')
    <title>Home</title>
@endsection
@section('content')
    <style>
        .custom-slider {
            height: 100vh !important;
            overflow: hidden;
            position: relative;
        }

        .custom-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;

            /* Zoom Animation */
            transform: scale(1);
            animation: zoomIn 12s ease-in-out forwards;
            animation-delay: 3s;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05) translate(-5px, -5px) rotate(0.2deg);
                opacity: 0.9;
            }

            100% {
                transform: scale(1.1) translate(0, 0) rotate(0deg);
                opacity: 1;
            }
        }

        .bottom-card-box {
            width: 100%;
        }

        .rev_slider {
            margin-top: -8px !important;
        }

        /* Desktop View – Overlay on Slider */
        @media (min-width: 992px) {
            .bottom-card-box {
                position: absolute;
                bottom: 125px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 99;
            }
        }

        /* Cards */
        .custom-box {
            background: hsl(187, 37%, 91%);
            max-width: 700px;
            margin: 0 auto;
            box-shadow: rgba(0, 174, 239, 0.6) 0px 8px 19px;
            border-radius: 30px;
            display: flex;
            justify-content: space-between;
            flex-wrap: nowrap;
            padding: 20px;
            margin-top: 30px;
            margin-bottom: -20px;
        }

        .icon-card-custom {
            background: #ffffff;
            border: 2px solid #f1f1f1;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
        }

        .icon-card-custom:hover {
            transform: translateY(-8px);
            border-color: #0d6efd;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: #e9f4ff;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px auto 0;
            transition: background 0.3s ease-in-out;
        }

        .icon-card-custom:hover .icon-wrapper {
            background: #f5f6f8;
        }

        #about-sev {
            margin-top: -50px;
        }

        #about-sev .about-sev-img img {
            width: 100%;
            height: auto;
            margin-top: 100px;
        }

        .about-sev-tag {
            margin-top: -30px;
        }

        /* Mobile / Tablet Responsive Cards */
        @media (max-width: 991px) {
            .bottom-card-box {
                position: relative;
                bottom: auto;
                left: auto;
                transform: none;
                margin-top: 20px;
                z-index: auto;
            }

            /* 2 cards per row medium mobile */
            .custom-box .col-md-4 {
                width: 48%;
                margin-bottom: 15px;
            }

            .realstate-slider-container {
                position: relative;
                margin-top: -58px !important;
            }

            #about-sev {
                margin-top: 0px
            }

        }

        @media (max-width:767px) {
            .icon-card-custom {
                margin-left: -20px;
            }

            .realstate-slider-container {
                position: relative;
                margin-top: -58px !important;
            }

            .icon-wrapper {
                width: 60%;
                height: 65px
            }

            .custom-box {
                width: 60%;
                padding: 0px;
                margin-top: 35px;
                /* flex-wrap: nowrap; */
                flex-wrap: wrap;
            }

            #about-sev {
                margin-top: 600px
            }

            .custom-slider {
                height: 90% !important;
            }

            .col-md-4 h4 {
                font-size: 14px !important;
            }

            .about-sev-tag {
                margin-top: 0px !important;
            }

        }

        /* Small Mobile (<576px) */
        @media (max-width: 575px) {
            .custom-box {
                padding: 0px;
                margin-top: 35px;
            }

            .custom-box .col-md-4 {
                width: 100%;
                margin-bottom: 15px;
            }

            .custom-slider {
                height: 90% !important;
                width: 500px;
                /* height: auto; */
            }

            #about-sev {
                padding-top: 170px;
                padding-bottom: 40px;
            }
        }

        .realstate-slider-container {
            margin-top: -90px;
            /* desktop overlay effect */
        }

        @media (max-width: 991px) {
            .realstate-slider-container {
                position: relative;
                margin-top: -38px;
                /* mobile gap */
            }
        }

        #about-sev {
            padding: 80px 0;
            /* desktop */
        }

        @media (max-width: 991px) {
            #about-sev {
                padding-top: 170px;
                padding-bottom: 40px;
            }

            #about-sev .about-sev-img img {
                width: 100%;
                height: auto;
                margin-top: 20px;
            }

            #about-sev .about-sev-tag h4 {
                font-size: 16px;
            }

            #about-sev .about-sev-tag ul li {
                font-size: 14px;
                line-height: 1.6;
            }

            #about-sev .founder-text p {
                font-size: 14px;
            }
        }

        .faq-section {
            background: linear-gradient(rgba(0, 100, 0, 0.85), rgba(0, 100, 0, 0.85));
            color: #fff;
            padding: 60px 0;
        }

        .faq-panel {
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin: 0;
            box-shadow: none;
        }

        .faq-panel .panel-heading {
            background: transparent;
            border: none;
            padding: 14px 0;
        }

        .faq-panel .panel-title a {
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .faq-panel .panel-title a:hover {
            color: #fff;
            text-decoration: none;
        }

        .faq-icon {
            font-size: 22px;
            font-weight: bold;
            flex-shrink: 0;
            margin-left: 15px;
        }

        .faq-panel .panel-body {
            background: transparent;
            color: #ddd;
            border: none;
            padding: 0 0 14px 0;
            font-size: 14px;
        }

        .our-mission-section {
            margin-top: -80px;
        }

        @media (max-width: 933px) {
            .our-mission-section {
                margin-top: 0px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .our-mission-section {
                margin-top: 120px;
            }
        }

        @media (max-width: 575px) {
            .our-mission-section {
                margin-top: 240px;
            }
        }
    </style>

    <!-- Modern Slider -->
    <section class="rev_slider_wrapper position-relative">
        <!-- Image Slider -->
        <div id="rev_slider_3" class="rev_slider custom-slider" data-version="5.0">
            <ul>
                {{-- @foreach ($gallary as $gallary)
            <li data-transition="fade">
                <img src="{{ asset($gallary->image) }}" alt="" data-bgposition="center center" data-bgfit="cover"
                    class="rev-slidebg">
            </li>
            @endforeach --}}
                @foreach ($gallary as $item)
                    @php
                        $imageUrl = \Illuminate\Support\Facades\Storage::disk(
                            config('filesystems.voucher_disk', 'public'),
                        )->url($item->image);

                        $extension = strtolower(pathinfo($item->image, PATHINFO_EXTENSION));
                    @endphp

                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                        <li data-transition="fade">
                            <img src="{{ $imageUrl }}" alt="Gallery Image" data-bgposition="center center"
                                data-bgfit="cover" class="rev-slidebg">
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        @php
            use Carbon\Carbon;
            $yearsSinceStart = isset($HomeManagement->start_date)
                ? round(Carbon::parse($HomeManagement->start_date)->floatDiffInYears(now()), 0)
                : 0;
            $totalProjects = isset($ProductServices) ? count($ProductServices) : 0;
            $totalInvestors = isset($totalInvestors) ? $totalInvestors : 1500;
        @endphp
        <div class="bottom-card-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="custom-box bg-white">
                        <div class="col-md-4 col-6 text-center mb-3">
                            <h2
                                style="
                        font-size:32px;
                        font-weight:800;
                        color:#0A9F43;
                        margin-top:18px;
                        margin-bottom:5px;
                    ">
                                {{ $yearsSinceStart }}+
                            </h2>
                            <h4 class="fw-bold text-dark">
                                Years Experience
                            </h4>
                        </div>
                        <div class="col-md-4 col-6 text-center mb-3">
                            <h2
                                style="
                        font-size:32px;
                        font-weight:800;
                        color:#0A9F43;
                        margin-top:18px;
                        margin-bottom:5px;
                    ">
                                {{ $totalProjects }}+
                            </h2>

                            <h4 class="fw-bold text-dark">
                                Total Projects
                            </h4>
                        </div>
                        <div class="col-md-4 col-6 text-center mb-3">
                            <h2
                                style="
                        font-size:32px;
                        font-weight:800;
                        color:#0A9F43;
                        margin-top:18px;
                        margin-bottom:5px;
                    ">
                                {{ number_format($totalInvestors) }}+
                            </h2>
                            <h4 class="fw-bold text-dark">
                                Total Investors
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- About Us Card Description --}}
    {{-- @if (!empty($HomeManagement->about_us_card))
        <section class="padding" style="margin-top: 40px; margin-bottom: 40px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div
                            style="width: 55px; height: 55px; background: #6c5ce7; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <i class="fa fa-users" style="color: #fff; font-size: 22px;"></i>
                        </div>

                        <h2 style="font-size: 28px; font-weight: 700; color: #1a1a2e; margin-bottom: 20px;">
                            Who is it for?
                        </h2>

                        <p class="text-justify" style="font-size: 15px; line-height: 1.7; color: #444;">
                            {{ $HomeManagement->about_us_card }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}
    <!-- Modern Slider -->

    {{-- <div class="realstate-slider-container">
    <div class="realstate-slider-content">
        @foreach ($NewsEvent as $news)
        <span class="realstate-news-item">** {{ $news->title }} **</span>
        @endforeach
    </div>
</div> --}}

    {{-- Our Mission --}}
    <section id="our-mission" class="padding our-mission-section">
        <div class="container">

            <div class="row mb-20">
                <div class="col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8 text-center">
                    <h2 class="text-uppercase">Our <span class="color_red">Mission</span></h2>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                    <div class="line_3-3"></div>
                </div>
                <div class="col-sm-1 col-md-2"></div>
            </div>

            <div class="row mt-30">

                <div class="col-md-7 col-sm-7 col-xs-12 reveal-from-left">
                    <div class="our-mission-box-detail">


                        <p class="text-justify"> {{ Str::words($HomeManagement->welcome_description, 400) }} </p>
                    </div>
                </div>

                @php
                    $welcomeImage = $HomeManagement->welcome_image
                        ? \Illuminate\Support\Facades\Storage::disk(config('filesystems.voucher_disk', 'public'))->url(
                            $HomeManagement->welcome_image,
                        )
                        : asset('images/no-image.png');
                @endphp

                <div class="col-md-5 col-sm-5 col-xs-12 reveal-from-right">
                    <div class="our-mission-box-img">
                        <img src="{{ $welcomeImage }}" alt="img">
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Our Mission End -->
    <!-- Our Vision Start -->
    <section id="our-mission" class="padding" style="margin-top: -150px">
        <div class="container">
            <div class="row mb-20">
                <div class="col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8 text-center">
                    <h2 class="text-uppercase">Our <span class="color_red">Vision</span></h2>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                    <div class="line_3-3"></div>
                    {{-- <p class="heading_space"></p> --}}
                </div>
                <div class="col-sm-1 col-md-2"></div>
            </div>
            <div class="row mt-30">
                @php
                    $visionImage = $HomeManagement->vision_image
                        ? \Illuminate\Support\Facades\Storage::disk(config('filesystems.voucher_disk', 'public'))->url(
                            $HomeManagement->vision_image,
                        )
                        : asset('images/no-image.png');
                @endphp

                <div class="col-md-5 col-sm-5 col-xs-12 reveal-from-right">
                    <div class="our-mission-box-img">
                        <img src="{{ $visionImage }}" alt="img">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 reveal-from-left">
                    <div class="our-mission-box-detail">
                        <p class="text-justify"> {{ Str::words($HomeManagement->vision_description, 400) }} </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our Vision End -->
    <style>
        /* Section styling */
        .view-listing-section {
            padding: 40px 0;
            background: linear-gradient(135deg, #46e3ee 0%, #1C1C1D 100%);
            color: #fff;
            background-size: cover;
            background-position: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .view-listing-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            /* Dark overlay for better text visibility */
            z-index: 1;
        }

        /* Heading styling */
        .view-listing-heading {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px 20px;
            position: relative;
            z-index: 2;
        }

        .info-section-color {
            padding: 40px 0;
            background: linear-gradient(135deg, #71db67 0%, #171747 100%);
            color: #fff;
            background-size: cover;
            background-position: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .main-heading {
            font-size: 40px;
            font-weight: 700;
            color: #fff;
            line-height: 1.4;
            margin-bottom: 20px;
            letter-spacing: -1px;
            text-transform: capitalize;
        }

        .main-heading .highlight {
            color: #0A9F43;
            font-weight: 700;
            font-style: italic;
        }

        /* Subheading */
        .subheading {
            font-size: 20px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Button styling */
        .view-all-button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #05916e;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            border: 2px solid #0A9F43;
            margin-top: 20px;
        }

        .view-all-button:hover {
            background-color: #fff;
            color: #0A9F43;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .listing-image {
            width: 100%;
            max-width: 360px;
            height: 220px;
            object-fit: cover;
        }

        /* Additional Styling for responsiveness */
        @media (max-width: 768px) {
            .main-heading {
                font-size: 32px;
            }

            .subheading {
                font-size: 18px;
            }

            .view-all-button {
                padding: 12px 25px;
                font-size: 16px;
            }

            .listing-image {
                width: 100%;
                max-width: 100%;
                height: auto;
            }
        }
    </style>
    {{-- Our Journey --}}
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row justify-content-center mb-5">
                <div class="text-center">
                    <h2 class="fw-bold">Our Journey</h2>
                    <p class="text-muted">The story behind our growth and commitment to agriculture.</p>
                </div>
            </div>

            @foreach ($journeys as $journey)
                @if ($journey->image_position === 'left')
                    <div class="row align-items-center mb-5">
                        <div class="col-md-5 text-center mb-4 mb-md-0 reveal-from-left">
                            <img src="{{ asset('storage/' . $journey->image) }}" alt="{{ $journey->title }}"
                                class="img-fluid rounded-3 shadow-sm"
                                style="max-height:200px; width:100%; object-fit:cover;">
                        </div>
                        <div class="col-md-2 text-center mb-4 mb-md-0 year-fixed">
                            <h3 class="fw-bold text-secondary">{{ $journey->year }}</h3>
                        </div>
                        <div class="col-md-5 reveal-from-right">
                            <h3 class="fw-bold mb-3">{{ $journey->title }}</h3>
                            <p class="text-muted">{{ $journey->description }}</p>
                        </div>
                    </div>
                @else
                    <div class="row align-items-center mb-5">
                        <div class="col-md-5 order-md-1 mb-4 mb-md-0 reveal-from-left">
                            <h3 class="fw-bold mb-3 text-md-end ">{{ $journey->title }}</h3>
                            <p class="text-muted">{{ $journey->description }}</p>
                        </div>
                        <div class="col-md-2 text-center mb-4 mb-md-0 year-fixed">
                            <h3 class="fw-bold text-secondary">{{ $journey->year }}</h3>
                        </div>
                        <div class="col-md-5 text-center order-md-3 mb-4 mb-md-0 reveal-from-right">
                            <img src="{{ asset('storage/' . $journey->image) }}" alt="{{ $journey->title }}"
                                class="img-fluid rounded-3 shadow-sm"
                                style="max-height:200px; width:100%; object-fit:cover;">
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="text-center mt-5">
                <a href="{{ route('about.us') }}" class="btn btn-dark px-4 py-2 show-more-btn">
                    Show More
                </a>
            </div>
        </div>
    </section>
    {{-- Blogs Page --}}
    <section style="background:#fff; padding:60px 0;">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Blogs</h2>
            <div class="row g-4" id="blog-container">
                @forelse($blogs as $blog)
                    <div class="col-md-4 blog-item {{ $loop->iteration > 6 ? 'd-none' : '' }} ">
                        <div class="card h-100" style="border:1px solid #e0e0e0; border-radius:8px; overflow:hidden;">
                            @php
                                $disk = config('filesystems.voucher_disk', 'public');
                                $imgUrl = $blog->image
                                    ? Storage::disk($disk)->url($blog->image)
                                    : asset('images/default-blog.jpg');
                            @endphp
                            <img src="{{ $imgUrl }}" alt="{{ $blog->title }}"
                                style="width:100%; height:200px; object-fit:cover;">

                            <div class="card-body" style="padding:16px;">
                                <h5 style="font-weight:700; font-size:15px; color:#111;">{{ $blog->title }}</h5>
                                <p style="font-size:13px; color:#666; margin-bottom:10px;">
                                    <i class="fa fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                </p>

                                @if ($blog->excerpt)
                                    <p style="font-size:13px; color:#444; line-height:1.5;">
                                        {{ \Str::limit($blog->excerpt, 80) }}
                                    </p>
                                @endif

                                <a href="{{ route('blog.show', $blog->slug) }}"
                                    style="display:inline-block; border:1px solid #bbb; padding:6px 16px; font-size:13px; color:#333; border-radius:4px; text-decoration:none;">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">No blogs found.</div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('blogs.view') }}" class="btn btn-dark px-4 py-2 show-more-btn">
                    Show More
                </a>
            </div>

            <style>
                .show-more-btn {
                    border-radius: 6px;
                    padding: 10px 24px !important;
                    font-size: 15px;
                    font-weight: 600;
                    letter-spacing: 0.3px;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    gap: 5px;
                }

                .show-more-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
                }

                .show-more-btn i {
                    transition: transform 0.3s ease;
                }

                .show-more-btn:hover i {
                    transform: translateX(4px);
                }
            </style>

        </div>
    </section>

    {{-- why-choose-section --}}
    {{-- <section class="why-choose-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 image-col">
                    <img src="{{ asset('Project/1.png') }}" alt="Investment Analytics" class="main-image">
                    <div class="play-overlay">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="5,3 19,12 5,21" />
                        </svg>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 content-col">

                    <div class="badge-label">
                        <svg class="leaf-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6 2 3 8 3 12c0 5 4 9 9 9s9-4 9-9C21 6 18 2 12 2z" fill="#2e7d32"
                                opacity="0.2" />
                            <path d="M12 2 C8 6 6 10 8 14 C10 18 14 18 16 14 C18 10 16 6 12 2Z" fill="#2e7d32" />
                            <line x1="12" y1="14" x2="12" y2="21" stroke="#2e7d32"
                                stroke-width="1.5" />
                        </svg>
                        <span>Why Choose Us</span>
                    </div>

                    <h2 class="section-title">
                        Why You Should Invest<br>With {{ $HomeManagement->company_name }}
                    </h2>

                    <p class="section-desc">
                        Invest with confidence in sustainable agriculture and livestock projects, ensuring long-term growth
                        and stable returns.
                    </p>

                    <div class="features-grid">
                        <div class="feature-item">
                            <div class="feature-dot"></div>
                            <span class="feature-text-new">Reality-based farm project:</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-dot"></div>
                            <span class="feature-text-new">Profitable and short-term returns:</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-dot"></div>
                            <span class="feature-text-new">Transparency and regular reporting:</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-dot"></div>
                            <span class="feature-text-new">Experienced management team:</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-dot"></div>
                            <span class="feature-text-new">Diverse projects and sectors:</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-dot"></div>
                            <span class="feature-text-new">Contractual safe investment:</span>
                        </div>
                    </div>

                    <a href="{{ route('project') }}" class="btn-see-projects">See Projects</a>

                </div>
            </div>
        </div>
    </section> --}}
    {{-- Project Section --}}
    {{-- <section class="marginTopButtom">
        <div class="row custom-section" style="padding: 18px">
            <h1 class="section-title">Our Most Popular Offers</h1>
            <p class="section-desc">{{ $HomeManagement->company_name }} manages cow, chicken, and goat projects not just on
                paper but on the ground.
                The project you invest in will be visible to your eyes.
            </p>
        </div>
        <div class="container">
            <div class="container-fluid">
                <div class="row g-3">
                    @foreach ($ProductServices as $ProductServiuce)
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('project.show', $ProductServiuce->id) }}"
                                style="text-decoration:none;color:inherit;">
                                <div class="project-card">
                                    <div class="card-img">
                                        @php
                                            $imageUrl = $ProductServiuce->image
                                                ? \Illuminate\Support\Facades\Storage::disk(
                                                    config('filesystems.voucher_disk', 'public'),
                                                )->url($ProductServiuce->image)
                                                : asset('Project/1.png');
                                        @endphp
                                        <img src="{{ $imageUrl }}" class="img-fluid">

                                        <span class="roi">ROI {{ $ProductServiuce->rio }}%</span>

                                        <span
                                            class="status {{ \Carbon\Carbon::now()->gt($ProductServiuce->end_date) ? 'closed' : 'active' }}">
                                            {{ \Carbon\Carbon::now()->gt($ProductServiuce->end_date) ? 'Closed' : 'Active' }}
                                        </span>

                                    </div>

                                    <div class="card-body">

                                        <h5>{{ $ProductServiuce->name }}</h5>

                                        <div class="price-box">
                                            <span>Per Share</span>
                                            <h4>৳{{ number_format($ProductServiuce->per_share, 2) }}</h4>
                                        </div>

                                        <div class="info-box">

                                            <div class="d-flex">
                                                <span>Start date:</span>
                                                <span>{{ date('d M Y', strtotime($ProductServiuce->start_date)) }}</span>
                                            </div>

                                            <div class="d-flex">
                                                <span>Maturity Date:</span>
                                                <span>{{ date('d M Y', strtotime($ProductServiuce->end_date)) }}</span>
                                            </div>

                                            <div class="d-flex">
                                                <span>Project Duration:</span>
                                                <span>{{ $ProductServiuce->duration }} Months</span>
                                            </div>

                                            <div class="d-flex">
                                                <span>Remaining Unit:</span>
                                                <span>
                                                    @php
                                                        $cleanPrice = str_replace(',', '', $ProductServiuce->price);
                                                        $cleanPerShare = str_replace(
                                                            ',',
                                                            '',
                                                            $ProductServiuce->per_share,
                                                        );
                                                        $price = floatval($cleanPrice);
                                                        $perShare = floatval($cleanPerShare);
                                                        if ($perShare > 0) {
                                                            $remainingUnits = $price / $perShare;
                                                            echo number_format($remainingUnits, 0) . ' Units';
                                                        } else {
                                                            echo '0 Units';
                                                        }
                                                    @endphp
                                                </span>
                                            </div>

                                            <div class="d-flex">
                                                <span>Investment Time:</span>
                                                <span>
                                                    @php
                                                        $days = \Carbon\Carbon::now()->diffInDays(
                                                            $ProductServiuce->end_date,
                                                            false,
                                                        );
                                                    @endphp

                                                    @if ($days < 0)
                                                        0 days
                                                    @else
                                                        {{ round($days) }} days
                                                    @endif
                                                </span>
                                            </div>

                                        </div>

                                        @if (\Carbon\Carbon::now()->gt($ProductServiuce->end_date))
                                            <button class="btn closed-btn w-100">Project Closed</button>
                                        @else
                                            <button class="btn invest-btn w-100">Invest Now</button>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row custom-section">
            <a href="{{ route('project') }}" class="btn-see-projects">See Offers</a>
        </div>
    </section> --}}
    {{-- commitment section --}}
    <section class="commitment-section">
        <div class="container">

            {{-- Header --}}
            <div class="commitment-header">
                <h2>Our Commitment</h2>
                <div class="commitment-divider">
                    <span></span><span></span><span></span>
                </div>
                <p>Empowering sustainable agriculture and livestock investments to create a greener, more profitable future
                    for all.</p>
            </div>

            {{-- Cards --}}
            <div class="commitment-cards">

                <div class="commitment-card">
                    <div class="commitment-icon-wrap">
                        {{-- farmer / hand holding plant --}}
                        <i class="fa fa-leaf" aria-hidden="true"></i>
                    </div>
                    <h4>Considering the financial situation of the farmer</h4>
                </div>

                <div class="commitment-card">
                    <div class="commitment-icon-wrap">
                        {{-- quality / thumbs up stars --}}
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    </div>
                    <h4>Creating access to quality input</h4>
                </div>

                <div class="commitment-card">
                    <div class="commitment-icon-wrap">
                        {{-- market / store --}}
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    </div>
                    <h4>Creating our own market for agriculture</h4>
                </div>

                <div class="commitment-card">
                    <div class="commitment-icon-wrap">
                        {{-- ecosystem / globe --}}
                        <i class="fa fa-globe" aria-hidden="true"></i>
                    </div>
                    <h4>Controlling harmful food and preserving ecosystems</h4>
                </div>

            </div>
        </div>
    </section>
    {{-- How to Investment  --}}
    {{-- <div class="marginTopButtom">
    <section style="padding: 70px 0; background: #fff;">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <img src="{{ asset('Project/1.png') }}" alt="Farm"
                        style="width:100%; height:500px; object-fit:cover; border-radius:12px;">
                </div>

                <div class="col-md-6 col-sm-12" style="padding-left:40px; padding-top:10px;">

                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
                        <i class="fa fa-leaf" style="color:#2e7d32; font-size:16px;"></i>
                        <span
                            style="font-size:12px; font-weight:700; color:#444; letter-spacing:2px; text-transform:uppercase;">
                            Investment Process
                        </span>
                        <i class="fa fa-leaf" style="color:#2e7d32; font-size:16px;"></i>
                    </div>

                    <h2 style="font-size:36px; font-weight:800; color:#1a1a1a; margin-bottom:12px;">
                        How to Investment
                    </h2>

                    <p style="font-size:14px; color:#888; margin-bottom:36px; line-height:1.7;">
                        This short-term and long-term project with attractive <br>returns বিনিয়োগের সুবিধা নিন।
                    </p>

                    <div style="display:flex; align-items:flex-start; gap:20px; margin-bottom:0;">
                        <div style="display:flex; flex-direction:column; align-items:center;">
                            <div
                                style="width:60px; height:60px; border-radius:50%; border:2px dashed #2e7d32; display:flex; align-items:center; justify-content:center; background:#fff;">
                                <i class="fa fa-user-plus" style="font-size:22px; color:#1a1a1a;"></i>
                            </div>
                            <div style="width:2px; height:50px; border-left:2px dashed #b0d4b2; margin:4px 0;"></div>
                        </div>
                        <div style="padding-top:10px; padding-bottom:20px;">
                            <h5 style="font-size:16px; font-weight:700; color:#1a1a1a; margin-bottom:6px;">Create an
                                Account</h5>
                            <p style="font-size:13px; color:#777; line-height:1.6; margin:0;">Sign up on MBD AGRO and
                                verify your account to access investment</p>
                        </div>
                    </div>

                    <div style="display:flex; align-items:flex-start; gap:20px; margin-bottom:0;">
                        <div style="display:flex; flex-direction:column; align-items:center;">
                            <div
                                style="width:60px; height:60px; border-radius:50%; border:2px dashed #2e7d32; display:flex; align-items:center; justify-content:center; background:#fff;">
                                <i class="fa fa-hand-pointer-o" style="font-size:22px; color:#1a1a1a;"></i>
                            </div>
                            <div style="width:2px; height:50px; border-left:2px dashed #b0d4b2; margin:4px 0;"></div>
                        </div>
                        <div style="padding-top:10px; padding-bottom:20px;">
                            <h5 style="font-size:16px; font-weight:700; color:#1a1a1a; margin-bottom:6px;">Invest in
                                Projects</h5>
                            <p style="font-size:13px; color:#777; line-height:1.6; margin:0;">Choose from various
                                agriculture and livestock projects and invest with ease.</p>
                        </div>
                    </div>

                    <div style="display:flex; align-items:flex-start; gap:20px; margin-bottom:0;">
                        <div style="display:flex; flex-direction:column; align-items:center;">
                            <div
                                style="width:60px; height:60px; border-radius:50%; border:2px dashed #2e7d32; display:flex; align-items:center; justify-content:center; background:#fff;">
                                <i class="fa fa-dollar" style="font-size:22px; color:#1a1a1a;"></i>
                            </div>
                            <div style="width:2px; height:50px; border-left:2px dashed #b0d4b2; margin:4px 0;"></div>
                        </div>
                        <div style="padding-top:10px; padding-bottom:20px;">
                            <h5 style="font-size:16px; font-weight:700; color:#1a1a1a; margin-bottom:6px;">Let Your
                                Money Grow</h5>
                            <p style="font-size:13px; color:#777; line-height:1.6; margin:0;">Your investment generates
                                returns as our experts manage the projects.</p>
                        </div>
                    </div>

                    <div style="display:flex; align-items:flex-start; gap:20px;">
                        <div style="display:flex; flex-direction:column; align-items:center;">
                            <div
                                style="width:60px; height:60px; border-radius:50%; border:2px dashed #2e7d32; display:flex; align-items:center; justify-content:center; background:#fff;">
                                <i class="fa fa-hand-o-up" style="font-size:22px; color:#1a1a1a;"></i>
                            </div>
                        </div>
                        <div style="padding-top:10px;">
                            <h5 style="font-size:16px; font-weight:700; color:#1a1a1a; margin-bottom:6px;">Withdraw
                                Your
                                Earnings</h5>
                            <p style="font-size:13px; color:#777; line-height:1.6; margin:0;">Securely withdraw your
                                profits or reinvest for more growth.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div> --}}

    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12" style="margin-bottom:30px;">
                    <p style="font-size:12px; text-transform:uppercase; letter-spacing:2px;">FAQ</p>
                    <h2 style="font-weight:800; color:#fff;">What people have asked about us</h2>
                    <p style="margin-top:15px; color:#ddd;">Investment with attractive returns.</p>
                    <a href="{{ route('project') }}"
                        style="display:inline-block; margin-top:15px; background:#28a745; color:#fff; padding:10px 28px; border-radius:4px; text-decoration:none; font-weight:600;">
                        View Projects
                    </a>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="panel-group" id="faqAccordion">
                        @foreach ($faqs as $key => $faq)
                            <div class="faq-panel panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#faqAccordion"
                                            href="#faq{{ $key }}" class="faq-link">
                                            <span style="font-size:18px">{{ $faq->question }}</span>
                                            <span class="faq-icon">+</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faq{{ $key }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#bannerCarousel').carousel({
                interval: 3000, // 3 seconds
                pause: "false"
            });
            $("#company_slider").owlCarousel({
                autoPlay: 3000,
                items: 3,
                navigation: false,
                pagination: false,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4]
            });
            $("#concern_slider").owlCarousel({
                autoPlay: 3000,
                stopOnHover: true,
                items: 1,
                navigation: false,
                pagination: false,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4]
            });
        });
    </script>
    <script>
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                let icon = this.querySelector('.faq-icon');
                if (this.classList.contains('collapsed')) {
                    icon.textContent = '-';
                } else {
                    icon.textContent = '+';
                }
            });
        });
        document.querySelectorAll('.accordion-collapse').forEach(item => {
            item.addEventListener('show.bs.collapse', function() {
                document.querySelectorAll('.faq-icon').forEach(i => i.textContent = '+');
                let btn = document.querySelector('[data-bs-target="#' + this.id + '"]');
                btn.querySelector('.faq-icon').textContent = '-';
            });
            item.addEventListener('hide.bs.collapse', function() {
                let btn = document.querySelector('[data-bs-target="#' + this.id + '"]');
                btn.querySelector('.faq-icon').textContent = '+';
            });
        });
        $('#faqAccordion').on('show.bs.collapse', function(e) {
            $('.faq-icon').text('+');
            $('[href="#' + $(e.target).attr('id') + '"] .faq-icon').text('-');
        });
        $('#faqAccordion').on('hide.bs.collapse', function(e) {
            $('[href="#' + $(e.target).attr('id') + '"] .faq-icon').text('+');
        });
    </script>
    <script>
        $(document).ready(function() {
            if (typeof ScrollReveal !== 'undefined') {
                var sr = ScrollReveal({
                    distance: '60px',
                    duration: 1000,
                    easing: 'ease-in-out',
                    reset: false, // set true if you want it to re-animate every time it enters view
                    viewFactor: 0.2
                });

                sr.reveal('.reveal-from-left', {
                    origin: 'left'
                });
                sr.reveal('.reveal-from-right', {
                    origin: 'right',
                    delay: 150
                });
            } else {
                console.warn('ScrollReveal is not loaded.');
            }
        });
    </script>
@endsection
