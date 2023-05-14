@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between mb-2">
            <h1>Education</h1>
            <a href="{{ route('experience.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-plus-circle-fill"></i> Next Add Experience
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($educations as $education)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Education Center Name </strong> {{ $education->school_name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location {{ $education->school_location }}</h6>
                            <p class="card-text">
                                <strong>Degree:</strong> {{ $education->degree }}<br>
                                <strong>Field of Study:</strong> {{ $education->field_of_study }}<br>
                                <strong>Graduation Start Date:</strong> {{ $education->graduation_start_date }}<br>
                                <strong>Graduation End Date:</strong> {{ $education->graduation_end_date }}
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('education.edit', $education) }}" class="btn btn-primary me-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('education.destroy', $education->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $education->id }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $education->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this education record?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ route('education.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add New Education
            </a>
        </div>
    </div>
@endsection
