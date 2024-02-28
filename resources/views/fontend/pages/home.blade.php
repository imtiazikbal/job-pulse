@extends('fontend.layouts.app')
@section('content')

<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" data-background="{{ asset('fontend') }}/assets/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero__caption">
                            <h1>Find the most exciting startup jobs</h1>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-8">
                        <!-- form -->
                        <form action="{{ url('/jobs/filter/location/title') }}" class="search-box">
                            <div class="input-form">
                                <input type="title" placeholder="Job Tittle or keyword">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select name="location" id="select1">
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Chattagram">Chattagram</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="search-form">
                                <button class="btn" type="submit" >Find job</button>
                            </div>	
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('fontend.components.categorySection')

<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Recent Job</span>
                    <h2>Featured Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <!-- single-job-content -->
                @foreach ( $jobs as $job) 
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="{{ route('JobsDetails', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}"><img src="{{ asset('fontend') }}/assets/img/icon/job-list1.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="{{ route('JobsDetails', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}"><h4>{{ $job->title }}</h4></a>
                            <ul>
                                <li>{{ $job->user->name }}</li>
                                <li><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</li>
                                <li> {{ $job->salary }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="{{ route('JobsDetails', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}"> {{ $job->employment_status }} </a>
                        <span>{{  $job->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @endforeach
                {{-- <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="job_details.html"><img src="assets/img/icon/job-list1.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="job_details.html"><h4>Digital Marketer</h4></a>
                            <ul>
                                <li>Creative Agency</li>
                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                <li>$3500 - $4000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="job_details.html">Full Time</a>
                        <span>7 hours ago</span>
                    </div>
                </div>
                <!-- single-job-content -->
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="job_details.html"><img src="assets/img/icon/job-list2.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="job_details.html"><h4>Digital Marketer</h4></a>
                            <ul>
                                <li>Creative Agency</li>
                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                <li>$3500 - $4000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="job_details.html">Full Time</a>
                        <span>7 hours ago</span>
                    </div>
                </div>
                 <!-- single-job-content -->
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="job_details.html"><img src="assets/img/icon/job-list3.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="job_details.html"><h4>Digital Marketer</h4></a>
                            <ul>
                                <li>Creative Agency</li>
                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                <li>$3500 - $4000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="job_details.html">Full Time</a>
                        <span>7 hours ago</span>
                    </div>
                </div>
                 <!-- single-job-content -->
                <div class="single-job-items mb-30">
                    <div class="job-items">
                        <div class="company-img">
                            <a href="job_details.html"><img src="assets/img/icon/job-list4.png" alt=""></a>
                        </div>
                        <div class="job-tittle">
                            <a href="job_details.html"><h4>Digital Marketer</h4></a>
                            <ul>
                                <li>Creative Agency</li>
                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                <li>$3500 - $4000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-link f-right">
                        <a href="job_details.html">Full Time</a>
                        <span>7 hours ago</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="browse-btn2 text-center mt-50">
                <a href="{{ url('/findJobs') }}" class="border-btn2">View More</a>
            </div>
        </div>
    </div>
    
</section>

 <!-- How  Apply Process Start-->
 <div class="apply-process-area apply-bg pt-150 pb-150" data-background="{{ asset('fontend') }}/assets/img/gallery/how-applybg.png">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle white-text text-center">
                    <span>Job Pulse</span>
                    <h2>Top Companies</h2>
                </div>
            </div>
        </div>
        <!-- Apply Process Caption -->
        <div class="row">
            @foreach ($company as $company )
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-search"></span>
                    </div>
                    <div class="process-cap">
                       <h5>{{ $company->name }}</h5>
                      <p> Total Jobs: {{ $company->job_count }}</p>
                    </div>
                </div>
           
           
            </div>
            @endforeach
        </div>
     </div>
</div>
<!-- How  Apply Process End-->


 <!-- Support Company Start-->
 <div class="support-company-area support-padding fix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2">
                        <span>What we are doing</span>
                        <h2>24k Talented people are getting Jobs</h2>
                    </div>
                    <div class="support-caption">
                        <p class="pera-top">Mollit anim laborum duis au dolor in voluptate velit ess cillum dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit cillum.</p>
                        <p>Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt mollit aboru. temnthp incididbnt ut labore mollit anim laborum suis aute.</p>
                        <a href="" class="btn post-btn">Post a job</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="support-location-img">
                    <img src="{{ asset('fontend') }}/assets/img/service/support-img.jpg" alt="">
                    <div class="support-img-cap text-center">
                        <p>Since</p>
                        <span>1994</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Support Company End-->
<!-- Blog Area Start -->
<div class="home-blog-area blog-h-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Our latest blog</span>
                    <h2>Our recent news</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <img src="{{ asset('fontend') }}/assets/img/blog/home-blog1.jpg" alt="">
                            <!-- Blog date -->
                            <div class="blog-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="blog-cap">
                            <p>|   Properties</p>
                            <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a></h3>
                            <a href="#" class="more-btn">Read more »</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <img src="{{ asset('fontend') }}/assets/img/blog/home-blog2.jpg" alt="">
                            <!-- Blog date -->
                            <div class="blog-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="blog-cap">
                            <p>|   Properties</p>
                            <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a></h3>
                            <a href="#" class="more-btn">Read more »</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->
@endsection