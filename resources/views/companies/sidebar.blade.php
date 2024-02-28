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
        <a class="nav-link" href="{{ url('/companies/dashboard') }}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-disc menu-icon"></i>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ url('profilepage')}}" >
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/contactpage') }}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Contact Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('jobs') }}">
          <i class="icon-command menu-icon"></i>
          <span class="menu-title">Jobs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('whoApllied') }}">
          <i class="icon-help menu-icon"></i>
          <span class="menu-title">Who Applied</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ url('companies/shortlisted/user') }}">
          <i class="icon-help menu-icon"></i>
          <span class="menu-title">Short Listed Candidates</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="docs/documentation.html">
          <i class="icon-book menu-icon"></i>
          <span class="menu-title">Pages</span>
        </a>
      </li> 
          
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/company/profile/page') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Acount</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout01') }}">
          <i class="icon-command menu-icon"></i>
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