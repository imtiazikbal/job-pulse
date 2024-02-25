@extends('companies.dashboard')
@section('content')
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-md-12 grid-margin ">
                @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h4 >Change Password</h4>
            <form class="form-sample" action="{{ url('/company/change/password') }}" method="POST">
                @csrf
                
              
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Old Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="oldPassword" class="form-control" />
                            </div>
                            @if ($errors->has('oldPassword'))
                                <span class="text-danger">{{ $errors->first('oldPassword') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="newPassword" class="form-control" />
                            </div>
                            @if ($errors->has('newPassword'))
                                <span class="text-danger">{{ $errors->first('newPassword') }}</span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Change</button>
            </form>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
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
        Toast.fire({
            icon: 'success',
            title: "{{ Session::get('success') }}",
        })
    </script>
@endif
@if (Session::has('warning'))
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
        Toast.fire({
            icon: 'warning',
            title: "{{ Session::get('warning') }}",
        })
    </script>
@endif
@endsection
