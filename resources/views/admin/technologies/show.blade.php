@extends('layouts.app')

@section('title', $technology->title)

@section('main-content')
    <div class="container">
        <div class="text-center">
            <h2 class="mt-5">{{ $technology->title }}</h2>
            <div>
                <button class="btn">
                    <a class="text-decoration-none text-warning" href="{{ route('technologies.edit', ['technology' => $technology->id]) }}">Edit</a>
                </button>
                <form class="d-inline bg-transparent" action="{{ route('technologies.destroy', ['technology' => $technology->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn text-danger" technology="submit" class="btn">Delete</button>
                </form>
            </div>
        </div>
        <h4 class="mt-5 mb-3">
            {{ $technology->title }} projects:
       </h4>
        @foreach ($technology->projects as $project)
            <p class="m-0">
                <a class="text-decoration-none text-primary" href="{{ route('projects.show', ['project' => $project->id]) }}">
                    {{ $project->title }}
                </a>
            </p>
        @endforeach
    </div>
@endsection