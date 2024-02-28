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
        <table class="table table-hover" id="myTable">
          <thead>
            <tr>
              <th>Job Tittle</th>
              <th>Applicant Name</th>
              <th>Action</th>
              <th>ShortListed</th>
              <th>Selected</th>
              
            </tr>
          </thead>
         @foreach ($jobs as $job)
         <tbody>
            
            <tr>
              <td>{{ $job->job->title }}</td>
              <td>{{ $job->user->name }}</td>
             
             <td><a class="btn btn-primary" href=" {{ route('details',['user_id'=>$job->user->id]) }}" >View</a></td>
             {{-- <td><a class="btn btn-primary" href=" {{ route('viewProfile',['user_id'=>$job->user->id]) }}" >View</a></td> --}}
              <td>
                <form action="{{ route('shortlist.candidate') }}" method="POST">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ $job->user->id }}">
                  <input type="hidden" name="job_id" value="{{ $job->job->id }}">
                  <input type="hidden" name="company_id" value="{{ $job->company_id }}">

<button type="submit" class="btn btn-primary">ShortList</button>
  

                </form>
              </td>

             
              <td>  <label class="badge badge-success">Shortlisted</label></td>
                
             

            </tr>
           
          </tbody>
         @endforeach
        </table>
      </div>
    </div>
  </div>
</div>


          


            @endsection