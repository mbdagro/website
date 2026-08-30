@extends('layouts.FontEndApps')
@section('title')
    <title>All Apartment</title>
@endsection
@section('content')
    <!-- PAGE TITLE -->
    <div class="page-title page-main-section" style="margin-top: -8px">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Ongoing Apartments</h1>
                @php
                    use Carbon\Carbon;

                    // Check if $HomeManagement->start_date exists
                    $yearsSinceStart = isset($HomeManagement->start_date)
                        ? Carbon::parse($HomeManagement->start_date)->diffInYears(Carbon::now())
                        : 0;
                @endphp
                <h5>{{ $yearsSinceStart }} Years Of Experience!</h5>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
                <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></span><a href="listing-2.html">Ongoing Apartments</a>
            </div>
        </div>
    </div>
    <!-- PAGE TITLE -->

    <!-- LISTING STYLE - 2 -->
    <section class="property-query-area property-page-bg hidden-lg" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bottom40">
                    <h2 class="text-uppercase">Advanced <span class="color_red">Search</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
            </div>
            <div class="row">
                <form class="findus">
                    <div class="col-md-3 col-sm-4 mb-3">
                        <div class="single-query form-group">
                            <label for="pages">Property Type</label>
                            <select name="pages" id="pages" class="form-control" onchange="location = this.value;">
                                <option value="" disabled selected>Select</option>
                                <option value="{{ route('all.apartments') }}">All Apartments</option>
                                <option value="{{ route('ongoing.apartments') }}">Ongoing Apartments</option>
                                <option value="{{ route('completed.apartments') }}">Completed Apartments</option>
                                <option value="{{ route('upcomeing.apartments') }}">UPCOMING APARTMENTS</option>
                                <option value="{{ route('consultancy.apartments') }}">Tunky/Consultancy Apartments</option>
                                <option value="{{ route('completed.duplex') }}">Duplex Project</option>
                                <option value="{{ route('completed.lands') }}">Land Project</option>
                                <option value="{{ route('completed.hotels') }}">Hotel Project</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--LISTING STYLE- 2 -->


    <!-- LISTING -->
    <section id="listings" class="padding">
        <div class="container" style="margin-top: -60px">
            <div class="row bottom40">
                <div class="col-xs-12 col-lg-7">
                    <h2 class="uppercase">Ongoing Apartments <span class="color_red">LISTINGS</span></h2>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                    <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
                </div>
                <form class="findus">
                    <div class="col-lg-5 hidden-xs hidden-sm hidden-md">
                        <h2 class="text-uppercase">
                            {{-- Advanced --}} Property
                            <span class="color_red">Search</span>
                        </h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                        <div class="single-query form-group">
                            {{-- <label for="pages">Property Type</label> --}}
                            <select name="pages" id="pages" class="form-control" onchange="location = this.value;">
                                <option value="" disabled selected>Select</option>
                                <option value="{{ route('all.apartments') }}">All Apartments</option>
                                <option value="{{ route('ongoing.apartments') }}">Ongoing Apartments</option>
                                <option value="{{ route('completed.apartments') }}">Completed Apartments</option>
                                <option value="{{ route('upcomeing.apartments') }}">UPCOMING APARTMENTS</option>
                                <option value="{{ route('consultancy.apartments') }}">Tunky/Consultancy Apartments</option>
                                <option value="{{ route('completed.duplex') }}">Duplex Project</option>
                                <option value="{{ route('completed.lands') }}">Land Project</option>
                                 <option value="{{ route('completed.hotels') }}">Hotel Project</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row bottom30">
                @foreach ($ProductService as $ProductService)
                    <div class="col-md-4 col-sm-6">
                        <div class="property_item bottom40">
                            <div class="image">
                                {{-- <img src="{{ asset($ProductService->image) }}" alt="listin" class="img-responsive"> --}}
                                <div id="propertySlider{{ $ProductService->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                        @if($ProductService->image)
                                            <div class="item active">
                                                <img src="{{ asset($ProductService->image) }}" class="img-responsive listing-image">
                                            </div>
                                        @endif

                                        @if($ProductService->image1)
                                            <div class="item">
                                                <img src="{{ asset($ProductService->image1) }}"
                                                    class="img-responsive listing-image">
                                            </div>
                                        @endif

                                        @if($ProductService->image2)
                                            <div class="item">
                                                <img src="{{ asset($ProductService->image2) }}"
                                                    class="img-responsive listing-image">
                                            </div>
                                        @endif

                                        @if($ProductService->image3)
                                            <div class="item">
                                                <img src="{{ asset($ProductService->image3) }}"
                                                    class="img-responsive listing-image">
                                            </div>
                                        @endif

                                        @if($ProductService->image4)
                                            <div class="item">
                                                <img src="{{ asset($ProductService->image4) }}"
                                                    class="img-responsive listing-image">
                                            </div>
                                        @endif

                                        @if($ProductService->image5)
                                            <div class="item">
                                                <img src="{{ asset($ProductService->image5) }}"
                                                    class="img-responsive listing-image">
                                            </div>
                                        @endif

                                    </div>

                                    <!-- Controls -->
                                    {{-- <a class="left carousel-control" href="#propertySlider{{ $ProductService->id }}"
                                        data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>

                                    <a class="right carousel-control" href="#propertySlider{{ $ProductService->id }}"
                                        data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a> --}}
                                </div>

                                <div class="price"><span class="tag">{{ $ProductService->progress }}</span></div>
                                {{-- <div class="overlay">
                                    <div class="centered"><a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                            Now</a>
                                    </div>
                                </div> --}}
                                <div class="overlay" style="pointer-events: none;">
                                    <div class="centered" style="pointer-events: auto;">
                                        <a class="link_arrow white_border" href="{{ route('book-now') }}"
                                            style="pointer-events: auto;">
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="proerty_content">
                                <div class="proerty_text">
                                    <h3><a
                                            href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                    </h3>
                                    {{-- <span>{{ $ProductService->description }}</span> --}}
                                    <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                </div>
                                <div class="favroute clearfix">
                                    <p class="pull-md-left">{{ $ProductService->price ?? 'Not Given' }} Start price
                                        ({{ $ProductService->size }} sq ft)
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


<style>
    .listing-image {
        width: 100% !important;
        max-width: 360px !important;
        height: 220px !important;
        object-fit: cover !important;
    }

    @media (max-width: 768px) {
        .listing-image {
            width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
        }
    }
</style>