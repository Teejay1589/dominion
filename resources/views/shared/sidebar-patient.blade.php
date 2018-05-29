<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('img/default.png') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h1>
            <p>PATIENT</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li class="{{ isset($page) && $page->view == 'home' ? 'active' : '' }}"><a href="{{ url('/home') }}"> <i class="icon-home"></i>Dashboard </a></li>
        <li class="{{ isset($page) && $page->view == 'profile' ? 'active' : '' }}"><a href="{{ url('/profile') }}"> <i class="icon-user"></i>Profile </a></li>
        <li class="">
            <a href="{{ route('logout') }}" class="nav-link logout"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
        </li>
    </ul>

    <span class="heading">Main Menu</span>
    <ul class="list-unstyled">
        <li class="{{ isset($page) && $page->view == 'cases' ? 'active' : '' }}"><a href="{{ url('/p/cases') }}"> <i class="icon-padnote"></i>Cases </a></li>
        <li><a href="#"> <i class="fa fa-calendar-o"></i>Appointments </a></li>
        <li><a href="#"> <i class="icon-check"></i>Cases </a></li>
        <li><a href="#"> <i class="icon-bill"></i>Billings </a></li>
        <li><a href="#"> <i class="fa fa-calendar-o"></i>Schedules (On Call) </a></li>
    </ul>
</nav>