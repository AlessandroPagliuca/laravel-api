@extends('layouts.app')

@section('content')
    <section class="container padding-home">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-white">Insert new tag </h2>
            <a href="{{ route('admin.tags.index') }}" class="btn btn-warning">Go back</a>
        </div>
        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <p class="text-white">Create tag:</p>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" name="name"
                    id="name" aria-describedby="nameTag" value=" {{ old('name') }} ">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </section>
@endsection
