@extends('admin.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">First</th>
        <th scope="col">Action </th>
       
      </tr>
    </thead>
    

    <tbody>
     @foreach ($companies as $company)
     <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $company->name }}</td>
        <td >
        
        <form action="{{ url('/admin/companies/delete/' .$company->id) }}" method="POST">
            @csrf
        
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
        </td>
      </tr>
     @endforeach

    </tbody>
  </table>
    </div>
  </div>
</div>

  @if (Session::has('delete'))
   <script>
       Swal.fire({
  icon: "warning",
  title: "Are you sure...",
  text: "{{ Session::get('delete') }}",
  timer:2500,
//   footer: '<a href="#">Why do I have this issue?</a>'
});
    </script> 
      
  @endif
@endsection