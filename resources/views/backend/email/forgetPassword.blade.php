@extends('backend.auth.layouts.master')
@section('main-content')
    <h1>Forget Password Email</h1>

    You can reset password from bellow link:
    <a href="{{ route('admin.password.reset.get', $token) }}" class="btn btn-dark text-light">Reset Password</a>
@endsection
