@extends('layout.app1')
@section('title', 'Jobs')

@section('content')
    @include('pages.components.header')

    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12 ">

                <h4 class="card-title">{{ $data->user->name }} - Job Application Form</h4>
                <p class="card-description">
                    Read carefully
                </p>
                <form class="form-inline" action="{{ url('/applied/job') }}" method="POST">
                    @csrf
                    <label class="sr-only" for="inlineFormInputName2">Curent Salary</label>
                    <input type="text" name="current_salary" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                        placeholder="Curent Salary">
                    @if ($errors->has('current_salary'))
                        <span class="text-danger">{{ $errors->first('current_salary') }}</span>
                    @endif
                    <input type="hidden" value="{{ request()->company_id }}" name="company_id">
                    <input type="hidden" name="job_id" value="{{ request()->job_id }}">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Exepted Salary</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">/-</div>
                        </div>
                        <input type="text" name="excepted_salary" class="form-control" id="inlineFormInputGroupUsername2"
                            placeholder="Exepted Salary">
                    </div>
                    @if ($errors->has('excepted_salary'))
                        <span class="text-danger">{{ $errors->first('excepted_salary') }}</span>
                    @endif
                    <div class="form-check mx-sm-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">

                            Agree with terms and conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col md-12 mt-5 ">
                <div class="summary d-flex justify-content-between">
                    <div class="slist">
                        <h6>Vacancy: <span></span>{{ $data->vacancy }} </h6>
                    </div>
                    <div class="slist">
                        <h6>Age:<span></span>{{ $data->age }}</h6>
                    </div>
                    <div class="slist">
                        <h6>location:{{ $data->location }}</h6>
                    </div>
                    <div class="slist">
                        <h6>Minimum Salary: {{ $data->salary }}</h6>

                    </div>
                    <div class="slist">
                        <h6>Experience: {{ $data->exprience }}</h6>

                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="requrements">
                        <h4 class="card-title">Requrements</h4>
                        <ul>

                            <span>Experience</span>
                            <li>{{ $data->exprience }}</li>
                            <span>Additional Requirements</span>
                            <li>{{ $data->requirements }}</li>
                            <span>Responsibilities & Context</span>
                            <li>{{ $data->responsibilities }}</li>
                        </ul>
                        <ul>
                            <span>Compensation & Other Benefits </span>
                            <li>
                                Benefits: {{ $data->benefits }}
                            </li>
                            <li>Location:
                                {{ $data->location }}
                            </li>
                            <li>Salary:{{ $data->salary }}</li>

                        </ul>
                    </div>
                    <div class="cinformation">
                        <h5><b>Company Information</b></h5>

                        <li>{{ $data->user->name }}</li>
                        <a href="{{ $company->website }}">Website: {{ $company->website }}</a>

                        <li>Type:{{ $company->type }}</li>
                        <li>Etablish:{{ $company->year_of_establishment }}</li>

                    </div>
                </div>
            </div>
        </div>

        @include('client.footer')

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
        <style>
            #preview {
                border: 1px solid black;
            }

            h6 {
                font-size: 15px;
                font-weight: 600;
            }

            .summary {
                background: #eeecec;
                padding: 20px;
            }

            .cinformation li {
                font-size: 15px;
                padding-bottom: 5px;
                list-style: none;
                color: black;


            }

            .cinformation {
                background: rgb(254, 239, 249);
                padding: 20px;
            }

            a {
                text-decoration: none;
                color: black;
            }

            .slist h6 {
                color: red;
                font-weight: inherit;
            }
        </style>
    @endsection
