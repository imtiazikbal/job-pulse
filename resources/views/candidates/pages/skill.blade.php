@extends('candidates.dashboard')
@section('content')
<div class="col-lg-12 mt-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Education</h4>
            
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Skills</th>
                            
                           
                            <th>Action</th>
                           
                            
                        </tr>
                    </thead>
              
                        <tbody>
 @foreach ($skills as $skill )
     

   
    <tr>
        <td>{{ json_decode( $skill->skill ) }}</td>
      
      
        <td class="d-flex">
           


     
            <form method="POST" action="{{ url('/candidate/skill/delete/'. $skill->id ) }}">
                @csrf

                <button type="submit" class="btn btn-danger confirm-button">Delete</button>
            </form>
        </td>
    </tr>
   
    @endforeach

                            
                        </tbody>
                  
                </table>
        
        
        
        <div class="card-body">
            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h4 class="card-title">Personal Training</h4>
            <form class="form-sample" action="{{ url('/candidate/skill/create') }}" method="POST">
                @csrf
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Skills</label>
                            <div class="col-sm-9">
                                <input type="text" name="skill" class="form-control" />
                            </div>
                        </div>
                    </div>
                   


               <div class="col-md-2">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>

               </div>
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
@if (session()->has('warning'))
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
            icon: 'warning',
            title: '{{ session('warning') }}',
        })
    })()
</script>
@endif


@endsection