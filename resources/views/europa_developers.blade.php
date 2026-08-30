@extends('layouts.FontEndApps')
@section('title')
    <title>Concern Details</title>
@endsection
@section('content')
    <!-- list-head -->
    <div class="list-head">
        <div class="container">
            <div class="section-head" style="margin-top:120px; text-align:center">
                <h2>Europa Developers Ltd</h2>
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
                        @foreach ($projects as $project)
                            <h3 class="text-center">
                                <center>
                                    <h3>{{$project->title}}</h3>
                                </center>
                                </h3>
                            <a href="">
                                <center>
                                    <img src="{{ asset($project->logo) }}" style="width: 450px; height: 400px;" alt="">
                                </center>
                            </a>
                            <br>
                            <p class="text-center">
                                {{ $project->description }}
                            </p>
                            <br>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fakeLoader"></div>
@endsection
