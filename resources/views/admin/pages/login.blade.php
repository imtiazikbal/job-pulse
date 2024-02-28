@extends('layout.app1')

@section('content')

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{ asset('assets') }}/images/jobPulse/logo.png" style="width: 100% }}" alt="logo">
                </div>
                <h4>Job Pulse[Admin]</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form method="POST" action="{{ route('login') }}" class="pt-3">
                    <div class="form-group">
                      <label for="exampleInputEmail">Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-account-outline text-primary"></i>
                          </span>
                        </div>
                        <input name="email" type="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-lock-outline text-primary"></i>
                          </span>
                        </div>
                        <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                      </div>
                    </div>
                    
                    <div class="my-3">
                      <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                    </div>
                   
                   
                  </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   
  
  
  

@endsection