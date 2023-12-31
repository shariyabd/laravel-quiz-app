@extends('backend.auth.layouts.master');
@section('main-content')
<div class="nk-content ">
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        {{-- <div class="brand-logo pb-4 text-center">
            <a href="html/index.html" class="logo-link">
                <img class="logo-light logo-img" src="{{asset('backend/images/logo.png')}}" srcset="{{asset('backend/images/logo2x.png 2x')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('backend/images/logo-dark.png')}}" srcset="{{asset('backend/images/logo-dark2x.png 2x')}}" alt="logo-dark">
            </a>
        </div> --}}
        <div class="card card-bordered shadow rounded">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Sign-In</h4>
                        <div class="nk-block-des">
                            <p>Access the quiz admin panel using your email and passcode.</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.login.post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">Email </label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" name="email" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address or username">
                        </div>
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Password</label>
                            
                            <a class="link link-primary link-sm" href="{{route('admin.password.get')}}">Forgot Password?</a>
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                        </div>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="{{route('admin.register')}}">Create an account</a>
                </div>
                <div class="text-center pt-4 pb-3">
                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                </div>
                <ul class="nav justify-center gx-4">
                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection