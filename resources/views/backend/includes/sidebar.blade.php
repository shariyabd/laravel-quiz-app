<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('backend/images/logo.png') }}"
                    srcset="{{ asset('backend/images/logo2x.png 2x') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('backend/images/logo-dark.png') }}"
                    srcset="{{ asset('backend/images/logo-dark2x.png 2x') }}" alt="logo-dark">
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
                        <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text">Default Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                            <span class="nk-menu-text">Invest Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Pre-Built Pages</h6>
                    </li><!-- .nk-menu-heading -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Quiz Topic</span>
                        </a>
                        <ul class="nk-menu-sub">
                            {{-- <li class="nk-menu-item">
                                <a href="{{route('dashboard.quiz.topic')}}" class="nk-menu-link"><span class="nk-menu-text">Add Topic</span></a>
                            </li> --}}
                            <li class="nk-menu-item">
                                <a href="{{route('dashboard.quiz.topic')}}" class="nk-menu-link"><span class="nk-menu-text">Manage Topic</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Quiz</span>
                        </a>
                        <ul class="nk-menu-sub">
                            {{-- <li class="nk-menu-item">
                                <a href="{{route('dashboard.quiz')}}" class="nk-menu-link"><span class="nk-menu-text">Add Quiz</span></a>
                            </li> --}}
                            <li class="nk-menu-item">
                                <a href="{{route('dashboard.quiz')}}" class="nk-menu-link"><span class="nk-menu-text">Manage Quiz</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                   
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Quiz Question Paper </span>
                        </a>
                        <ul class="nk-menu-sub">
                            {{-- <li class="nk-menu-item">
                                <a href="{{route('dashboard.quiz.question')}}" class="nk-menu-link"><span class="nk-menu-text">Add Quiz Qustion</span></a>
                            </li> --}}
                            <li class="nk-menu-item">
                                <a href="{{route('dashboard.quiz.manage.question')}}" class="nk-menu-link"><span class="nk-menu-text">Manage Quiz Qustion</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">User Answer Paper </span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="" class="nk-menu-link"><span class="nk-menu-text">Mange User Answer</span></a>
                            </li>
                            {{-- <li class="nk-menu-item">
                                <a href="" class="nk-menu-link"><span class="nk-menu-text">Manage Quiz Qustion</span></a>
                            </li> --}}
                        </ul><!-- .nk-menu-sub -->
                    </li><<!-- .nk-menu-item -->
                    <!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
