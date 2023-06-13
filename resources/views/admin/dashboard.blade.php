@extends('layouts.app')

@section('content')
    <div class="container padding-home">
        <h2 class=" text-white my-4 p-2">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route('admin.projects.index') }}" class="fs-4 btn btn-light blue-01">Projects</a>
        <a href="{{ route('admin.types.index') }}" class="fs-4 btn btn-light blue-01">Types</a>
        <a href="{{ route('admin.tags.index') }}" class="fs-4 btn btn-light blue-01">Tags</a>
    @endsection
