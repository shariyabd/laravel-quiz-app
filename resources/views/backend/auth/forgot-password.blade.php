{{-- @extends('backend.auth.layouts.master')
@section('main-content')
    <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
            <div class="brand-logo pb-4 text-center">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                        alt="logo">
                    <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png"
                        srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                </a>
            </div>
            <div class="card card-bordered">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Reset password</h5>
                            <div class="nk-block-des">
                                <p>If you forgot your password, well, then we’ll email you instructions to reset your
                                    password.</p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.password.email') }}" method="POST">
                        @csrf
                        @if (session('status'))
                            <p class="bg-success-500 text-primary p-3 w-full text-center">{{ session('status') }}</p>
                        @endif
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Email</label>
                            </div>
                            <div class="form-control-wrap">
                                <input type="email" name="email" id="email" class="form-control form-control-lg"
                                    id="default-01" placeholder="Enter your email address">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4">
                        <a href="{{ route('admin.login.show') }}"><strong>Return to login</strong></a>
                    </div>
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
                                <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown"
                                    data-offset="0,10"><span>English</span></a>
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
@endsection --}}
