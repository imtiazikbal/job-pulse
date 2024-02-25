@extends('layout.app1')
@section('title', 'Jobs')

@section('content')
    @include('pages.components.header')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--Section: Contact v.2-->
                <section class="mb-4">

                    <!--Section heading-->
                    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                    <!--Section description-->
                    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to
                        contact us directly. Our team will come back to you within
                        a matter of hours to help you.</p>

                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="name" name="name" class="form-control">
                                            <label for="name" class="">Your name</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="email" name="email" class="form-control">
                                            <label for="email" class="">Your email</label>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="text" id="subject" name="subject" class="form-control">
                                            <label for="subject" class="">Subject</label>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                            <label for="message">Your message</label>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->

                            </form>

                            <div class="text-center text-md-left">
                                <a class="btn btn-primary"
                                    onclick="document.getElementById('contact-form').submit();">Send</a>
                            </div>
                            <div class="status"></div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-3 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><i class="fa fa-map-marker"></i>
                                    <p>Sher E Bangla Nagar, Dhaka</p>
                                </li>

                                <li><i class="fa fa-phone"></i>
                                    <p>+880 1760399647</p>
                                </li>

                                <li><i class="fa fa-envelope"></i>
                                    <p>info@jobpulse</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>

                </section>
                <!--Section: Contact v.2-->
            </div>
        </div>
    </div>
    </div>






    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="title text-center bg-light p-3">
                    <h2 class="h1-responsive font-weight-bold text-center my-4">Companies belive in us</h2>
                   
                </div>
            </div>
        </div>
    </div> 

     <div class="container">
        <div class="row mt-5">
            @foreach ($details as $detail)
                <div class="col-md-3">
                    <div class="topCompany d-flex">
                        <div class="Clogo">
                            <img src="{{ asset('assets/images/company/logo.png') }}" width="100%" alt="">
                        </div>
                        <div class="details">
                            <h6>{{ $detail->name }}</h6>
                            
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div> 

 


    






















    @include('client.footer')

    <style>
        .cDetails {
            width: 350px;
            background: rgb(183, 146, 220);
            padding: 20px;
        }

        .mr {
            margin-right: 5px
        }

        .cDetails span {
            font-size: 16px;
            margin-right: 5px;
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        p {
            font-family: 'Poppins', sans-serif;
            color: black
        }
    
        #mr-5 {
            margin-right: 5px
        }
    
        .menu {
            display: flex;
            justify-content: space-between;
        }
    
        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    
        .menu li {
            float: left;
        }
    
        .menu ul li a {
    
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
    
        .menu li a:hover {
            background-color: #111;
        }
    
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
    
        }
    
        .topCompany {
            display: flex;
          
           align-items: center;
           padding: 10px;
    
    
           background: lightblue;
        }
    </style>
@endsection
