@extends('layouts.app')

@section('content')
    <section class="container padding-home">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-secondary my-4 p-2">
                Edit tag: {{ $tag->name }}
            </h2>
            <a href="{{ route('admin.tags.show', $tag->slug) }}" class="btn btn-warning m-1">Go back</a>
        </div>
        <form action="{{ route('admin.tags.update', $tag->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <p class="text-white">Edit tag:</p>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" name="name"
                    id="name" aria-describedby="nameTag" value=" {{ old('name', $tag->name) }} ">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </section>
@endsection
