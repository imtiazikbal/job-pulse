@extends('companies.dashboard')
@section('content')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Company Profile Details</h4>
    
    <div class="table-responsive pt-3">
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th>
              #
            </th>
            <th>
              Type 
            </th>
            <th>
             Website 
            </th>
            <th>
             Licence
            </th>
            <th>
             Established Date
            </th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              1
            </td>
            <td>
            {{ $company->type }}
            </td>
            <td>
              {{ $company->website }}
            </td>
            <td>
              {{ $company->license }}
            </td>
            <td>
              {{ $company->year_of_establishment }}
            </td>
            <td><a class="btn btn-primary" href=" {{ url('/company/profile/edit/'.$company->id) }}" >Edit</a></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Company Profile</h4>
        
        <form class="forms-sample" action="{{ url('/company/profile/create') }}" method="GET">
          <div class="form-group">
            <label for="exampleInputName1">Year of Establishment</label>
            <input type="date"  name="year_of_establishment" class="form-control" id="exampleInputName1" placeholder="Name" required>
          </div>
  
          <div class="form-group">
            <label for="exampleInputCity1">Type</label>
            <input type="text" name="type"  class="form-control" id="exampleInputCity1" placeholder="Type">
          </div>
          <div class="form-group">
            <label for="exampleInputCity1">Website</label>
            <input type="text" name="website"  class="form-control" id="exampleInputCity1" placeholder="example.com">
          </div> 
          <div class="form-group">
            <label for="exampleInputCity1">License</label>
            <input type="text" name="license" class="form-control" id="exampleInputCity1" placeholder="License">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea name="description"  class="form-control" id="exampleTextarea1" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
         
        </form>
      </div>
    </div>
  </div>
  @if (session()->has('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
    })

    ;
    (async () => {
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}',
        })
    })()
</script>
@endif
@endsection