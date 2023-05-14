@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/user-detail/{{ $userDetail->id }}" method="POST" class="w-100">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ $userDetail->full_name }}" placeholder="Enter your full name">
                    @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $userDetail->email }}" placeholder="Enter your email address">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $userDetail->phone }}" placeholder="Enter your phone number">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $userDetail->address }}" placeholder="Enter your address">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="summary" class="form-label">Summary</label>
                    <textarea class="form-control @error('summary') is-invalid @enderror" id="summary"  name="summary" placeholder="Enter a summary">{{ $userDetail->summary }}</textarea>
                    @error('summary')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('user-detail.index') }}" class="btn btn-primary">
                        <i class="bi bi-eye"></i> Profile Info
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
