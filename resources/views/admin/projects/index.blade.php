@extends('layouts.app')

@section('content')
    <div class="container padding-home">
        <!--Projects list -->
        <div class="row flex-column justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-white">Projects list</h2>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('admin.projects.create') }}" class="fs-5 btn btn-light blue-01 me-3">Create</a>
                        <a href="{{ route('admin.dashboard') }}" class="fs-5 btn btn-secondary text-white">Go Dashboard</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Agency</th>
                            <th scope="col">Year</th>
                            <th scope="col">Url</th>
                            <th scope="col">Tech</th>
                            <th scope="col">
                                <i class="fa-solid fa-hammer"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->agency }}</td>
                                <td>{{ $project->year }}</td>
                                <td>{{ $project->url }}</td>
                                <td> {{ $project->type ? $project->type->tech : 'No tech specified' }} </td>
                                <td class="d-flex justify-content-start flex-wrap">
                                    <a href="{{ route('admin.projects.show', $project->slug) }}"
                                        class="btn btn-warning m-1">Show</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
