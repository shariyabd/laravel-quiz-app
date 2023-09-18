@extends('frontend.layouts.master')

@section('main-content')
    <nav class="navbar navbar-expand-lg navbar-light px-5">
        <div class="container">
            <a class="navbar-brand" href="#">Quiz-App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                    </li>
                    @if (Auth::guard('user')->check())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="user-quiz.html">Quizes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('frontend.dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item mx-1">
                            <a class="nav-link active btn btn-primary btn-sm text-light" aria-current="page"
                                href="{{ route('register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link active btn btn-success btn-sm text-light" aria-current="page"
                                href="{{ route('login') }}">Sign In</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>


    <main>
        <section class="py-5 ">
            <div class="container">
                <div class="row  align-items-center">
                    <div class="col-md-6">
                        <div class="text-body">
                            <h1>Make a Quiz for you</h1>
                            <p>Create a quiz to generate leads, to teach your students or simply to entertain</p>

                            <!-- User is authenticated -->
                            <a href="{{ route('frontend.quiz') }}" class="btn btn-primary">Create a Quiz</a>
                            <a href="quiz.html" class="btn btn-success">Give a Test</a>

                            <!-- User is not authenticated - Redirect to login page -->


                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/image/banner.jpg') }}" class="img img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>



        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 py-5">
                        <div class="text-head text-center">
                            <h1>Hello Teachers!
                                Creating a quiz can help your students.</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('frontend/image/second-banner.jpg') }}" class="img img-fluid" alt="">
                    </div>
                    <div class="col-md-6">
                        <p>Make your quiz to generate leads. An interactive quiz is a great way to generate leads on your
                            students</p>
                        <h3>You can export the contact information of the participants to more than 3000 applications.</h3>
                        <p>
                            You can use the last page of your quiz to encourage an action. For instance, you can redirect
                            the participants to your Facebook page, or a page of your website.</p>
                    </div>
                    <div class="col-md-12 text-center py-3">
                        <a href="" class="btn btn-success"> Create Your Own Quiz</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
