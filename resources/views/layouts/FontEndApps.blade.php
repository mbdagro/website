<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        @yield('title')
        <link rel="stylesheet" type="text/css" href="{{ asset('website/') }}/css/master.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('website/') }}/css/color/color-1.css" id="color" />
        {{--
    <link rel="shortcut icon" href="{{ asset('FontEndUI/') }}/img/Sarina_logo.png"> --}}
        <link rel="shortcut icon"
            href="{{ $HomeManagement->logo ? Storage::disk(config('filesystems.voucher_disk', 'public'))->url($HomeManagement->logo) : asset('favicon.ico') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <style>
        .navbar-nav>li>a {
            color: #fff;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar-nav>li>a:hover {
            color: #ffdd57;
            background: #1162cb;
            border-radius: 4px;
        }

        .navbar-nav .dropdown-menu {
            background: #fafafa;
        }

        .navbar-nav .dropdown-menu>li>a {
            color: #0e0c0c;
        }

        .navbar-nav .dropdown-menu>li>a:hover {
            background: #ffdd57;
            color: #000 !important;
        }

        .navbar {
            position: absolute;
            top: 40px;
            left: 200px;
            width: 100%;
            z-index: 99;
            opacity: 2;
        }


        .dropdown-submenu>.dropdown-menu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            margin-top: -1px;
        }

        /* Hover Dropdown for Desktop */
        @media (min-width:768px) {
            .navbar-nav>li.dropdown:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>.dropdown-menu {
                display: none;
                position: absolute;
                left: 100%;
                top: 0;
                margin-top: -1px;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>a>.submenu-toggle {
                display: none;
            }

            /* hide arrow on desktop */
        }

        /* Social Icons */
        .navbar-nav.navbar-right>li>a {
            font-size: 16px;
            margin-left: 10px;
        }

        .navbar-nav.navbar-right>li>a:hover {
            color: #ffdd57;
        }

        @media (max-width:767px) {
            .navbar-toggle {
                float: left;
                margin-left: 15px;
            }

            .navbar-nav {
                text-align: left !important;
                padding: 0;
                margin: 20px;
                width: 100%;
            }

            .navbar-nav>li {
                display: block !important;
                border-bottom: 1px solid #ccc;
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .navbar-nav>li>a {
                padding: 10px 15px;
                display: block;
                width: 100%;
            }

            .navbar-nav .dropdown-menu>li {
                border-bottom: 1px solid #eee;
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .navbar-nav>li:last-child,
            .navbar-nav .dropdown-menu>li:last-child {
                border-bottom: none;
            }

            .navbar-nav .dropdown-menu {
                width: 100%;
                box-shadow: none;
            }

            .navbar {
                border-radius: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                top: 25px;
                left: 0;
            }

            .navbar-collapse {
                position: absolute;
                background: rgba(255, 255, 255, 0.95);
                z-index: 99;
                width: 100%;
            }

            .dropdown-submenu>.dropdown-menu {
                display: none;
                position: relative;
                left: 0;
                top: 0;
                width: 100%;
                padding-left: 15px;
                background: #f8f8f8;
            }

            .dropdown-submenu.active>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>a {
                position: relative;
            }

            .dropdown-submenu>a>.submenu-toggle {
                float: right;
                cursor: pointer;
            }
        }
    </style>

    <body>

        <!--LOADER -->
        {{-- <div class="loader">
        <div class="cssload-thecube">
            <div class="cssload-cube cssload-c1"></div>
            <div class="cssload-cube cssload-c2"></div>
            <div class="cssload-cube cssload-c4"></div>
            <div class="cssload-cube cssload-c3"></div>
        </div>
    </div> --}}
        <!--LOADER -->


        <!--===== BACK TO TOP =====-->
        <div class="short-msg">
            <a href="#." class="back-to"><i class="icon-arrow-up2"></i></a>

            <a href="https://wa.me/8801643235533" target="_blank" class="whatsapp-float" title="Chat on WhatsApp">
                <i class="fa fa-whatsapp"></i>
            </a>
            {{-- <a href="#." class="short-topup" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o"
                aria-hidden="true"></i></a> --}}
        </div>
        <!--===== #/BACK TO TOP =====-->
        {{-- <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <p class="p-font-15 p-white">
                        <i class="icon-telephone114" style="margin-right:5px;"></i>
                        <a href="tel:{{ $HomeManagement->mobile }}" class="p-white">{{ $HomeManagement->mobile }}</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <p class="p-font-15 p-white">
                        <i class="icon-icons142" style="margin-right:5px;"></i>
                        <a href="mailto:{{ $HomeManagement->email ?? 'N/A' }}" class="p-white">{{ $HomeManagement->email
                            ?? 'N/A' }}</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <p class="p-font-15 p-white">
                        <i class="icon-icons74" style="margin-right:5px;"></i>
                        <a href="#contact" class="p-white">{{ Str::words($HomeManagement->address, 8) }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div> --}}
        <!--===== HEADER =====-->
        <header id="main_header">
            <!--===== HEADER BOTTOM =====-->
            <nav class="navbar navbar-default"
                style="
                /* background: linear-gradient(135deg, #d9ece9, #c0e4d2); */
                border:none;
                box-shadow: 0 0 50px 5px #48abe0;
                width:70%;
                margin:0 auto;
                margin-bottom: 20px;
                border-radius: 50px;
                ">
                <div class="container">
                    <!-- Logo + Toggle -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    @php
                        use Illuminate\Support\Facades\Storage;

                        $disk = config('filesystems.voucher_disk', 'public');
                    @endphp
                    <div class="col-md-2 hidden-xs hidden-sm">
                        <a href="{{ route('fronted.home') }}">
                            <img src="{{ $HomeManagement->logo ? Storage::disk($disk)->url($HomeManagement->logo) : asset('images/no-image.png') }}"
                                class="img-fluid" alt="Logo" style="max-height:60px; width:60px; margin-left:30px;">
                        </a>
                    </div>

                    <!-- Mobile logo -->
                    <div class="visible-xs visible-sm" style="position:absolute; right:15px; top:6px;">
                        <a href="{{ route('fronted.home') }}">
                            <img src="{{ $HomeManagement->logo ? Storage::disk($disk)->url($HomeManagement->logo) : asset('images/no-image.png') }}"
                                class="img-fluid" alt="Mobile Logo" style="max-height:35px; width:auto;">
                        </a>
                    </div>

                    <!-- Navbar Menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu" style="text-align:left; padding-left: 20px">
                        <ul class="nav navbar-nav"
                            style="float:none; display:inline-block; font-size:16px; margin-left:-30px">
                            <li style="display:inline-block;"><a href="{{ route('fronted.home') }}">Home</a></li>

                            <li style="display:inline-block;"><a href="{{ route('project') }}">Project</a></li>
                            <li style="display:inline-block;"><a href="{{ route('offer') }}">Offer</a></li>
                            <li style="display:inline-block;"><a href="{{ route('gallery.view') }}">Gallery</a></li>
                            <li style="display:inline-block;"><a href="{{ route('about.us') }}">Award</a></li>
                            <li style="display:inline-block;"><a href="{{ route('blogs.view') }}">Blogs</a></li>
                            <li style="display:inline-block;"><a href="{{ route('contact.us') }}">Contact Us</a></li>
                            <li style="display:inline-block;"><a href="{{ route('up_coming') }}">Up Coming</a></li>
                            {{-- <li style="display:inline-block;"><a href="{{ route('login') }}">Login</a></li> --}}
                            <li style="display:inline-block;">
                                <a href="https://shop.mbdagro.com/">E-Shop</a>
                            </li>
                            <li style="display:inline-block;">
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-user"></i> Login
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
            <!--===== #/NAV-BAR =====-->
        </header>
        <!--===== #/HEADER =====-->
        @yield('content')


        <!--===== CONTACT =====-->
        <!-- CONTACT -->
        <section id="contact" class="bg-color-red" style="background-color: #7ec7bc;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                        <div class="get-tuch">
                            <i class="icon-telephone114"></i>
                            <ul>
                                <li>
                                    <h4>Phone Number</h4>
                                </li>
                                <li>
                                    <p>{{ $HomeManagement->mobile ?? 'N/A' }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                        <div class="get-tuch">
                            <i class="icon-icons74"></i>
                            <ul>
                                <li>
                                    <h4>MBD AGRO,</h4>
                                </li>
                                <li>
                                    <p>{{ $HomeManagement->address ?? 'N/A' }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                        <div class="get-tuch">
                            <i class=" icon-icons142"></i>
                            <ul>
                                <li>
                                    <h4>Email Address</h4>
                                </li>
                                <li><a href="#.">{{ $HomeManagement->email ?? 'N/A' }}</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CONTACT -->
        <!--===== #/CONTACT =====-->


        <!-- FOOTER -->
        <footer id="footer" class="footer divider layer-overlay overlay-dark-8">
            <div class="container pt-70">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            @php
                                $logo = $HomeManagement->logo
                                    ? \Illuminate\Support\Facades\Storage::disk(
                                        config('filesystems.voucher_disk', 'public'),
                                    )->url($HomeManagement->logo)
                                    : asset('images/no-image.png');
                            @endphp

                            <img class="mt-5 mb-20" src="{{ $logo }}" alt="Logo"
                                style="height:150px;width:150px;border-radius:8px;">
                            <p>{{ Str::words($HomeManagement->welcome_description, 40) }}. <a
                                    href="{{ route('about.us') }}" style="color: #32c2ff;">Read More </a></p>
                            </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h4 class="widget-title">Quick Links</h4>
                            <div class="small-title">
                                <div class="line1 background-color-white"></div>
                                <div class="line2 background-color-white"></div>
                                <div class="clearfix"></div>
                            </div>
                            <ul class="list angle-double-right list-border">
                                <li> <a href="{{ route('fronted.home') }}">Home</a></li>
                                <li> <a href="{{ route('gallery.view') }}">Our Gallery</a></li>
                                <li> <a href="{{ route('about.us') }}">Award</a></li>
                                {{-- <li> <a href="{{ route('news-events') }}">News & Events</a></li> --}}
                                {{-- <li> <a href="{{ route('pricing') }}">Pricing</a></li> --}}
                                <li> <a href="{{ route('our.team') }}">Our Expert Team</a></li>
                                <li> <a href="{{ route('contact.us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h4 class="widget-title">Useful Links</h4>
                            <div class="small-title">
                                <div class="line1 background-color-white"></div>
                                <div class="line2 background-color-white"></div>
                                <div class="clearfix"></div>
                            </div>
                            <ul class="list list-border">
                                <li><a href="{{ route('notice') }}">Notice Board</a></li>
                                {{-- <li><a href="{{ route('news-events') }}">News</a></li> --}}
                                {{-- <li><a href="{{ route('client-review') }}">Testimonials</a></li> --}}
                                {{-- <li><a href="{{ route('concern') }}">Our Concern</a></li> --}}
                                <li><a href="{{ route('project') }}">Project</a></li>
                                <li><a href="{{ route('carrer') }}">Careers</a></li>
                                <li><a href="{{ route('up_coming') }}">Up Coming</a></li>
                                <li style="display:inline-block;">
                                    <a href="https://shop.mbdagro.com/">E-Shop</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h4 class="widget-title">Opening Hours</h4>
                            <div class="small-title">
                                <div class="line1 background-color-white"></div>
                                <div class="line2 background-color-white"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="opening-hourse">
                                <ul class="list-border">
                                    <li class="clearfix">
                                        <span> Sun - Thu: </span>
                                        <div class="value pull-right">
                                            {{ \Carbon\Carbon::parse($HomeManagement->opening_time)->format('h:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($HomeManagement->closing_time)->format('h:i A') }}
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-30">
                <div class="col-md-3 col-sm-4">
                    <div class="widget dark">
                        <h5 class="widget-title mb-10">Call Us Now</h5>
                        <div class="text-gray"> +61 3 1234 5678 <br>
                            +12 3 1234 5678
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="widget dark">
                        <h5 class="widget-title mb-10">Connect With Us</h5>
                        <ul class="socials">
                            <li><a href="{{ $HomeManagement->facebook_link ?? '#'}}"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="{{ $HomeManagement->linkedin_link ?? '#'}}"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="{{ $HomeManagement->youtube_link ?? '#'}}"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li><a href="{{ $HomeManagement->instagram_link  ?? '#'}}"><i
                                        class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 text-right">
                    <div class="mb20">
                        <form class="padding-top-30">
                            <input class="search" placeholder="Enter your Email" type="search">
                            <a href="#." class="button"><i class="icon-mail-envelope-open"></i></a>
                        </form>
                    </div>
                </div>
            </div> --}}
            </div>
            <div class="footer-bottom bg-black-333">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-copyright-text">
                                <p><a href="https://www.linkedin.com/in/abir-azmyne/" class="text-white">©</a> All
                                    Copyright
                                    by Somikoron IT Ltd </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="footer-social-links text-md-right text-right">
                                <ul class="social-links list-inline">
                                    <li><a href="{{ $HomeManagement->facebook_link ?? '#' }}"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $HomeManagement->linkedin_link ?? '#' }}"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li><a href="{{ $HomeManagement->youtube_link ?? '#' }}"><i
                                                class="fa fa-youtube"></i></a></li>
                                    <li><a href="{{ $HomeManagement->instagram_link ?? '#' }}"><i
                                                class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER -->
        <style>
            .footer-social-links .social-links {
                margin: 0;
                padding: 0;
            }

            .footer-social-links .social-links li {
                display: inline-block;
                margin-left: 10px;
            }

            .footer-social-links .social-links li a {
                width: 35px;
                height: 35px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .footer-social-links .social-links li a i {
                font-size: 22px;
            }

            /* Facebook */
            .footer-social-links .social-links li:nth-child(1) a {
                background: #1877F2;
                color: #fff;
            }

            /* LinkedIn */
            .footer-social-links .social-links li:nth-child(2) a {
                background: #0A66C2;
                color: #fff;
            }

            /* YouTube */
            .footer-social-links .social-links li:nth-child(3) a {
                background: #FF0000;
                color: #fff;
            }

            /* Instagram */
            .footer-social-links .social-links li:nth-child(4) a {
                background: #E4405F;
                color: #fff;
            }

            /* Hover Effect */
            .footer-social-links .social-links li a:hover {
                transform: translateY(-4px);
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
            }
        </style>



        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="myModalLabel">How can <span class="color_red">we help?</span>
                        </h2>
                    </div>

                    <div class="modal-body">

                        <p class="bottom40">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown
                            printer took a galley of type and scrambled it to make a type specimen book.</p>

                        <div class="short-msg-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                        role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>
                                        Suggestion</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                        data-toggle="tab"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                        Question</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                        data-toggle="tab"><i class="fa fa-exclamation-triangle"
                                            aria-hidden="true"></i>
                                        Problems</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab"
                                        data-toggle="tab"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                        Feedback</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Suggestion</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Question</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Problems</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Feedback</h3>
                                        </div>
                                        <form class="callus padding-bottom" id="contact-form">

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="Name" name="name"
                                                        id="name" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <input class="keyword-input" placeholder="E - mail"
                                                        name="email" id="email" type="email">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-query">
                                                    <textarea name="message" placeholder="Message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="dark_border" data-dismiss="modal">Cancel Message</button>
                        <button type="button" class="btn_fill">Send Message</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- #/Modal -->

        <script>
            // $(document).ready(function(){
            //     $('.dropdown-submenu > a.submenu-link').on("click", function(e){
            //         $(this).next('ul').toggle(); // toggle sub menu
            //         e.stopPropagation();
            //         e.preventDefault();
            //     });
            // });

            // $(document).ready(function(){
            //     if($(window).width() < 768){
            //         $('.dropdown-submenu > a.submenu-link').on('click', function(e){
            //             var $parent = $(this).parent();

            //             if($parent.hasClass('active')){
            //                 $parent.removeClass('active'); // close submenu
            //             } else {
            //                 $parent.siblings('.dropdown-submenu').removeClass('active'); // close others
            //                 $parent.addClass('active'); // open this
            //             }

            //             e.preventDefault();
            //             e.stopPropagation();
            //         });

            //         // close submenus when parent dropdown closes
            //         $('.dropdown').on('hide.bs.dropdown', function () {
            //             $(this).find('.dropdown-submenu').removeClass('active');
            //         });
            //     }
            // });

            $(document).ready(function() {

                function isMobile() {
                    return $(window).width() < 768;
                }

                // Toggle submenu on arrow click only
                $('.dropdown-submenu > a > .submenu-toggle').on('click', function(e) {
                    if (isMobile()) {
                        var $parent = $(this).closest('.dropdown-submenu');

                        if ($parent.hasClass('active')) {
                            $parent.removeClass('active'); // close submenu
                        } else {
                            $parent.siblings('.dropdown-submenu').removeClass('active'); // close others
                            $parent.addClass('active'); // open this
                        }

                        e.preventDefault();
                        e.stopPropagation();
                    }
                });

                // Close all submenus when parent dropdown closes
                $('.dropdown').on('hide.bs.dropdown', function() {
                    $(this).find('.dropdown-submenu').removeClass('active');
                });

            });
        </script>

        <!--===== REQUIRED JS =====-->
        <script src="{{ asset('website/') }}/js/jquery-3.2.1.min.js"></script>
        <script src="{{ asset('website/') }}/js/bootstrap.min.js"></script>
        {{-- <script src="{{ asset('website/') }}/js/bootsnav.js"></script> --}}

        <!--To View on scroll-->
        <script src="{{ asset('website/') }}/js/jquery.appear.js"></script>

        <!--Owl Slider-->
        <script src="{{ asset('website/') }}/js/owl.carousel.min.js"></script>

        <!--Parallax-->
        <script src="{{ asset('website/') }}/js/parallaxie.js"></script>

        <!--Fancybox-->
        <script src="{{ asset('website/') }}/js/jquery.fancybox.min.js"></script>

        <!--Cube Gallery-->
        <script src="{{ asset('website/') }}/js/cubeportfolio.min.js"></script>

        <!--Bootstrap Dropdown-->
        <script src="{{ asset('website/') }}/js/bootstrap-select.js"></script>

        <!--Video Popup-->
        <script src="{{ asset('website/') }}/js/videobox/video.js"></script>

        <!--Datepicker-->
        <script src="{{ asset('website/') }}/js/datepicker.js"></script>

        <!--Dropzone-->
        <script src="{{ asset('website/') }}/js/dropzone.min.js"></script>

        <!--Wow animation-->
        <script src="{{ asset('website/') }}/js/wow.min.js"></script>

        <!--Rang Slider-->
        <script src="{{ asset('website/') }}/js/range-Slider.min.js"></script>

        <!--Checkbox-->
        <script src="{{ asset('website/') }}/js/selectbox-0.2.min.js"></script>

        <!--Checkbox-->
        <script src="{{ asset('website/') }}/js/scrollreveal.min.js"></script>

        <!--Checkbox-->
        <script src="{{ asset('website/') }}/js/jquery-countTo.js"></script>

        <!--Checkbox-->
        <script src="{{ asset('website/') }}/js/jquery.typewriter.js"></script>

        <!--Checkbox-->
        <script src="{{ asset('website/') }}/js/death.min.js"></script>

        <!--Revolution Slider-->
        <script src="{{ asset('website/') }}/js/themepunch/jquery.themepunch.tools.min.js"></script>
        <script src="{{ asset('website/') }}/js/themepunch/jquery.themepunch.revolution.min.js"></script>
        <script src="{{ asset('website/') }}/js/themepunch/revolution.extension.layeranimation.min.js"></script>
        <script src="{{ asset('website/') }}/js/themepunch/revolution.extension.navigation.min.js"></script>
        <script src="{{ asset('website/') }}/js/themepunch/revolution.extension.parallax.min.js"></script>
        <script src="{{ asset('website/') }}/js/themepunch/revolution.extension.slideanims.min.js"></script>
        <script src="{{ asset('website/') }}/js/themepunch/revolution.extension.video.min.js"></script>

        <!--Custom Js -->
        <script src="{{ asset('website/') }}/js/functions.js"></script>

        <!--Maps & Markers-->
        <script src="{{ asset('website/') }}/js/form.js"></script>
        <script src="{{ asset('website/') }}/js/custom-map.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U">
        </script>
        <script src="{{ asset('website/') }}/js/gmaps.js"></script>
        <script src="{{ asset('website/') }}/js/contact.js"></script>
        <!--===== #/REQUIRED JS =====-->



        @yield('script')
    </body>

</html>
