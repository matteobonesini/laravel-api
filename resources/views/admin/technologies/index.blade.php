@extends('layouts.app')

@section('title', 'Technology')

@section('main-content')
    <div class="container">
        <div class="text-center">

            <div class="my-3">
                <a href="{{ route('technologies.create') }}">
                    <button class="btn btn-success">Add new technology</button>
                </a>
            </div>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Controll</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)    
                        <tr>
                        <th scope="row">{{ $technology->id }}</th>
                        <td>{{ $technology->title }}</td>
                        <td>
                            <button class="btn">
                                <a class="text-decoration-none" href="{{ route('technologies.show', ['technology' => $technology->id]) }}">Show</a>
                            </button>
                            <button class="btn">
                                <a class="text-decoration-none text-warning" href="{{ route('technologies.edit', ['technology' => $technology->id]) }}">Edit</a>
                            </button>
                            <form class="d-inline bg-transparent" action="{{ route('technologies.destroy', ['technology' => $technology->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn text-danger" technology="submit" class="btn">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection