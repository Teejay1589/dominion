<div class="sidebar-panel offscreen-left">
  <div class="brand">
    <!-- logo -->
    <div class="brand-logo pull-left">
      <a href="{{ url('/') }}">
        <strong>DOMINION MC</strong>
        {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" height="15" alt="LOGO"> --}}
      </a>
    </div>
    <!-- /logo -->

    <!-- toggle small sidebar menu -->
    <a href="javascript:;" class="toggle-sidebar hidden-xs hamburger-icon v3" data-toggle="layout-small-menu">
      <span></span>
          <span></span>
          <span></span>
          <span></span>
    </a>
    <!-- /toggle small sidebar menu -->
  </div>

  <!-- main navigation -->
  <nav role="navigation">
    <ul class="nav">

        <li class="text-center">
        <img src="{{ asset('img/default.png') }}" class="header-avatar img-circle ml10" alt="avata" title="user" width="50px" height="50px">
        <p class="" style="color: #fff; padding: 5px; margin: 0;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <span class="bg-white" style="padding: 2px 5px; margin: 0;">PATIENT</span>
        <div class="clearfix"></div>
        <br>
      </li>

      <!-- dashboard -->
      <li class="{{ isset($page) && $page->view == 'home' ? 'active' : '' }}">
        <a href="{{ url('/home') }}">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- /dashboard -->

      <!-- profile -->
      <li class="{{ isset($page) && $page->view == 'profile' ? 'active' : '' }}">
        <a href="{{ url('/profile') }}">
          <i class="fa fa-user-md"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- /profile -->

      <!-- logout -->
      <li class="">
        <a href="{{ route('logout') }}" class="nav-link logout"
          onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i>
          <span>Logout</span>
        </a>
      </li>
      <!-- /logout -->

    </ul>

    <span class="heading p0"><hr style="border-color: #ccc;"></span>
    <ul class="nav">
      <!-- visits -->
      <li class="{{ isset($page) && $page->view == 'visits' ? 'active' : '' }}">
        <a href="{{ url('/p/visits') }}">
          <i class="fa fa-child"></i>
          <span>My Visits</span>
          <span class="label pull-right">{{ Auth::user()->visits->count() }}</span>
        </a>
      </li>
      <!-- /visits -->

      <!-- surgeries -->
      <li class="{{ isset($page) && $page->view == 'surgeries' ? 'active' : '' }}">
        <a href="{{ url('/p/surgeries') }}">
          <i class="fa fa-stethoscope"></i>
          <span>My Surgeries</span>
          <span class="label pull-right">{{ Auth::user()->surgeries()->count() }}</span>
        </a>
      </li>
      <!-- /surgeries -->

      <!-- billings -->
      <li class="{{ isset($page) && $page->view == 'billings' ? 'active' : '' }}">
        <a href="javascript:;">
          <i class="fa fa-money"></i>
          <span>My Billings</span>
          <span class="label pull-right">{{ Auth::user()->billings()->count() }}</span>
        </a>
      </li>
      <!-- /billings -->

      <!-- appointments -->
      <li class="{{ isset($page) && $page->view == 'appointments' ? 'active' : '' }}">
        <a href="javascript:;">
          <i class="fa fa-calendar-o"></i>
          <span>My Appointments</span>
        </a>
      </li>
      <!-- /appointments -->
    </ul>
  </nav>
  <!-- /main navigation -->
</div>
