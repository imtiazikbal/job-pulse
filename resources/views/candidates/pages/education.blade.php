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
                            <th>Degree</th>
                            <th>University</th>
                            <th>Department</th>
                            <th>Passing Year</th>
                            <th>CGPA</th>
                            <th>College</th>
                            <th>HSC GPA</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
              
                        <tbody>

                            <tr>
                                <td>{{ $education->bechelors }}</td>
                                <td>{{ $education->university_name }}</td>
                                <td class="text-success">{{ $education->department }} </td>
                                <td class="text-success">{{ $education->hons_passing_year }} </td>
                                <td><label class="badge badge-success">{{ $education->cgpa }}</label></td>
                               <td>{{ $education->hsc_college_name }}</td>
                               <td>{{ $education->hsc_gpa }}</td>
                                <td class="d-flex">
                                   


                             
                                    <form method="POST" action="{{ url('/candidate/education/delete/'.$education->id ) }}">
                                        @csrf

                                        <button type="submit" class="btn btn-danger confirm-button">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                  
                </table>
            




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
                                <option value="{{ $education->bechelors? 'seclected':'' }}">Honours</option>
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
                                <input type="text" value="{{ $education->university_name }}" name="university_name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->department }}" name="department" class="form-control" />
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

                                <input type="text" value="{{ $education->cgpa }}" name="cgpa" class="form-control" />
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
                                <input type="text" value="{{ $education->hons_passing_year }}" name="hons_passing_year" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">College Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->hsc_college_name }}" name="hsc_college_name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">HSC GPA</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->hsc_gpa }}" name="hsc_gpa" class="form-control" />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">hsc passing year</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->hsc_passing_year }}" name="hsc_passing_year" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hsc Group</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->hsc_group }}" name="hsc_group" class="form-control" />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SSC School Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->ssc_school_name }}" name="ssc_school_name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ssc_passing_year</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->ssc_passing_year }}" name="ssc_passing_year" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ssc_group</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $education->ssc_group }}" name="ssc_group" class="form-control" />
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
        </div>
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