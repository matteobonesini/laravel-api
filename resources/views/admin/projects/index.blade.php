@extends('layouts.app')

@section('title', 'Projects')

@section('main-content')
    <div class="container">
        <div class="text-center">

            <div class="my-3">
                <a href="{{ route('projects.create') }}">
                    <button class="btn btn-success">Add new project</button>
                </a>
            </div>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Controll</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($projects as $project)    
                        <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->type ? $project->type->title : 'No Type'}}</td>
                        <td>
                            <button class="btn">
                                <a class="text-decoration-none" href="{{ route('projects.show', ['project' => $project->id]) }}">Show</a>
                            </button>
                            <button class="btn">
                                <a class="text-decoration-none text-warning" href="{{ route('projects.edit', ['project' => $project->id]) }}">Edit</a>
                            </button>
                            <form class="d-inline bg-transparent" action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn text-danger" type="submit" class="btn">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection