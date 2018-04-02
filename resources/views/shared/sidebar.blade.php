<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        {{-- <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div> --}}
        <div class="title">
            <h1 class="h4">{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->role->role }}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li class="{{ (request()->getRequestUri() == '/dhms/dominion/public/home') ? 'active' : '' }}"><a href="{{ url('/home') }}"> <i class="icon-home"></i>Dashboard </a></li>
        <li class="{{ (request()->getRequestUri() == '/dhms/dominion/public/profile') ? 'active' : '' }}"><a href="{{ url('profile') }}"> <i class="icon-user"></i>Profile </a></li>
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
        <li class="{{ (request()->getRequestUri() == '/dhms/dominion/public/patients') ? 'active' : '' }}"><a href="{{ url('/patients') }}"> <i class="fa fa-users"></i>Patients </a></li>
        <li class="{{ (request()->getRequestUri() == '/dhms/dominion/public/cases') ? 'active' : '' }}"><a href="{{ url('/cases') }}"> <i class="icon-padnote"></i>Cases </a></li>
        <li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
        <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
        <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
        <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>
    </ul>

    <span class="heading">Extra</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
    </ul>
</nav>