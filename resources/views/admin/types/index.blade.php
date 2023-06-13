@extends('layouts.app')

@section('content')
    <div class="container padding-home">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-white">Types list</h1>
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.types.create') }}" class="fs-5 btn btn-light blue-01 me-3">Create</a>
                <a href="{{ route('admin.dashboard') }}" class="fs-5 btn btn-secondary text-white">Go Dashboard</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created at</th>
                    <th scope="col">
                        <i class="fa-solid fa-hammer"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->tech }}</td>
                        <td>{{ $type->created_at }}</td>
                        <td class="d-flex justify-content-start flex-wrap">
                            <a href="{{ route('admin.types.show', $type->slug) }}" class="btn btn-warning m-1">Show</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @include('partials.modal')
@endsection
