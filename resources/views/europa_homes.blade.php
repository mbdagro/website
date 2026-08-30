@extends('layouts.FontEndApps')
@section('title')
    <title>Concern Details</title>
@endsection
@section('content')
    <!-- list-head -->
    <div class="list-head">
        <div class="container">
            <div class="section-head" style="margin-top:120px; text-align:center">
                <h2>Europa Homes Ltd</h2>
                <div class="line_1-1"></div>
                <div class="line_2-2"></div>
                <div class="line_3-3"></div>
            </div>
        </div>
    </div>
    <!-- end list-head -->


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
                                            {{-- <a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                                Now</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text" style="margin-top: -20px">
                                        <div>
                                            <h3><a
                                                href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                            </h3>
                                            <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                        </div>
                                        <div style="text-align: right">
                                            <a href="{{ route('book-now') }}" 
                                                style="display:inline-block; padding:10px 20px; background:#046b15; color:#fff; text-decoration:none; border-radius:5px;">
                                                Book Now
                                            </a>
                                        </div>
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
                                            {{-- <a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                                Now</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text" style="margin-top: -20px">
                                        <div>
                                            <h3><a
                                                href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                            </h3>
                                            <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                        </div>
                                        <div style="text-align: right">
                                            <a href="{{ route('book-now') }}" 
                                                style="display:inline-block; padding:10px 20px; background:#046b15; color:#fff; text-decoration:none; border-radius:5px;">
                                                Book Now
                                            </a>
                                        </div>
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
                                            {{-- <a class="link_arrow white_border" href="{{ route('book-now') }}">Book
                                                Now</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text" style="margin-top: -20px">
                                        <div>
                                            <h3><a
                                                href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">{{ $ProductService->name }}</a>
                                            </h3>
                                            <p class="p-font-15">{{ Str::words($ProductService->address, 9) }}</p>
                                        </div>
                                        <div style="text-align: right">
                                            <a href="{{ route('book-now') }}" 
                                                style="display:inline-block; padding:10px 20px; background:#046b15; color:#fff; text-decoration:none; border-radius:5px;">
                                                Book Now
                                            </a>
                                        </div>
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

    <div id="fakeLoader"></div>
    <!-- end loader -->
@endsection
