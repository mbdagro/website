@extends('layouts.FontEndApps')
@section('content')

<!-- PAGE TITLE -->
<div class="page-title page-main-section">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1> Career </h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="listing-2.html"> Career </a>
      </div>
    </div>
  </div>
  <!-- PAGE TITLE -->


  <!-- LISTING -->
  <section id="listings" class="padding">
    <div class="container">
      <div class="row bottom40">
        <div class="col-xs-12">
          <h2 class="uppercase">Career <span class="color_red">Chart</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>

        </div>
      </div>
      <div class="row bottom30">
        <div class="col-12">
            <table style="width: 100%; border-collapse: collapse; margin: 20px 0; font-family: Arial, sans-serif;">
                <thead>
                    <tr style="background-color: #007bff; color: white; text-align: center;">
                        <th scope="col" style="padding: 12px; border: 1px solid #ddd;">#SL</th>
                        <th scope="col" style="padding: 12px; border: 1px solid #ddd;">Position</th>
                        <th scope="col" style="padding: 12px; border: 1px solid #ddd;">Publish Date</th>
                        <th scope="col" style="padding: 12px; border: 1px solid #ddd;">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrer as $carrers)
                        <tr style="text-align: center; background-color: #fff; transition: background-color 0.3s;">
                            <th style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">{{$loop->iteration}}</th>
                            <td style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">{{ $carrers->position }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">{{ \Carbon\Carbon::parse($carrers->publish_date)->format('d M, Y') }}</td>
                            <td style="padding: 10px; border: 1px solid #ddd;">
                                <a href="{{ asset('public/uploads/'.$carrers->carrer) }}" target="_blank" style="padding: 8px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-size: 14px; transition: background-color 0.3s; display: inline-block;">
                                    Open!
                                </a>
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
        a:hover {
            background-color: #218838;
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



	<!-- end loader -->
@endsection
