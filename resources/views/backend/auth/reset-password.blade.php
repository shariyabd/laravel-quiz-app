{{-- @extends('backend.layouts.master')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card p-4 bg-primary text-light shadow">
                    <div class="card-header">
                        <h2>Reset Your Password</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="email">Email </label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control form-control-lg" name="email" id="email"
                                        placeholder="Enter your email address or username">
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Passcode</label>
                                <div class="form-control-wrap">
                                    <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                        data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        id="password" placeholder="Enter your passcode">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="password_confirmation">Confirm Password </label>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation"
                                            placeholder="Enter your email address or username">
                                    </div>
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>  
                            <div class="form-group">
                                <button type="submit" name="update"
                                    class="btn btn-lg btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
