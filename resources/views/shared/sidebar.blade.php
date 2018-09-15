<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset(Auth::guard('admin')->user()->profile_picture) }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::guard('admin')->user()->first_name . " " . Auth::guard('admin')->user()->last_name }}</h1>
            <p>{{ Auth::user()->role->name }}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li class="{{ isset($page) && $page->view == 'm.home' ? 'active' : '' }}"><a href="{{ url('/m/home') }}"> <i class="icon-home"></i>Dashboard </a></li>
        <li class="{{ isset($page) && $page->view == 'm.profile' ? 'active' : '' }}"><a href="{{ url('/m/profile') }}"> <i class="icon-user"></i>Profile </a></li>
        <li class="">
            <a href="{{ route('m.logout') }}" class="nav-link logout"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
        </li>
    </ul>

    <span class="heading">Main Menu</span>
    <ul class="list-unstyled">
        <li class="{{ isset($page) && $page->view == 'm.patients' ? 'active' : '' }}"><a href="{{ url('/m/patients') }}"> <i class="fa fa-users"></i>Patients </a></li>
        <li class="{{ isset($page) && $page->view == 'm.visits' ? 'active' : '' }}"><a href="{{ url('/m/visits') }}"> <i class="icon-padnote"></i>Cases </a></li>
        <li class="{{ isset($page) && $page->view == 'm.surgeries' ? 'active' : '' }}"><a href="{{ url('/m/surgeries') }}"> <i class="fa fa-stethoscope"></i>Surgeries </a></li>
        <li class="{{ isset($page) && $page->view == 'm.surgery_names' ? 'active' : '' }}"><a href="{{ url('/m/surgery_names') }}"> <i class="fa fa-stethoscope"></i>Surgery Names </a></li>
        <li><a href="#"> <i class="fa fa-calendar-o"></i>Appointments </a></li>
        <li><a href="#"> <i class="icon-bars"></i>Departments </a></li>
        <li><a href="#"> <i class="icon-check"></i>Cases </a></li>
        <li><a href="#"> <i class="fa fa-calendar-o"></i>Schedules (On Call) </a></li>
        <li><a href="#"> <i class="icon-page"></i>Research / Case Reviews </a></li>
        <li class="{{ isset($page) && $page->view == 'm.blog' ? 'active' : '' }}"><a href="{{ url('/m/blog/posts') }}"><i class="fa fa-paragraph"></i>Posts </a></li>
    </ul>

    <span class="heading">Management</span>
    <ul class="list-unstyled">
        <li><a href="#"> <i class="icon-user"></i>Doctors </a></li>
        <li><a href="#"> <i class="icon-user"></i>Staffs </a></li>
        <li><a href="#"> <i class="icon-user"></i>Patients </a></li>
        <li><a href="#"> <i class="icon-bill"></i>Billing </a></li>
        <li><a href="#"> <i class="icon-picture"></i>Noticeboard </a></li>
        <li><a href="#"> <i class="icon-page"></i>Drug Inventory </a></li>
        <li><a href="#"> <i class="icon-flask"></i>Public Feed </a></li>
    </ul>
</nav>