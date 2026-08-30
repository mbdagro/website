@extends('layouts.FontEndApps')
@section('title')
  <title>Ongoing Apartment</title>
@endsection
@section('content')


  <!-- PAGE TITLE -->
  <div class="page-title page-main-section" style="margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>Ongoing Apartments</h1>
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
        <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a
          href="listing-2.html">Ongoing Apartments</a>
      </div>
    </div>
  </div>
  <!-- PAGE TITLE -->

  <!-- LISTING STYLE - 2 -->
  <section class="property-query-area property-page-bg hidden-lg " style="margin-top: 30px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 bottom40">
          <h2 class="text-uppercase">Advanced <span class="color_red">Search</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>
        </div>
      </div>
      <div class="row">
        <form class="findus">
          <div class="col-md-3 col-sm-4 mb-3">
            <div class="single-query form-group">
              <label for="pages">Property Type</label>
              <select name="pages" id="pages" class="form-control" onchange="location = this.value;">
                <option value="" disabled selected>Select</option>
                <option value="{{ route('all.apartments') }}">All Apartments</option>
                <option value="{{ route('ongoing.apartments') }}">Ongoing Apartments</option>
                <option value="{{ route('completed.apartments') }}">Completed Apartments</option>
                <option value="{{ route('upcomeing.apartments') }}">UPCOMING APARTMENTS</option>
                <option value="{{ route('consultancy.apartments') }}">Tunky/Consultancy Apartments</option>
                <option value="{{ route('completed.duplex') }}">Duplex Project</option>
                <option value="{{ route('completed.lands') }}">Land Project</option>
                <option value="{{ route('completed.hotels') }}">Hotel Project</option>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--LISTING STYLE- 2 -->


  <!-- LISTING -->
  <section id="listings" class="padding">
    <div class="container" style="margin-top: -60px">
      <div class="row bottom40">
        <div class="col-xs-12 col-lg-7">
          <h2 class="uppercase">Ongoing Apartments <span class="color_red">LISTINGS</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>
          <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
        </div>
        <form class="findus">
          <div class="col-lg-5 hidden-xs hidden-sm hidden-md">
            <h2 class="text-uppercase">
              {{-- Advanced --}} Property
              <span class="color_red">Search</span>
            </h2>
            <div class="line_1"></div>
            <div class="line_2"></div>
            <div class="line_3"></div>
            <div class="single-query form-group">
              {{-- <label for="pages">Property Type</label> --}}
              <select name="pages" id="pages" class="form-control" onchange="location = this.value;">
                <option value="" disabled selected>Select</option>
                <option value="{{ route('all.apartments') }}">All Apartments</option>
                <option value="{{ route('ongoing.apartments') }}">Ongoing Apartments</option>
                <option value="{{ route('completed.apartments') }}">Completed Apartments</option>
                <option value="{{ route('upcomeing.apartments') }}">UPCOMING APARTMENTS</option>
                <option value="{{ route('consultancy.apartments') }}">Tunky/Consultancy Apartments</option>
                <option value="{{ route('completed.duplex') }}">Duplex Project</option>
                <option value="{{ route('completed.lands') }}">Land Project</option>
                <option value="{{ route('completed.hotels') }}">Hotel Project</option>
              </select>
            </div>
          </div>
        </form>

      </div>
      <div class="row bottom30">
        @foreach($ProductService as $ProductService)
          @if($ProductService->progress == 'ongoing')

            <div class="col-md-4 col-sm-6">
              <div class="property_item bottom40">
                <div class="image">
                  {{-- <img src="{{ asset($ProductService->image) }}" alt="listin" class="img-responsive"> --}}
                  <a href="{{ route('apartments.details', ['id' => $ProductService->id]) }}">
                    <img src="{{ asset($ProductService->image) }}" alt="listing" class="img-responsive listing-image">
                  </a>
                  {{-- <div class="property_meta">
                    <span><i class="fa fa-object-group"></i>530 sq ft </span>
                    <span><i class="fa fa-bed"></i>2</span>
                    <span><i class="fa fa-bath"></i>1 Bathroom</span>
                  </div> --}}
                  <div class="price"><span class="tag">{{ $ProductService->progress }}</span></div>
                  <div class="overlay" style="pointer-events: none;">
                    <div class="centered" style="pointer-events: auto;">
                      <a class="link_arrow white_border" href="{{route('book-now')}}">Book Now</a>
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
                      ({{ $ProductService->size   }} sq ft)</p>
                    <ul class="pull-right">
                      {{-- <li><a href="#."><i class="icon-video"></i></a></li>
                      <li><a href="#."><i class="icon-like"></i></a></li> --}}
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            {{-- This is for if they ask for the details here --}}
            <div class="row  " style="padding-left: 20px; padding-right: 20px;">
              <div class="col-xs-12 top40">
                <h3 class="text-uppercase bottom30">Property <span class="color_red">Description</span>
                </h3>
                <p class="bottom30">{{ $ProductService->short_description }}</p>
                <p class="bottom30">{!! $ProductService->description !!}</p>
                <div class="property_meta top10">
                  <span><i class="fa fa-object-group"></i>{{ $ProductService->size }} sq ft </span>
                  <span><i class="fa fa-bed"></i>{{ $ProductService->room_qty }} Rooms</span>
                  <span><i class="fa fa-bath"></i>{{ $ProductService->bathroom_qty }} Bathroom</span>
                  <span><i class="fa fa-car"></i>{{ $ProductService->garadge_qty }} Garage</span>
                  <span><i class="fa fa-eye"></i>{{ $ProductService->baranda_qty }} Lobby</span>
                </div>
                {{-- <a class="link_arrow top30" href="#.">Read More</a> --}}
              </div>
            </div>
            <div class="row " style="padding-left: 20px; padding-right: 20px;">
              <div class="col-xs-12">
                <h3 class="text-uppercase bottom30">Quick <span class="color_red">Summery</span></h3>
              </div>
              <div class="property-d-table clearfix">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <table class="table table-striped table-responsive">
                    <tbody>
                      <tr>
                        <td><b>Property Code</b></td>
                        <td class="text-right">{{ $ProductService->code }}</td>
                      </tr>
                      <tr>
                        <td><b>Starting Price</b></td>
                        <td class="text-right">{{ $ProductService->price }}</td>
                      </tr>
                      <tr>
                        <td><b>Property Size</b></td>
                        <td class="text-right">{{ $ProductService->size }}ft2</td>
                      </tr>
                      <tr>
                        <td><b>Rooms</b></td>
                        <td class="text-right">{{ $ProductService->room_qty }}</td>
                      </tr>
                      <tr>
                        <td><b>Bathrooms</b></td>
                        <td class="text-right">{{ $ProductService->bathroom_qty }} </td>
                      </tr>
                      <tr>
                        <td><b>Available From</b></td>
                        <td class="text-right">
                          {{ \Carbon\Carbon::parse($ProductService->available_from)->format('d M Y') }}
                        </td>
                      </tr>
                      <tr>
                        <td><b>Phone </b></td>
                        <td class="text-right"> {{ $ProductService->property_contact }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <table class="table table-striped table-responsive">
                    <tbody>
                      <tr>
                        <td><b>Status</b></td>
                        <td class="text-right">{{ $ProductService->progress }}</td>
                      </tr>
                      <tr>
                        <td><b>Year Built</b></td>
                        <td class="text-right">
                          {{ \Carbon\Carbon::parse($ProductService->built_year)->format('d M Y') }}
                        </td>
                      </tr>
                      <tr>
                        <td><b>Garages</b></td>
                        <td class="text-right">{{ $ProductService->garadge_qty }}</td>
                      </tr>
                      <tr>
                        <td><b>Lobby</b></td>
                        <td class="text-right">{{ $ProductService->baranda_qty }}</td>
                      </tr>
                      <tr>
                        <td><b>Floors</b></td>
                        <td class="text-right">{{ $ProductService->floor }} th</td>
                      </tr>
                      <tr>
                        <td><b>Category</b></td>
                        <td class="text-right">{{ $ProductService->category }}</td>
                      </tr>
                      <tr>
                        <td><b>Email </b></td>
                        <td class="text-right"> {{ $ProductService->property_email }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            {{-- Video Section --}}
            @if(!empty($ProductService->video_link))
              <div class="row" style="padding-left: 20px; padding-right: 20px; margin-top: 20px;">
                <div class="col-xs-12">
                  <h3 class="text-uppercase bottom30">Property <span class="color_red">Video</span></h3>
                </div>
                <div class="col-xs-12">
                  <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
                    <iframe src="https://www.youtube.com/embed/{{ $ProductService->video_link }}" frameborder="0"
                      allowfullscreen style="position:absolute; top:0; left:0; width:100%; height:100%;">
                    </iframe>
                  </div>
                </div>
              </div>
            @endif
          @endif
        @endforeach

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
<style>
  .listing-image {
    width: 100% !important;
    max-width: 360px !important;
    height: 220px !important;
    object-fit: cover !important;
  }

  @media (max-width: 768px) {
    .listing-image {
      width: 100% !important;
      max-width: 100% !important;
      height: auto !important;
    }
  }
</style>