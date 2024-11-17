@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Applications</h1>
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
                <td>{{ $application->nome }}</td>
                <td>{{ $application->email }}</td>
                <td>{{ $application->telefone }}</td>
                <td>{{ $application->area }}</td>
                <td>{{ $application->message }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection