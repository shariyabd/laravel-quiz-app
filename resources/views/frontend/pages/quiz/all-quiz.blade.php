@extends('frontend.layouts.master')
@section('main-content')
<main>
    <nav class="navbar navbar-expand-sm navbar-dark shadow">
     <div class="container">
        <a class=" btn btn-primary"  href="">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active  text-dark" href="{{route('frontend.index')}}" aria-current="page">Home <span
                            class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-success" href="#">Logout</a>
                </li>
        </div>
     </div>
    </nav>
    <div class="container">
        <div class="row p-3 shadow justify-content-center align-items-center mt-5">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Question</th>
                            <th>Option One</th>
                            <th>Option Two</th>
                            <th>Option Three</th>
                            <th>Option Four</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>What is the capital of bangladesh?</td>
                            <td>Dhaka</td>
                            <td>Chittatong</td>
                            <td>Feni</td>
                            <td>Khulna</td>
                            <td>Active</td>
                            <td>
                                <a href="">Edit</a>
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection