{{-- @extends('frontend.layouts.master')
@section('main-content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card p-4 bg-primary text-light shadow">
                <div class="card-header">
                    <h3 class="text-center">Reset Email....</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('password.email')}}" method="POST">
                        @csrf
                        @if(session('status'))
                        <p class="bg-success-500 text-light p-3 w-full text-center">{{ session('status') }}</p>
                    @endif
                    
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <button type="submit" class="btn btn-dark text-light mt-3 w-100">Reset Password</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}
