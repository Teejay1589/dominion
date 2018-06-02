<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dominion Medical Centre</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //custom-theme -->
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- stylesheet -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/gallery.css') }}" rel="stylesheet" type="text/css" media="all"/> <!-- gallery css -->
    <!-- //stylesheet -->
    <!-- online fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link href="//fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- //online fonts -->
    <!-- font-awesome-icons -->
    <link href="{{ asset('css/font-awesome.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- //font-awesome-icons -->
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.79639.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"/>
    <!-- for smooth scrolling -->
    <script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
    <!-- //for smooth scrolling -->
</head>
<body>

<div class="header-top">
    <div class="container">
        <div class="header-top-left">
            <ul id="m_nav_list" class="m_nav menu__list">
                <li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"><a href="{{ url('/') }}"
                                                                                           class="menu__link">Home </a>
                </li>
                <li class="m_nav_item menu__item" id="moble_nav_item_2"><a href="#about" class="menu__link">About
                        Us </a></li>
                <li class="m_nav_item menu__item" id="moble_nav_item_3"><a href="#services"
                                                                           class="menu__link">Services</a></li>
                <li class="m_nav_item menu__item" id="moble_nav_item_4"><a href="#team" class="menu__link">Team</a></li>
                <li class="m_nav_item menu__item" id="moble_nav_item_5"><a href="{{ url('/blog') }}" class="menu__link">Blog</a></li>
            </ul>
        </div>

        <a href="{{ url('/login') }}">
            <div class="header-top-right">
                <p>Our Patient? Login</p>
            </div>
        </a>
        <a href="{{ url('/newBook') }}" data-toggle="modal" data-target="#myModal1">
            <div class="header-top-right mg-right">
                <p class="appoint">New Patient? Book An Appointment</p>
            </div>
        </a>
        <div class="clearfix"></div>
    </div>
</div>

{{--<div class="header">--}}
    {{--<div class="container">--}}
        {{--<div class="logo">--}}
            {{--<img src="{{ asset('img/logo.png') }}">--}}
            {{--<a href="{{ url('/') }}">Dominion <span class="smallfont">Specialist Medical And Diagnostics Center</span></a>--}}
        {{--</div>--}}


        {{--<div class="header-right-info pull-right">--}}
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<div class="single-header-right-info">--}}
                        {{--<div class="icon-box"><i class="fa fa-map-marker"></i></div>--}}
                        {{--<div class="text-box">--}}
                            {{--<h5>4 Nova Road</h5>--}}
                            {{--<p>Ado-Ekiti, Ekiti State.</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div class="single-header-right-info">--}}
                        {{--<div class="icon-box"><i class="fa fa-phone"></i></div>--}}
                        {{--<div class="text-box">--}}
                            {{--<h5>+234(0)8177433899</h5>--}}
                            {{--<p>Call In Today</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div class="single-header-right-info">--}}
                        {{--<div class="icon-box"><i class="fa fa-clock-o"></i></div>--}}
                        {{--<div class="text-box">--}}
                            {{--<h5>Mon - Sat 24hrs service</h5>--}}
                            {{--<p>Sunday 24hrs service</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}


        {{--<div class="clearfix"></div>--}}
    {{--</div>--}}


{{--</div>--}}
<!-- //header -->