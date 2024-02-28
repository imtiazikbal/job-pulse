@extends('candidates.dashboard')
@section('content')
<div class="col-lg-12 mt-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Education</h4>
@if (Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<h4 class="card-title">Add Education</h4>
<form class="form-sample" action="{{ url('/candidate/education/store') }}" method="POST">
@csrf
<p class="card-description">
    Personal info
</p>
<div class="row">
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bechelors</label>
            <div class="col-sm-9">
               <select name="bechelors" id="" class="form-control">
                <option value="">Honours</option>
                <option value="Masters">Masters</option>
                <option value="Doctorate">Doctorate</option>
                <option value="Degree Pass">Degree Pass</option>Degree Pass
               </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">University</label>
            <div class="col-sm-9">
                <input type="text"  name="university_name" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Department</label>
            <div class="col-sm-9">
                <input type="text"  name="department" class="form-control" />
            </div>
        </div>
    </div>
    
   
    

</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">SSC</label>
            <div class="col-sm-9">
               <select name="ssc" id="" class="form-control">
                <option value="">Commerce</option>
                <option value="Science">Science</option>
                <option value="Arts">Arts</option>
                <option value="Arts">Arts</option>
                <option value="Madrasha">Madrasha</option>
               </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">CGPA</label>
            <div class="col-sm-9">

                <input type="text" name="cgpa" class="form-control" />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">HSC</label>
            <div class="col-sm-9">
               <select name="hsc" id="" class="form-control">
                <option value="Commerce">Commerce</option>
                <option value="Science">Science</option>
                <option value="Arts">Arts</option>
                <option value="Arts">Arts</option>
                <option value="Madrasha">Madrasha</option>
               </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Hons Passing Year</label>
            <div class="col-sm-9">
                <input type="text" value=" name="hons_passing_year" class="form-control" />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">College Name</label>
            <div class="col-sm-9">
                <input type="text"  name="hsc_college_name" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">HSC GPA</label>
            <div class="col-sm-9">
                <input type="text" name="hsc_gpa" class="form-control" />
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">hsc passing year</label>
            <div class="col-sm-9">
                <input type="text" name="hsc_passing_year" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Hsc Group</label>
            <div class="col-sm-9">
                <input type="text"  name="hsc_group" class="form-control" />
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">SSC School Name</label>
            <div class="col-sm-9">
                <input type="text"  name="ssc_school_name" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">ssc_passing_year</label>
            <div class="col-sm-9">
                <input type="text"  name="ssc_passing_year" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">ssc_group</label>
            <div class="col-sm-9">
                <input type="text" name="ssc_group" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">SSC GPA</label>
            <div class="col-sm-9">
                <input type="text" value="5" name="ssc-gpa" class="form-control" />
            </div>
        </div>
    </div>

</div>
<button type="submit" class="btn btn-primary mr-2">Submit</button>
</form>



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