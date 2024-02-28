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
                            <th>Company Name</th>
                            <th>Dasignation</th>
                            <th>Joining Date</th>
                            <th>Depature Time</th>
                            <th>Action</th>
                           
                            
                        </tr>
                    </thead>
              
                        <tbody>
                    @foreach ($experience as $experience )
    

                            <tr>
                                <td>{{$experience->company_name  }}</td>
                                <td>{{ $experience->designation }}</td>
                               
                               
                               <td>{{ $experience->joining_date }}</td>
                               <td>{{ $experience->departure_date }}</td>
                                <td class="d-flex">
                                   


                             
                                    <form method="POST" action="{{ url('experience/delete/'. $experience->id ) }}">
                                        @csrf

                                        <button type="submit" class="btn btn-danger confirm-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                  
                </table>
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