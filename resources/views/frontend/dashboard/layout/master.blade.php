@include('frontend.dashboard.includes.head')
<body class="nk-body bg-lighter npc-general has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
           @include('frontend.dashboard.includes.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                         <!-- .nk-header-brand -->
                            @include('frontend.dashboard.includes.header')
                           <!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                @yield('content')
                <!-- content @e -->
                <!-- footer @s -->
               @include('frontend.dashboard.includes.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        {{-- <div class="loader-main" style="display: none;">
            <div class="loader" ></div>
          </div> --}}
        <!-- main @e -->
    </div>

  {{-- @include('frontend.dashboard.pages.quiz.addEdit') --}}
@include('frontend.dashboard.includes.script')