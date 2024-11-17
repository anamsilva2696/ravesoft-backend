@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New Application</h1>
    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" >
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
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
            <textarea id="message" name="message" class="form-control">{{ old('message') }}</textarea>
        </div>
        @error('message')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
