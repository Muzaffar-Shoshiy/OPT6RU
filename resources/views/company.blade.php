@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron bg-secondary p-5 my-3 rounded">
        <h1 class="display-6">Company: {{ $company->name }}</h1>
        <p class="lead">Email: {{ $company->email }}</p>
        <address>Address: {{ $company->address }}</address>
        <img src="{{ asset('storage/'.$company->logotip) }}" width="150" alt="{{ $company->logotip }}">
        <div class="my-4">
            @auth
                @if ($company->user_id == Auth()->user()->id)
                    <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="POST">
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
