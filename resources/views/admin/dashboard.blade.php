@extends('layouts.app')

@section('main-content')
    <div class="container">
        <div class="alert alert-success my-4" role="alert">
            Number of project: {{ $count }}
        </div> 
        <h4>Last Projects:</h4>         
        <div class="row g-5">
            @foreach ($lastProjects as $project)
                <div class="col-4">
                    <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="nav-link h-100">
                        <div class="card h-100">
                            <img src="{{ $project->full_img_src }}" class="card-img-top" alt="{{ $project->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text" style="overflow:hidden; text-overflow: ellipsis; white-space: nowrap">{{ $project->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection