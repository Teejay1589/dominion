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
  <link rel="stylesheet" href="{{ asset('urban/vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('urban/styles/roboto.css') }}">
  <link rel="stylesheet" href="{{ asset('urban/styles/font-awesome.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('urban/styles/panel.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('urban/styles/feather.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('urban/styles/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('urban/styles/urban.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('urban/styles/urban.skins.css') }}"> --}}
  <style type="text/css">
    /**:not(.circle-icon):not(.status) {
      border-radius: 0 !important;
    }*/
    #main-nav li.active a, #main-nav li a:hover {
      border-bottom: 2px solid #0099cc;
    }
    .list-group-item.active {
      background: #0099cc;
      border-color: #0099cc;
    }
    .list-group-item.active:hover {
      background: #007399;
      border-color: #007399;
    }
    .table-wrapper {
      overflow-x: auto;
    }
    textarea {
      resize: vertical;
    }
    .main-content {
      min-height: 95vh;
    }
    a.text-primary {
        color: #0099cc !important;
    }
    a.text-primary:hover {
        color: #007399 !important;
    }
    a.text-danger {
        color: #d96557 !important;
    }
    a.text-danger:hover {
        color: #ce402f !important;
    }
  </style>

  {{-- Page Styles --}}
  @if( View::hasSection('page_styles') )
      @yield('page_styles')
  @endif
</head>

<body>
  <div id="app">
    <!-- quick launch panel -->

    <!-- /quick launch panel -->

    <div class="app layout-fixed-header">

      <!-- sidebar panel -->
      @include('shared.sidebar-patient')
      <!-- /sidebar panel -->

      <!-- content panel -->
      <div class="main-panel">

        <!-- top header -->
        @include('shared.navbar-patient')
        <!-- /top header -->


        <!-- main area -->
        <div class="main-content" style="margin-bottom: 0; padding-left: 10px; padding-right: 10px;">
          @include('shared.alerts')<br>
          @yield('content')
        </div>
        <!-- /main area -->
      </div>
      <!-- /content panel -->

      <!-- bottom footer -->
      @include('shared.footer')
      <!-- /bottom footer -->

      <!-- chat -->
      {{-- @include('shared.chat') --}}
      <!-- /chat -->
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
  <script src="{{ asset('urban/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
  {{-- <script src="{{ asset('urban/scripts/ui/accordion.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/animate.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/link-transition.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/panel-controls.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/ui/preloader.js') }}"></script> --}}
  <script src="{{ asset('urban/scripts/ui/toggle.js') }}"></script>
  {{-- <script src="{{ asset('urban/scripts/urban-constants.js') }}"></script> --}}
  {{-- <script src="{{ asset('urban/scripts/extentions/lib.js') }}"></script> --}}
  <script type="text/javascript">
    // Confirm Action
    $('.confirm-action').click(function(e) {
      var ans = confirm('Are you sureee?');
      if(ans) {
      } else {
        e.preventDefault();
      }
    });

    // Sidebar Toggle FIX
    $('a[data-toggle="offscreen"]').click(function(e) {
      $('.app').toggleClass('offscreen');
      $('.app').toggleClass('move-left');
    });
  </script>

  {{-- Page Scripts --}}
  @if( View::hasSection('page_scripts') )
      @yield('page_scripts')
  @endif
</body>

</html>
