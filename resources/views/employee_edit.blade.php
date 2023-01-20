@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xxl-4 col-lg4">
            <h6 class="display-6">Update employee data</h6>
            <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group mb-3">
                    <label for="company_name">Company name</label>
                    <input value="{{ $employee->company_name }}" type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                        placeholder="Company name">
                    @error('company_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input value="{{ $employee->name }}" type="text" name="company_name" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input value="{{ $employee->email }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input value="{{ $employee->phone }}" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Company phone">
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
