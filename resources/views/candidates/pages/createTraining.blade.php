@extends('candidates.dashboard')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        
        
        <div class="card-body">
            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h4 class="card-title">Personal Training</h4>
            <form class="form-sample" action="{{ url('/candidate/training/create') }}" method="POST">
                @csrf
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Course Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Institute Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="institute_name" class="form-control" />
                            </div>
                        </div>
                        
                       
                    
                   
                    

                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Completation Year</label>
                        <div class="col-sm-9">
                            <input type="text" name="completion_year" class="form-control" />
                        </div>
                    </div>
                </div>


               
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection