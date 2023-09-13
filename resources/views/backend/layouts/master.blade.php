@include('backend.includes.head');
<body class="nk-body bg-lighter npc-general has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
           @include('backend.includes.sidebar');
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                         <!-- .nk-header-brand -->
                            @include('backend.includes.header');
                           <!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                @yield('main-content');
                <!-- content @e -->
                <!-- footer @s -->
               @include('backend.includes.footer');
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        {{-- <div class="loader-main" style="display: none;">
            <div class="loader" ></div>
          </div> --}}
        <!-- main @e -->
    </div>
  @include('backend.pages.quiz-topic.addEditForm');
  @include('backend.pages.quiz-question.addEditForm');
  {{-- @include('backend.pages.quiz.addEdit'); --}}
@include('backend.includes.script');