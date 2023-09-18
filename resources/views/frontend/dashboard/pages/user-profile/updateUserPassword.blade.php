@extends('frontend.dashboard.layout.master')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Personal Information</h4>
                                                <div class="nk-block-des">
                                                    <p>Basic info, like your name and email, that you use on this platform.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                    data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head mb-3">
                                                <h6 class="overline-title">Basics</h6>
                                            </div>
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif

                                            <form action="{{route('user.password.update')}}" method="POST">
                                                @csrf
                                                <input type="password" name="current_password" class="form-control mb-2"
                                                    placeholder="Current Password">
                                                @error('current_password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <input type="password" name="new_password" class="form-control mb-2"
                                                    placeholder="New Password">
                                                @error('new_password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <input type="password" name="new_confirm_password" class="form-control mb-2"
                                                    placeholder="Confirm Password">
                                                @error('new_confirm_password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div><!-- data-list -->
                                    </div><!-- .nk-block -->
                                </div>
                                @include('frontend.dashboard.pages.user-profile.includes.sidebar')
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>




    @if (session('success'))
        {
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: true,
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endpush
        }
    @endif
@endsection
