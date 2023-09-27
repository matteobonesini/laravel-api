@extends('layouts.app')

@section('title', 'Edit Type')

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
        <form action="{{ route('technologies.update', ['technology' => $technology->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $technology->title) }}">
            </div>
            <button class="btn btn-success" type="submit">Edit</button>
        </form>
    </div>
@endsection