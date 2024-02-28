@extends('companies.dashboard')
@section('content')
    <div class="col-lg-12 mt-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Jobs</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href=" {{ url('/jobsCreatePage') }}">Add Job</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Job Tittle</th>
                                <th>Employment Status</th>
                                <th>Location</th>
                                <th>Selary</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach ($jobs as $job)
                            <tbody>

                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->employment_status }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td class="text-success"> {{ $job->salary }}</td>
                                    <td><label class="badge badge-warning">{{ $job->status }}</label></td>
                                    <td>
                                        <a class="btn btn-primary" href=" {{ url('/job/edit/' . $job->id) }}">Edit
                                        </a>


                                    <td>
                                        <form method="POST" action="{{ url('job/delete/' . $job->id) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-danger confirm-button">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

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
