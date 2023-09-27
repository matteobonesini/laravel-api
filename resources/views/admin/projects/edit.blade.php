@extends('layouts.app')

@section('title', 'Edit Project')

@section('main-content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('projects.update', ['project' => $project->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
            </div>
            <div class="mb-3">
                <label for="img_src" class="form-label">Image</label>
                <input class="form-control" type="file" name="img_src" id="img_src" accept="image/*">

                    @if ($project->img_src)
                        <div>
                            <img src="{{ asset('storage/' . $project->img_src) }}" class="w-50" alt="{{ $project->title }}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remove_img_src" id="remove_img_src">
                            <label class="form-check-label" for="remove_img_src">
                                Rimuovi immagine
                            </label>
                        </div>
                    @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $project->description) }}</textarea>
            </div>
            <select class="form-select mb-3" name="type_id">
                <option value="">Open this select menu</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) == $type->id ? 'selected' : 'No type' }}>
                        {{ $type->title }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="form-label d-block">Tag</label>
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"
                            name="technologies[]"
                            id="{{ $technology->id }}"
                            value="{{ $technology->id }}"
                            @if ($errors->any())
                                @if ( in_array( $technology->id, old('technologies', []) ) )
                                    checked
                                @endif
                            @elseif (
                                $project->technologies->contains($technology)
                            )
                                checked
                            @endif
                            >
                        <label class="form-check-label" for="{{ $technology->id }}">{{ $technology->title }}</label>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-success" type="submit">Edit</button>
        </form>
    </div>
@endsection