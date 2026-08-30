@extends('layouts.FontEndApps')
@section('meta_author')
    {{ $ProductService->meta_author }}
@endsection
@section('meta_title')
    {{ $ProductService->meta_title }}
@endsection
@section('meta_description')
    {{ $ProductService->meta_description }}
@endsection
@section('meta_keywords')
    {{ $ProductService->meta_keywords }}
@endsection
@section('og_title')
    {{ $ProductService->og_title }}
@endsection
@section('og_description')
    {{ $ProductService->og_description }}
@endsection
@section('og_site_name')
    {{ $ProductService->og_sitename }}
@endsection
@section('og_image')
    @if (isset($ProductService->image))
        {{ asset('/') }}{{ $ProductService->image }}
    @endif
@endsection
<style>
    @media (max-width: 767px) {
        .img-size {
            max-height: 300px;
        }

        .img-size-small {
            max-height: 80px;
        }
    }
</style>
@section('content')
    <!--===== PAGE TITLE =====-->
    {{-- <div class="page-title page-main-section parallaxie">
        <div class="container padding-bottom-top-120 text-uppercase text-center">
            <div class="main-title">
                <h1>Property Details</h1>
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
                        aria-hidden="true"></i></span><a href="#.">Property Details - 3</a>
            </div>
        </div>
    </div> --}}
    <!--===== #/PAGE TITLE =====-->


    <!-- PROPERTY DETAILS-->
    <section id="news-section-1" class="property-details padding_top">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px">
                    <h2 class="text-uppercase">{{ $ProductService->name }}</h2>
                    <p class="bottom20">{{ $ProductService->address }}</p>
                    <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="property-d-1" class="owl-carousel">
                                <div class="item"><img src="{{ asset($ProductService->image) }}" alt="image"
                                        class="img-size" style="height: 600px" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image1) }}" alt="image"
                                        class="img-size" style="height: 600px" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image2) }}" alt="image"
                                        class="img-size" style="height: 600px" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image3) }}" alt="image"
                                        class="img-size" style="height: 600px" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image4) }}" alt="image"
                                        class="img-size" style="height: 600px" /></div>
                            </div>
                            <div id="property-d-1-2" class="owl-carousel">
                                <div class="item"><img src="{{ asset($ProductService->image) }}" alt="image"
                                        class="img-size-small" style="height: 160px;" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image1) }}" alt="image"
                                        class="img-size-small" style="height: 160px;" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image2) }}" alt="image"
                                        class="img-size-small" style="height: 160px;" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image3) }}" alt="image"
                                        class="img-size-small" style="height: 160px;" /></div>
                                <div class="item"><img src="{{ asset($ProductService->image4) }}" alt="image"
                                        class="img-size-small" style="height: 160px;" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="row top40">
                        <div class="col-md-8">
                            <div class="row margin_bottom_new">
                                <div class="col-xs-12 top40">
                                    <h3 class="text-uppercase bottom30">Property <span class="color_red">Description</span>
                                    </h3>
                                    <p class="bottom30">{{ $ProductService->short_description }}</p>
                                    <p class="bottom30">{!! $ProductService->description !!}</p>
                                    <div class="property_meta top10">
                                        <span><i class="fa fa-object-group"></i>{{ $ProductService->size }} sq ft </span>
                                        <span><i class="fa fa-bed"></i>{{ $ProductService->room_qty }} Rooms</span>
                                        <span><i class="fa fa-bath"></i>{{ $ProductService->bathroom_qty }} Bathroom</span>
                                        <span><i class="fa fa-car"></i>{{ $ProductService->garadge_qty }} Garage</span>
                                        <span><i class="fa fa-eye"></i>{{ $ProductService->baranda_qty }} Lobby</span>
                                    </div>
                                    {{-- <a class="link_arrow top30" href="#.">Read More</a> --}}
                                </div>
                            </div>
                            <div class="row margin_bottom_new">
                                <div class="col-xs-12">
                                    <h3 class="text-uppercase bottom30">Quick <span class="color_red">Summery</span></h3>
                                </div>
                                <div class="property-d-table clearfix">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td><b>Property Code</b></td>
                                                    <td class="text-right">{{ $ProductService->code }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Starting Price</b></td>
                                                    <td class="text-right">{{ $ProductService->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Property Size</b></td>
                                                    <td class="text-right">{{ $ProductService->size }}ft2</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Rooms</b></td>
                                                    <td class="text-right">{{ $ProductService->room_qty }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Bathrooms</b></td>
                                                    <td class="text-right">{{ $ProductService->bathroom_qty }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Available From</b></td>
                                                    <td class="text-right">
                                                        {{ \Carbon\Carbon::parse($ProductService->available_from)->format('d M Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone </b></td>
                                                    <td class="text-right"> {{ $ProductService->property_contact }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <table class="table table-striped table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td><b>Status</b></td>
                                                    <td class="text-right">{{ $ProductService->progress }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Year Built</b></td>
                                                    <td class="text-right">
                                                        {{ \Carbon\Carbon::parse($ProductService->built_year)->format('d M Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Garages</b></td>
                                                    <td class="text-right">{{ $ProductService->garadge_qty }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lobby</b></td>
                                                    <td class="text-right">{{ $ProductService->baranda_qty }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Floors</b></td>
                                                    <td class="text-right">{{ $ProductService->floor }} th</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Category</b></td>
                                                    <td class="text-right">{{ $ProductService->category }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email </b></td>
                                                    <td class="text-right"> {{ $ProductService->property_email }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Video Section --}}
                            @if(!empty($ProductService->video_link))
                                <div class="row" style="padding-left: 20px; padding-right: 20px; margin-top: 20px;">
                                    <div class="col-xs-12">
                                        <h3 class="text-uppercase bottom30">Property <span class="color_red">Video</span></h3>
                                    </div>
                                    <div class="col-xs-12">
                                        <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
                                            <iframe src="https://www.youtube.com/embed/{{ $ProductService->video_link }}"
                                                frameborder="0" allowfullscreen
                                                style="position:absolute; top:0; left:0; width:100%; height:100%;">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- {{ $ProductService->google_location }}
                            <div class="row margin_bottom">
                                <div class="col-xs-12">
                                    <h3 class="text-uppercase bottom30">Property <span class="color_red">Map</span></h3>
                                </div>
                                <div class="col-md-12">
                                    <div id="" style="height: 350px;"></div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-4 col-lg-4">
                            {{-- <div class="search_box blog-thumbnail">
                                <div class="input-group">
                                    <input class="form-control custom_input" placeholder="Search" type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default custom_input" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </div> --}}
                            <div class="blog_info blog-thumbnail">
                                <div class="blogimagedescription">
                                    <h3>Show More</h3>
                                </div>
                                <style>
                                    /* General link styles */
                                    .hover-effect {
                                        text-decoration: none;
                                        /* Removes underline */
                                        color: #333;
                                        /* Default color */
                                        font-weight: normal;
                                        /* Default weight */
                                        transition: color 0.3s ease, font-weight 0.3s ease;
                                        /* Smooth transition */
                                    }

                                    /* Hover effect */
                                    .hover-effect:hover {
                                        color: #007BFF;
                                        /* Hover color */
                                        font-weight: bold;
                                        /* Makes font bold on hover */
                                    }
                                </style>
                                <ul class="archives">
                                    <li><a href="{{ route('all.apartments') }}" class="hover-effect">All Apartments</a>
                                    </li>
                                    <li><a href="{{ route('ongoing.apartments') }}" class="hover-effect">Ongoing
                                            Apartments</a></li>
                                    <li><a href="{{ route('completed.apartments') }}" class="hover-effect">Completed
                                            Apartments</a></li>
                                    <li><a href="{{ route('upcomeing.apartments') }}" class="hover-effect">Upcoming
                                            Apartments</a></li>
                                    <li><a href="{{ route('consultancy.apartments') }}"
                                            class="hover-effect">Turnkey/Consultancy Apartments</a></li>
                                    <li><a href="{{ route('completed.duplex') }}" class="hover-effect">Duplex Project</a>
                                    </li>
                                    <li><a href="{{ route('completed.lands') }}" class="hover-effect">Land Project</a>
                                    </li>
                                </ul>

                            </div>
                            <div class="blog_info blog-thumbnail">
                                <div class="blogimagedescription">
                                    <h3>Popular posts</h3>
                                </div>
                                <ul class="archieves">

                                    @foreach ($Popular_ProductServices as $Popular_ProductService)
                                        <li>
                                            <div class="col-md-4 padding_none">
                                                <div class="blogimage_thumbnail" style="overflow: visible;">
                                                    <img src="{{ asset($Popular_ProductService->image) }}" alt="blog1 image"
                                                        style="height: 65px; width: 100px; display: block; transform: translateX(-20%); object-fit: cover;">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="blogimagedescription">
                                                    <h3><a
                                                            href="{{ route('apartments.details', ['id' => $Popular_ProductService->id]) }}">{{ $Popular_ProductService->name }}</a>
                                                    </h3>
                                                    <p class="detail">
                                                    <p><a href="#">{{ Str::words($Popular_ProductService->address, 3) }}</a>
                                                    </p>
                                                    <p><a
                                                            href="#">{{ \Carbon\Carbon::parse($Popular_ProductService->available_from)->format('d M Y') }}</a>
                                                    </p>

                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-uppercase  bottom40 top40">Recent <span
                                            class="color_red">Properties</span></h3>
                                </div>
                                <div class="col-md-12">
                                    <div id="agent-3-slider" class="owl-carousel">

                                        @foreach ($galleries as $gallery)
                                            <div class="item">
                                                <div class="property_item heading_space">
                                                    <div class="image">
                                                        <a href="#."><img src="{{ asset($gallery->image) }}" alt="listin"
                                                                class="img-responsive" style="height: 200px;"></a>
                                                        {{-- <div class="feature"><span class="tag-2">For Rent</span></div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section id="agent-p-2" class="property-details bg_light padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 bottom40">
                    <h2 class="text-uppercase">Duplex <span class="color_red">Properties </span></h2>
                    {{-- <div class="line_1"></div>
                    <div class="line_2"></div>
                    <div class="line_3"></div> --}}
                </div>
            </div>
            <div class="row">
                <div id="property-1-slider" class="owl-carousel">

                    @foreach ($DuplexProductServices as $DuplexProductService)
                        <div class="item">
                            <div class="property_item heading_space">
                                <div class="image">
                                    <img src="{{ asset($DuplexProductService->image) }}" alt="listin" class="img-responsive">
                                    <div class="overlay">
                                        <div class="centered"><a class="link_arrow white_border"
                                                href="{{ route('apartments.details', ['id' => $DuplexProductService->id]) }}">View
                                                Detail</a></div>
                                    </div>
                                    {{-- <div class="feature"><span class="tag">Featured</span></div> --}}
                                    <div class="price"><span class="tag">{{ $DuplexProductService->progress }}</span>
                                    </div>
                                    <div class="property_meta">
                                        <span><i class="fa fa-object-group"></i>{{ $DuplexProductService->size }} sq ft
                                        </span>
                                        <span><i class="fa fa-bed"></i>{{ $DuplexProductService->room_qty }} Rooms</span>
                                        <span><i class="fa fa-bath"></i>{{ $DuplexProductService->bathroom_qty }}
                                            Bathroom</span>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text">
                                        <h3><a href="property_details_1.html">{{ $DuplexProductService->name }}</a></h3>
                                        <span class="bottom10">{{ $DuplexProductService->address }}</span>
                                        <p><strong>Start at : ${{ $DuplexProductService->price }} </strong> </p>
                                    </div>
                                    <div class="favroute clearfix">
                                        <p class="pull-left">
                                            <i class="icon-calendar2"></i>
                                            {{ \Carbon\Carbon::parse($DuplexProductService->available_from)->diffInDays(now()) }}
                                            days ago
                                        </p>

                                        <ul class="pull-right">
                                            {{-- <li><a href="#."><i class="icon-video"></i></a></li>
                                            <li><a href="#."><i class="icon-like"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- /PROPERTY DETAILS - 3 =-->
@endsection
@section('script')
    <script>
        var instance = M.Tabs.init(el, options);

        // Or with jQuery

        $(document).ready(function () {
            $('.tabs').tabs();
        });
    </script>
@endsection