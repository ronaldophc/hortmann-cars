@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Vehicle Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vehicle ID: {{ $vehicle->id }}</h5>
            <p class="card-text">Make: {{ $vehicle->manufacturer }}</p>
            <p class="card-text">Model: {{ $vehicle->model }}</p>
            <p class="card-text">Year: {{ $vehicle->year }}</p>
            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-primary">Back to Vehicles</a>
        </div>
    </div>
@endsection