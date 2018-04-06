<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_NAME', 'APP NAME') }} is a Hospital Management System">
    <meta name="author" content="Yinka, Tunji Oyeniran">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'APP NAME') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">

    {{-- Page Styles --}}
    @if( View::hasSection('page_styles') )
        @yield('page_styles')
    @endif

    {{-- Layout Styles --}}
    <style type="text/css">
        .table-wrapper {
          overflow-x: auto;
        }
        textarea {
          resize: vertical;
        }
        .modal.in {
            /*background: dimgray;*/
        }
    </style>
</head>
<body>
    <div id="app">
        <div id="app" class="page">
            @auth()
                @include('shared.alerts')
                @include('shared.navbar')

                <div class="page-content d-flex align-items-stretch">
                    @include('shared.sidebar')

                    <div class="content-inner">
                        @include('shared.page-header')

                        @yield('content')

                        @include('shared.page-footer')
                    </div>
                </div>
            @endauth
            @guest()
                @yield('content')
            @endguest
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/charts-home.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>

    {{-- Layout Scripts --}}
    <script type="text/javascript">
      // Confirm Action
      $('.confirm-action').click(function(e) {
        var ans = confirm('Are you sureee?');
        if(ans) {
        } else {
          e.preventDefault();
        }
      });
    </script>

    {{-- Page Scripts --}}
    @if( View::hasSection('page_scripts') )
        @yield('page_scripts')
    @endif
</body>
</html>
