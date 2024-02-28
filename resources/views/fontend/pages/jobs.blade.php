@extends('fontend.layouts.app')
@section('content')
    <main>

        <!-- Hero Area Start-->
        {{-- <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('fontend') }}/assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Get your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                        </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Category</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <form action="{{ url('/jobs/filter/category/type') }}" method="GET">
                                        <select name="type" onchange="this.form.submit()" id="">
                                            <option disabled value="">Select Category</option>
                                           
                                            @foreach ($jobType as $JobType)
                                            <option value="{{$JobType->type }}">{{ $JobType->type  }}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                        {{-- <button class="btn mt-2 type="submit">Apply</button> --}}

                                    </form>
                                    
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <form action="{{ url('/jobs/filter/type') }}" method="GET">



                                        <label class="container">Full Time
                                            <input onchange="this.form.submit()" name="type[]" type="checkbox" value="Full Time">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Part Time
                                            <input onchange="this.form.submit()" name="type[]" type="checkbox" value="Part Time">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Remote
                                            <input name="type[]" onchange="this.form.submit()" type="checkbox" value="Remote">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Freelance
                                            <input name="type[]" onchange="this.form.submit()" type="checkbox" value="Freelance">
                                            <span class="checkmark"></span>
                                        </label>

                                        {{-- <button class="btn type="submit">Apply</button> --}}
                                    </form>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Location</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <form action="{{ url('/jobs/filter/location') }} " method="GET">
                                        <select name="location" onchange="this.form.submit()">
                                            <option value="Anywhere">Anywhere</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Khula">Khula</option>
                                            <option value="Gazipur">Gazipur</option>
                                            <option value="Chattagram">Chattagram</option>
                                        </select>
                                        {{-- <button class="btn mt-2 type="submit">Apply</button> --}}

                                    </form>

                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <form action="{{ url('/jobs/filter/experience') }} " method="GET">
                                        <label class="container">1-2 Years
                                            <input onchange="this.form.submit()" type="checkbox" name="experience[]" value="1-2 Years">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">2-3 Years
                                            <input onchange="this.form.submit()" type="checkbox" name="experience[]" value="2-3 Years">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">3-6 Years
                                            <input onchange="this.form.submit()" type="checkbox" name="experience[]" value="3-6 Years">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">6-more..
                                            <input onchange="this.form.submit()" type="checkbox" name="experience[]" value="6-more..">
                                            <span class="checkmark"></span>
                                        </label>
                                        {{-- <button class="btn mt-2 type="submit">Apply</button> --}}

                                    </form>

                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 2 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 3 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 5 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 10 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <div class="single-listing">
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                    <div class="small-section-tittle2">
                                        <h4>Filter Jobs</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <!-- <div id="slider-range"></div> -->
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">
                                                <div class="price_text">
                                                    <p>Price :</p>
                                                </div>
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount"
                                                        readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Range Slider End -->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            {{-- <span>{{ $coutJobs }} found</span> --}}
                                            <span> {{ $jobs->total() }} found</span>
                                            <!-- Select job items start -->
                                            <div class="select-job-items ">
                                                <span>Sort by</span>
                                                <form action="{{ url('/jobs/filter/relevance/old') }}" method="GET">
                                                    <select name="select" id="select" onchange="this.form.submit()">

                                                        <option value="Relevance">Newest</option>
                                                        <option value="Older">Oldest</option>
                                                    </select>
                                                    {{-- <div class="sortByRelevance d-flex">
                                                        <button class="btn-2" onclick="sortByRelevance()"
                                                            type="submit">Apply</button>

                                                    </div> --}}

                                                </form>

                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                <!-- single-job-content -->
                                @foreach ($jobs as $job)
                                    <div class="single-job-items mb-30">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a
                                                    href="{{ route('JobsDetails', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}"><img
                                                        src="{{ asset('fontend') }}/assets/img/icon/job-list1.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="job-tittle">
                                                <a
                                                    href="{{ route('JobsDetails', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}">
                                                    <h4>{{ $job->title }}</h4>
                                                </a>
                                                <ul>
                                                    <li>{{ $job->user->name }}</li>
                                                    <li><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</li>
                                                    <li> {{ $job->salary }}</li>
                                                    <li> {{ $job->exprience }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link f-right">
                                            <a
                                                href="{{ route('JobsDetails', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}">
                                                {{ $job->employment_status }} </a>

                                            <span>{{ $job->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center mt-5">
                                    {{ $jobs->links() }}
                                </div>
                                <!-- single-job-content -->
                                {{-- <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list2.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list3.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list4.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list3.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img src="assets/img/icon/job-list4.png" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>Digital Marketer</h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">Full Time</a>
                                    <span>7 hours ago</span>
                                </div>
                            </div> --}}
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{ $jobs->links() }}
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->

    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address :Your address goes
                                            here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : info@colorlib.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="#"> View Project</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Testimonial</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Email Address" class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                        src="assets/img/icon/form.png" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                            <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>5000+</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <!-- Footer Bottom Tittle -->
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <style>
            .sortByRelevance button {
                height: 30px;
                width: 70px;
                background: #fb246a;
                border: none;
            }
        </style>

        <script>
            async function sortByRelevance() {
                var sortBy = document.getElementById('select').value;
                console.log(sortBy);
            }
        </script>
    @endsection
