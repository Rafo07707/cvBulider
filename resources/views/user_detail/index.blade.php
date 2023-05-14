@extends('layouts.app')

@section('content')
    <div class="mt-4 ">
        <a href="{{ route('education.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Next Add Education
        </a>
    </div>
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    @if ($message = session('message'))
                        <div class="alert alert-info">{{ $message }}</div>
                    @endif

                    <h5 class="card-title">Profile Info</h5>
                    <p class="card-text">Full Name: {{ $userDetail->full_name }} </p>
                    <p class="card-text">Email: {{ $userDetail->email }}</p>
                    <p class="card-text">Phone: {{ $userDetail->phone }}</p>
                    <p class="card-text">Address: {{ $userDetail->address }}</p>
                    <p class="card-text">Summary: {{ $userDetail->summary }}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('user-detail.edit', $userDetail) }}" class="btn btn-primary me-2">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('user-detail.destroy', $userDetail->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $userDetail->id }}">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $userDetail->id }}" tabindex="-1"
                                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this user-detail record?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
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
    </div>
@endsection
