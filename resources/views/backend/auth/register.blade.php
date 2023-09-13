@extends('backend.auth.layouts.master');

@section('main-content')
<div class="nk-content ">
    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="{{route('admin.register')}}" class="logo-link">
                <img class="logo-light logo-img" src="{{asset('backend/images/logo.png')}}" srcset="{{asset('backend/images/logo2x.png 2x')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('backend/images/logo-dark.png')}}" srcset="{{asset('backend/images/logo-dark2x.png 2x')}}" alt="logo-dark">
            </a>
        </div>
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Register</h4>
                        <div class="nk-block-des">
                            <p>Create New Dashlite Account</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.register.post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter your name">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email or Username</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Enter your email address or username">
                        </div>
                        @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Passcode</label>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your passcode">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <div class="custom-control custom-control-xs custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox">
                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-lg btn-primary btn-block">Register</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{route('admin.login.show')}}"><strong>Sign in instead</strong></a>
                </div>
                <div class="text-center pt-4 pb-3">
                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                </div>
                <ul class="nav justify-center gx-8">
                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nk-footer nk-auth-footer-full">
        <div class="container wide-lg">
            <div class="row g-3">
                <div class="col-lg-6 order-lg-last">
                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Terms & Condition</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>
                        <li class="nav-item dropup">
                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="language-list">
                                    <li>
                                        <a href="#" class="language-item">
                                            <img src="./images/flags/english.png" alt="" class="language-flag">
                                            <span class="language-name">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="language-item">
                                            <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                            <span class="language-name">Español</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="language-item">
                                            <img src="./images/flags/french.png" alt="" class="language-flag">
                                            <span class="language-name">Français</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="language-item">
                                            <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                            <span class="language-name">Türkçe</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="nk-block-content text-center text-lg-left">
                        <p class="text-soft">&copy; 2019 CryptoLite. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection