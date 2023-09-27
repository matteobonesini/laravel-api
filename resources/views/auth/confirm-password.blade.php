@extends('layouts.guest')

@section('main-content')
<div class="mb-4 text-sm text-gray-600">
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
</div>

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="d-flex align-items-center justify-content-end">
        <button type="submit" class="btn btn-primary ms-4">Confirm</button>
    </div>
</form>
@endsection