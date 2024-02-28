@extends('companies.dashboard')
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Company Profile</h4>
        
        <form class="forms-sample" action="{{ url('/company/profile/edit/update/'.$company->id) }}" method="POST">
         @csrf
            <div class="form-group">
            <label for="exampleInputName1">Year of Establishment</label>
            <input type="date" value="{{ $company->year_of_establishment }}"  name="year_of_establishment" class="form-control" id="exampleInputName1" placeholder="Name" required>
          </div>
  
          <div class="form-group">
            <label for="exampleInputCity1">Type</label>
            <input type="text" value="{{ $company->type }}" name="type"  class="form-control" id="exampleInputCity1" placeholder="Type">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Website</label>
            <input type="text" value="{{ $company->website }}" name="website"  class="form-control" id="exampleInputCity1" placeholder="example.com">
          </div> 
          <div class="form-group">
            <label for="exampleInputCity1">License</label>
            <input type="text" value="{{ $company->license }}" name="license" class="form-control" id="exampleInputCity1" placeholder="License">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <input name="description" value="{{ $company->description }}"  class="form-control" id="exampleTextarea1" rows="4"></input>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
         
        </form>
      </div>
    </div>
  </div>
  
@endsection