
@extends('candidates.dashboard')
@section('content')

 <div class="col-lg-12 mt-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="job_header d-flex align-items-center justify-content-between"><h4 class="card-title">All Apllied Jobs</h4>
                        <p class="card-description">
                        <a class="btn btn-primary" href=" {{ url('/findJobs') }}" >Apply</a>
                        </p></div>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Job Tittle</th>
                          <th>Company Name</th>
                          <th>Location</th>
                          <th>Selary</th>
                          <th>Selected Shortlist</th>

                          {{-- <th>Action</th> --}}
                        </tr>
                      </thead>
                     @foreach ($jobs as $job)
                     <tbody>
                        
                        <tr>
                          <td>{{ $job->job->title }}</td>
                          <td>{{ $job->company->name }}</td>
                          <td>{{ $job->job->location }}</td>
                          <td class="text-success"> {{$job->job->salary }}</td>
                     
                      <td>  <label class="badge badge-success">{{ $job->is_short_list=='1'? 'Yes' : 'No' }}</label></td>
                        
                     
                            
                       
                          
                          {{-- <td>
                            <a class="btn btn-primary" href=" {{ url('/job/edit/'.$job->id) }}" >Edit
                            </a>
                            <form action="{{ url('/job/delete/'.$job->id) }}" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="{{ $job->id }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                           
                            </td> --}}

                        </tr>
                       
                      </tbody>
                     @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>

           
@endsection
