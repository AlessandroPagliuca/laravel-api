@extends('layouts.app')

@section('content')
    <section class="container padding-home">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-secondary">
                Edit type: {{ $type->tech }}
            </h2>
            <a href="{{ route('admin.types.show', $type->slug) }}" class="btn btn-warning m-1">Go back</a>
        </div>
        <form action="{{ route('admin.types.update', $type->tech) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <p class="text-white">Edit type:</p>
                <input type="text" class="form-control @error('tech') is-invalid
                @enderror" name="tech"
                    id="tech" aria-describedby="nameTag" value=" {{ old('tech', $type->tech) }} ">
                @error('tech')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </section>
@endsection
