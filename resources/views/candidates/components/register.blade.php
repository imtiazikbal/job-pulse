
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-12 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo">
              <img src="{{ asset('assets') }}/images/jobPulse/logo.png"  alt="logo">
            </div>
            <h4>New here?</h4>
            <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
            <form method="POST" action="{{route('candidate.store')}}" class="pt-3">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-account-outline text-primary"></i>
                    </span>
                    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                  </div>
                  <input name="name" required type="text" class="form-control form-control-lg border-left-0" placeholder="Can Name">
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-email-outline text-primary"></i>
                    </span>
                    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                  </div>
                  <input name="email" required type="email" class="form-control form-control-lg border-left-0" placeholder="Email">
                </div>
              </div>
             
              <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="mdi mdi-lock-outline text-primary"></i>
                    </span>
                    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                  </div>
                  <input name="password" required type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                </div>
              </div>
        
              <div class="mt-3">
                <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
            
              </div>
              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="login.html" class="text-primary">Login</a>
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