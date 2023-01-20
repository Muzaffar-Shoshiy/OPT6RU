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
    @foreach ($companies as $item)
        <div class="jumbotron bg-secondary p-5 my-3 rounded">
            <h1 class="display-6">Company: {{ $item->name }}</h1>
            <p class="lead">Email: {{ $item->email }}</p>
            <a href="{{ route('companies.show', ['company' => $item->id]) }}" class="btn btn-dark">More</a>
            @auth
                @if ($item->user_id == Auth()->user()->id)
                    <a href="{{ route('companies.edit', ['company' => $item->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('companies.destroy', ['company' => $item->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @elseif ($item->user->role == 'admin')
                    <a href="{{ route('companies.edit', ['company' => $item->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('companies.destroy', ['company' => $item->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            @endauth
        </div>
    @endforeach
    {{ $companies->links('pagination::bootstrap-5') }}
</div>
@endsection
