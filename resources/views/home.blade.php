@extends('layout.app1')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="logo">
                    <img src="{{ asset('assets/images/jobPulse/logo.png') }}" width="100px" height="100px" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="menu">
                    <ul class="li"><a href="{{ url('/') }}">Home</a></ul>
                    <ul class="li">About</ul>
                    <ul class="li">Job</ul>
                    <ul class="li">Contact</ul>

                    @auth
                        <ul class="li"><a href="{{ url('/dashboard') }}">Dashboard</a></ul>
                   
                       

                    @endauth

                    @guest

                        <ul class="li"><a href="{{ route('login') }}">Login</a></ul>
                        <ul class="li"><a href="{{ url('/companies/register') }}">Register as a company</a></ul>
                        <ul class="li"><a href="{{ url('/candidate/register') }}">Register as a candidate</a></ul>

                    @endguest





                </div>
            </div>
        </div>
    </div>

   <div class="container mt-5">
    <div class="row " >
     @foreach ($jobs as $job)
     <div class="card" id="mr-5" style="width: 18rem;">
      <img src="{{ asset('assets/images/jobPulse/logo.png') }}" height="100" width="100" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $job->title }}
        
 
        <span class="badge badge-secondary">{{ $job->tag }}</span>
      
        
        </h5>
        <p class="card-text">Salary: {{ $job->salary }} | Vacancy: {{ $job->vacancy }} | Location : {{ $job->location }}</p>
        <a href="{{ route('salary.page',['job_id' => $job->id,'company_id' => $job->user_id]) }}" class="btn btn-primary">Apply Now</a>
    </div>
    </div>
     @endforeach
    </div>
   </div>
@endsection


<style>
  #mr-5{
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
</style>
