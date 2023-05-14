@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/experience" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="job_title">Job Title</label>
                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title">
                @error('job_title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="employer">Employer</label>
                <input id="employer" type="text" class="form-control @error('employer') is-invalid @enderror" name="employer">
                @error('employer')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="city">City</label>
                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city">
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="state">State</label>
                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state">
                @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="start_date">Start Date</label>
                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date">
                @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_date">End Date</label>
                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date">
                @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
