@extends('layouts.FontEndApps')
@section('title')
<title>Our Team</title>
@endsection
@section('content')

<!-- PAGE TITLE -->
<div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
        <div class="main-title">
            <h1> Our Expert Team</h1>
            @php
            use Carbon\Carbon;

            // Check if $HomeManagement->start_date exists
            $yearsSinceStart = isset($HomeManagement->start_date)
            ? round(Carbon::parse($HomeManagement->start_date)->diffInYears(Carbon::now()),0)
            : 0;
            @endphp
            <h5>{{ $yearsSinceStart }} Years Of Experience!</h5>
            <div class="line_4"></div>
            <div class="line_5"></div>
            <div class="line_6"></div>
            <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right"
                    aria-hidden="true"></i></span><a href="listing-2.html"> Our Expert Team </a>
        </div>
    </div>
</div>
<!-- PAGE TITLE -->



<!-- TEAM -->
<section id="team-sev" class="padding bg_light" style="margin-top: -50px">
    <div class="container">

        <div class="row mb-20">
            <div class="col-sm-1 col-md-2"></div>
            <div class="col-xs-12 col-sm-10 col-md-8 text-center">
                <h2 class="text-uppercase">Meet Our Team <span class="color_red">of Professionals</span></h2>
                <div class="line_1-1"></div>
                <div class="line_2-2"></div>
                <div class="line_3-3"></div>
                {{-- <p class="heading_space">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}
            </div>
            <div class="col-sm-1 col-md-2"></div>
        </div>

        <div class="row mt-30">
            @foreach($ourTeam as $ourTeam)
            <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="team-box">

                    @php
                    $image = $ourTeam->image
                    ? Storage::disk(config('filesystems.voucher_disk', 'public'))->url($ourTeam->image)
                    : asset('images/no-image.png');
                    @endphp

                    <img src="{{ $image }}" alt="{{ $ourTeam->name }}"
                        style="height:200px; width:100%; object-fit:cover;">

                    <h2>{{Str::limit($ourTeam->name, 10) }}</h2>
                    <p>{{Str::limit($ourTeam->designation, 10) }}</p>

                    <ul>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li>|</li>

                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li>|</li>

                    </ul>

                    <div class="team-box-overlay">
                        <h2>{{$ourTeam->name }}</h2>
                        <p>{{$ourTeam->education}}</p>
                    </div>

                </div>
            </div>
            @endforeach



        </div>

    </div>
</section>
<!--TEAM -->

<!-- team -->
{{-- <div class="pages section">
    <div class="container">
        <div class="row">
            @foreach($ourTeam as $ourTeam)
            <div class="col s12 m4">
                <div class="page-team" style="margin-bottom: 20px;">
                    <img src="{{ asset('/') }}/{{$ourTeam->image}}" alt="" style="width: 280px;height:320px;">
                    <div class="team-details" style="height: 150px;">
                        <h5>{{$ourTeam->name}}</h5>
                        <span>{{$ourTeam->designation}}</span>
                        <span>{{$ourTeam->education}}</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div> --}}
<!-- end team -->
@endsection
