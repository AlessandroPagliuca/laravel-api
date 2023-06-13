@extends('layouts.app')

@section('content')
    <div class="container padding-home">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fs-3 text-secondary my-4 p-2">
                {{ __('Selected tag') }}
            </h2>
            <a href="{{ route('admin.tags.index', $tag->slug) }}" class="btn btn-warning m-1">Go back</a>
        </div>
        <!--Selected Tag -->
        <div class="row flex-column justify-content-center">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Languages</th>
                            <th scope="col">
                                <i class="fa-solid fa-hammer"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td class="d-flex justify-content-start flex-wrap">
                                <a href="{{ route('admin.tags.edit', $tag->slug) }}" class="btn btn-success m-1">Edit</a>
                                <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST">
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
