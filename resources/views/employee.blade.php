@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron bg-secondary p-5 my-3 rounded">
        <h1 class="display-6">Employee: {{ $employee->name }}</h1>
        <h1 class="display-4">Company name: {{ $employee->company_name }}</h1>
        <p class="lead">Email: {{ $employee->email }}</p>
        <address>Phone: {{ $employee->phone }}</address>
        <div class="my-4">
            @auth
                @if ($employee->user_id == Auth()->user()->id)
                    <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
