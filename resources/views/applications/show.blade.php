@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Application Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name</h5>
            <p class="card-text">{{ $application->name }}</p>

            <h5 class="card-title">Email</h5>
            <p class="card-text">{{ $application->email }}</p>

            <h5 class="card-title">Phone Number</h5>
            <p class="card-text">{{ $application->phone }}</p>

            <h5 class="card-title">Area</h5>
            <p class="card-text">{{ $application->area }}</p>

            <h5 class="card-title">Message</h5>
            <p class="card-text">{{ $application->message }}</p>
        </div>
    </div>

    <a href="{{ route('applications.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
