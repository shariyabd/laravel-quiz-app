<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user mr-2">
                    <img src="{{ asset('frontend/image/' . Auth::guard('user')->user()->image) }}" class="rounded-circle" style="width: 100px; height:100px" alt="User Image">
                </div>
                <div class="user-info">
                    <span class="lead-text">{{Auth::guard('user')->user()->name}}</span>
                    <span class="sub-text">{{Auth::guard('user')->user()->email}}</span>
                </div>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href=""><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .user-card -->
        </div><!-- .card-inner -->
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li><a class="active" href="{{route('userProfile')}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                <li><a href="{{route('userProfileUpdateForm')}}"><em class="icon ni ni-grid-add-fill-c"></em><span>Update Profile</span></a></li>
                <li><a href="{{route('user.password.updateForm')}}"><em class="icon ni ni-lock-alt-fill"></em><span>Password Settings</span></a></li>
                <li><a href=""><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
            </ul>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- card-aside -->