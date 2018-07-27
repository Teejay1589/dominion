<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="description" content="{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }} is a Hospital Website.">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Yinka, Tunji Oyeniran">

  @if( View::hasSection('title') )
    <title>@yield('title') | {{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }} Management</title>
  @else
    <title>{{ env('APP_FULLNAME', 'DOMINION MEDICAL CENTER') }}</title>
  @endif

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Layout Styles --}}
  <link rel="stylesheet" href="{{ asset('urban/vendor/bootstrap/dist/css/bootstrap.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('urban/vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('urban/styles/roboto.css') }}">
  <link rel="stylesheet" href="{{ asset('urban/styles/font-awesome.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('urban/styles/panel.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('urban/styles/feather.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('urban/styles/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('urban/styles/urban.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('urban/styles/urban.skins.css') }}"> --}}

  {{-- Page Styles --}}
  @if( View::hasSection('page_styles') )
      @yield('page_styles')
  @endif
</head>
<body class="bg-white">

  <div class="app layout-fixed-header bg-white usersession">
    <div class="full-height">
      <div class="center-wrapper">
        <div class="center-content">
          <div class="row no-margin">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
              @include('shared.alerts')
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Layout Scripts --}}
  {{-- <script src="{{ asset('urban/scripts/extentions/modernizr.js') }}"></script> --}}
  <script src="{{ asset('urban/vendor/jquery/dist/jquery.js') }}"></script>
  <script src="{{ asset('urban/vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
  {{-- <script src="{{ asset('urban/vendor/jquery.easing/jquery.easing.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/vendor/fastclick/lib/fastclick.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/vendor/onScreen/jquery.onscreen.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/vendor/jquery-countTo/jquery.countTo.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/accordion.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/animate.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/link-transition.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/panel-controls.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/preloader.js') }}"></script> --}}
  <script src="{{ asset('urban/scripts/ui/toggle.js') }}"></script>
  {{-- <script src="{{ asset('urban/scripts/urban-constants.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/extentions/lib.js') }}"></script> --}}

 	{{-- Page Scripts --}}
  @if( View::hasSection('page_scripts') )
      @yield('page_scripts')
  @endif
</body>
</html>
