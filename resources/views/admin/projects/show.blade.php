@extends('layouts.app')

@section('content')
    <div class="container padding-home">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-secondary my-4 p-2">
                {{ __('Selected project') }}
            </h2>
            <a href="{{ route('admin.projects.index', $project->slug) }}" class="btn btn-warning m-1">Go back</a>

        </div>
        <!--Selected project -->
        <div class="row flex-column justify-content-center">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Agency</th>
                            <th scope="col">Year</th>
                            <th scope="col">Url</th>
                            <th scope="col">Tech</th>
                            <th scope="col">Languages</th>
                            <th scope="col">
                                <i class="fa-solid fa-hammer"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->agency }}</td>
                            <td>{{ $project->year }}</td>
                            <td>{{ $project->url }}</td>
                            <td> {{ $project->type ? $project->type->tech : 'No tech specified' }} </td>
                            <td>
                                @if ($project->tags && count($project->tags) > 0)
                                    <div>
                                        @foreach ($project->tags as $tag)
                                            <a href="{{ route('admin.tags.show', $tag->slug) }}"
                                                class="badge rounded-pill bg-primary text-white">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                            <td class="d-flex justify-content-start flex-wrap">
                                <a href="{{ route('admin.projects.edit', $project->slug) }}"
                                    class="btn btn-success m-1">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn btn btn-danger m-1">Delete</button>
                                </form>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
            @include('partials.modal')

        @endsection
