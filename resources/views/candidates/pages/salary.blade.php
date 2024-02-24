@extends('layout.app1')
@section('content')
@include('layout.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Job Application Form</h4>
                    <p class="card-description">
                     Read carefully
                    </p>
                    <form class="form-inline" action="{{ url('/applied/job') }}" method="POST">
                      @csrf
                      <label class="sr-only" for="inlineFormInputName2">Curent Salary</label>
                      <input type="text" name="current_salary" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Curent Salary">
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
                        <input type="text" name="excepted_salary" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Exepted Salary">
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
              </div    
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
@endsection
<style>
    #mr-5{
      margin-right: 5px
    }
      .menu {
          display: flex;
          justify-content: space-between;
      }
  
      .menu ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
      }
  
      .menu li {
          float: left;
      }
  
      .menu li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
      }
  
      .menu li a:hover {
          background-color: #111;
      }
  
      .logo {
          display: flex;
          justify-content: center;
          align-items: center;
  
      }
  </style>