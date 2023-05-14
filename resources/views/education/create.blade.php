@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/education" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="school_name">Education Center Name</label>
                <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" >
                @error('school_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="school_location">Education Center Location</label>
                <input id="school_location" type="text" class="form-control @error('school_location') is-invalid @enderror" name="school_location">
                @error('school_location')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="degree">Degree</label>
                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" >
                @error('degree')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="field_of_study">Field of Study</label>
                <input id="field_of_study" type="text" class="form-control @error('field_of_study') is-invalid @enderror" name="field_of_study" >
                @error('field_of_study')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="graduation_start_date">Graduation Start Date</label>
                <input id="graduation_start_date" type="date" class="form-control @error('graduation_start_date') is-invalid @enderror" name="graduation_start_date" >
                @error('graduation_start_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="graduation_end_date">Graduation End Date</label>
                <input id="graduation_end_date" type="date" class="form-control @error('graduation_end_date') is-invalid @enderror" name="graduation_end_date" >
                @error('graduation_end_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
