@extends('layouts.guest')

@section('main-content')
<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="mb-3">
        <label for="confirm-password" class="form-label">Comfirm password</label>
        <input type="password" class="form-control" id="confirm-password" name="confirm-password">
    </div>

    <div class="d-flex align-items-center justify-content-end">
        <button type="submit" class="btn btn-primary ms-4">Reset Password</button>
    </div>
</form>
@endsection
