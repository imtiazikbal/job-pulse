@extends('candidates.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Total Applied Job</h2>
                        <h5 class="text-center">{{ $details }}</h5>
                    </div>
                </div>

            </div>
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Total Applied Job</h2>
                        <h5 class="text-center">1</h5>
                    </div>
                </div>

            </div> --}}
        </div>
        <style>
            h5 {
                color: black;
                color: orangered
            }
        </style>
    @endsection
