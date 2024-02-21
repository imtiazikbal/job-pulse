@extends('companies.dashboard')
@section('content')

<div class="con">

    <div class="container mt-5">
        <div class="row justify-content-center d-flex">
            <div class="col-md-12">
                <h2 class="text-center">Name: {{ $details->name }}</h2>
                <h4>Personal Information</h4>
                <table class="table table-bordered ">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      
                        <td>{{ $details->name }}</td>
                        <td>{{ $details->email }}</td>
                        
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
           
        </div>
     </div>
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Educational Information</h2>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Degree Type</th>
                        <th scope="col">University Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Passing Year</th>
                        <th scope="col">CGPA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                        <td>{{ ($details->education[0]->bechelors) }}</td>
                        <td>{{ $details->education[0]->university_name }}</td>
                     
                        <td>{{ $details->education[0]->department }}</td>
                        <td>{{ $details->education[0]->hons_passing_year }}</td>
                        <td>{{ $details->education[0]->cgpa }}</td>
                        
                      </tr>
                      <tr>
                        
                        <td>HSC</td>
                        <td>{{ $details->education[0]->hsc_college_name }}</td>
                     
                        <td>{{ $details->education[0]->hsc_group }}</td>
                        <td>{{ $details->education[0]->hsc_passing_year }}</td>
                        <td>{{ $details->education[0]->hsc_gpa }}</td>
                        
                      </tr>
                      <tr>
                        
                        <td>SSC</td>
                        <td>{{ $details->education[0]->ssc_school_name }}</td>
                     
                        <td>{{ $details->education[0]->ssc_group }}</td>
                        <td>{{ $details->education[0]->hsc_passing_year }}</td>
                        <td>5</td>
                        
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Professional Training</h2>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Job Experience</h2>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Skills</h2>
           <input type="textarea" name="skills" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                
            </div>
        </div>
    </div>
</div>
    

<style>
    h1,h2,h3,h4{
        color: black;
        font-size: 20px;
    }
    .body{
        background-color: #f8f9fa;
        margin-top: 20px;
    }
  
    .con{
        background-color: #c6df4a;
        padding: 50px
    }
    td,th {
        font-size: 2px;
        color: blue;
        width: 1px
    }

</style>
@endsection