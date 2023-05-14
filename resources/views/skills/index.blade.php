@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between mb-2">
        <h1>Skills</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-eye"></i> Preview
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Preview</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body overflow-hidden">
                            <iframe src="{{route('resume.index')}}" width='100%' height='900'  ></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{route('resume.download')}}" class="btn btn-primary" role="button">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($skills as $skill)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Skill Name: </strong> {{ $skill->name }}<br>
                                <strong>Rating: </strong> {{ $skill->rating }}<br>
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('skills.edit', $skill) }}" class="btn btn-primary me-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $skill->id }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $skill->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this skill record?
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
            <a href="{{ route('skills.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add New Skill
            </a>
        </div>
    </div>
@endsection
