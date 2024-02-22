@extends('admin.dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Job</th>
                            <th scope="col">Comapny</th>
                            <th scope="col">Status</th>
                            <th class="te" scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($jobsActive as $jobsActive)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $jobsActive->title }}</td>
                                <td>{{ $jobsActive->user->name }}</td>
                                <td>{{ $jobsActive->status }}</td>
                                <td>
                                <td>
                                    <form action="{{ url('/admin/jobs/status/' . $jobsActive->id) }}" method="POST">
                                        @csrf
                                       
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <select name="status" class="form-control">

                                                        <option value="" selected> Select</option>
                                                        <option id="active" value="active">Active</option>
                                                        <option id="inactive" value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-primary" type="submit">Update</button>

                                                </div>
                                            </div>
                                       

                                    </form>

                                </td>
                                 <td>
                                    <form action="">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                 </td>

                            </tr>
                        @endforeach
                    </tbody>


                </table>

            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Job</th>
                            <th scope="col">Comapny</th>
                            <th scope="col">Status</th>
                            <th class="te" scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($jobsInactive as $jobsInactive)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $jobsInactive->title }}</td>
                                <td>{{ $jobsInactive->user->name }}</td>
                                <td>{{ $jobsInactive->status }}</td>
                                <td>
                                    <form action="{{ url('/admin/jobs/status/' . $jobsInactive->id) }}" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <select name="status" class="form-control">

                                                        <option value="" selected> Select</option>
                                                        <option id="active" value="active">Active</option>
                                                        <option id="inactive" value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-primary" type="submit">Update</button>

                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </td>
                                <td class="d-flex">
                                    <form method="POST" action="{{ url('/admin/jobs/delete/' . $jobsInactive->id) }}">
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
@if (Session::has('delete'))
<script>
    Swal.fire({
icon: "warning",
title: "Are you sure...",
text: "{{ Session::get('success') }}",
//timer:2500,
//   footer: '<a href="#">Why do I have this issue?</a>'
});
 </script>
    
@endif


    <style>
       
       
    </style>
@endsection
