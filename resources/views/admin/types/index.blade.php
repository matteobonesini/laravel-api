@extends('layouts.app')

@section('title', 'Types')

@section('main-content')
    <div class="container">
        <div class="text-center">

            <div class="my-3">
                <a href="{{ route('types.create') }}">
                    <button class="btn btn-success">Add new type</button>
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
                    @foreach ($types as $type)    
                        <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->title }}</td>
                        <td>
                            <button class="btn">
                                <a class="text-decoration-none" href="{{ route('types.show', ['type' => $type->id]) }}">Show</a>
                            </button>
                            <button class="btn">
                                <a class="text-decoration-none text-warning" href="{{ route('types.edit', ['type' => $type->id]) }}">Edit</a>
                            </button>
                            <form class="d-inline bg-transparent" action="{{ route('types.destroy', ['type' => $type->id]) }}" method="POST">
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