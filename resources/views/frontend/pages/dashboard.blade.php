@extends('frontend.layouts.master')

@section('main-content')
    <main>
        <nav class="navbar navbar-expand-sm navbar-dark shadow">
            <div class="container">
                <a class=" btn btn-primary" href="all-quizes.html">All Quizes</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active  text-dark" href="{{ route('frontend.index') }}"
                                aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="btn btn-success">Logout</a>
                        </li>
                </div>
            </div>
        </nav>
        @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            <div class="row p-3 shadow justify-content-center align-items-center mt-5">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-head text-center p-2">
                            <h2>Profile</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{route('updateProfile')}}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::guard('user')->user()->name }}" id="name" placeholder="shariya">
                                    <label for="name">Name : </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control"
                                        value="{{ Auth::guard('user')->user()->email }}" id="email" placeholder="name@example.com">
                                    <label for="email">Email :</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" value=""
                                        id="password" placeholder="Password">
                                    <label for="password">New Password :</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="Confirm Password">
                                    <label for="password_confirmation">Confirm New Password :</label>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-success w-100">Update</button>
                                    {{-- <form action="" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                </form> --}}


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card  p-3">
                        <div class="card-head text-center">
                            <h2>Leaderboard</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover p-5">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name :</th>
                                        <th>Score :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Shairya</td>
                                        <td>546</td>
                                    <tr>
                                        <td>1</td>
                                        <td>Shairya</td>
                                        <td>546</td>
                                    <tr>
                                        <td>1</td>
                                        <td>Shairya</td>
                                        <td>546</td>
                                    <tr>
                                        <td>1</td>
                                        <td>Shairya</td>
                                        <td>546</td>
                                    <tr>
                                        <td>1</td>
                                        <td>Shairya</td>
                                        <td>546</td>
                                    <tr>
                                        <td>1</td>
                                        <td>Shairya</td>
                                        <td>546</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @if (session('success'))
        {
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: true,
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
        }
    @endif
@endsection
