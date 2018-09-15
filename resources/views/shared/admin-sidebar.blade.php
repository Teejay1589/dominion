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
        <img src="{{ asset(Auth::guard('admin')->user()->profile_picture) }}" class="header-avatar img-circle ml10" alt="avata" title="user" width="50px" height="50px">
        <p class="" style="color: #fff; padding: 5px; margin: 0;">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</p>
        <span class="bg-white" style="padding: 2px 5px; margin: 0;">{{ Auth::guard('admin')->user()->role->name }}</span>
        <div class="clearfix"></div>
        <br>
      </li>

      <!-- dashboard -->
      <li class="{{ isset($page) && $page->view == 'm.home' ? 'active' : '' }}">
        <a href="{{ url('/m/home') }}">
          <i class="fa fa-desktop"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- /dashboard -->

      <!-- profile -->
      <li class="{{ isset($page) && $page->view == 'm.profile' ? 'active' : '' }}">
        <a href="{{ url('/m/profile') }}">
          <i class="fa fa-user-md"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- /profile -->

      <!-- my permissions -->
      <li class="{{ isset($page) && $page->view == 'm.my_permissions' ? 'active' : '' }}">
        <a href="{{ url('/m/my-permissions') }}">
          <i class="fa fa-info"></i>
          <span>My Permissions</span>
          <span class="label pull-right">{{ App\Permission::where('permit', '>=', Auth::user()->role_id)->count() + App\UserPermission::where('user_id', Auth::id())->count() }}</span>
        </a>
      </li>
      <!-- /my permissions -->

      @can('view', App\Setting::class)
      <!-- settings -->
      <li class="{{ isset($page) && $page->view == 'm.settings' ? 'active' : '' }}">
        <a href="{{ url('/m/settings') }}">
          <i class="fa fa-wrench"></i>
          <span>Settings</span>
        </a>
      </li>
      <!-- /settings -->
      @endcan

      <!-- logout -->
      <li class="">
        <a href="{{ url('/m/logout') }}">
          <i class="fa fa-sign-out"></i>
          <span>Logout</span>
        </a>
      </li>
      <!-- /logout -->

      <li class="m15"></li>

      @can('view', App\Patient::class)
        <!-- patients -->
        <li class="{{ isset($page) && $page->view == 'm.patients' ? 'active' : '' }}">
          <a href="{{ url('/m/patients') }}">
            <i class="fa fa-users"></i>
            <span>Patients</span>
            <span class="label pull-right">{{ App\Patient::count() }}</span>
          </a>
        </li>
        <!-- /patients -->
      @endcan

      {{-- @can('view', App\Visit::class)
        <!-- patient_visits -->
        <li class="{{ isset($page) && $page->view == 'm.patient_visits' ? 'active' : '' }}">
          <a href="{{ url('/m/patient/0/visits') }}">
            <i class="fa fa-child"></i>
            <span>Patient Visits</span>
          </a>
        </li>
        <!-- /patient_visits -->
      @endcan --}}

      @can('view', App\Visit::class)
        <!-- visits -->
        <li class="{{ isset($page) && $page->view == 'm.visits' ? 'active' : '' }}">
          <a href="{{ url('/m/visits') }}">
            <i class="fa fa-child"></i>
            <span>All Visits</span>
          </a>
        </li>
        <!-- /visits -->
      @endcan

      @can('view', App\Surgery::class)
        <!-- surgeries -->
        <li class="{{ isset($page) && $page->view == 'm.surgeries' ? 'active' : '' }}">
          <a href="{{ url('/m/surgeries') }}">
            <i class="fa fa-stethoscope"></i>
            <span>All Surgeries</span>
          </a>
        </li>
        <!-- /surgeries -->
      @endcan

      @can('view', App\SurgeryName::class)
        <!-- surgery_names -->
        <li class="{{ isset($page) && $page->view == 'm.surgery_names' ? 'active' : '' }}">
          <a href="{{ url('/m/surgery_names') }}">
            <i class="fa fa-bolt"></i>
            <span>Surgery Names</span>
          </a>
        </li>
        <!-- /surgery_names -->
      @endcan

      @can('view', App\Billing::class)
        <!-- billings -->
        <li class="{{ isset($page) && $page->view == 'm.billings' ? 'active' : '' }}">
          <a href="{{ url('/m/billings') }}">
            <i class="fa fa-money"></i>
            <span>All Billings</span>
          </a>
        </li>
        <!-- /billings -->
      @endcan

      @can('view', App\Sms::class)
        <!-- sms -->
        <li class="{{ isset($page) && $page->view == 'm.sms' ? 'active' : '' }}">
          <a href="{{ url('/m/sms') }}">
            <i class="fa fa-envelope"></i>
            <span>All SMS</span>
          </a>
        </li>
        <!-- /sms -->
      @endcan

      <!-- blog_posts -->
      <li class="{{ isset($page) && $page->view == 'm.blog.posts' ? 'active' : '' }}">
        <a href="{{ url('/m/blog/posts') }}">
          <i class="fa fa-paragraph"></i>
          <span>Blog Posts</span>
        </a>
      </li>
      <!-- /blog_posts -->

      <li class="m15"></li>

      @can('view', App\UserPermission::class)
        <!-- user permissions -->
        <li class="{{ isset($page) && $page->view == 'm.user_permissions' ? 'active' : '' }}">
          <a href="{{ url('/m/user-permissions') }}">
            <i class="fa fa-check"></i>
            <span>User Permissions</span>
          </a>
        </li>
        <!-- /user permissions -->
      @endcan

      @can('view', App\User::class)
        <!-- users -->
        <li class="{{ isset($page) && $page->view == 'm.users' ? 'active' : '' }}">
          <a href="{{ url('/m/users') }}">
            <i class="fa fa-group"></i>
            <span>Users / Staff Management</span>
          </a>
        </li>
        <!-- /users -->
      @endcan

      <li class="m15"></li>
    </ul>
  </nav>
  <!-- /main navigation -->
</div>
