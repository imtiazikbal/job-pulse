@extends('companies.dashboard')
@section('content')
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                @if (Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                <h4 class="card-title">Horizontal Two column</h4>
                <form class="form-sample" action="{{ url('/job/update') }}" method="GET">
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Title</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->title }}" name="title" class="form-control" />
                                    <input type="hidden" name="id" value="{{ request()->id }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Description</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->description }}" name="description" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                  <select class="form-control">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date of Birth</label>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="dd/mm/yyyy"/>
                </div>
              </div>
            </div>
          </div> --}}
                    {{-- <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Category</label>
                <input type="text" name="exprience"  class="form-control" />
               
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Membership</label>
                <div class="col-sm-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                      Free
                    </label>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                      Professional
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p class="card-description">
            Address
          </p> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Exprience </label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->exprience }}" name="exprience" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Requirements</label>
                                <div class="col-sm-9">

                                    <input type="text" value="{{ $jobs->requirements }}"  name="requirements" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Responsibilities</label>
                                <div class="col-sm-9">
                                    <input type="text"  value="{{ $jobs->responsibilities }}" name="responsibilities" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Benefits</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->benefits }}" name="benefits" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">location</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->location }}" name="location" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">age</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->age }}" name="age" class="form-control" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">salary</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->salary }}" name="salary" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vacancy</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->vacancy }}" name="vacancy" class="form-control" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tag</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->tag }}" name="tag" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->type }}" name="type" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employment_Status</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $jobs->employment_status }}" name="employment_status" class="form-control" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
