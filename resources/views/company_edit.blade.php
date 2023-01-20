@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xxl-4 col-lg4">
            <h6 class="display-6">Update company data</h6>
            <form action="{{ route('companies.update', ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Company name</label>
                    <input value="{{ $company->name }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Company name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Company email</label>
                    <input value="{{ $company->email }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Company email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="logotip">Company logotip</label>
                    <input type="file" name="logotip" class="form-control"
                        id="logotip" placeholder="Company logotip">
                </div>
                <div class="form-group mb-3">
                    <label for="address">Company address</label>
                    <input value="{{ $company->address }}" type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        id="address" placeholder="Company address">
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
