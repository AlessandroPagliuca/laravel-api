@extends('layouts.app')

@section('content')
    <section class="container padding-home">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-secondary">
                Insert new type
            </h2>
            <a href="{{ route('admin.types.index') }}" class="btn btn-warning m-1">Go back</a>
        </div>
        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <p class="text-white">Create type:</p>
                <input type="text" class="form-control @error('tech') is-invalid
                @enderror" name="tech"
                    id="tech" aria-describedby="nameTag" value=" {{ old('tech') }} ">
                @error('tech')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </section>
@endsection
