@extends('layout.app1')
@section('title', 'Jobs')

@section('content')
    
                @include('pages.components.header')
            

   
    
    <div class="container mt-5">
        <div class="row d-flex justify-content-end">
            <div class="col-md-4">
                <div class="search d-flex">
                    <form class="form-inline" action="{{ url('searchJob') }}" method="GET">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Search here...</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                </div>
                <input type="text" name="search" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Search here...">
            </div>

            <button type="submit"  class="btn btn-primary mb-2">Search</button>
        </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="title text-center bg-light p-3">
                    <h4>Jobs</h4>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row d-flex">
            @foreach ($jobs as $job)
                <div class="col-md-3 mb-5 mr-5 p-3">

                    <div class="card" id="mr-5" style="width: 18rem;">
                        <img src="{{ asset('assets/images/company/logo.png') }}" height="100" width="100"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{ $job->title }}
                                <span class="badge badge-secondary">{{ $job->tag }}</span>
                            </h2>
                            <p class="card-text">Salary: {{ $job->salary }} | Vacancy: {{ $job->vacancy }} | Location :
                                {{ $job->location }}</p>
                            <a href="{{ route('salary.page', ['job_id' => $job->id, 'company_id' => $job->user_id]) }}"
                                class="btn btn-primary">Apply Now</a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $jobs->links() }}
        </div>

    </div>
    @include('client.footer')

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
            padding: 5px;
            width: 250px;
    
    
            background: lightblue;
        }
    
        .ml-5 {
            margin-left: 5px
        }
    </style>
@endsection



