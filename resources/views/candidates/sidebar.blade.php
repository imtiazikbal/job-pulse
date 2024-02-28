<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
      <div class="user-image">
        <img src="{{ asset('assets') }}/images/jobPulse/logo.png"  alt="logo">

      </div>
      <div class="user-name">

      </div>
      <div class="user-designation">
         
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ url('appliedJobPage') }}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Applied Jobs</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('shortlistJobs') }}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Short List</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ url('/educationCreatePage') }}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Education</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/job/experience') }}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Job Experience</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/job/traning') }}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Trainign</span>
        </a>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/candidate/skill/page') }}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Skill</span>
        </a>
        </li>
   </li>
   
       
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Candidate/profile/page') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Acount</span>
        </a>
      </li>
     
        
        
          {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
         --}}
         <li class="nav-item">
          <a class="nav-link" href="{{ url('/logout01') }}">
            <i class="icon-command menu-icon"></i>
            <span class="menu-title">LogOut</span>
          </a>
        </li>
      </li>
    </ul>
  </nav>