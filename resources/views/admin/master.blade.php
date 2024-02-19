<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="icon" href="{{asset('/')}}favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="{{asset('/')}}admin/assets/js/hyper-config.js"></script>
    <!-- Datatables css -->
    <link href="{{asset('/')}}admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}admin/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}admin/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}admin/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}admin/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{asset('/')}}admin/assets/js/hyper-config.js"></script>
    <!-- App css -->
    <link href="{{asset('/')}}admin/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('/')}}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Select2 css -->
    <link href="{{asset('/')}}admin/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

</head>

<body>
<!-- Begin page -->
<div class="wrapper">


    <!-- ========== Topbar Start ========== -->
    <div class="navbar-custom topnav-navbar">
        <div class="container-fluid detached-nav">

            <!-- Topbar Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="{{route('dashboard')}}" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{asset('/')}}admin/assets/images/logo.png" alt="logo" >
                            </span>
                    <span class="logo-sm">
                                <img src="{{asset('/')}}admin/assets/images/logo-sm.png" alt="small logo">
                            </span>
                </a>

                <!-- Logo Dark -->
                <a href="{{route('dashboard')}}" class="logo-dark">
                            <span class="logo-lg">
                                <img src="{{asset('/')}}admin/assets/images/logo-dark.png" alt="dark logo" >
                            </span>
                    <span class="logo-sm">
                                <img src="{{asset('/')}}admin/assets/images/logo-dark-sm.png" alt="small logo">
                            </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>



            <ul class="list-unstyled topbar-menu float-end mb-0">
                <li class="notification-list d-none d-md-inline-block">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                        <i class="ri-settings-3-line noti-icon"></i>
                    </a>
                </li>
                <li class="notification-list d-none d-sm-inline-block">
                    <a class="nav-link" href="javascript:void(0)" id="light-dark-mode">
                        <i class="ri-moon-line noti-icon"></i>
                    </a>
                </li>
                <li class="notification-list d-none d-md-inline-block">
                    <a class="nav-link" href="#" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line noti-icon"></i>
                    </a>
                </li>


                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                       aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{asset('/')}}admin/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>
                        <span>
                                    <span class="account-user-name">{{Auth::user()->name}}</span>
                                    <span class="account-position">Founder</span>
                                </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-edit me-1"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline me-1"></i>
                            <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                        <form action="{{route('logout')}}" method="POST" id="logoutForm">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

            <!-- Topbar Search Form -->
            <div class="app-search dropdown">
                <form>
                    <div class="input-group">
                        <a href="{{route('home')}}"  target="_blank" class="input-group-text btn btn-success" ><i class="ri-home-2-fill"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ========== Topbar End ========== -->



    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- Logo Light -->
        <a href="{{route('dashboard')}}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}admin/assets/images/logo.png" alt="logo" height="22">
                    </span>
            <span class="logo-sm">
                        <img src="{{asset('/')}}admin/assets/images/logo.png" alt="small logo" height="22">
                    </span>
        </a>

        <!-- Logo Dark -->
        <a href="{{route('dashboard')}}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}admin/assets/images/logo.png" alt="dark logo" height="22">
                    </span>
            <span class="logo-sm">
                        <img src="{{asset('/')}}admin/assets/images/logo.png" alt="small logo" height="22">
                    </span>
        </a>

        <!-- Sidebar Hover Menu Toggle Button -->
        <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
            <i class="ri-checkbox-blank-circle-line align-middle"></i>
        </button>

        <!-- Sidebar -left -->
        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <!-- Leftbar User -->
            <div class="leftbar-user">
                <a href="pages-profile.html">
                    <img src="{{asset('/')}}admin/assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                         class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name">{{Auth::user()->name}}</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>
                @php
                    $user = Auth::user();
                    $routeName = request()->route()->getName();
                    $routesData = \App\Models\RoleRoute::where('route_name', $routeName)->get();
                    $roles = $routesData->pluck('role_name')->toArray();
                    $userRoles = $user->roles->pluck('name')->toArray();

                @endphp
                <li class="side-nav-item">
                    <a href="{{route('dashboard')}}" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                       aria-controls="sidebarEcommerce" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> User Module </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('role.add')}}">Add Role</a>
                            </li>
                            <li>
                                <a href="{{route('role.manage')}}">Manage Role</a>
                            </li>
                            <li>
                                <a href="{{route('user.add')}}">Add User</a>
                            </li>
                            <li>
                                <a href="{{route('user.manage')}}">Manage User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarCategory" aria-expanded="false" aria-controls="sidebarEmail"
                       class="side-nav-link">
                        <i class="uil-list-ul"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('category.add')}}">Add Category</a>
                            </li>
                            <li>
                                <a href="{{route('category.manage')}}">Manage Category</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                        <i class="uil-window"></i>
                        <span> Sub Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('subcategory.add')}}">Add SubCategory</a>
                            </li>
                            <li>
                                <a href="{{route('subcategory.manage')}}">Manage SubCategory</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#reporter" aria-expanded="false" aria-controls="sidebarEmail"
                       class="side-nav-link">
                        <i class="uil-repeat"></i>
                        <span> Reporter </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="reporter">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('reporter.add')}}">Add Reporter</a>
                            </li>
                            <li>
                                <a href="{{route('reporter.manage')}}">Manage Reporter</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#blogForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                        <i class="uil-heart"></i>
                        <span> Notice </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="blogForms">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('notice.add')}}">Add Notice</a>
                            </li>
                            <li>
                                <a href="{{route('notice.manage')}}">Manage Notice</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarSlider" aria-expanded="false" aria-controls="sidebarEmail"
                       class="side-nav-link">
                        <i class="uil-sliders-v"></i>
                        <span> Slider </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSlider">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('slider.add')}}">Add Slider</a>
                            </li>
                            <li>
                                <a href="{{route('slider.manage')}}">Manage Slider</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#editoralinfo" aria-expanded="false" aria-controls="sidebarEmail"
                       class="side-nav-link">
                        <i class="uil-adjust-circle"></i>
                        <span> Editoral </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="editoralinfo">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('editoralinfo.add')}}">Add Editoral</a>
                            </li>
                            <li>
                                <a href="{{route('editoralinfo.manage')}}">Manage Editoral</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                        <i class="uil-streering"></i>
                        <span> About Us </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('about.add')}}">About Us Page</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                        <i class="uil-chart"></i>
                        <span> Cantact </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="side-nav-second-level">
                            <li class="side-nav-item">
                                <a href="{{route('cantact.add')}}">
                                    <span>Cantact Us</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPrivacy" aria-expanded="false" aria-controls="sidebarEmail"
                       class="side-nav-link">
                        <i class="uil-lock"></i>
                        <span> Privacy & Policy </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPrivacy">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('privacy.add')}}">Add Privacy</a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="{{route('privacy.manage')}}">Manage Privacy</a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                        <i class="uil-document-layout-center"></i>
                        <span> Logo </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('logo.add')}}">Add Logo</a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
            <!--- End Sidemenu -->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                @yield('body')
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> © <a href="https://monirulbd.com/" target="_blank">Monirul</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
{{--        <!-- Footer Start -->--}}
{{--        <footer class="footer position-fixed bg-white">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12 text-center">--}}
{{--                        <script>document.write(new Date().getFullYear())</script> © Head And Neck Cancer Support Foundation--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
{{--        <!-- end Footer -->--}}

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
        <h5 class="text-white m-0">Theme Settings</h5>
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-0">
        <div data-simplebar class="h-100">
            <div class="card mb-0 p-3">
                <h5 class="my-3 font-16 fw-bold">Color Scheme</h5>
                <div class="colorscheme-cardradio">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-theme" id="layout-color-light"
                                       value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column bg-white">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-theme" id="layout-color-dark"
                                       value="dark">
                                <label class="form-check-label p-0 avatar-md w-100 bg-black" for="layout-color-dark">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light-lighten d-flex h-100 flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light-lighten d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>
                </div>

                <div id="layout-width">
                    <h5 class="my-3 font-16 fw-bold">Layout Mode</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-mode"
                                       id="layout-mode-fluid" value="fluid">
                                <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-fluid">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                        </div>
                        <div class="col-4" id="layout-boxed">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-mode"
                                       id="layout-mode-boxed" value="boxed">
                                <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-mode-boxed">
                                            <span class="d-flex h-100 border-start border-end">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column p-1">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                        </div>

                        <div class="col-4" id="layout-detached">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-mode"
                                       id="data-layout-detached" value="detached">
                                <label class="form-check-label p-0 avatar-md w-100" for="data-layout-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 align-items-center border-bottom">
                                                    <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                    <span class="d-block border border-3 ms-auto"></span>
                                                    <span class="d-block border border-3 ms-1"></span>
                                                    <span class="d-block border border-3 ms-1"></span>
                                                    <span class="d-block border border-3 ms-1"></span>
                                                </span>
                                                <span class="d-flex h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>

                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Detached</h5>
                        </div>
                    </div>
                </div>

                <h5 class="my-3 font-16 fw-bold">Topbar Color</h5>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color"
                                   id="topbar-color-light" value="light">
                            <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                            </label>
                        </div>
                        <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                                   value="dark">
                            <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-dark d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                            </label>
                        </div>
                        <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                    </div>
                </div>

                <div id="sidebar-color">
                    <h5 class="my-3 font-16 fw-bold">Sidebar Color</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-color"
                                       id="leftbar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-color"
                                       id="leftbar-color-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-dark d-flex h-100 flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-color"
                                       id="leftbar-color-default" value="default">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-default">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                        </div>
                    </div>
                </div>

                <div id="sidebar-size">
                    <h5 class="my-3 font-16 fw-bold">Sidebar Size</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-size"
                                       id="leftbar-size-default" value="default">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-size"
                                       id="leftbar-size-compact" value="compact">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-compact">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-size"
                                       id="leftbar-size-small" value="condensed">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column">
                                                        <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-size"
                                       id="leftbar-size-small-hover" value="sm-hover">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small-hover">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column">
                                                        <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Hover View</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="d-flex h-100 border-end  flex-column">
                                                        <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                        </div>
                    </div>
                </div>

                <div id="layout-position">
                    <h5 class="my-3 font-16 fw-bold">Layout Position</h5>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                        <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                        <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>

                <div id="sidebar-user">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
            </div>
        </div>
    </div>
</div>

<!-- Vendor js -->
<script src="{{asset('/')}}admin/assets/js/vendor.min.js"></script>

<!-- Daterangepicker js -->
<script src="{{asset('/')}}admin/assets/vendor/daterangepicker/moment.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/daterangepicker/daterangepicker.js"></script>

<!-- Apex Charts js -->
<script src="{{asset('/')}}admin/assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Vector Map js -->
<script src="{{asset('/')}}admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- Dashboard App js -->
<script src="{{asset('/')}}admin/assets/js/pages/demo.dashboard.js"></script>
<!-- Datatables js -->
<script src="{{asset('/')}}admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('/')}}admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Datatable Demo Aapp js -->
<script src="{{asset('/')}}admin/assets/js/pages/demo.datatable-init.js"></script>
<!-- App js -->
<script src="{{asset('/')}}admin/assets/js/app.js"></script>

<!--  Select2 Plugin Js -->
<script src="{{asset('/')}}admin/assets/vendor/select2/js/select2.min.js"></script>

<!-- Apex Charts js -->
<script src="{{asset('/')}}admin/assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Chat js -->
<script src="../assets/js/ui/component.chat.js"></script>

<script src="{{asset('/')}}admin/assets/vendor/daterangepicker/moment.min.js"></script>

<!-- Todo js -->
<script src="{{asset('/')}}admin/assets/js/ui/component.todo.js"></script>

<!-- Widgets Demo js -->
<script src="{{asset('/')}}admin/assets/js/pages/demo.widgets.js"></script>

@include('sweetalert::alert')



</body>

</html>
