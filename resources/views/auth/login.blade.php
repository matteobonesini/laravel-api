@extends('layouts.guest')

@section('main-content')
<div class="h-100 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{ route('login') }}" class="w-50 p-4">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="check" name="check">
            <label class="form-check-label" for="check">Remember met</label>
        </div>
        
        <div class="d-flex align-items-center justify-content-end">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary ms-4">Log in</button>
        </div>
    </form>
</div>
@endsection
