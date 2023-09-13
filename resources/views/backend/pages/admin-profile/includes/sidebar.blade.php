<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user mr-2">
                    <img src="{{ asset('image/' . Auth::guard('admin')->user()->image) }}" class="rounded-circle" style="width: 100px; height:100px" alt="User Image"">
                </div>
                <div class="user-info">
                    <span class="lead-text">{{Auth::guard('admin')->user()->name}}</span>
                    <span class="sub-text">{{Auth::guard('admin')->user()->email}}</span>
                </div>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="{{route('dashboard.adminProfile.updateForm')}}"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .user-card -->
        </div><!-- .card-inner -->
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li><a class="active" href="{{route('dashboard.adminProfile')}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                <li><a href="{{route('dashboard.adminProfile.updateForm')}}"><em class="icon ni ni-grid-add-fill-c"></em><span>Update Profile</span></a></li>
                <li><a href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                <li><a href="html/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
            </ul>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- card-aside -->