@extends('layouts.FontEndApps')
@section('title')
    <title>Pricing</title>
@endsection
@section('content')


<!-- PAGE TITLE -->
<div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>Pricing of Apartments</h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="listing-2.html">Pricing</a>
      </div>
    </div>
  </div>
  <!-- PAGE TITLE -->




  <!-- LISTING -->
  <section id="listings" class="padding" style="margin-top: -50px">
    <div class="container">
      <div class="row bottom40">
        <div class="col-xs-12">
          <h2 class="uppercase"> Apartments <span class="color_red">Pricing</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>

        </div>
      </div>
      <div class="row bottom30">
        <div class="col">
            <img src="{{ asset($pricing->pricing_image) }}" alt="Pricing Image" width="100% ">
        </div>


      </div>
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


@endsection
