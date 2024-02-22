@extends('admin.dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Active Companies</h2>
                   <h5 class="text-center">{{ $totalCompany }}</h5>
                    </div>
            </div>
            
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Active Job</h2>
               <h5 class="text-center">{{ $ActivePostJob }}</h5>
                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Pending Job</h2>
               <h5 class="text-center">{{ $PendingPostJob }}</h5>
                </div>
        </div>
    </div>
</div>
<style>
h5{
        color: black;
        color: orangered
    }
</style>
@endsection