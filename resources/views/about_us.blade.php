@extends('layouts.FontEndApps')
@section('title')
<title>About Us</title>
@endsection
<style>
    .text-md-end {
        text-align: right !important;
    }
</style>
@section('content')
<div class="page-title page-main-section parallaxie" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
        <div class="main-title">
            <h1>about {{ $HomeManagement->company_name }}</h1>
            <div class="">
                <p style="text-transform: none; font-size:17px;">{{($HomeManagement->about_us_card) }}</p>
            </div>
            <a href="{{ route('fronted.home') }}">home</a><span><i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></span><a href="{{ route('about.us') }}">Award</a>
        </div>
    </div>
</div>

{{-- why-choose-section --}}
<section class="why-choose-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left: Image -->
            <div class="col-lg-6 col-md-12 image-col">
                <!-- Replace src with your actual image -->
                <img src="{{ asset('Project/1.png') }}" alt="Investment Analytics" class="main-image">
                <div class="play-overlay">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="5,3 19,12 5,21" />
                    </svg>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6 col-md-12 content-col">

                <!-- Badge -->
                <div class="badge-label">
                    <!-- Leaf SVG icon -->
                    <svg class="leaf-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6 2 3 8 3 12c0 5 4 9 9 9s9-4 9-9C21 6 18 2 12 2z" fill="#2e7d32" opacity="0.2" />
                        <path d="M12 2 C8 6 6 10 8 14 C10 18 14 18 16 14 C18 10 16 6 12 2Z" fill="#2e7d32" />
                        <line x1="12" y1="14" x2="12" y2="21" stroke="#2e7d32" stroke-width="1.5" />
                    </svg>
                    <span>Why Choose Us</span>
                </div>

                <!-- Title -->
                <h2 class="section-title">
                    Why You Should Invest<br>With MBD AGRO
                </h2>

                <!-- Description -->
                <p class="section-desc">
                    Invest with confidence in sustainable agriculture and livestock projects, ensuring long-term growth
                    and stable returns.
                </p>

                <!-- Features Grid -->
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

                <!-- Button -->
                <a href="{{ route('project') }}" class="btn-see-projects">See Projects</a>

            </div>
        </div>
    </div>
</section>
{{-- ===== TIMELINE SECTION ===== --}}
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center mb-5">
            <div class="text-center">
                <h2 class="fw-bold">Our Journey</h2>
                <p class="text-muted">The story behind our growth and commitment to agriculture.</p>
            </div>
        </div>

        @foreach($journeys as $journey)
        @if($journey->image_position === 'left')
        <div class="row align-items-center mb-5">
            <div class="col-md-5 text-center mb-4 mb-md-0">
                <img src="{{ asset('storage/' . $journey->image) }}" alt="{{ $journey->title }}"
                    class="img-fluid rounded-3 shadow-sm" style="max-height:200px; width:100%; object-fit:cover;">
            </div>
            <div class="col-md-2 text-center mb-4 mb-md-0 year-fixed">
                <h3 class="fw-bold text-secondary">{{ $journey->year }}</h3>
            </div>
            <div class="col-md-5">
                <h3 class="fw-bold mb-3">{{ $journey->title }}</h3>
                <p class="text-muted">{{ $journey->description }}</p>
            </div>
        </div>
        @else
        <div class="row align-items-center mb-5">
            <div class="col-md-5 order-md-1 mb-4 mb-md-0">
                <h3 class="fw-bold mb-3 text-md-end">{{ $journey->title }}</h3>
                <p class="text-muted">{{ $journey->description }}</p>
            </div>
            <div class="col-md-2 text-center mb-4 mb-md-0 year-fixed">
                <h3 class="fw-bold text-secondary">{{ $journey->year }}</h3>
            </div>
            <div class="col-md-5 text-center order-md-3 mb-4 mb-md-0">
                <img src="{{ asset('storage/' . $journey->image) }}" alt="{{ $journey->title }}"
                    class="img-fluid rounded-3 shadow-sm" style="max-height:200px; width:100%; object-fit:cover;">
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
{{-- ===== OUR COMMITMENT SECTION ===== --}}
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
{{-- Our Mission --}}
<section id="our-mission" class="padding" style="margin-top: -80px">
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

            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="our-mission-box-detail">


                    <p class="text-justify"> {{ Str::words($HomeManagement->welcome_description, 400) }} </p>
                </div>
            </div>

            @php
            $welcomeImage = $HomeManagement->welcome_image
            ? \Illuminate\Support\Facades\Storage::disk(config('filesystems.voucher_disk',
            'public'))->url($HomeManagement->welcome_image)
            : asset('images/no-image.png');
            @endphp

            <div class="col-md-5 col-sm-5 col-xs-12">
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
            ? \Illuminate\Support\Facades\Storage::disk(config('filesystems.voucher_disk',
            'public'))->url($HomeManagement->vision_image)
            : asset('images/no-image.png');
            @endphp

            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="our-mission-box-img">
                    <img src="{{ $visionImage }}" alt="img">
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="our-mission-box-detail">
                    <p class="text-justify"> {{ Str::words($HomeManagement->vision_description, 400) }} </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Our Vision End -->
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
                    @foreach($faqs as $key => $faq)
                    <div class="faq-panel panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#faqAccordion" href="#faq{{ $key }}"
                                    class="faq-link">
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
    $('#faqAccordion').on('show.bs.collapse', function (e) {
    $('.faq-icon').text('+');
    $('[href="#' + $(e.target).attr('id') + '"] .faq-icon').text('-');
    });
    $('#faqAccordion').on('hide.bs.collapse', function (e) {
        $('[href="#' + $(e.target).attr('id') + '"] .faq-icon').text('+');
    });
</script>
@endsection
