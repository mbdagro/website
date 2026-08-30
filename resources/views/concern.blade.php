@extends('layouts.FontEndApps')
@section('title')
    <title>Concern</title>
@endsection
@section('content')

<!-- PAGE TITLE -->
<div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1> Our Concern </h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="listing-2.html"> Our Concern </a>
      </div>
    </div>
  </div>
  <!-- PAGE TITLE -->


  <!-- LISTING -->
  {{-- <section id="listings" class="padding" style="margin-top: -50px">
    <div class="container">
      <div class="row bottom40">
        <div class="col-xs-12 text-center">
          <h2 class="uppercase">Our  <span class="color_red"> Concern</span></h2>
         <div class="line_1-1"></div>
          <div class="line_2-2"></div>
          <div class="line_3-3"></div>

        </div>
      </div>
      <div class="row bottom30">
        <div class="row">
            @foreach ($Concerns as $Concern)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <a href="{{ route('concern.details', ['id' => $Concern->id]) }}">
                            <img src="{{ asset($Concern->logo) }}" class="card-img-top" style="width: 55px; height: 45px; margin: 0 auto;" alt="Concern Logo">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $Concern->title }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    </div>
  </section> --}}

  <section id="listings" class="padding" style="margin-top: -50px">
        <div class="container">
            <div class="row bottom40">
                <div class="col-xs-12" style="text-align: center">
                    <h2 class="uppercase">Our Sister<span class="color_red"> Concern</span></h2>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                    <div class="line_3-3"></div>
                </div>
            </div>
            <div class="row bottom30">
                <div class="row">
                    @foreach ($Concerns as $Concern)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card" style="width: 18rem;">
                                <a href="{{ route('concern.details', ['id' => $Concern->id]) }}">
                                    <img src="{{ asset($Concern->logo) }}" class="card-img-top" style="width: 100px; height: 100px; margin: 0 auto; margin-left:40px" alt="Concern Logo">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $Concern->title }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
    </section>



    <!-- end loader -->
@endsection
