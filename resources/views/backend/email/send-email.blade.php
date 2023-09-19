@extends('backend.auth.layouts.master')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card p-5 rounded shadow">
                    <h1 class="">{{ $greetings }}</h1>
                    <p class="">{{ $bodyText }}</p>
                    <p class="">{{ $endText }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
