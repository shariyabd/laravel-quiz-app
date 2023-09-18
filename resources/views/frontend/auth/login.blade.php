@extends('frontend.layouts.master')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card p-4 bg-primary text-light shadow">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    @if(session('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@endif
                    <div class="card-body">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <label for="email">Email : </label>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="d-flex justify-content-between mt-1">
                                <label for="password">Password : </label>
                                <a href="{{route('user.password.get')}}" class="text-light">Forgot Password?</a>
                            </div>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button name="login" type="submit" class="btn btn-success mt-2">Login</button>
                            <span class="pt-4">Don't Have Account? <a href="{{ route('register') }}"
                                    class="text-light">Register Here</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
