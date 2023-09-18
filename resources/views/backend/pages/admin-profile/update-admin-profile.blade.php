@extends('backend.layouts.master')

@section('main-content')
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
                                                <p>Basic info, like your name and address, that you use on this Platform.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-head mb-3">
                                            <h6 class="overline-title">Basics</h6>
                                        </div>
                                      <form action="{{route('dashboard.adminProfile.update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" value="{{Auth::guard('admin')->user()->name}}" name="name" id="name" class="form-control mb-3" placeholder="Name :">
                                        <input type="email"value="{{Auth::guard('admin')->user()->email}}" name="email" id="email" class="form-control mb-3" placeholder="Email :">
                                        <input type="file" name="image" id="image" class="form-control mb-3" placeholder="Name :" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        <img id="output" src="{{ asset('backend/image/' . Auth::guard('admin')->user()->image) }}" width="100" height="100">
                                        <button type="submit" class="btn btn-primary d-block mt-2">Update</button>
                                      </form>
                                    </div><!-- data-list -->
                                    <!-- data-list -->
                                </div><!-- .nk-block -->
                            </div>
                            @include('backend.pages.admin-profile.includes.sidebar')
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>




@if(session('success')){
    @push('js')
    <script>
  Swal.fire({
    position: 'top-end',
    icon: '{{session('cls')}}',
    toast: true,
    title: '{{session('success')}}',
    showConfirmButton: false,
    timer: 2000
  })
    </script>
  @endpush
  }
  @endif


@endsection