@extends('frontend.layouts.master')
@section('main-content')


<h1>Email Verification Mail</h1>
  
Please verify your email with bellow link: 
<a href="{{ route('user.verify', $token) }}">Verify Email</a>

@endsection