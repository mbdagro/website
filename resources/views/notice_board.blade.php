
@extends('layouts.FontEndApps')
@section('title')
    <title>Notice</title>
@endsection
@section('content')


<!-- PAGE TITLE -->
<div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1> Notice Board </h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="listing-2.html"> Notice Board </a>
      </div>
    </div>
  </div>
  <!-- PAGE TITLE -->


  <!-- LISTING -->
  <section id="listings" class="padding" style="margin-top: -50px">
    <div class="container">
      <div class="row bottom40">
        <div class="col-xs-12">
          <h2 class="uppercase">Notice <span class="color_red">Board</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>

        </div>
      </div>
      <div class="row bottom30">
        <div class="col-12">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: center; background-color: #f2f2f2; font-weight: bold; color: #333;">ক্রমিক</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: center; background-color: #f2f2f2; font-weight: bold; color: #333;">শিরোনাম</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: center; background-color: #f2f2f2; font-weight: bold; color: #333;">প্রকাশের তারিখ</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align: center; background-color: #f2f2f2; font-weight: bold; color: #333;">ডাউনলোড</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notices as $notice)
                        <tr style="border-bottom: 1px solid #ddd; background-color: #fff; transition: background-color 0.3s;">
                            <td style="text-align: center; padding: 10px; font-size: 14px;">{{$loop->iteration}}</td>
                            <td style="text-align: center; padding: 10px; font-size: 14px;">{{ $notice->title }}</td>
                            <td style="padding: 10px; font-size: 14px; text-align: center;">{{ \Carbon\Carbon::parse($notice->publish_date)->format('d M, Y') }}</td>
                            <td style="text-align: center; padding: 10px;">
                                <a href="{{ asset('uploads/'.$notice->notice) }}" target="_blank" style="display: inline-block; padding: 8px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 14px; transition: background-color 0.3s;">
                                    Open!
                                </a>
                                {{-- <a href="{{ asset('public/uploads/'.$notice->notice) }}" target="_blank">Open!</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add hover effect to rows -->
    <style>
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>

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
