@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Application</h1>
    <form action="{{ route('applications.update', $applications->id) }}" method="POST">
        @csrf <!-- Add CSRF Token -->
        @method('PUT') <!-- Specify that this is an update operation -->

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                value="{{ old('name', $applications->name) }}" 
                required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control" 
                value="{{ old('email', $applications->email) }}" 
                required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input 
                type="text" 
                name="phone" 
                id="phone" 
                class="form-control" 
                value="{{ old('phone', $applications->phone) }}" 
                required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Area of Interest -->
        <div class="mb-3">
            <label for="area" class="form-label">Area of Interest</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_development" value="development"
                {{ old('area', $applications->area) == 'development' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio_development">Development</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_marketing" value="marketing"
                {{ old('area', $applications->area) == 'marketing' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio_marketing">Marketing</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_design" value="design"
                {{ old('area', $applications->area) == 'design' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio_design">Design</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="radio_other" value="other" 
                {{ old('area', $applications->area) == 'other' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio_other">Other</label>
            </div>
        </div>

        <!-- Message -->
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea 
                name="message" 
                id="message" 
                class="form-control">{{ old('message', $applications->message) }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Save Button -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('applications.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
