@extends('layouts.FontEndApps')
@section('title')
    <title>News Event</title>
@endsection
@section('content')



<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>News & Events</h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="#.">News & Events</a>
      </div>
    </div>
  </div>
  <!--===== #/PAGE TITLE =====-->


  <!--===== Agency Listing =====-->
  <section class="padding agency-listing" style="margin-top: -50px">
    <div class="container">

      <div class="row bottom40">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-12 col-sm-10 col-md-8 text-center">
            <h2 class="text-uppercase">Agency<span class="color_red"> Listing</span></h2>
            <div class="line_1-1"></div>
            <div class="line_2-2"></div>
            <div class="line_3-3"></div>

        </div>
          <div class="col-sm-1 col-md-2"></div>
      </div>
      @foreach($events as $event)

        <div class="row agency-listing-box">

            <div class="image-round">
            <div>
                <img src="{{ asset($event->image) }}" alt="image" />
                <span>
                    {{$event->news_event_date}}
                </span>
            </div>
            </div>

            <div class="details">
            <div class="agency-box">
                <h2>{{$event->title}}</h2>
                <p>{{$event->description}}</p>
                {{-- <h3><i class="fa fa-map-marker"></i> 16 Property</h3> --}}
                {{-- <p>Proin condimentum tempus ultrices. Suspendisse vestibulum suscipit erat, ac efficitur lorem. Nullam non ex vel turpis imperdiet maximus sit amet nec odio. Donec mauris nisl, vestibulum id efficitur at, convallis id dui. Sed enim nisl, ultrices vitae sodales eu, vestibulum a mi. Morbi consectetur pulvinar sagittis. Phasellus pharetra diam id leo gravida pharetra. In rutrum est gravida, maximus mi ac, mattis metus. Ut at tempus sem. Vivamus condimentum erat eget aliquet dignissim. </p> --}}
                {{-- <a href="#" class="btn_fill">Read More</a> --}}
            </div>
            </div>

        </div>
      @endforeach



    </div>
  </section>
  <!--===== #/Agency Listing =====-->

@endsection
