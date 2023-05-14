@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh">
        <h2>Welcome Cv Builder</h2>
        <a class="btn btn-primary mt-3" href="{{ route('home') }}">Make Cv</a>
    </div>

@endsection
