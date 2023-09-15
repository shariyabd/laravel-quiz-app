@extends('backend.auth.layouts.master')
@section('main-content')
    <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">
            <div class="brand-logo pb-4 text-center">
                <a href="{{ route('admin.register') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('backend/images/logo.png') }}"
                        srcset="{{ asset('backend/images/logo2x.png 2x') }}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('backend/images/logo-dark.png') }}"
                        srcset="{{ asset('backend/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                </a>
            </div>
            <div class="card card-bordered">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Reset Password</h4>
                        </div>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="{{ route('admin.reset.password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="form-label" for="email">Email </label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-lg" name="email" id="email"
                                    placeholder="Enter your email address or username">
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                    data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" name="password" id="password"
                                    placeholder="Enter your passcode">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                    data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" name="password_confirmation"
                                    id="password_confirmation" placeholder="Enter your passcode">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="reset" class="btn btn-lg btn-primary btn-block">Reset
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="nk-footer nk-auth-footer-full">
            <div class="container wide-lg">
                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="nk-block-content text-center text-lg-left">
                            <p class="text-soft">&copy; 2019 CryptoLite. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (session('message'))
        {
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: true,
                    title: '{{ session('message') }}',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
        }
    @endif
@endsection
