@extends('layouts.app')
@section('content')
    <div class="container padding-home ">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-secondary">
                Show single type
            </h2>
            <a href="{{ route('admin.types.index', $type->slug) }}" class="btn btn-warning m-1">Go back</a>
        </div>
        <div class="d-flex justify-content-start align-items-center pt-3">
            <p class="text-white text-uppercase fw-semibold">The type tech is:</p>
            <p class="badge bg-light blue-01 p-2 ms-3">{{ $type->tech }}</p>
        </div>
        <div class="d-flex justify-content-start align-items-center pt-3">
            <a href="{{ route('admin.types.edit', $type->slug) }}" class="btn btn-success m-1">Edit</a>
            <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn btn btn-danger m-1">Delete</button>
            </form>

        </div>

    </div>
@endsection
