@extends('layouts.app')
@section('content')
@if (Session::has('success_message'))
<div class="container fixed-top my-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert"">
        <strong class="text-center">{{ Session::get('success_message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<div class="container">
    @foreach ($employees as $item)
        <div class="jumbotron bg-secondary p-5 my-3 rounded">
            <h1 class="display-6">Employee: {{ $item->name }}</h1>
            <p class="lead">Email: {{ $item->email }}</p>
            <a href="{{ route('employees.show', ['employee' => $item->id]) }}" class="btn btn-dark">More</a>
        </div>
    @endforeach
    {{ $employees->links('pagination::bootstrap-5') }}
</div>
@endsection
