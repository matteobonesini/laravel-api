@extends('layouts.app')

@section('title', 'Create New Project')

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
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="img_src" class="form-label">Image Source</label>
                <input class="form-control" type="file" name="img_src" id="img_src" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
            </div>
            <select class="form-select mb-3" name="type_id">
                <option value="">Open this select menu</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->title }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="form-label d-block">Technologies</label>
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"
                            name="technologies[]"
                            id="{{ $technology->id }}"
                            value="{{ $technology->id }}"
                            @if ( in_array( $technology->id, old('technologies', []) ) )
                                checked
                            @endif
                            >
                        <label class="form-check-label" for="{{ $technology->id }}">{{ $technology->title }}</label>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-success" type="submit">Add</button>
        </form>
    </div>
@endsection