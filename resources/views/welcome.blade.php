@extends('layouts.app')

@section('title', 'Home')

@section('page_styles')
  <style type="text/css">
    #banner {
      background: url({{ asset('img/1_1.jpg') }}) no-repeat top left;
      background-size: auto auto;
      background-size: cover;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      -ms-background-size: cover;
      height: 450px;
    }
    .expand {
      /*margin: -5px -10px;*/
      margin: auto -10px;
    }
  </style>
@endsection

@section('content')
  <div class="row">
    <div id="banner" class="jumbotron expand" style="color: #fff;">
      <div class="container" style="display: table; height: 100%;">
        <div class="text-center" style="display: table-cell; vertical-align: bottom;">
          <div class="clearfix"></div>
          <br>
          <h2 class="text-white text-uppercase" style="letter-spacing: 5px;">Health Is The Only Wealth We Know</h2>
          <p class="text-white text-uppercase" style="letter-spacing: 5px;">Dr. Awoleke J. O.</p>
          <a class="btn btn-primary" href="javascript:;">Health Tips</a>
          <div class="clearfix"></div>
          <br>
        </div>
      </div>
    </div>
  </div>

  <div class="row" id="about-us">
    <div class="bg-white mb0 expand">
      <div class="clearfix"></div>
      <br>
      <div class="container">
        <h3 class="h2 text-center text-uppercase">About us</h3>
        <div class="text-center">
            <div class="col-sm-4 col-xs-12">
                <h1><span class="fa fa-medkit" aria-hidden="true"></span></h1>
                <h4>Healthline</h4>
                <p>Our Intensive Care Unit also known as the Critical Care Unit is a special department of the hospital
                    where we can provide around the clock continuous monitoring of our more seriously ill patients.</p>
            </div>
            <div class="col-sm-4 col-xs-12">
                <h1><span class="fa fa-user-md" aria-hidden="true"></span></h1>
                <h4>Hospitality</h4>
                <p>Our Intensive Care Unit also known as the Critical Care Unit is a special department of the hospital
                    where we can provide around the clock continuous monitoring of our more seriously ill patients.</p>
            </div>
            <div class="col-sm-4 col-xs-12">
                <h1><span class="fa fa-ambulance" aria-hidden="true"></span></h1>
                <h4>Humaneness</h4>
                <p>Our Intensive Care Unit also known as the Critical Care Unit is a special department of the hospital
                    where we can provide around the clock continuous monitoring of our more seriously ill patients.</p>
            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <br>
    </div>
  </div>

  <div class="row" id="services">
    <div class="bg-info mb0 expand">
      <div class="clearfix"></div>
      <br>
      <div class="container">
        <h3 class="h2 text-center text-uppercase">Services</h3>
        <h4 class="h3 text-center text-uppercase" style="color: #d00;">The skill to heal. The spirit to care</h4>
        <p class="text-center lead text-white">Our Intensive Care Unit also known as the Critical Care Unit is a special department of the hospital where we can provide around the clock continuous monitoring of our more seriously ill patients.</p>
        <div class="text-center">
            <div class="col-sm-3 col-xs-12">
                <h1>01</h1>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h1>02</h1>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h1>03</h1>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h1>04</h1>
            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <br>
    </div>
  </div>
@endsection

@section('page_scripts')
@endsection