<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}"><img width="50%"
                                    src="{{ asset('assets') }}/images/jobPulse/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/findJobs') }}">Find a Jobs </a></li>
                                        <li><a href="{{ url('/about') }}">About</a></li>
                                        {{-- <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li><a href="job_details.html">job Details</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn head-btn1">{{ Auth::user()->name }}</a>

                                @endauth
                                @guest
                                    <a href="{{ url('/candidate/register') }}" class="btn head-btn1">Cadidate</a>
                                    <a href="{{ url('/companies/register') }}" class="btn head-btn1">Companies</a>
                                    <a href="{{ route('login') }}" class="btn head-btn2">Login</a>
                                @endguest

                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
