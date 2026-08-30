@extends('layouts.FontEndApps')
@section('title')
    <title>Concern Details</title>
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
                            <a href="{{ route('concern.details', ['id' => $Concern->id]) }}">
                                <center>
                                    <img src="{{ asset($Concern->logo) }}" style="width: 300px; height: 300px;" alt="">
                                </center>
                            </a>
                                <h3 class="text-center">
                                   <center>
                                    {{ $Concern->title }}
                                   </center>
                                </h3>
                                <p class="text-center">
                                    <center>
                                     {{ $Concern->description }}
                                    </center>
                                 </p>
                            
                        </div>
                    </div>

            </div>

        </div>
    </div>

    <!-- Compleated Project -->
    <section id="property" class="bg_light padding">
        <div class="container">
            <div class="row" style="margin-top: -60px">
                <div class="col-xs-12 bottom40">
                    <h2 class="uppercase text-center">Completed <span class="color_red">Project</span></h2>
                </div>
            </div>
            <div class="row bottom30">
                @foreach ($ProductServices as $ProductService)
                    @if ($ProductService->progress == 'completed')
                        <div class="col-md-4 col-sm-6">
                            <div class="property_item bottom40" style="border-radius:20px; overflow:hidden;">
                                <div class="image">
                                    <a href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">
                                        <img src="{{ asset($ProductService->image) }}" alt="listing"
                                            class="img-responsive listing-image" style="height: 220px">
                                    </a>
                                    <div class="price"><span class="tag">{{ $ProductService->progress }}</span></div>
                                    <div class="overlay" style="pointer-events: none;">
                                        <div class="centered" style="pointer-events: auto;">
                                            <a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text">
                                        <h3><a
                                                href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                        </h3>
                                       
                                        <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                    </div>
                                    <div class="favroute clearfix">
                                        <p class="pull-md-left">{{ $ProductService->price ?? 'Not Given' }} Start price
                                            ({{ $ProductService->size }} sq ft)
                                        </p>
                                        <ul class="pull-right">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Compleated Project -->

    <!-- Onging Project -->
    <section id="property" class="bg_light padding" style="margin-top: -130px">
        <div class="container">
            <div class="row" style="margin-top: -60px">
                <div class="col-xs-12 bottom40">
                    <h2 class="uppercase text-center">Ongoing <span class="color_red">Project</span></h2>
                </div>
            </div>
            <div class="row bottom30">
                @foreach ($ProductServices as $ProductService)
                    @if ($ProductService->progress == 'ongoing')
                        <div class="col-md-4 col-sm-6">
                            <div class="property_item bottom40" style="border-radius:20px; overflow:hidden;">
                                <div class="image">
                                    {{-- <img src="{{ asset($ProductService->image) }}" alt="listin" class="img-responsive"> --}}
                                    <a href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">
                                        <img src="{{ asset($ProductService->image) }}" alt="listing"
                                            class="img-responsive listing-image" style="height: 220px">
                                    </a>
                                    <div class="price"><span class="tag">{{ $ProductService->progress }}</span></div>
                                    <div class="overlay" style="pointer-events: none;">
                                        <div class="centered" style="pointer-events: auto;">
                                            <a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text">
                                        <h3><a
                                                href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                        </h3>
                                        {{-- <span>{{ $ProductService->description }}</span> --}}
                                        <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                    </div>
                                    <div class="favroute clearfix">
                                        <p class="pull-md-left">{{ $ProductService->price ?? 'Not Given' }} Start price
                                            ({{ $ProductService->size }} sq ft)
                                        </p>
                                        <ul class="pull-right">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Onging Project -->

    <!-- Upcoming Project -->
    <section id="property" class="bg_light padding" style="margin-top: -130px">
        <div class="container">
            <div class="row" style="margin-top: -60px">
                <div class="col-xs-12 bottom40">
                    <h2 class="uppercase text-center">Upcoming <span class="color_red">Project</span></h2>
                </div>
            </div>
            <div class="row bottom30">
                @foreach ($ProductServices as $ProductService)
                    @if ($ProductService->progress == 'upcoming')
                        <div class="col-md-4 col-sm-6">
                            <div class="property_item bottom40" style="border-radius:20px; overflow:hidden;">
                                <div class="image">
                                    {{-- <img src="{{ asset($ProductService->image) }}" alt="listin" class="img-responsive"> --}}
                                    <a href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">
                                        <img src="{{ asset($ProductService->image) }}" alt="listing"
                                            class="img-responsive listing-image" style="height: 220px">
                                    </a>
                                    <div class="price"><span class="tag">{{ $ProductService->progress }}</span></div>
                                    <div class="overlay" style="pointer-events: none;">
                                        <div class="centered" style="pointer-events: auto;">
                                            <a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text">
                                        <h3><a
                                                href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                        </h3>
                                        {{-- <span>{{ $ProductService->description }}</span> --}}
                                        <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                    </div>
                                    <div class="favroute clearfix">
                                        <p class="pull-md-left">{{ $ProductService->price ?? 'Not Given' }} Start price
                                            ({{ $ProductService->size }} sq ft)
                                        </p>
                                        <ul class="pull-right">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Upcoming Project -->

    <!-- for submenu -->
    <!-- end grid -->
    {{-- <section id="listings" class="padding" style="margin-top: -50px">
        <div class="container">
            <div class="row bottom40">
                <div class="col-xs-12 text-center">
                    <h2 class="uppercase">Our <span class="color_red">Projects</span></h2>
                    <div class="line_1-1"></div>
                    <div class="line_2-2"></div>
                    <div class="line_3-3"></div>
                </div>
            </div>
            <div class="row bottom30">
                @foreach ($SisterProjects as $project)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card text-center" style="width: 18rem; margin:0 auto;">
                            <a href="{{ route('sister_project.details', ['id' => $project->id]) }}">
                                <img src="{{ asset($project->logo) }}" class="card-img-top" style="width:100px; height:100px; margin: 0 auto;" alt="{{ $project->title }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->
@endsection
