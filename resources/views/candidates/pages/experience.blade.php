@extends('candidates.dashboard')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        
        
        <div class="card-body">
            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h4 class="card-title">Personal Experience</h4>
            <form class="form-sample" action="{{ url('/candidate/job/experience/create') }}" method="POST">
                @csrf
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="company_name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dasignation</label>
                            <div class="col-sm-9">
                                <input type="text" name="dasignation" class="form-control" />
                            </div>
                        </div>
                    </div>
                    
                   
                    

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Joining Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="joining_date" class="form-control" />
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Depature Time</label>
                            <div class="col-sm-9">

                                <input type="date" name="depature_time" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection