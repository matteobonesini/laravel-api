@extends('layouts.app')

@section('title', $project->title)

@section('main-content')
    <div class="container">
        <div class="text-center">
            <h2>{{ $project->title }} - <a href="{{
                $project->type_id ? route('types.show', ['type' => $project->type_id])  : '#' 
                }}">{{ $project->type ? $project->type->title : 'No Type' }}</a>
            </h2>
            <div class="mt-3">
                @forelse ($project->technologies as $technology)
                    <span class="badge rounded-pill text-bg-primary">
                        {{ $technology->title }}
                    </span>
                @empty
                    Nessun tag associato a questo post
                @endforelse
            </div>
            <img class="w-25 object-fit-contain my-5" src="{{ asset('storage/' . $project->img_src) }}" alt="Photo">
            <p>{{ $project->description }}</p>
            <div>
                <button class="btn">
                    <a class="text-decoration-none text-warning" href="{{ route('projects.edit', ['project' => $project->id]) }}">Edit</a>
                </button>
                <form class="d-inline bg-transparent" action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
    
                    <button class="btn text-danger" type="submit" class="btn">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection