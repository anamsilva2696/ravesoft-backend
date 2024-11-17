@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>New Application</h1>
    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="phone" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area of Interest</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_development" value="development">
                <label class="form-check-label" for="radio_development">Development</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_marketing" value="marketing">
                <label class="form-check-label" for="radio_marketing">Marketing</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_design" value="design">
                <label class="form-check-label" for="radio_design">Design</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_other" value="other" checked>
                <label class="form-check-label" for="radio_other">Other</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
