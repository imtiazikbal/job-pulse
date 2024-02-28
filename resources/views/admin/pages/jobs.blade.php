@extends('admin.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 class="card-title text-dark text-center mt-3">Jobs</h4>
      <table class="table table-hover" id="myTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Job</th>
            <th scope="col">Comapny </th>
            <th scope="col">Status </th>
            <th scope="col">Action </th>
            

          </tr>
        </thead>
    
        <tbody>
   
            @foreach ($jobsActive as $jobsActive)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $jobsActive->title }}</td>
                <td>{{ $jobsActive->user->name }}</td>
                <td><label class="badge badge-{{ $jobsActive->status=='active'?'success':'warning' }}">{{ $jobsActive->status=='active'?'Active':'Inactive' }}</label></td>
             
               
                <td>
                    <form action="{{ url('/admin/change/job/status') }}" method="POST">
                        @csrf
                       <input type="hidden" name="id" value="{{ $jobsActive->id }}">
                       <input type="hidden" name="user_id" value="{{ $jobsActive->user->id }}">
                            <div class="row">
                                <div class="col-md-10">
                                    <select name="status" class="form-control" onchange="this.form.submit()" >

                                        <option value="" disabled  > Select</option>
                                        <option {{ $jobsActive->status=='active' ? '' : 'selected' }} id="active" value="active">Active</option>
                                        <option {{ $jobsActive->status=='active' ? '' : 'selected' }} id="inactive" value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                    </form>

                </td>
               
               

            </tr>
        @endforeach
        
    
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 class="card-title text-dark text-center mt-3">Inactive Jobs</h4>
      <table class="table" id="myTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Job</th>
            <th scope="col">Comapny </th>
            <th scope="col">Status </th>
            <th scope="col">Action </th>
            <th scope="col">Switch </th>
          </tr>
        </thead>
    
        <tbody>
   
            @foreach ($jobsInactive as $jobsActive)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $jobsActive->title }}</td>
                <td>{{ $jobsActive->user->name }}</td>
                <td><label class="badge badge-warning">{{ $jobsActive->status }}</label></td>


               
                <td>
                    <form action="{{ url('/admin/change/job/status') }}" method="POST">
                        @csrf
                       <input type="hidden" name="id" value="{{ $jobsActive->id }}">
                            <div class="row">
                                <div class="col-md-10">
                                  <input type="hidden" name="user_id" value="{{ $jobsActive->user->id }}">
                                      <input type="hidden" name="id" value="{{ $jobsActive->id }}">
                                    <select name="status" class="form-control" onchange="this.form.submit()" >
                                      
                                        <option  value="" disabled selected> Select</option>
                                        <option {{ $jobsActive->status=='inactive' ? 'selected' : '' }} id="active" value="active">Active</option>
                                        <option {{ $jobsActive->status=='inactive' ? 'selected' : '' }} id="inactive" value="inactive">Inactive</option>
                                    </select>
                                </div>
                                
                            </div>
                       

                    </form>

                </td>
               
               

            </tr>
        @endforeach
        
    
        </tbody>
      </table>
    </div>
  </div>
</div> --}}

<script>
  $(document).ready(function(){
    $('.toggle-class').change(function(){
      var status = $(this).prop('checked') == true ? "active" : "inactive";
      var job_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('change.status') }}',
        data: {'status': status, 'job_id': job_id},
        success: function(data){
          console.log(data.success)
        }
      });
    })
  })
</script>
  @if (Session::has('warning'))
   <script>
       Swal.fire({
  icon: "warning",
  title: "Are you sure...",
  text: "{{ Session::get('warning') }}",
  timer:2500,
//   footer: '<a href="#">Why do I have this issue?</a>'
});
    </script> 
      @endif
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