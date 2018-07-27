<header class="header navbar" style="padding-left: 0; margin-left: 0;">
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a href="javascript:;" class="hamburger-icon v2 visible-xs pull-right m5" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span></span>
          <span></span>
          <span></span>
          <span class="sr-only">Toggle navigation</span>
        </a>
        <span class="pull-right visible-xs p15">
          @auth('admin')
            <a href="javascript:;" data-toggle="dropdown">
              <img src="{{ asset('urban/images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:;">&rarr; <span class="">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name[0] }}.</span></a>
              </li>
              <li>
                <a href="{{ url('/m/home') }}">Dashboard</a>
              </li>
              <li>
                <a href="javascript:;">Profile</a>
              </li>
              <li>
                <a href="javascript:;">Settings</a>
              </li>
              <li>
                <a rel="nofollow" class="dropdown-item" href="{{ route('m.logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('m.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          @endauth
        </span>
        <!-- logo -->
        <div class="navbar-brand brand-logo mt2" style="font-size: 16px;">
          <a href="javascript:;">
            <strong>DOMINION MC</strong>
            {{-- <img src="{{ asset('urban/images/logo-dark.png') }}" height="15" alt="LOGO"> --}}
          </a>
        </div>
        <!-- /logo -->
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse" style="padding-left: 5px; padding-right: 5px;">
        <ul id="main-nav" class="nav navbar-nav">
          <li class="{{ isset($page) && $page->view == 'welcome' ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
          <li class=""><a href="{{ url('/') }}#about-us">About Us</a></li>
          <li class=""><a href="{{ url('/') }}#services">Services</a></li>
          <li class="{{ isset($page) && $page->view == 'blog' ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>
        </ul>
        {{-- <form class="navbar-form navbar-left pt10" role="search" style="margin: 0;" action="#">
          <div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </form> --}}
        <ul class="nav navbar-nav navbar-right">
          @auth('admin')
          <li class="hidden-xs">
            <a href="javascript:;" data-toggle="dropdown">
              <img src="{{ asset('urban/images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
              <span class="">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name[0] }}.</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ url('/m/home') }}">Dashboard</a>
              </li>
              <li>
                <a href="javascript:;">Profile</a>
              </li>
              <li>
                <a href="javascript:;">Settings</a>
              </li>
              <li>
                <a rel="nofollow" class="dropdown-item" href="{{ route('m.logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('m.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endauth
          <li><a href="{{ url('/login') }}" type="button" class="btn btn-primary m10" style="padding: 5px; color: #fff;">Our Patient?</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>


  {{-- <div class="brand visible-xs">
    <!-- logo -->
    <div class="brand-logo pull-left">
      <a href="javascript:;">
        <strong>DOMINION MC</strong>
        <img src="{{ asset('urban/images/logo-dark.png') }}" height="15" alt="LOGO">
      </a>
    </div>
    <!-- /logo -->

    <!-- toggle chat sidebar small screen-->
    <div class="toggle-chat">
      <a href="javascript:;" class="hamburger-icon v2 visible-xs" data-toggle="layout-chat-open">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
    <!-- /toggle chat sidebar small screen-->
  </div>

  <ul id="main-nav" class="nav navbar-nav hidden-xs">
    <li>
      <!-- logo -->
      <div class="navbar-text brand-logo">
        <a href="javascript:;" style="border: 0;">
          <strong>DOMINION MC</strong>
          <img src="{{ asset('urban/images/logo-dark.png') }}" height="15" alt="LOGO">
        </a>
      </div>
      <!-- /logo -->
    </li>
    <li class="{{ isset($page) && $page->view == 'welcome' ? 'active' : '' }}">
      <a href="{{ url('/') }}">
        Home
      </a>
    </li>
    <li class="">
      <a href="{{ url('/') }}#about-us">
        About Us
      </a>
    </li>
    <li class="">
      <a href="{{ url('/') }}#services">
        Services
      </a>
    </li>
    <li class="">
      <a href="{{ url('/blog') }}">
        Blog
      </a>
    </li>
  </ul>

  <ul class="nav navbar-nav navbar-right hidden-xs">
    <li>
      <a href="{{ url('/login') }}" class="btn btn-primary btn-link" style="color: #fff;">Our Patient? Login</a>
    </li>
  </ul>

  @auth('admin')
    <ul class="nav navbar-nav navbar-right hidden-xs">
      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <div class="status bg-danger border-danger animated bounce"></div>
        </a>
        <ul class="dropdown-menu notifications">
          <li class="notifications-header">
            <p class="text-muted small">You have 3 new messages</p>
          </li>
          <li>
            <ul class="notifications-list">
              <li>
                <a href="javascript:;">
                  <span class="pull-left mt2 mr15">
                    <img src="{{ asset('urban/images/avatar.jpg') }}" class="avatar avatar-xs img-circle" alt="">
                  </span>
                  <div class="overflow-hidden">
                    <span>Sean launched a new application</span>
                    <span class="time">2 seconds ago</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <div class="pull-left mt2 mr15">
                    <div class="circle-icon bg-danger">
                      <i class="fa fa-chain-broken"></i>
                    </div>
                  </div>
                  <div class="overflow-hidden">
                    <span>Removed chrome from app list</span>
                    <span class="time">4 Hours ago</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <span class="pull-left mt2 mr15">
                    <img src="{{ asset('urban/images/face3.jpg') }}" class="avatar avatar-xs img-circle" alt="">
                  </span>
                  <div class="overflow-hidden">
                    <span class="text-muted">Jack Hunt has registered</span>
                    <span class="time">9 hours ago</span>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="notifications-footer">
            <a href="javascript:;">See all messages</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="{{ asset('urban/images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
          <span class="">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name[0] }}.</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ url('/m/home') }}">Dashboard</a>
          </li>
          <li>
            <a href="javascript:;">Profile</a>
          </li>
          <li>
            <a href="javascript:;">Settings</a>
          </li>
          <li>
            <a rel="nofollow" class="dropdown-item" href="{{ route('m.logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ route('m.logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
    </ul>
  @endauth --}}
</header>
