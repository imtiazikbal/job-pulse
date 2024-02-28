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