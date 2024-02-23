<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
      
      <div class="user-name">
          {{ Auth::user()->name }}
      </div>
      <div class="user-designation">
          {{ Auth::user()->role }}
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/companies') }}" >
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Companies</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/jobs') }}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Jobs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth" style="">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('/Pages') }}"> Home </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/aboutPage/admin') }}"> About  </a></li>
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/Pages') }}">
          <i class="icon-command menu-icon"></i>
          <span class="menu-title">Pages</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-help menu-icon"></i>
          <span class="menu-title">Plugin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Account</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout01') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">LogOut</span>
        </a>
      </li>
      
     
      
        
         {{-- <li class="nav-item">
        <a class="nav-link" href="docs/documentation.html">
          <i class="icon-book menu-icon"></i>
          <form method="POST" action="{{ route('logout') }}" class="menu-title">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </a>
      </li> --}}
    </ul>
  </nav>