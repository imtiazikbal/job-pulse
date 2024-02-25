@extends('layout.app1')
@section('title', 'About')

@section('content')
    
 @include('pages.components.header')
            
   
 <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <swiper-container class="mySwiper" scrollbar-hide="true">
                @foreach ($sliders as $slider)
                    <swiper-slide><img width="100%" height="70%"  src="{{ asset($slider->slider_image) }}" alt=""></swiper-slide>
                @endforeach
            </swiper-container>
        </div>
    </div>
</div>
    {{-- <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                    @foreach ($sliders as $slider)

                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                       
                    </ol>
                   
                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                            <div class="carousel-item active{{ $loop->first ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ asset($slider->slider_image) }}"
                                    alt="{{ $slider->name }}">
                            </div>
                        @endforeach
                    </div>


                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="title text-center bg-light p-3">
                    <h4>Our Vision</h4>
                    @foreach ($sliders as $slider )
                        {!! $slider->vision!!} 
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div> 
    
    </div> 
     <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="title text-center bg-light p-3">
                    <h4>Companies belive in us</h4>
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
@endsection


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
