@extends('layouts.app')

@section('content')
    <section class="container padding-home">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-white">Insert new project</h2>
            <a href="{{ route('admin.projects.index') }}" class="fs-4 btn btn-light blue-01">Go back</a>
        </div>

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label blue-01 fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid
                @enderror"
                    name="title" id="title" aria-describedby="titleComic" value=" {{ old('title') }} ">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="agency" class="form-label blue-01 fw-bold">Agency</label>
                <input type="text" class="form-control @error('agency') is-invalid
                @enderror"
                    name="agency" id="agency" aria-describedby="agencyProject" value=" {{ old('agency') }} ">
                @error('agency')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="year" class="form-label blue-01 fw-bold">Year</label>
                <input type="text" class="form-control @error('year') is-invalid
                @enderror"
                    name="year" id="year" aria-describedby="yearProject" value=" {{ old('year') }} ">
                @error('year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="url" class="form-label blue-01 fw-bold">Url</label>
                <textarea name="url" id="url" class="@error('url') is-invalid
                @enderror" cols="30"
                    rows="10" aria-describedby="urlProject">

                </textarea>
                @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="type_id">Type tech</label>
                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="">Select tech</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->tech }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p class="text-white">Select one or more tag:</p>
                @foreach ($tags as $tag)
                    <div class="text-white">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <label for="tags[]" class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </section>
@endsection
