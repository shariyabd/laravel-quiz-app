@extends('frontend.layouts.master')

@section('main-content')

<main>
    <nav class="navbar navbar-expand-sm navbar-dark shadow">
        <div class="container">
            <a class=" btn btn-primary" href="{{route('frontend.all-quiz')}}">All Quiz</a>
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
        <div class="row p-3 justify-content-center align-items-center mt-5">
            <div class="col-md-6 shadow p-3">
                <div class="card-head">
                    <h2>Create A Quiz</h2>
                </div>
                <div class="card-body p-3">
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="">Question : </label>
                            <input class="form form-control" type="text" name="question-one" placeholder="question name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Option One : </label>
                            <input class="form form-control" type="text" name="option-one" placeholder="option one">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Option Two : </label>
                            <input class="form form-control" type="text" name="option-two" placeholder="option two">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Option Three : </label>
                            <input class="form form-control" type="text" name="option-three" placeholder="option three">
                        </div>
                        <div class="form-group mb-3">
                            <select class="form form-control" name="" id="">
                                <option value="">-----Select Correct Answer------ </option>
                                <option value="">Option One</option>
                                <option value="">Option Two</option>
                                <option value="">Option Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success w-100">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection