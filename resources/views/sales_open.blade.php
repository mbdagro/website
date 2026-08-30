@extends('layouts.FontEndApps')
@section('content')



<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
      <div class="main-title">
        <h1>Sales Open</h1>
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
          <a href="{{ route('home') }}">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="#.">Sales Open</a>
      </div>
    </div>
  </div>
  <!--===== #/PAGE TITLE =====-->

  <!-- LISTING -->
  <section id="listings" class="padding">
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
        <div class="col s12">
            {{-- @include('layouts.alert') --}}
            @if(session()->has('success'))
            <div class="card-alert card green lighten-5">
                <div class="card-content green-text">
                    <strong>Congratulations!</strong> {{ session()->get('success') }}</a>
                </div>
                <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {{ session()->put('success',null) }}
            @endif
            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <div class="card-alert card red lighten-5">
                <div class="card-content red-text">
                    <strong>Error!</strong> {{ $error }} </a>
                </div>
                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endforeach
            @endif
            <form action="{{ route('booking-data-insert') }}" id="notice_board_insert_update" method="post">
                @csrf

                <!-- Product/Service Selection -->
                <div class="form-group">
                    <label for="product_service_id">Select Product/Service</label>
                    <select name="product_service_id" id="product_service_id" class="form-control" required>
                        <option value="">Select One</option>
                        @foreach ($product_service as $productService)
                            <option value="{{ $productService->id }}">{{ $productService->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Name Input -->
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="text" class="form-control" id="form-name" name="name" placeholder="Enter your name" required>
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <label for="form-email">Email</label>
                    <input type="email" class="form-control" id="form-email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Mobile Input -->
                <div class="form-group">
                    <label for="form-mobile">Mobile</label>
                    <input type="number" class="form-control" id="form-mobile" name="mobile" placeholder="Enter your mobile number" required>
                </div>

                <!-- Message Textarea -->
                <div class="form-group">
                    <label for="form-message">Your Message</label>
                    <textarea name="message" id="form-message" cols="30" rows="5" class="form-control" placeholder="Your message" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit" id="submit" name="submit">BOOK NOW</button>
                </div>
            </form>

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
@section('script')

<script>
    $(document).ready(function() {
        $('.card-alert > button').on('click', function(){
            $(this).closest('div.card-alert').fadeOut('slow');
        })
    })
</script>

@endsection
