@extends('admin.dashboard')

@section('content')

<div class="col-12 grid-margin">
    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Home Page Slider</h4>
            <form class="form-sample" action="{{ url('aboutSliderUpdate/'.$data->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <p class="card-description">
                    Home Page
                </p>
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group row">
                            <input type="hidden" name="file_path" value="{{$data->slider_image }}">
                            <label class="col-sm-3 col-form-label">Slider Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$data->slider_name }}" name="slider_name" class="form-control" />
                            </div>
                            @if ($errors->has('slider_name'))
                                <span class="text-danger">{{ $errors->first('slider_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label">Our Vision</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$data->vision }}" name="vision" class="form-control" />
                            </div>
                            @if ($errors->has('vision'))
                                <span class="text-danger">{{ $errors->first('vision') }}</span>
                            @endif
                        </div>



                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div>
                               
                            </div>
                            <label class="col-sm-3 col-form-label">Slider Image</label>
                            <div class="col-sm-9">
                                <input type="file"  name="slider_image" id="upload_file"
                                    onchange="getImagePreview(event)" class="form-control" />
                                   
                            </div>
                            @if ($errors->has('slider_image'))
                                <span class="text-danger">{{ $errors->first('slider_image') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">

                            <div id="preview"> <img src="{{ asset( $data->slider_image  )}}" width="300px" alt=""></div>
                        </div>
                    </div>




                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
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
            <script>
                function getImagePreview(event) {
                    var image = URL.createObjectURL(event.target.files[0]);
                    var imagediv = document.getElementById('preview');
                    var newimg = document.createElement('img');
                    imagediv.innerHTML = '';
                    newimg.src = image;
                    newimg.width = "100";
                    imagediv.appendChild(newimg);
                }
            </script>
            @endsection