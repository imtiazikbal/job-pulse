@extends('companies.dashboard')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Company Contact</h4>
        
        <form class="forms-sample" action="{{ url('/company/contact/create') }}" method="GET">
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" value="" name="name"  class="form-control" id="exampleInputName1" placeholder="Name" required>
          </div>
  
          <div class="form-group">
            <label for="exampleInputCity1">Email</label>
            <input type="email" name="email"  class="form-control" id="exampleInputCity1" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">phone</label>
            <input type="number" name="phone"  class="form-control" id="exampleInputCity1" placeholder="example.com">
          </div> 
          <div class="form-group">
            <label for="exampleInputCity1">Designation</label>
            <input type="text" name="designation" class="form-control" id="exampleInputCity1" placeholder="Designation">
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
         
        </form>
      </div>
    </div>
  </div>
  
@endsection