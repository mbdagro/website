@extends('layouts.FontEndApps')
@section('title')
    <title>Printing</title>
@endsection
@section('content')


<!-- PAGE TITLE -->
<div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1> Printing & Publication </h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="listing-2.html"> Printing & Publication </a>
      </div>
    </div>
  </div>
  <!-- PAGE TITLE -->


  <!-- LISTING -->
  <section id="listings" class="padding" style="margin-top: -50px">
    <div class="container">
      <div class="row bottom40">
        <div class="col-xs-12">
          <h2 class="uppercase">Printing   <span class="color_red">&</span> Publication</h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>

        </div>
      </div>
      <div class="row bottom30">
        @foreach($Concerns as $Concern)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card shadow-sm">
                    <a href="#">
                        <!-- Image section -->
                        <img
                            src="{{ asset($Concern->logo) ? asset($Concern->logo) : 'https://via.placeholder.com/400x400?text=No+Logo' }}"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover; border-bottom: 1px solid #ddd;"
                            alt="Concern Logo"
                        >

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <!-- Offer Type -->
                            <div class="offer-type mb-3">
                                <span class="badge bg-info text-white">For Sale</span>
                            </div>

                            <!-- Title and Description -->
                            <h5 class="card-title">{{ $Concern->title }}</h5>
                            <p class="card-text">{{ \Str::limit($Concern->description, 100) }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>


    <!-- Add hover effect to rows -->


      {{-- <div class="row top40">
        <div class="col-md-12">
          <ul class="pager">
            <li><a href="#.">1</a></li>
            <li class="active"><a href="#.">2</a></li>
            <li><a href="#.">3</a></li>
          </ul>
        </div>
      </div> --}}
    </div>
  </section>
	<!-- list-head -->

	<!-- end loader -->
@endsection
