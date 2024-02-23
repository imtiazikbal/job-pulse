@extends('admin.dashboard')

@section('content')
 
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">

                <h4 class="card-title">Home Page Slider</h4>
                <form class="form-sample" action="{{ url('about/slider/store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <p class="card-description">
                        Home Page
                    </p>
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group row">

                                <label class="col-sm-3 col-form-label">Slider Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slider_name" class="form-control" />
                                </div>
                                @if ($errors->has('slider_name'))
                                    <span class="text-danger">{{ $errors->first('slider_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-3 col-form-label">Our Vision</label>
                                <div class="col-sm-9">
                                    <input type="text" name="vision" class="form-control" />
                                </div>
                                @if ($errors->has('vision'))
                                    <span class="text-danger">{{ $errors->first('vision') }}</span>
                                @endif
                            </div>



                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Slider Name</label>
                                <div class="col-sm-9">
                                    <input type="file" name="slider_image" id="upload_file"
                                        onchange="getImagePreview(event)" class="form-control" />

                                </div>
                                @if ($errors->has('slider_image'))
                                    <span class="text-danger">{{ $errors->first('slider_image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">

                                <div id="preview"></div>
                            </div>
                        </div>




                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                   Slider Image
                                </th>
                                <th>
                                    Slider Name
                                </th>
                                <th>Vision</th>
                                <th>
                                    Status
                                </th>
                                <th>Status Update</th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $slider)
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset($slider->slider_image) }}" alt="image">
                                </td>
                                <td>
                                    {{ $slider->slider_name }}
                                </td>
                                <td>{{ substr($slider->vision, 0, 20) }}</td>
                                <td>
                                  {{ $slider->status }}
                                </td>
                                <td>
                                    <form action="{{ url('/status/update/about/'.$slider->id) }}" method="POST">
                                        @csrf
                                        <select name="status" id="" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <button class="btn btn-primary form-control" type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    
                                </td>
                                <td>
                                    <a href="{{ url('store/slider/edit/'.$slider->id) }}" class="btn btn-primary">Edit</a>
                                    
                                </td>
                                <td>
                                    <form action="{{ url('/delete/slider/about/'.$slider->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $slider->id }}">
                                        <input type="hidden" name="file_path" value="{{ $slider->slider_image }}">
                                        <button class="btn btn-danger" type="submit" class="btn btn-primary">Delete  </button>
                                    </form>
                                </td>

                                
                            </tr>
                            
                            @endforeach
                            
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
       </div>

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
@if (Session::has('warning'))
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
            icon: 'warning',
            title: "{{ Session::get('warning') }}",
        })
    </script>
@endif
<style>
    #preview {
        border: 1px solid black;
    }
</style>
@endsection