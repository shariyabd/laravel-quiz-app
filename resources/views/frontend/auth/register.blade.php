@extends('frontend.layouts.master')
@section('main-content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card p-4 bg-primary text-light shadow">
                <div class="card-header">
                    <h2>Register</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <label for="name">Name : </label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <div class=" text-danger">{{ $message }}</div>
                        @enderror
                        <label for="email">Email : </label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <div class=" text-danger">{{ $message }}</div>
                        @enderror
                        <label for="password">Password : </label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <label for="password_confirmation">Confirm Password : </label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control">
                        @error('password_confirmation')
                            <div class=" text-danger">{{ $message }}</div>
                        @enderror

                        <button name="register" type="submit" class="btn btn-success mt-2">Register</button>
                        <span class="pt-4">Have Already Account? <a href="{{ route('login') }}"
                                class="text-light">Login Here</a></span>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection