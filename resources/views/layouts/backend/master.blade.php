
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@php 
        echo detail_app()->name.' | '.(getDetailMenu()->nama_menu ?? '')
        @endphp
    </title>
    <link rel="icon" href="
        @php 
        echo detail_app()->icon
        @endphp
    " type="image/ico" />

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="{{ asset('plugin/packageswlt/dist/sweetalert2.min.js') }}">
    <link rel="{{ asset('css/backend/fancybox.min.css') }}" media="screen">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('css/backend/treeview.css') }}">
    <link href="{{ asset('global_assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend/core.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/anytime.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/tables/footable/footable.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    {{-- <script src="{{ asset('global_assets/js/demo_pages/extra_sweetalert.js') }}"></script> --}}

    {{-- Wizard --}}
    <script src="{{ asset('global_assets/js/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/extensions/cookie.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/wizard_steps.js') }}"></script>
    <script src="{{ asset('global_assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>

    {{-- Drag&Drop --}}
    <script src="{{ asset('global_assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/core/libraries/jquery_ui/touch.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/jqueryui_interactions.js') }}"></script>


    <script src="{{ asset('global_assets/js/plugins/buttons/ladda.min.js') }}" defer></script>
    <script src="{{ asset('js/backend/app.js') }}" defer></script>
    <script src="{{ asset('global_assets/js/demo_pages/table_responsive.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_validation.js') }}"></script>
    <script src="{{ asset('plugin/packageswlt/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugin/packageswlt/dist/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ asset('global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/editor_ckeditor.js') }}"></script> --}}
    <script src="{{ asset('js/backend/treeview.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/components_buttons.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/picker_date.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    
    <style>
        .active {
            background-color: #7777773d !important;
        }
    </style>


    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark" style="background-color: #438eb9">
        <div class="navbar-brand">
            <a href="" class="d-inline-block">
                <h6 style="font-size: 20px;
                color: white;
                font-weight: bold;
                letter-spacing: 2px;
                margin-bottom: 0px;"> <span style="font-style: italic; font-size: 20px"> {{ detail_app()->name }}</span></h6>
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <span class="badge ml-md-3 mr-md-auto">&nbsp</span>

            <ul class="navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;">
                        <i class="icon-bubbles4"></i>
                        <span class="badge bg-warning-400">2</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Pesan
                        </div>

                        <ul class="media-list dropdown-content-body">
                            <li class="media">
                                <div class="media-left">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">James Alexander</span>
                                        <span class="media-annotation pull-right">04:58</span>
                                    </a>

                                    <span class="text-muted">who knows</span>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        {{-- <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt=""> --}}
                        <img src="{{ detail_app()->icon }}" class="mr-2" height="34" alt="">
                        <span>{{ Auth::user()->name }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a href="{{ route('user.changepass', ['id' => Auth::user()->id]) }}" class="dropdown-item"><i class="icon-lock"></i>
                                Ubah Password</a>
    
                        <a href="{{ route('user.editprofile', ['id' => Auth::user()->id]) }}" class="dropdown-item"><i class="icon-user"></i> Edit Profile</a> --}}

                        {{-- <div class="dropdown-divider"></div> --}}
                        {{-- <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> --}}
                        <a href="#" class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="icon-switch2"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="{{ detail_app()->icon }}" height="38" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                <div class="font-size-xs opacity-50">
                                    {{-- <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA --}}
                                </div>
                            </div>

                            {{-- <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <li class="nav-item">
                            <a href="/admin/home" class="nav-link">
                                <i class="icon-home4" style=""></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <router-link to="/admin/developer" class="nav-link">
                                <i class="icon-code"></i>
                                <span>
                                    Developer
                                </span>
                            </router-link>
                        </li> --}}

                        @php
                            menu_nav(Auth::user()->id_user_group);
                        @endphp
                        <!-- Main -->                       

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->
            
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">
                            @php 
                                echo (getDetailMenu()->nama_parrent ?? '')
                            @endphp
                            </span> - 
                            @php 
                                echo (getDetailMenu()->nama_menu ?? '')
                            @endphp</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
        
                
                </div>
        
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> 
                                @php 
                                    echo (getDetailMenu()->nama_parrent ?? '')
                                @endphp
                            </a>
                            <span class="breadcrumb-item">
                                @php 
                                    echo (getDetailMenu()->nama_menu ?? '')
                                @endphp
                            </span><span class="breadcrumb-item">@yield('submenu2')</span>
                        </div>
        
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
        
                
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                <div class="row">
                    @yield('content')
                </div>
                

            </div>
            <!-- /content area -->
    

            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2021 <a href="#">Mitra Pedagang</a>
                    </span>
                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500
        });

          @if(Session::has('success'))
              Toast.fire({
                  type: 'success',
                  title: "{{ Session::get('success') }}"
                })
          @endif

          @if(Session::has('info'))
              Toast.fire({
                  type: 'success',
                  title: "{{ Session::get('info') }}"
                })
          @endif
    </script>
    @yield('script')
</body>
</html>
