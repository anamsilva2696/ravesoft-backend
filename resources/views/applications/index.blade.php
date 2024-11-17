@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>List of Applications</h1>
    <a href="{{ route('applications.create') }}" class="btn btn-primary mb-3">New Application</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Area</th>
                <th>Message</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->name }}</td>
                <td>{{ $application->email }}</td>
                <td>{{ $application->phone }}</td>
                <td>{{ $application->area }}</td>
                <td>{{ $application->message }}</td>
                <td>
                    <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline-block;">
                        @csrf <!-- Add CSRF Token -->
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $applications->links() }}
</div>
@endsection
