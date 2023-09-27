@extends('layouts.guest')

@section('main-content')
<div class="h-100 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{ route('register') }}" class="w-50 p-4">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Comfirm password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="d-flex align-items-center justify-content-end">
            <a class="" href="{{ route('password.request') }}">
                {{ __('Alredy registered?') }}
            </a>

            <button type="submit" class="btn btn-primary ms-4">Register</button>
        </div>
    </form>
</div>
@endsection
