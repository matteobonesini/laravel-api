@extends('layouts.guest')

@section('main-content')
<div class="h-100 d-flex justify-content-center align-items-center flex-wrap">
    <div class="w-50">
        <div class="w-100 mb-3 text-center">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
    
        <form method="POST" action="{{ route('password.email') }}" class="w-100 p-4">
            @csrf
    
            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
    
            <div class="d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-primary ms-4">Email Password Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection
