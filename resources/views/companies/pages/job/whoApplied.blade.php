@extends('companies.dashboard')
@section('content')
 <div class="col-lg-12 mt-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Jobs</h4>
                  <p class="card-description">
                  <a class="btn btn-primary" href=" {{ url('/jobsCreatePage') }}" >Add Job</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Job Tittle</th>
                          <th>Applicant Name</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                     @foreach ($jobs as $job)
                     <tbody>
                        
                        <tr>
                          <td>{{ $job->job->title }}</td>
                          <td>{{ $job->user->name }}</td>
                         
                         <td><a class="btn btn-primary" href=" {{ route('details',['user_id'=>$job->user->id]) }}" >View</a></td>
                         {{-- <td><a class="btn btn-primary" href=" {{ route('viewProfile',['user_id'=>$job->user->id]) }}" >View</a></td> --}}
                          

                        </tr>
                       
                      </tbody>
                     @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endsection