<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="" class="logo-link nk-sidebar-logo">
                <h2 class="text-light">Quiz</h2>
                {{-- <img class="logo-light" style="width: 100px; height:100px;" src="{{ asset('backend/image/logo.png') }}"
                    srcset="{{ asset('backend/images/logo2x.png 2x') }}" alt="logo"> --}}
                <img class="logo-dark logo-img" src=""
                    srcset="" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('frontend.dashboard')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-house"></i></i></span>
                            <span class="nk-menu-text"> Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('frontend.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-house"></i></i></span>
                            <span class="nk-menu-text"> Home</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt"> Quizes</h6>
                    </li><!-- .nk-menu-heading -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><i class="fa-solid fa-graduation-cap"></i></em></span>
                            <span class="nk-menu-text">Start Quiz </span>
                        </a>
                        {{-- @foreach ($quizTopic as $topic )
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">{{$topic->name}}</span></a>
                            </li>
                        </ul>
                        @endforeach --}}
                       
                <!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><i class="fa-solid fa-graduation-cap"></i></em></span>
                            <span class="nk-menu-text">User Answer Paper </span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="" class="nk-menu-link"><span class="nk-menu-text">Mange User Answer</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
