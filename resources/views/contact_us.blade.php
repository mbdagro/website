@extends('layouts.FontEndApps')
@section('title')
<title>Contact Us</title>
@endsection
@section('content')



<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie"
    style="background-image: url(website/images/titlebg-1.jpg); margin-top: -8px">
    <div class="container padding-bottom-top-120 text-uppercase text-center">
        <div class="main-title">
            <h1>Contact us</h1>
            @php
            use Carbon\Carbon;

            // Check if $HomeManagement->start_date exists
            $yearsSinceStart = isset($HomeManagement->start_date)
            ? round(Carbon::parse($HomeManagement->start_date)->floatDiffInYears(now()), 0)
            : 0;
            @endphp
            <h5>{{ $yearsSinceStart }} Years Of Experience!</h5>
            <div class="line_4"></div>
            <div class="line_5"></div>
            <div class="line_6"></div>
            <a href="index-1.html">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a
                href="contact-us.html">Contact us</a>
        </div>
    </div>
</div>
<!--===== #/PAGE TITLE =====-->


<!--===== CONTACT US =====-->
<section id="contact-us-2" class="padding parallaxie">

    <div class="container">

        <div class="row">

            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">

                <div class="contact-bg">

                    <div class="bottom40">
                        <h2 class="text-uppercase">Send us<span class="color_red"> a message </span></h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                    </div>

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



                    <form action="{{route('contact_us-data-insert')}}" class="contact-form" style="margin-top:12px;"
                        id="contact-form" method="post">
                        @csrf

                        <div class="row">

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group single-query">
                                    <input type="text" name="name" class="keyword-input" placeholder="Your Name">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group single-query"">
                                      <input type=" email" name="email" class="keyword-input"
                                    placeholder="Your E-mail">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group single-query"">
                                      <input type=" text" name="mobile" class="keyword-input" placeholder="Mobile">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group single-query"">
                                      <input type=" text" name="subject" class="keyword-input" placeholder="Subject">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group single-query"">
                                      <textarea name=" message" placeholder="Message" id="message"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">



                            <div class="col-md-12 ">
                                <div class="form-group single-query"">
                                      <button type=" submit" class="btn_fill" id="btn_submit" name="btn_submit">
                                    Submit</button>
                                </div>
                            </div>

                        </div>

                    </form>


                </div>


            </div>

        </div>

    </div>

</section>
<!--===== #/CONTACT US =====-->

@endsection
@section('script')

@endsection
