@extends('layouts.FontEndApps')
@section('title')
    <title>Sister Project Details</title>
@endsection
@section('content')
    <!-- list-head -->
    <div class="list-head">
        <div class="container">
            <div class="section-head" style="margin-top:120px; text-align:center">
                <h2>Our Sister Concern</h2>
                <div class="line_1-1"></div>
                <div class="line_2-2"></div>
                <div class="line_3-3"></div>
            </div>
        </div>
    </div>
    <!-- end list-head -->

    <!-- grid -->
    <div class="section real-estate bg-second">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="content">
                        <center>
                            <img src="{{ asset($project->logo) }}" style="width:300px; height:300px;" alt="">
                            <h3>{{ $project->title }}</h3>
                            <p>{{ $project->description }}</p>
                            <p><b>Company:</b> {{ $project->Concern->title ?? '' }}</p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end grid -->

    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->
@endsection
