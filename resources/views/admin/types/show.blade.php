@extends('layouts.app')

@section('title', $type->title)

@section('main-content')
    <div class="container">
        <div class="text-center">
            <h2 class="mt-5">{{ $type->title }}</h2>
            <div>
                <button class="btn">
                    <a class="text-decoration-none text-warning" href="{{ route('types.edit', ['type' => $type->id]) }}">Edit</a>
                </button>
                <form class="d-inline bg-transparent" action="{{ route('types.destroy', ['type' => $type->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn text-danger" type="submit" class="btn">Delete</button>
                </form>
            </div>
        </div>
        <h4 class="mt-5 mb-3">
            {{ $type->title }} projects:
       </h4>
        @foreach ($type->projects as $project)
            <p class="m-0">
                <a class="text-decoration-none text-primary" href="{{ route('projects.show', ['project' => $project->id]) }}">
                    {{ $project->title }}
                </a>
            </p>
        @endforeach
    </div>
@endsection